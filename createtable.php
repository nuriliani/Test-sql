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

         
         $sql="CREATE TABLE users(
         	user_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			email_id VARCHAR(200) NOT NULL,
			password VARCHAR(64) NOT NULL,
			first_name VARCHAR(128) NOT NULL,
			last_name VARCHAR(128) NOT NULL,
			enabled BIT(1) DEFAULT 0
         )";

         $sql2="CREATE TABLE user_signin_logs(
			user_id_FK INT(11) UNSIGNED NOT NULL ,
			session_id VARCHAR (128),
			signed_in_time TIMESTAMP,
			signed_out_time TIMESTAMP,
			PRIMARY KEY (user_id_FK,session_id),
			FOREIGN KEY (user_id_FK) REFERENCES users (user_id) ON DELETE CASCADE
			 
		)";

		if(mysql_query($sql,$conn)){
			echo"Successfully create table for: users";
		}else echo"Error:" .mysql_error();
         
         	if(mysql_query($sql2,$conn)){
			echo"Successfully create table for : user_signin_logs ";
		}else echo"Error:" .mysql_error();
         
         mysql_close($conn);
?>
</body>
</html>
