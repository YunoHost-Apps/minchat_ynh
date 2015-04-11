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
  $auth= explode(',',getarr($ini,'auth',''));

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
  if ($name=="")  {$prompt = "<em>User name missing.</em>";}
  else if ($room=="") {
    if ($auth[0]==""){$prompt="";}
    else {$prompt="<em>Room missing.</em>";}
  } 
  else if (in_array($name.":".$room,$auth)) {$prompt="";}
  else if (in_array(":".$room,$auth)) {$prompt="";}
  else if (in_array($name.":",$auth)) {$prompt="";}
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
            <div id="chatbox"></div>
            <form name="message" action="">
                <input name="usermsg" type="text" id="usermsg" size="63" autocomplete="off"  autofocus/>
                <input name="submitmsg" type="submit"  id="submitmsg" value="Send" />
            </form>
        </div>
        <script type="text/javascript" src="lib/jquery-2.1.3.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                var id = 'undefined';
                var pos = 0;
                var lastdate = 0;

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
                    var oldscrollHeight = $("#chatbox")[0].scrollHeight;
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
                            for (var k in data.data) {
                                lastdate = data.data[k][0];
                                date = new Date(parseInt(lastdate)*1000);
                                heure = date.toLocaleTimeString().substr(0,5);
                                html = html
                                        +"("+heure+") <b>"
                                        +data.data[k][1]+"</b>: "+data.data[k][2]+"<br>";
                            }
                            if (pos==0 && heure!=''){
                               html='<b>----- '+date.toLocaleDateString()+' -----</b><br>'+html;
                            } 
                            pos = data.pos;

                            $("#chatbox").append(html); 
                            var newscrollHeight = $("#chatbox")[0].scrollHeight;
                            if (newscrollHeight > oldscrollHeight) {
								               $("#chatbox").scrollTop($("#chatbox")[0].scrollHeight);
                            }
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
