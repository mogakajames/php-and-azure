<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WORLD POPULATIONA</title>
</head>
<body>
    <h2 class="text-center" style="color: lightgreen;">Population growth between 1960 and 2018</h2>
    <div class="container">
        <?php
        $server = 'localhost';
        $name = 'root';
        $pwd = '';
        $database = 'azure';

        //Establishes the connection

        $connection = mysqli_init();

        mysqli_real_connect($connection, $server, $name, $pwd, $database, 3306);

        if (mysqli_connect_errno($connection)) {
        die('Database connection failed, try again: '.mysqli_connect_error());
        }else{
            
            $sql = "SELECT Data_Source, Column_5, Column_63 FROM pop LIMIT 2,15;";
            $res = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_assoc($res)) {
                
                $data = array_values($row);
                $country = $data[0];
                $population1960 = $data[1];
                $population2018 = $data[2];
                $growth = $population2018 - $population1960;
                
                 
               $display = $country. " : ". "Growth = ". $growth;
               echo "<h3 class='text-center' style='color:grey'>".$display."</h3>"; 
                //echo "Country: " . $row['Data_Source'];
                }
        }


        ?>
</div>
</body>
</html>

