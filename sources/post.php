<?php

$text = isset($_POST['text']) ? $_POST['text'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$room = isset($_POST['room']) ? $_POST['room'] : '';

if ($text === '' || $name === '' ) return;

$time = time();
$date = date('Y-m-d', $time);

$historyDir = './history/';
$historyFile = $historyDir.$room.$date;

$fh = @fopen($historyFile, 'a');
if ($fh === false) {
    mkdir($historyDir);
    $fh = @fopen($historyFile, 'a');
}

/* start semafore */
flock($fh, LOCK_EX);

$data = array($time, $name, stripslashes(htmlspecialchars($text)));
fwrite($fh, implode('>', $data)."\n");

/* end semafore */
flock($fh, LOCK_UN);
fclose($fh);
