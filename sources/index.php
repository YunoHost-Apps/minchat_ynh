<?php
function getarr($arr,$key,$default) {
    return isset($arr[$key]) ? $arr[$key] : $default;
}

function deleteOldHistory() {
    $expireDate = date('Y-m-d', strtotime("-1 day"));
    foreach (glob('./history/*') as $f) {
        if (substr(basename($f),-10) < $expireDate) {
            unlink($f);
        }
    }
}

// init setup.ini parms
  $ini = parse_ini_file('conf/setup.ini');
  $interval= getarr($ini,'interval',2500);
  $auth= explode(',',getarr($ini,'auth','*:'));

// read args
$name="";
if (isset($_REQUEST['name'])) {
   $name = stripslashes(htmlspecialchars($_REQUEST['name']));
}
$room="";
if (isset($_REQUEST['room'])) {
   $room = stripslashes(htmlspecialchars($_REQUEST['room']));
}

// no auth = single room = no room specified
if ($auth[0]==""){$room="";}

// check args
if ($name.$room=="") {
  // no args
  $prompt = "Please fill in the form to continue:";
} else {
// user name mandatory in any case
  if ($name=="")  {$prompt = "<em>User name missing.</em>";}
  else if ($room=="") {
// room not mandatory depending on setup  
    if (in_array("*:",$auth)||in_array($name.":",$auth)){$prompt="";}
    else {$prompt="<em>Room missing.</em>";}
  }
// here we have both room and user 
  else if (in_array($name.":".$room,$auth)||in_array("*:".$room,$auth)||in_array($name.":*",$auth)||in_array("*:*",$auth)) {$prompt="";}
  else {$prompt="<em>User not authorized to this room.</em>";}
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Minchat - <?php echo $room; ?> room</title>
        <link type="text/css" rel="stylesheet" href="style.css" />
    </head>

    <?php
    if ($prompt!="") {
// Form to get args
      echo'<div id="loginform"><p>';
      echo $err;
      echo $prompt;
      echo '</p><form action="" method="get" class="tform"><p><label for="name">Name:</label><input type="text" name="name" id="name" value="';
      echo $name;
      echo '"/></p>';
      if ($auth[0]!==""){
        echo '<p><label for="room">Room:</label><input type="text" name="room" id="room" value="';
        echo $room;
        echo '"/></p>';
      }
      echo '<br/><input type="submit" value="Enter" /></p></form></div>';
    } else {
      deleteOldHistory();
// Enter the room
        ?>
        <div id="wrapper">
            <div id="menu">
                <p class="welcome">Welcome to the <b><?php echo $room; ?></b> room, <b><?php echo $name; ?></b></p>
                <div style="clear:both"></div>
            </div>	
            <div id="content">
            <div id="chatbox"></div>
            </div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" size="63" autocomplete="off"  autofocus/>
                <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
            </form>
        </div>
        <script type="text/javascript" src="lib/jquery-2.1.3.min.js"></script>
        <script type="text/javascript">
// add link or img
function replacer(match, p1,p2,p3, offset, string){
  if (p1.charAt(0)=='!') {
    return(' <img src="' + p1.substr(1) + '" />');
  } else {
    return ' <a href="' + p1 + '">' + p1 + '</a>';
  }       
}
// scans URLS 
function lienurl(s){
  return s.replace(/\s(!?https?:\/\/([-\w\.]+[-\w]+(:\d+)?(\/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?))/g,replacer);
}

            $(document).ready(function() {
                var pos = 0;
                var lastdate = 0;
                var lastday='';
                var oldscrollHeight = $("#chatbox")[0].scrollHeight;

                $("#submitmsg").click(function() {
                    var clientmsg = $("#usermsg").val();
                    $("#usermsg").val('');
                    $("#usermsg").focus();
                    $.ajax({
                        type: 'POST',
                        url: 'post.php',
                        data: {text: clientmsg,name:'<?php echo $name; ?>',room:'<?php echo $room; ?>'},
                        async: false,
                        success: function(data) {
                            loadLog();
                        },
                        error: function(request, status, error) {
                            $("#usermsg").val(clientmsg);
                        },
                    });
                    return false;
                });

                function loadLog() {
                    $.ajax({
                        type: 'POST',
                        url: 'server.php',
                        data: {room:'<?php echo $room; ?>', pos: pos, lastdate: lastdate},
                        dataType: 'json',
                        async: false,
                        success: function(data) {
                            var html='';
                            var date;
                            var heure='';
                            var day='';
                            for (var k in data.data) {
                                lastdate = data.data[k][0];
                                date = new Date(parseInt(lastdate)*1000);
                                heure = date.toLocaleTimeString().substr(0,5);
                                html = html
                                        +"("+heure+") <b>"
                                        +data.data[k][1]+"</b>: "+data.data[k][2]+"<br>";
                            }

                            html=lienurl(html);

                            if (html!=""){
                              if (pos==0){
                                 day = date.toLocaleDateString();
                                 if (day!=lastday){
                                   $("#chatbox").append('<b>----- '+day+' -----</b><br>');
                                   if (data.pos==0) {
                                     $("#chatbox").append('<span id="nomsg">No message yet. Enter yours!<br></span>');
                                   }
                                   lastday=day;
                                 }
                                 if (data.pos>0) {
                                   $("#nomsg").remove();
                                 } else {
                                   html="";
                                 }
                              } 
                              $("#chatbox").append(html); 
                            }
                            var newscrollHeight = $("#chatbox")[0].scrollHeight;
                            if (newscrollHeight > oldscrollHeight) {
								               $("#chatbox").scrollTop(newscrollHeight);
                            }
                            pos = data.pos;
                        },
                    });
                }
                loadLog();
                setInterval(loadLog, <?php echo $interval ?>);	//Reload file every $interval ms

            });
        </script>
<?php } ?>
</body>
</html>
