<?php

include_once "config.php";
session_start();

$sessionId = session_id();
$hashedSessionId = hash('sha256', $sessionId);
$shortSessionId = substr($sessionId, 0, 16);
$_SESSION['sessionId'] = $shortSessionId;
// Regenerate the session ID to ensure freshness
// session_regenerate_id(true);
$_SESSION['deviceName'] = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$ip_addresss = $_SERVER['REMOTE_ADDR'];
if (isset($_SERVER['HTTP_CLIENT_IP'])) {
    $ip_addresss = $_SERVER['HTTP_CLIENT_IP'];
}
if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip_addresss = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip_addresss = $_SERVER['REMOTE_ADDR'];
}
$ip = $ip_addresss;
$ipdat = @json_decode(file_get_contents(
    "http://www.geoplugin.net/json.gp?ip=" . $ip
));
$country = $ipdat->geoplugin_countryName;
$url = "http://ip-api.com/json/$ip";
$data = file_get_contents($url);
$result = json_decode($data, true);
$isp = $result['isp'];
$user_agent = $_SERVER['HTTP_USER_AGENT'];
if (preg_match('/\((.*?)\)/', $user_agent, $matches)) {
    $os_info = $matches[1];
    $os_parts = explode(';', $os_info);
    $version = trim($os_parts[0]);
    $versionName = trim($os_parts[1]);
    $model = trim($os_parts[2]);
}
$is_mobile = preg_match(
    '/(android|blackberry|iphone|ipod|palm|windows\sce|symbian)/i',
    $user_agent
);
$device = $is_mobile ? "Moblie" : "Dekstop";

if ($_COOKIE['cookies_id'] != "") {
    $_SESSION['sessionId'] = $_COOKIE['cookies_id'];
}
if ($_COOKIE['cookies_id'] == "") {
    setcookie('cookies_id', $_SESSION['sessionId'], time() + (86400 * 30), '/');
}
$sql = "INSERT INTO `users` (`ip_address`,`country`, `session_id`, `isp` ,`device`,`model`) VALUES ('" . mysqli_real_escape_string($conn, $ip) . "','" . mysqli_real_escape_string($conn, $country) . "','" . mysqli_real_escape_string($conn, $_SESSION['sessionId']) . "','" . mysqli_real_escape_string($conn, $isp) . "','" . mysqli_real_escape_string($conn, $device) . "','" . mysqli_real_escape_string($conn, $version . " " . " " . $versionName . " " . " " . $model) . "')";
$result = mysqli_query($conn, $sql);