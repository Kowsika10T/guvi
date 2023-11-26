$(document).ready(function(){
   
    $("#login").submit(function(event){
        event.preventDefault();
        var values = $(this).serialize();
        console.log(values);
        $.ajax({
            url: "php/login.php",
            type: "post",
            data: values ,
            success: function (response) {
                  console.log(response);
                  var id=''+response['id'];
                  localStorage.setItem('id', JSON.stringify(response));
                  window.location.href='profile.html';
               
            },
            error: function(jqXHR, textStatus, errorThrown) {
               console.log(textStatus, errorThrown);
            }
        });
    });
});