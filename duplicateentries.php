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
         //echo 'Connected successfully<br />';

        mysql_select_db("users_info",$conn);

         
        $sql=("SELECT * FROM users GROUP BY last_name, first_name HAVING COUNT(*)>1");

		$result = mysql_query( $sql, $conn );

		   if(! $result ) {
		      die('Could not get data: ' . mysql_error());
		   }

		   $num_of_duplicates=mysql_num_rows($result);
		   echo " Number of entry having duplicate: $num_of_duplicates";

		   while($row = mysql_fetch_assoc($result)) {
		   	 
		      echo "<br>User id: $row[user_id]<br>
		      		First name: $row[first_name]<br>
		      		Last Name: $row[last_name]<br>
		      		Email: $row[email_id]";
		   } 
         mysql_close($conn);
?>
</body>
</html>