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
         echo 'Connected successfully<br />';

         mysql_select_db("users_info",$conn);

         
         $sql=("SELECT user_id_FK,signed_in_time,signed_out_time FROM user_signin_logs JOIN users ON user_signin_logs.user_id_FK=users.user_id ORDER BY user_id DESC");

		$result = mysql_query( $sql, $conn );

		   if(! $result ) {
		      die('Could not get data: ' . mysql_error());
		   }

		   while($row = mysql_fetch_assoc($result)) {
		      echo "User id: $row[user_id_FK] <br>
		      Signed in time: $row[signed_in_time] <br>
		      Signed out time: $row[signed_out_time]<br>"
		      ;
		   } 
         mysql_close($conn);
?>
</body>
</html>
