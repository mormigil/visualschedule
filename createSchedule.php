<?php 
        $username = "ankhar";
        $password = "fireforge5";
        $host = "mydb5.cs.unc.edu";
        $database = "comp523p1db";
        mysql_connect($host, $username, $password) or 
        die("Can not connect to database: ".mysql_error());
        mysql_select_db($database) or die("Can not select the database: ". mysql_error());
        if(isset($_POST['pic1'])&&!is_null($_POST['pic2'])&&isset($_POST['pic3'])){
          $pictures = array();
          $pictures[0] = $_POST['pic1'];
          $pictures[1] = $_POST['pic2'];
          $pictures[2] = $_POST['pic3'];
          mysql_query("INSERT INTO tbl_sched (image_one, image_two, image_three, user, tags) 
            VALUES ('$pictures[0]', '$pictures[1]', '$pictures[2]', '$_POST[user]', '$_POST[tags]')
            ") or die(
            "Cannot insert".mysql_error());
            print("Successfully made a new schedule with the three pictures");
            print("<a href = 'AdminPictures.php'>Make More Schedules</a>");
        }
?>