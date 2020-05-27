<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORLD POPULATIONA</title>
    
</head>
<body>
    <h2 class="text-center" style="color: lightgreen;">Countries Population in 2018</h2>
    <div class="container">
    <?php
        $serverhost = 'localhost';
        $usrname = 'root';
        $usr_pwd = '';
        $cloud_database = 'azure';

        //Establishes the connection

        $connectiontodb = mysqli_init();

        mysqli_real_connect($connectiontodb, $serverhost, $usrname, $usr_pwd, $cloud_database, 3306);

        if (mysqli_connect_errno($connectiontodb)) {
        die('Connection failed due to error, check again: '.mysqli_connect_error());
        }else{
            
            $sql = "SELECT Data_Source, Column_63 FROM pop LIMIT 2, 15;";
            $res = mysqli_query($connectiontodb, $sql);
            while($row = mysqli_fetch_assoc($res)) {
                
                $data = array_values($row);
                $country = $data[0];
                $population2018 = $data[1];
                
                
                
                 
               $display = $country. " : ". "Population in 2018 = ". $population2018;
               echo "<h3 class='text-center' style='color:grey'>".$display."</h3>"; 
                //echo "Country: " . $row['Data_Source'];
                }
        }


        ?>
</div>
</body>
</html>

