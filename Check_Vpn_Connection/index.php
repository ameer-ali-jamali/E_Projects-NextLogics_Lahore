<?php
include_once "public_vpn_list.php";
$ip_address = $_SERVER['REMOTE_ADDR'];
$api_key = 'On8gDXoHqNw7B3NdmBUwh3gORnIvsVhs';
$url = "https://ipqualityscore.com/api/json/ip/$api_key/$ip_address";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
$data = json_decode($result, true);
$is_vpn = $data['vpn'];
$is_proxy = $data['proxy'];
if ($is_vpn || $is_proxy == true) {
?>
    <div class="mt text-center">
        <h1 class="color">Vpn Detected</h1>
    </div>
<?php
} else {
?>
    <div class="mt text-center">
        <h1>Vpn Not Detected</h1>
    </div>
<?php
}
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

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <title>Home</title>
    <style>
        .mt {
            margin-top: 10px
        }

        .color {
            color: red;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div style="text-align: center;">
            <h1 class="mt-2">My IpAdress: <span style="color: blue;"><?php echo $ip_addresss; ?></span></h1>
        </div>

        <div class="table-responsive">
            <table class="table table-dark table-bordered">
                <thead>
                    <tr>
                        <th>Country Name</th>
                        <th>City Name</th>
                        <th>Latitude</th>
                        <th>Continent Name</th>
                        <th>Longitude</th>
                        <th>Currency Symbol</th>
                        <th>Timezone</th>
                        <th>Currency</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $ipdat->geoplugin_countryName . "\n"; ?></td>
                        <td><?php echo $ipdat->geoplugin_city . "\n"; ?></td>
                        <td><?php echo $ipdat->geoplugin_latitude . "\n"; ?></td>
                        <td><?php echo $ipdat->geoplugin_continentName . "\n"; ?></td>
                        <td><?php echo $ipdat->geoplugin_longitude . "\n"; ?></td>
                        <td><?php echo $ipdat->geoplugin_currencySymbol . "\n"; ?></td>
                        <td><?php echo $ipdat->geoplugin_currencyCode . "\n"; ?></td>
                        <td><?php echo  $ipdat->geoplugin_timezone; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <footer>
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2023 Copyright:
            <a class="text-reset fw-bold" href="https://www.linkedin.com/in/ameer-ali-jamali"><span style="color: blue;text-decoration: none;">Ameer Ali</span></a>
        </div>
    </footer>
</body>

</html>