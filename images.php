<DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "utf-8">
	<title>PHP/MySQL tests</title>
</head>
<body>
	<div id = "wrapper">
	<div id = "content">
	<?php
	mysql_connect("mydb.cs.unc.edu", "woliverj", "CH@ngemenow99Please!woliverj") or
	die(mysql_error());
	mysql_select_db("comp523p1db") or die(mysql_error());
	//get decoded image data from database 
	$result=mysql_query("SELECT * FROM images WHERE img='".$_GET['img']."'"); 

	//fetch data from database 
	$data=mysql_fetch_array($result); 
	$encoded=$data['data']; 

	//note: "$data['data']" is the row "data" in the table we made. 
	//The image ID would be "$data['img']" for example 


	//close connection 
	mysql_close($connection); 

	//decode and echo the image data 
	echo base64_decode($encoded); 

	//end 
	?>
	
	</div>
	</div>
</body>
</html>