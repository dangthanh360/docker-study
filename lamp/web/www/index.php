<html>
 <head>
  <title>Demo Docker LAMP</title>
</head>
<body>
    <div class="container">
        <h1><?php echo "Hello from Docker LAMP!" ?></h1>
        
        <div>
            <h1>Get data from MySQL</h1>
            
            <?php
            $conn = new mysqli('db', 'web_user', 'web_pass', 'web_db');
            if ($conn->connect_errno) {
                echo "<p style='color:#ff0000;'>Connect failed: {$conn->connect_error}</p>";
                $conn->close();
                exit();
            }
            
            $query = $conn->query('SELECT * FROM `website`');
            if($query){
                while($row = $query->fetch_array(MYSQLI_ASSOC)){
                    echo "<p>{$row['id']} -- {$row['name']}</p>";
                }
                
                $query->close();
            }
            
            $conn->close();
            ?>
    </div>
</body>
</html>
