<!DOCTYPE html>
<html>
<head>
    <title>Schedule Creator</title>
    <meta charset="utf-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <link rel="stylesheet" href="picSelection.css">
    <script src="http://code.jquery.com/jquery-1.6.4.min.js"></script>
    <link rel="stylesheet" href= "stylesheet.css" />
    <script type = "text/javascript">
    var i = 0;
    var images = new Array();
    $(document).ready(function(){
      $(".search").click(function(){
        $.post("search.php", {keywords: $(".keywords").val()}, function(data){
          $("#image_display").empty();
          $.each(data, function(){
            alert("im here");
            $("#image_display").append("<img src = 'upload/" + data + "' alt = 'fun'>");
          })
        }, "json")
      });
      $("img").click(function(){
        if(i<3){
        $(this).unbind('click');
        $imgSrc = $(this).attr('src');
        $imgAlt = $(this).attr('alt');
        $("#leftBox").append("<img src="+$imgSrc +" alt="+ $imgAlt +">");
        $("#selected_pics").addClass("dropPictures");
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
      }
      });
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
        mysql_connect($host, $username, $password) or 
        die("Can not connect to database: ".mysql_error());
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
	<div class="page" id = "broken" data-theme="b">
    	<div class = "header"><h1>Build a Schedule!</h1></div>
   		 <div class = "content">
        <label for="search-basic">Search:</label>
        <input type = "text" name = "search" class = "keywords">
        <input type = "submit" value = "Submit" class = "search">
        <div class = "pic_boxes" id = "leftBox"></div>
        <form name = "selectedPics" id = "selected_pics" enctype = "multipart/form-data"
          action = "<?php echo $_SERVER['PHP_SELF'];?>" method = "post">
          <br>
          <input type = "hidden" name = "pic1" id = "pic_1" value = "">
          <input type = "hidden" name = "pic2" id = "pic_2" value = "">
          <input type = "hidden" name = "pic3" id = "pic_3" value = "">
          <input type = "submit" value = "Submit">
        </form>
        <div id = "image_display">
        <?php
        /*$image_url = array();
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
              if(file_exists("upload/".$data[0])&&!empty($data[0])){
                echo '<img src = "upload/'. $data[0].'" alt = "fun">';
              }
            }
          }
        }else{
          echo 'No Results';
        }
        */
        ?>
      </div>
        <div><a href = "index.html" class="button">Back Home</a></div>
      </div>
    </div>
 </body>
</html>