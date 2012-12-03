 <?php

 	$username = "root";
    $password = "";
    $host = "localhost";
    $database = "comp_523";
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
            print($data[0]);
    	    $images[] = $data[0];
        }
    }
    echo json_encode($images);
?>