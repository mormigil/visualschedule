<?php
class Schedule{
	private $id;
	private $active;
	private $user;
	private $image_one;
	private $image_two;
	private $image_three;
	private $image_four;
	private $tags;

	#public static function create($user, $)

	public static function findByID($id){
		$mysqli = new mysqli("mydb5.cs.unc.edu", "ankhar", "fireforge5", "comp523p1db");
		$result = $mysqli->query("SELECT * FROM tbl_sched WHERE sched_id =". $id);
		if($result){
		if($result->num_rows == 0){
			return null;
		}
		$schedule_info = $result->fetch_array();
		return new Schedule(intval($schedule_info['sched_id']),
		 intval($schedule_info['active']), $schedule_info['image_one'],
		 $schedule_info['image_two'], $schedule_info['image_three'],
		 $schedule_info['image_four'], $schedule_info['user'], $schedule_info['tags']);
		}
		return null;
	}

	public function getFromUser($user){
		$mysqli = new mysqli("mydb5.cs.unc.edu", "ankhar", "fireforge5", "comp523p1db");
		$result = $mysqli->query("SELECT sched_id FROM tbl_sched WHERE user = '" . $user. "' ORDER BY ID DESC");
		$schedules = array();
		if($result){
			for($i = 1; $i <= 10; $i++){
				$next_row = $result->fetch_row();
				if($next_row){
					$schedules[] = Schedule::findByID($next_row[0]);
				}
			}
		}
		return $schedules;
	}

	public function getMostActive(){
		$mysqli = new mysqli("mydb5.cs.unc.edu", "ankhar", "fireforge5", "comp523p1db");
		$result = $mysqli->query("SELECT sched_id FROM tbl_sched WHERE active = (SELECT max(active) FROM tbl_sched) ORDER BY ID DESC");
		if($result){
			$maxRow = $result->fetch_row();
			if($maxRow){
				return findByID($maxRow[0]);
			}
		}
		return null;
	}



	public function setActive($active){
		$this->active = $active;
		return $this->update();
	}

	public function update(){
		$mysqli = new mysqli("mydb5.cs.unc.edu", "ankhar", "fireforge5", "comp523p1db");
		$result = $mysqli->query("UPDATE tbl_sched SET active = " . $this->active . " WHERE ID =" . $this->id);
		return $result;
	}

	public function getMostRecent(){

	}

	public function delete(){
		$mysqli = new mysqli("mydb5.cs.unc.edu", "ankhar", "fireforge5", "comp523p1db");
		$result = $mysqli->query("DELETE FROM tbl_sched WHERE sched_id =" . $this->id);
		return $result;
	}

	public function getJSON(){
		$json_rep = array();
		$json_rep['id'] = $this->id;
		$json_rep['active'] = $this->active;
		$json_rep['user'] = $this->user;
		$json_rep['image_one'] = $this->image_one;
		$json_rep['image_two'] = $this->image_two;
		$json_rep['image_three'] = $this->image_three;
		$json_rep['image_four'] = $this->image_four;
		$json_rep['tags'] = $this->tags;
		return $json_rep;
	}

	public function getFromTag($tags){
		$mysqli = new mysqli("mydb5.cs.unc.edu", "ankhar", "fireforge5", "comp523p1db");
		$result = $mysqli->query("SELECT sched_id FROM tbl_sched WHERE tags = '". $tags . "'");
		if($result){
			if($result->num_rows == 0){
				return null;
			}
			$schedule_IDs = $result->fetch_array();
			findByID($schedule_IDs['sched_id']);
		}

	}

	private function __construct($id, $active, $image_one, $image_two, $image_three){
		$this->id = $id;
		$this->active = $active;
		$this->image_one = $image_one;
		$this->image_two = $image_two;
		$this->image_three = $image_three;
	}
}