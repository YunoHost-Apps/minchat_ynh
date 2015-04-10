<?php

function v($v, $czyscHtmlIExit = false) {
	if ($czyscHtmlIExit) ob_end_clean();
    echo '<pre>' . print_r($v, true) . '</pre>';
	if ($czyscHtmlIExit) exit;
}
function vv($v, $czyscHtmlIExit = false) {
	if ($czyscHtmlIExit) ob_end_clean();
    echo '<pre>';
	var_dump($v);
	echo '</pre>';
	if ($czyscHtmlIExit) exit;
}
function vvv($var, & $result = null, $is_view = true)
{
    if (is_array($var) || is_object($var)) foreach ($var as $key=> $value) vvv($value, $result[$key], false);
    else $result = $var;

    if ($is_view) v($result);
}

$text = isset($_POST['text']) ? $_POST['text'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$room = isset($_POST['room']) ? $_POST['room'] : '';
$delay = isset($_POST['delay']) ? $_POST['delay'] : '';

if ($text === '' || $name === '' || $delay === '') return;

$isApc = extension_loaded('apc');

$time = time();
$date = date('Y-m-d', $time);
$uniqid = uniqid();
$id = $time.'-'.$uniqid;

$historyDir = './history/';

$tmpFile = $historyDir.$room.'cache2100-01-01';
$historyFile = $historyDir.$room.$date;

$fh = @fopen($historyFile, 'a');
if ($fh === false) {
    mkdir($historyDir);
    $fh = @fopen($historyFile, 'a');
}

/* start semafore */
flock($fh, LOCK_EX);

// data
$data = array($id, $name, stripslashes(htmlspecialchars($text)));

// write history
fwrite($fh, implode('>', $data)."\n");

// cache
if ($isApc) {
    $cache = apc_fetch('chat');
    if ($cache === false) {
        $cache = array();
    }
} else {
    $cache = @file_get_contents($tmpFile);
    if ($cache === false) {
        $cache = array();
    } else {
        $cache = unserialize($cache);
    }    
}

array_unshift($cache, $data);

// delete expired cache
$expireTime = floor($time - $delay);
foreach (array_reverse($cache,true) as $k => $e) {
    if ($e[0] < $expireTime) {
        unset($cache[$k]);
    } else {
        break;
    }
}

if ($isApc) {
    apc_store('chat', $cache);
} else {
    file_put_contents($tmpFile, serialize($cache));
}

/* end semafore */
flock($fh, LOCK_UN);
fclose($fh);
