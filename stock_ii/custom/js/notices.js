var managenoticesTable;

$(document).ready(function() {
	// active top navbar notices
	$('#navnotices').addClass('active');	

	managenoticesTable = $('#managenoticesTable').DataTable({
		'ajax' : 'php_action/fetchnotices.php',
		"responsive": true,
		'order': [],
		"columnDefs": [
		            { responsivePriority: 1, targets: 0 },
		            { responsivePriority: 2, targets: 4 }
		        ]
	}); // manage notices Data Table

	// on click on submit notices form modal
	$('#addnoticesModalBtn').unbind('click').bind('click', function() {
		// reset the form text
		$("#submitnoticesForm")[0].reset();
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// submit notices form function
		$("#submitnoticesForm").unbind('submit').bind('submit', function() {

			var noticesName = $("#noticesName").val();
			var notice = $("#notice").val();
			var noticesStatus = $("#noticesStatus").val();

			if(noticesName == "") {
				$("#noticesName").after('<p class="text-danger">Brand Name field is required</p>');
				$('#noticesName').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#noticesName").find('.text-danger').remove();
				// success out for form 
				$("#noticesName").closest('.form-group').addClass('has-success');	  	
			}

			if(notice == "") {
				$("#notice").after('<p class="text-danger">Brand notice field is required</p>');
				$('#notice').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#notice").find('.text-danger').remove();
				// success out for form 
				$("#notice").closest('.form-group').addClass('has-success');	  	
			}

			if(noticesStatus == "") {
				$("#noticesStatus").after('<p class="text-danger">Brand Name field is required</p>');
				$('#noticesStatus').closest('.form-group').addClass('has-error');
			} else {
				// remov error text field
				$("#noticesStatus").find('.text-danger').remove();
				// success out for form 
				$("#noticesStatus").closest('.form-group').addClass('has-success');	  	
			}

			if(noticesName && notice && noticesStatus) {
				var form = $(this);
				// button loading
				$("#createnoticesBtn").button('loading');

				$.ajax({
					url : form.attr('action'),
					type: form.attr('method'),
					data: form.serialize(),
					dataType: 'json',
					success:function(response) {
						// button loading
						$("#createnoticesBtn").button('reset');

						if(response.success == true) {
							// reload the manage member table 
							managenoticesTable.ajax.reload(null, false);						

	  	  			// reset the form text
							$("#submitnoticesForm")[0].reset();
							// remove the error text
							$(".text-danger").remove();
							// remove the form error
							$('.form-group').removeClass('has-error').removeClass('has-success');
	  	  			
	  	  			$('#add-notices-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
						}  // if

					} // /success
				}); // /ajax	
			} // if

			return false;
		}); // submit notices form function
	}); // /on click on submit notices form modal	

}); // /document

// edit notices function
function editnotices(noticesId = null) {
	if(noticesId) {
		// remove the added notices id 
		$('#editnoticesId').remove();
		// reset the form text
		$("#editnoticesForm")[0].reset();
		// reset the form text-error
		$(".text-danger").remove();
		// reset the form group errro		
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// edit notices messages
		$("#edit-notices-messages").html("");
		// modal spinner
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-notices-result').addClass('div-hide');
		//modal footer
		$(".editnoticesFooter").addClass('div-hide');		

		$.ajax({
			url: 'php_action/fetchSelectednotices.php',
			type: 'post',
			data: {noticesId: noticesId},
			dataType: 'json',
			success:function(response) {

				// modal spinner
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-notices-result').removeClass('div-hide');
				//modal footer
				$(".editnoticesFooter").removeClass('div-hide');	

				// set the notices name
				$("#editnoticesName").val(response.notice_name);
				// setting the brand notice value 
				$('#editnotice').val(response.notice);
				// set the notices status
				$("#editnoticesStatus").val(response.active);
				// add the notices id 
				$(".editnoticesFooter").after('<input type="hidden" name="editnoticesId" id="editnoticesId" value="'+response.notices_id+'" />');


				// submit of edit notices form
				$("#editnoticesForm").unbind('submit').bind('submit', function() {
					var noticesName = $("#editnoticesName").val();
					var noticesStatus = $("#editnoticesStatus").val();

					if(noticesName == "") {
						$("#editnoticesName").after('<p class="text-danger">Brand Name field is required</p>');
						$('#editnoticesName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editnoticesName").find('.text-danger').remove();
						// success out for form 
						$("#editnoticesName").closest('.form-group').addClass('has-success');	  	
					}

					if(notice == "") {
						$("#editnotice").after('<p class="text-danger">Brand notice field is required</p>');
						$('#editnotice').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editnotice").find('.text-danger').remove();
						// success out for form 
						$("#editnotice").closest('.form-group').addClass('has-success');	  	
					}

					if(noticesStatus == "") {
						$("#editnoticesStatus").after('<p class="text-danger">Brand Name field is required</p>');
						$('#editnoticesStatus').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editnoticesStatus").find('.text-danger').remove();
						// success out for form 
						$("#editnoticesStatus").closest('.form-group').addClass('has-success');	  	
					}

					if(noticesName && notice && noticesStatus) {
						var form = $(this);
						// button loading
						$("#editnoticesBtn").button('loading');

						$.ajax({
							url : form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {
								// button loading
								$("#editnoticesBtn").button('reset');

								if(response.success == true) {
									// reload the manage member table 
									managenoticesTable.ajax.reload(null, false);									  	  			
									
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');
			  	  			
			  	  			$('#edit-notices-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
				          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}  // if

							} // /success
						}); // /ajax	
					} // if


					return false;
				}); // /submit of edit notices form

			} // /success
		}); // /fetch the selected notices data

	} else {
		alert('Oops!! Refresh the page');
	}
} // /edit notices function

// remove notices function
function removenotices(noticesId = null) {
		
	$.ajax({
		url: 'php_action/fetchSelectednotices.php',
		type: 'post',
		data: {noticesId: noticesId},
		dataType: 'json',
		success:function(response) {			

			// remove notices btn clicked to remove the notices function
			$("#removenoticesBtn").unbind('click').bind('click', function() {
				// remove notices btn
				$("#removenoticesBtn").button('loading');

				$.ajax({
					url: 'php_action/removenotices.php',
					type: 'post',
					data: {noticesId: noticesId},
					dataType: 'json',
					success:function(response) {
						if(response.success == true) {
 							// remove notices btn
							$("#removenoticesBtn").button('reset');
							// close the modal 
							$("#removenoticesModal").modal('hide');
							// update the manage notices table
							managenoticesTable.ajax.reload(null, false);
							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} else {
 							// close the modal 
							$("#removenoticesModal").modal('hide');

 							// udpate the messages
							$('.remove-messages').html('<div class="alert alert-success">'+
	            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
	            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
		          '</div>');

	  	  			$(".alert-success").delay(500).show(10, function() {
								$(this).delay(3000).hide(10, function() {
									$(this).remove();
								});
							}); // /.alert
 						} // /else
						
						
					} // /success function
				}); // /ajax function request server to remove the notices data
			}); // /remove notices btn clicked to remove the notices function

		} // /response
	}); // /ajax function to fetch the notices data
} // remove notices function