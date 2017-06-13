
<?php

// echo phpinfo();


function getUserIP()
{
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}


//$user_ip = getUserIP();

$user_ip = '52.6.251.159';

echo $user_ip;

$country = geoip_country_code3_by_name($user_ip);

if ($country) {
    echo 'This host is located in: ' . $country;
}













session_start();

$d1 = strtotime('20-04-2015');

$d2 = strtotime('20-04-2016');


$today = date('Y-m-d',$d1);

echo '<br />Start Date: ' .$today;

$enddate = date('Y-m-d',$d2);


$m = strtotime("+1 months", strtotime($enddate));


echo '<br />End Date : ' .date('Y-m-d', $m);

$x = new DateTime($today);

$z = new DateTime(date('Y-m-d',$m));


$diff1 = $z->diff($x);

echo '<br />' .$diff1->y . '<br />';


$t1 = date('H:i:s');
$t2 = '14:20:00';
//$t3 = date('h:i:s',$t2);

$x = new DateTime($t1);

$z = new DateTime($t2);

$diff1 = $z->diff($x);

echo $t1 . '<br />' . $t2 . '<br />';

//echo '<br />' .$diff1->s;

//$to_time = date("Y-m-d H:i");
//$_SESSION['t'] = $to_time;

$from_time = date("Y-m-d H:i");

echo $_SESSION['t'] . '<br />';

echo $from_time . '<br />';

echo round(abs(strtotime($_SESSION['t']) - strtotime($from_time)) / 60,0). " minute";


?>
