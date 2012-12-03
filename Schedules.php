<?php
print("im on this page");
require_once('orm/Schedule.php');
print("require loaded");
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	print("yoyo");
	if(is_null($_SERVER['PATH_INFO'])){
		print('here too right?');
		if(!is_null($_GET['user'])){
			$schedules = Schedule::getFromUser($_GET['user']);
			if(is_null($schedules)){
				header("HTTP/1.1 400 Bad Request");
				print("Error in user, probably didn't exist");
				exit();
			}
		}
		if(is_null($_GET['user'])){
			$schedules = Schedule::getMostActive();
			if(is_null($schedules)){
				header("HTTP/1.1 400 Bad Request");
				print("Most active somehow not found");
				exit();
			}
		}
		$schedules_ids = array();
		foreach($schedules as $t){
			$schedule_ids[] = $t->getJSON();
		}
		header("Content-type: application/json");
		print(json_encode($comment_ids));
		exit();
	}
}

?>