$(document).ready(function(){
      $(".search").click(function(){
        $.post("search.php", {keywords: $(".keywords").val()}, function(data){
          $i = 0;
          $("#image_display").empty();
          $.each(data, function(){
            $("#image_display").append("<img src = 'upload/" + data[$i] + "' class = 'images' alt = 'fun'>");
            $i++;
          });
        }, "json");
      });
    });