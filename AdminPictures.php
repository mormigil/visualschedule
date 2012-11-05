<!DOCTYPE html>
<html>
<head>
    <title>Schedule Creator</title>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <link rel="stylesheet" href="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.css" >
    <link rel="stylesheet" href="picSelection.css">
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <script src="http://code.jquery.com/mobile/1.0/jquery.mobile-1.0.min.js"></script>
    <script type = "text/javascript">
    var i = 0;
    var images = new Array();
    $(document).ready(function(){
      if(i<3){
      $("img").click(function(){
        $(this).unbind('click');
        $imgSrc = $(this).attr('src');
        $imgAlt = $(this).attr('alt');
        $("#leftBox").append("<img src="+$imgSrc +" alt="+ $imgAlt +" />");
        $("#selected_pics").find('div').addClass("dropPictures");
        images[i] = $imgSrc.substring(7);
        alert(images[i]);
        i++;
        alert(i);
        if(i==1)
          $("#pic_1").val(images[0]);
        if(i==2)
          $("#pic_2").val(images[1]);
        if(i==3)
          $("#pic_3").val(images[2]);
      });
    }
      $("#pic_1").val(images[0]);
      $("#pic_2").val(images[1]);
      $("#pic_3").val(images[2]);
    });
    </script>
</head>
<body> 
<?php 
        $username = "root";
        $password = "";
        $host = "localhost";
        $database = "comp_523";
        $search = "";
        if(isset($_POST['searchbar']))
           $search = $_POST['searchbar'];
        mysql_connect($host, $username, $password) or 
        die("Can not connect to database: ".mysql_error());
        mysql_select_db($database) or die("Can not select the database: ". mysql_error());
        $result = mysql_query("SELECT tbl_images.image_url FROM tbl_images, tbl_tags 
          WHERE tag_name LIKE '%$search%' AND tag_id = image_id");
        if(isset($_POST['pic1'])&&isset($_POST['pic2'])&&isset($_POST['pic3'])){
          $pictures = array();
          $pictures[0] = $_POST['pic1'];
          $pictures[1] = $_POST['pic2'];
          $pictures[2] = $_POST['pic3'];
          mysql_query("INSERT INTO tbl_sched (image_one, image_two, image_three) 
            VALUES ('$pictures[0]', '$pictures[1]', '$pictures[2]')") or die(
            "Cannot insert".mysql_error());
        }
?>
	<div data-role="page" id = "broken" data-theme="b">
    	<div data-role = "header"><h1>Build a Schedule!</h1></div>
   		 <div data-role = "content">
        <form name = "search" enctype = "multipart/form-data" 
          action= "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
          <label for="search-basic">Search:</label>
          <input type = "search" name = "searchbar" id = "search_bar" data-mini = "true">
          <input type = "submit" value = "Submit">
        </form>
        <div class = "pic_boxes" id = "leftBox"></div>
        <form name = "selectedPics" id = "selected_pics" enctype = "multipart/form-data"
          action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
          <input type = "hidden" name = "pic1" id = "pic_1" value = "">
          <input type = "hidden" name = "pic2" id = "pic_2" value = "">
          <input type = "hidden" name = "pic3" id = "pic_3" value = "">
          <input type = "submit" value = "Submit">
        </form>
        <div id = "image_display">
        <?php
        $image_url = array();
        if(mysql_num_rows($result)>0){
          while($data = mysql_fetch_array($result)){
            $i=0;
            $dataClone = false;
            while($i<count($image_url))
            {
              if($image_url[$i] == $data[0]){
                $dataClone = true;
                break;
              }
              $i++;
            }
            if(!$dataClone){
              $image_url[] = $data[0];
              echo '<img src = "upload/'. $data[0].'" alt = "fun">';
            }
          }
        }else{
          echo 'No Results';
        }
        ?>
      </div>
        <div><a href = "AdminMainPage.html" data-role="button">Back Home</a></div>
      </div>
    </div>
 </body>
</html>