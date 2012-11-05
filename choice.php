<!DOCTYPE HTML>

<html lang=en>

<head>
<meta charset=utf-8>
<title>Choice Page</title>
<link rel = stylesheet href = "choice_style.css" type = "text/css">
<script src="http://code.jquery.com/mobile/1.0a3/jquery.mobile-1.0a3.min.js" type="text/javascript"></script>
<script src="http://code.jquery.com/jquery-1.4.4.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.7/jquery-ui.min.js"></script>
<script src = "jquery.ui.touch-punch.min.js" type= "text/javascript"></script>

<script type="text/javascript">
$(document).ready(function(){

	//had to nest clicks to enable and disable each click after the previous choice
	$(".img1").click(function(oneClick) { //click 1
		$(".img1").unbind('click');
		$imgSrc = $(this).attr('src');
		$imgAlt = $(this).attr('alt');
		//append image
		$('.topbox').append("<img src="+$imgSrc +" alt="+ $imgAlt +" />")
		$(".img2").click(function() { //click 2
			$(".img2").unbind('click');
			$imgSrc = $(this).attr('src');
			$imgAlt = $(this).attr('alt');
			//append image
			$('.topbox').append("<span class='top'> &gt; </span>");
			$('.topbox').append("<img src="+ $imgSrc +" alt="+ $imgAlt +" />")
			$(".img3").click(function() { //click 3
			$(".img3").unbind('click');
            $imgSrc = $(this).attr('src');
            $imgAlt = $(this).attr('alt');
			//append image
			$('.topbox').append("<span class='top'> &gt; </span>");
			$('.topbox').append("<img src="+ $imgSrc +" alt="+ $imgAlt +" />")
			});
		});
	});


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
        mysql_select_db($database) or die("Can not select the database: ".mysql_error());
        $result = mysql_query("SELECT tbl_sched.image_one, tbl_sched.image_two,
         tbl_sched.image_three FROM tbl_sched") or die("Cannot select".mysql_error());
        $row = mysql_fetch_array($result);
        print_r($row);
        $picID = "fba5b3e449f06ea7dfc5b4abc14a6833Chrysanthemum.jpg"


        ?>
	<div class="topbox"></div>
    <div class="longbox" id="long1">
        <div class="left">
        	<img class="img1" src=<?php echo "upload/" . $picID?> alt="lighthouse">
        </div>
    	<div class="center">
    		<span class="center">OR</span>
    	</div>
    	<div class="right">
    		<img class="img1" src="desert.jpg" alt="desert">
    	</div>
    </div>
    <div class="longbox">
        <div class="left">
        	<img class="img2" src="lighthouse.jpg" alt="lighthouse">
        </div>
    	<div class="center">
    		<span class="center">OR</span>
    	</div>
    	<div class="right">
    		<img class="img2" src="desert.jpg" alt="desert">
    	</div>
    </div>
    <div class="longbox">
        <div class="left">
        	<img class="img3" src="lighthouse.jpg" alt="lighthouse">
        </div>
    	<div class="center">
    		<span class="center">OR</span>
    	</div>
    	<div class="right">
    		<img class="img3" src="desert.jpg" alt="desert">
    	</div>
    </div>
</body>
</html>
 