 <?php

 	$username = "ankhar";
    $password = "fireforge5";
    $host = "mydb5.cs.unc.edu";
    $database = "comp523p1db";
    $search = "";
    if(isset($_POST['keywords']))
    	$search = $_POST['keywords'];
    mysql_connect($host, $username, $password) or 
    	die("Can not connect to database: ".mysql_error());
    mysql_select_db($database) or die("Can not select the database: ". mysql_error());
    $result = mysql_query("SELECT tbl_images.image_url FROM tbl_images, tbl_tags 
        WHERE tag_name LIKE '%$search%' AND tag_id = image_id");
    $images = array();
    if(mysql_num_rows($result)>0){
        while($data = mysql_fetch_array($result)){
            $dataClone = false;
            while($i<count($images)){
                if($image_url[$i] == $data[0]){
                    $dataClone = true;
                    break;
                }
            $i++;
            }
            if(!$dataClone){
                if(file_exists("upload/".$data[0])&&!empty($data[0])){
                    $images[] = array($data[0]);
                }
            }
        }
    }
    echo json_encode($images);
?>