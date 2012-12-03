<?php
	$mysqli = new mysqli("mydb5.cs.unc.edu", "ankhar", "fireforge5", "comp523p1db");
	$result = $mysqli->query("SELECT user FROM users");
	$users = array();
	if($result){
		while($data = $result->fetch_row()){
			$users[] = $data[0];
		}
	}
	print(json_encode($users));
?>