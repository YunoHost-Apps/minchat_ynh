<?php

$pos = isset($_REQUEST['pos']) ? $_REQUEST['pos'] : '';
$lastdate = isset($_REQUEST['lastdate']) ? $_REQUEST['lastdate'] : '';
$room = isset($_REQUEST['room']) ? $_REQUEST['room'] : '';
$date = date('Y-m-d');
$file = './history/'.$room.$date;

if (!ctype_digit($pos) || !file_exists($file)) return;

settype($pos, "integer");
settype($lastdate, "integer");

$data = array();

if ($pos!=0 && $date!=date('Y-m-d',$lastdate)) {
  $pos=0;
} else {
  $fh =fopen($file, "r");
  
  if (fseek($fh, $pos)==0) {
    $i=0;
    while($lig=fgets($fh)){ $data[$i++] = explode('>', $lig); }
    $pos =ftell($fh);
  }
}
echo json_encode(array('pos' => $pos, 'data' => $data));

?>