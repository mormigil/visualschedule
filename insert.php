<DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "utf-8">
	<title>PHP/MySQL tests</title>
</head>
<body>
	<div id = "wrapper">
		<?php
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		$target = "upload/";
		$filehash = md5_file($_FILES['image']['tmp_name']);
		$target = $target . $filehash . basename($_FILES['image']['name']);

		$image = $filehash . ($_FILES['image']['name']);
		$tags = $_POST['tags'];

		$username = "root";
		$password = "";
		$host = "localhost";
		$database = "comp_523";

		mysql_connect($host, $username, $password) or 
		die("Can not connect to database: ".mysql_error());
		mysql_select_db($database) or die("Can not select the database: ". mysql_error());

		mysql_query("INSERT INTO tbl_images (image_url) VALUES ('$image')") or die(
			"Cannot insert".mysql_error());
		mysql_query("INSERT INTO tbl_tags (tag_name) VALUES ('$tags')") or die(
			"Cannot insert".mysql_error());

		if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
		{
			echo "The file ". $target."has been uploaded,
			and your information has been added to the directory";
		}
		else{
			echo "Sorry, there was a problem uploading your file.";
		}
		?>
	</div>
</body>
</html>