//Ajax javascript by David Hobbs
// this function grabs the form and stops it sending via the action property
// by using preventDefault
$('#capform').submit(function(event){
        event.preventDefault();
        var name = $('#name').val();
        //grab the new value changed by google
        var pass = $('#g-recaptcha-response').val();
        $.ajax({
          type:'POST',
          url:'captest.php',
          data:{
            name:name,
            token:pass
          },
          //the responses show the responses from google in JSON for debugging
          // remove these in the case of production software
          success:function(response){
            $('.message').html(response);
          },
          error:function(){
            $('.message').html('captcha deemed that inupt to be a little too robotic');
          }
        })
      });


