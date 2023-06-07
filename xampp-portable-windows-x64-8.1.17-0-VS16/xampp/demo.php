<?php
    require_once(".\lib\init.php");
    $demo_db = db_connect();
    $query = "SELECT * FROM vitals1";
    $result = mysqli_query($demo_db, $query);
    confirm_result_set($result);
?>

<!DOCTYPE html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transfer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="sylesheet" href="css/style.css">
</head>
<body>


<section class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Data Transmission from Database in Php</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                            <th>O2sat</th>
                            <th>Heart Rate</th>
                            <th>Temperature</th>
                            <th>Blood Pressure</th>
                            <th>Timestamp</th>
                            </tr>
                            <tr>
                            <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                <tr>
                                    <td><?php echo $row['O2sat'] ?></td>
                                    <td><?php echo $row['heartrate'] ?></td>
                                    <td><?php echo $row['BP'] ?></td>
                                    <td><?php echo $row['Temp'] ?></td>
                                    <td><?php echo $row['Timestamp'] ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</body>
</html>

