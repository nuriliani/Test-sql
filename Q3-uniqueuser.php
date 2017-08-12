<!DOCTYPE html>
<html>
<head>
	<title></title>
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
         echo 'Connected successfully <br>';

         mysql_select_db("users_info",$conn);

         
        $sql=("SELECT DISTINCT user_id,first_name, last_name,email_id FROM users");

		$result = mysql_query( $sql, $conn );

		   if(! $result ) {
		      die('Could not get data: ' . mysql_error());
		   }

		   $num_unique_user=mysql_num_rows($result);
		   echo "Number of unique users: $num_unique_user <br>";

		   while($row = mysql_fetch_assoc($result)) {
		      echo "<br>User id: $row[first_name] <br>
		      Signed in time: $row[last_name] <br>
		      Signed out time: $row[email_id]<br>"
		      ;
		   } 
         mysql_close($conn);
?>
</body>
</html>
