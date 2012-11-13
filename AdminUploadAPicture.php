<!DOCTYPE html>
<html>
<head>
    <title>Upload a Picture</title>
    <link rel="stylesheet" href= "stylesheet.css" />
    <meta charset="utf-8" />
</head>
<body>
 <div class = "header"><h1>Upload A Picture</h1></div>      
	<div id = "wrapper">
	<div class = "content">
	<form class="form" enctype="multipart/form-data" action="insert.php" method="POST" name = "changer">
		<input name="MAX_FILE_SIZE" value = "1000000" type = "hidden">
		Please choose a file: <br><input name="image" accept = "image/jpeg" type="file"><br>
		Please choose some tags:<input name="tags" type ="text"><br><br>
		<input value="Submit" type="submit">
	</form>
	<div>
	<a href = "AdminMainPage.html" class="button"  data-theme="e">Back Home</a></div> 
	</div>
	</div>
</body>
</html>