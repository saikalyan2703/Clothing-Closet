//This function is used to insert field value
function field_focus(field, email)
  {
    if(field.value == email)
    {
      field.value = '';
    }
  }

//This function is used to insert field value
  function field_blur(field, email)
  {
    if(field.value == '')
    {
      field.value = email;
    }
  }

//Fade in dashboard box
$(document).ready(function(){
    $('.box').hide().fadeIn(1000);
    });

//Stop click event
$('a').click(function(event){
    event.preventDefault(); 
	});