<!DOCTYPE html>
<html>
<head>
    <title>Schedule Creator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" >
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" >
    <link rel="stylesheet" href="picSelection.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <link rel="stylesheet" href= "stylesheet.css" />
    <script type = "text/javascript" src = "search.js"></script>
    <script type = "text/javascript" src = "select.js"></script>
    <script type = "text/javascript">
    var i = 0;
    var images = new Array();
    $(document).on('click', '.images', function(){
        if(i<3){
        $(this).unbind('click');
        $imgSrc = $(this).attr('src');
        $imgAlt = $(this).attr('alt');
        $("#leftBox").append("<img src="+$imgSrc +" alt="+ $imgAlt +">");
        $("#selected_pics").addClass("dropPictures");
        images[i] = $imgSrc.substring(7);
        //alert(images[i]);
        i++;
        //alert(i);
        if(i==1)
          $("#pic_1").val(images[0]);
        if(i==2)
          $("#pic_2").val(images[1]);
        if(i==3)
          $("#pic_3").val(images[2]);
      }
      $("#pic_1").val(images[0]);
      $("#pic_2").val(images[1]);
      $("#pic_3").val(images[2]);
    });
    </script>
</head>
<body>
	<div class="page" id = "broken" data-theme="b">
    	<div class = "header"><h1>Build a Schedule!</h1></div>
   		 <div class = "content">
        <label for="search-basic">Search:</label>
        <input type = "text" name = "search" class = "keywords">
        <input type = "submit" value = "Submit" class = "search">
        <div class = "pic_boxes" id = "leftBox"></div>
        <form name = "selectedPics" id = "selected_pics" enctype = "multipart/form-data"
          action = "createSchedule.php" method = "post">
          <br>
          <input type = "hidden" name = "pic1" id = "pic_1" value = "">
          <input type = "hidden" name = "pic2" id = "pic_2" value = "">
          <input type = "hidden" name = "pic3" id = "pic_3" value = "">
          <label> Add Tags:</label>
          <input type = "text" name = "tags" value = "">
          <label> Select User:</label>
          <select name = "user">
          </select>
          <input type = "submit" value = "Submit">
        </form>
        <div id = "image_display">
      </div>
        <div><a href = "index.html" class="button">Back Home</a></div>
      </div>
    </div>
 </body>
</html>