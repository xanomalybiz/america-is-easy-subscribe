// JavaScript Document
jQuery(document).ready(function($)
{
	$('#suscriber-form').submit(function(e)
	{
		e.preventDefault();
		//Serialize Form
		var suscriberData = $('#suscriber-form').serialize();
		
		
		//submit form
		$.ajax({
			type:'post',
			url: $('#suscriber-form').attr('action'),
			data: suscriberData
		}).done(function(response)
		{
			//if Success
			$('#form-msg').removeClass('error');
			$('#form-msg').addClass('success');
			
			//Set Message Text
			$('#form-msg').text(response);
			//clear fields
			
			$('#name').val('');
			$('#email').val('');	
		}).fail(function(response)
		{
			//iff error
			$('#form-msg').removeClass('error');
			$('#form-msg').addClass('success');
			
			
			if(response.responseText !== '')
			{
				//Set Message Text
				$('#form-msg').text(response.responseText);
				$('#name').val('');
				$('#email').val('');
			}
			else 
			{
				$('#name').val('');
				$('#email').val('');
			}
			
			
		});
		
	});
});