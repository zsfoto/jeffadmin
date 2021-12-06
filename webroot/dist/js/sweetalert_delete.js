$(document).ready( function(){

	//-- Index-nél a postLinkes törlés összekombinálása a SWAL-lal...
	$(document).on('click', '.postlink-delete', function () {
		var delete_form = $(this).parent().find('form');
		var title = $(this).attr('title');
		var text = $(this).attr('text');		
		var subText = $(this).attr('subText');
		var confirmButtonText = $(this).attr('confirmButtonText');
		var cancelButtonText = $(this).attr('cancelButtonText');		
		Swal.fire({
		  title: title,
		  text: text,
		  animation: false,
		  type: 'error',	//type: 'warning', //warning, error, success, info
		  showCancelButton: true,
		  confirmButtonColor: 'red',
		  //cancelButtonColor: '#d33',
		  cancelButtonText: cancelButtonText,
		  confirmButtonText: confirmButtonText
		}).then((result) => {
			console.log(result);
			if (result.value) {
				delete_form.submit();					
			}			  
		})
		
	});		
	
});
