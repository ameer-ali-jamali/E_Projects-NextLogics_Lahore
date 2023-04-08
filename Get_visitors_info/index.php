<?php
include_once "helper.php";

?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
        <title>Testing</title>
        <style>
        table {
            cursor: pointer;
        }
        </style>
    </head>

    <body>
        <?php
    getcwd();
    ?>
        <div class="mt-3 table-responsive">

            <table class="table table-hover table-sm table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>IP Address</th>
                        <th>Country</th>
                        <th>User ID</th>
                        <th>ISP</th>
                        <th>Device</th>
                        <th>Device Model</th>
                        <th>Device Name</th>
                        <th>Time Stamp</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                // $count = 0;
                $sql = "SELECT * FROM users ORDER BY Id DESC";
                $result = $conn->query($sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['Id'];
                        $ip = $row['ip_address'];
                        $country = $row['country'];
                        $userId = $row['session_id'];
                        // $sessionId = preg_replace('/[^0-9]/', '', $userId);
                        $isp = $row['isp'];
                        $deviceName = $row['device_name'];
                        $device = $row['device'];
                        $model = $row['model'];
                        $timeStamp = $row['timeStamp'];
                        $formattedTime = date("d-m-Y H:i:s", strtotime($timeStamp));
                        // $count++;
                        echo "<tr>";
                        echo "<td>$id</td>";
                        echo "<td>$ip</td>";
                        echo "<td>$country</td>";
                        echo "<td>$userId</td>";
                        echo "<td>$isp</td>";
                        echo "<td>$device</td>";
                        echo "<td>$model</td>";
                        echo "<td>$deviceName</td>";
                        echo "<td>$formattedTime</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <td><h1>No Record Found</h1></td>";
                    echo "</tr>";
                }

                ?>
                </tbody>
            </table>

        </div>

        <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script> -->
        <!-- <script src="helper.js"></script> -->
        <script></script>
    </body>

</html>