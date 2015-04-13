$(document).ready(function()
{
	$('.texto').hide();
	$('.check').click(function(e)
    {
    	console.log("x");
    	 check = $('.check').prop('checked');
        //comprueba si esta o no seleccionada la opcion
        if(check)
        {
        	
        	$(this).parents('tr').find('input[type="text"]').show();  
            
        }
        else
        {
        	$(this).parents('tr').find('input[type="text"]').hide();
        	$(this).parents('tr').find('input[type="text"]').val(""); 
          	 
        }
    });
	
});