<html>
   <head>
      <title>Creating MySQL Tables</title>
   </head>
   <body>
      <?php
         $dbhost = 'localhost';
         $dbuser = 'root';
         $dbpass = '';
         $conn = mysql_connect($dbhost, $dbuser, $dbpass);
         if(! $conn ) {
            die('Could not connect: ' . mysql_error());
         }
         echo 'Connected successfully<br />';
         
         if(mysql_query("CREATE DATABASE users_info".$con)){
            echo "Database was created succesfully";
         }
         else echo"Error:" .mysql_error();
   
         mysql_close($conn);
      ?>
   </body>
</html>