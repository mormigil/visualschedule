$(document).ready(function(){
	$.get("readUser.php", function(data){
		$i = 0;
		$.each(data, function(){
			$("select[name='user']").append("<option>" + data[$i] + " </option");
			$i++;
		});
	}, "json");
});