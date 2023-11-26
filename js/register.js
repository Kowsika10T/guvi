$(document).ready(function(){
  
    $("#register").submit(function(event){
        event.preventDefault();
        var values = $(this).serialize();
        console.log(values);
        $.ajax({
            url: "php/register.php",
            type: "post",
            data: values ,
            success: function (response) {
                
                  window.location.href='login.html';
              
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    });
});