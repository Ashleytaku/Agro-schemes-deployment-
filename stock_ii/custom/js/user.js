var manageUserTable;

$(document).ready(function() {
    // top nav bar 
    $('#navUser').addClass('active');
    // manage User data table
    manageUserTable = $('#manageUserTable').DataTable({
        'ajax': 'php_action/fetchUser.php',
        'order': []
    });

    manageAccountTable = $('#manageAccountTable').DataTable({
        'ajax': 'php_action/AccountFetch.php',
        "responsive": true,
		'order': [],
		"columnDefs": [
		            { responsivePriority: 1, targets: 0 },
		            { responsivePriority: 2, targets: 4 }
		        ]
    });

    // add User modal btn clicked
    $("#addUserModalBtn").unbind('click').bind('click', function() {
        // // User form reset
        $("#submitUserForm")[0].reset();

        // remove text-error 
        $(".text-danger").remove();
        // remove from-group error
        $(".form-group").removeClass('has-error').removeClass('has-success');

        $("#UserImage").fileinput({
            overwriteInitial: true,
            maxFileSize: 2500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="assests/images/photo_default.png" alt="Profile Image" style="width:100%;">',
            layoutTemplates: { main2: '{preview} {remove} {browse}' },
            allowedFileExtensions: ["jpg", "png", "gif", "jpeg", "JPG", "PNG", "GIF", "JPEG"]
        });

        $("#UserImage2").fileinput({
            overwriteInitial: true,
            maxFileSize: 2500,
            showClose: false,
            showCaption: false,
            browseLabel: '',
            removeLabel: '',
            browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
            removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
            removeTitle: 'Cancel or reset changes',
            elErrorContainer: '#kv-avatar-errors-1',
            msgErrorClass: 'alert alert-block alert-danger',
            defaultPreviewContent: '<img src="assests/images/photo_default.png" alt="Profile Image" style="width:100%;">',
            layoutTemplates: { main2: '{preview} {remove} {browse}' },
            allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
        });

        // submit User form
        $("#submitUserForm").unbind('submit').bind('submit', function() {

            // form validation
            var UserImage    = $("#UserImage").val();
            var UserImage2   = $("#UserImage2").val();
            var UserName     = $("#UserName").val();
            var UserStatus   = $("#UserStatus").val();
            var password     = $("#password").val();
            var email        = $("#email").val();
            var address      = $("#address").val();
            var phone        = $("#phone").val();
            var Terms        = $("#Terms").val();
            var UserType     = $("#UserType").val();

            if (UserImage == "") {
                $("#UserImage").closest('.center-block').after('<p class="text-danger">User Image field is required</p>');
                $('#UserImage').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#UserImage").find('.text-danger').remove();
                // success out for form 
                $("#UserImage").closest('.form-group').addClass('has-success');
            } // /else

            if (UserName == "") {
                $("#UserName").after('<p class="text-danger">User Name field is required</p>');
                $('#UserName').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#UserName").find('.text-danger').remove();
                // success out for form 
                $("#UserName").closest('.form-group').addClass('has-success');
            } // /else

            if (password == "") {
                $("#password").after('<p class="text-danger">Password field is required</p>');
                $('#password').closest('.form-group').addClass('has-error');
            }else if( password < 8 ){
                $("#password").after('<p class="text-danger">Password field requires a strong password not less than 8 characters</p>');
                $('#password').closest('.form-group').addClass('has-error');
            }else{
                // remov error text field
                $("#password").find('.text-danger').remove();
                // success out for form 
                $("#password").closest('.form-group').addClass('has-success');
            } // /else

            if (email == "") {
                $("#email").after('<p class="text-danger">Email field is required</p>');
                $('#email').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#email").find('.text-danger').remove();
                // success out for form 
                $("#email").closest('.form-group').addClass('has-success');
            } // /else


            if (address == "") {
                $("#address").after('<p class="text-danger">address field is required</p>');
                $('#address').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#address").find('.text-danger').remove();
                // success out for form 
                $("#address").closest('.form-group').addClass('has-success');
            } // /else

            if (phone == "") {
                $("#phone").after('<p class="text-danger">phone field is required</p>');
                $('#phone').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#phone").find('.text-danger').remove();
                // success out for form 
                $("#phone").closest('.form-group').addClass('has-success');
            } // /else

            if (Terms == "") {
                $("#Terms").after('<p class="text-danger">Terms field is required</p>');
                $('#Terms').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#Terms").find('.text-danger').remove();
                // success out for form 
                $("#Terms").closest('.form-group').addClass('has-success');
            } // /else

            if (UserType == "") {
                $("#UserType").after('<p class="text-danger">Brand Name field is required</p>');
                $('#UserType').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#UserType").find('.text-danger').remove();
                // success out for form 
                $("#UserType").closest('.form-group').addClass('has-success');
            } // /else



            if (UserStatus == "") {
                $("#UserStatus").after('<p class="text-danger">User Status field is required</p>');
                $('#UserStatus').closest('.form-group').addClass('has-error');
            } else {
                // remov error text field
                $("#UserStatus").find('.text-danger').remove();
                // success out for form 
                $("#UserStatus").closest('.form-group').addClass('has-success');
            } // /else

            if (UserImage && UserName && password && email &&  address && phone && Terms && UserType && UserStatus) {
                // submit loading button
                $("#createUserBtn").button('loading');

                var form = $(this);
                var formData = new FormData(this);

                $.ajax({
                    url: form.attr('action'),
                    type: form.attr('method'),
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {

                            if (response.success == true) {
                                // submit loading button
                                $("#createUserBtn").button('reset');

                                $("#submitUserForm")[0].reset();

                                $("html, body, div.modal, div.modal-content, div.modal-body").animate({ scrollTop: '0' }, 100);

                                // shows a successful message after operation
                                $('#add-User-messages').html('<div class="alert alert-success">' +
                                    '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                    '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                    '</div>');

                                // remove the mesages
                                $(".alert-success").delay(500).show(10, function() {
                                    $(this).delay(3000).hide(10, function() {
                                        $(this).remove();
                                    });
                                }); // /.alert

                                // reload the manage user table
                                manageUserTable.ajax.reload(null, true);

                                // remove text-error 
                                $(".text-danger").remove();
                                // remove from-group error
                                $(".form-group").removeClass('has-error').removeClass('has-success');

                            } // /if response.success

                        } // /success function
                }); // /ajax function
            } // /if validation is ok 					

            return false;
        }); // /submit User form

    }); // /add User modal btn clicked


    // remove User 	

}); // document.ready fucntion

function editUser(UserId = null) {

    if (UserId) {
        $("#UserId").remove();
        // remove text-error 
        $(".text-danger").remove();
        // remove from-group error
        $(".form-group").removeClass('has-error').removeClass('has-success');
        // modal spinner
        $('.div-loading').removeClass('div-hide');
        // modal div
        $('.div-result').addClass('div-hide');

        $.ajax({
            url: 'php_action/fetchSelectedUser.php',
            type: 'post',
            data: { UserId: UserId },
            dataType: 'json',
            success: function(response) {
                    // alert(response.User_image);
                    // modal spinner
                    $('.div-loading').addClass('div-hide');
                    // modal div
                    $('.div-result').removeClass('div-hide');

                    $("#getUserImage").attr('src', 'stock/' + response.User_image);

                    $("#editUserImage").fileinput({});

                    // $("#editUserImage").fileinput({
                    //     overwriteInitial: true,
                    //    maxFileSize: 2500,
                    //    showClose: false,
                    //    showCaption: false,
                    //    browseLabel: '',
                    //    removeLabel: '',
                    //    browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
                    //    removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
                    //    removeTitle: 'Cancel or reset changes',
                    //    elErrorContainer: '#kv-avatar-errors-1',
                    //    msgErrorClass: 'alert alert-block alert-danger',
                    //    defaultPreviewContent: '<img src="stock/'+response.User_image+'" alt="Profile Image" style="width:100%;">',
                    //    layoutTemplates: {main2: '{preview} {remove} {browse}'},								    
                    // 		allowedFileExtensions: ["jpg", "png", "gif", "JPG", "PNG", "GIF"]
                    // });  

                    // User id 
                    $(".editUserFooter").append('<input type="hidden" name="UserId" id="UserId" value="' + response.User_id + '" />');
                    $(".editUserPhotoFooter").append('<input type="hidden" name="UserId" id="UserId" value="' + response.User_id + '" />');

                    // User name
                    $("#editUserName").val(response.User_name);
                    // quantity
                    $("#editQuantity").val(response.quantity);
                    // rate
                    $("#editRate").val(response.rate);
                    // brand name
                    $("#editBrandName").val(response.brand_id);
                    // category name
                    $("#editCategoryName").val(response.categories_id);
                    // status
                    $("#editUserStatus").val(response.active);

                    // update the User data function
                    $("#editUserForm").unbind('submit').bind('submit', function() {

                        // form validation
                        var UserImage = $("#editUserImage").val();
                        var UserName = $("#editUserName").val();
                        var quantity = $("#editQuantity").val();
                        var rate = $("#editRate").val();
                        var brandName = $("#editBrandName").val();
                        var categoryName = $("#editCategoryName").val();
                        var UserStatus = $("#editUserStatus").val();


                        if (UserName == "") {
                            $("#editUserName").after('<p class="text-danger">User Name field is required</p>');
                            $('#editUserName').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editUserName").find('.text-danger').remove();
                            // success out for form 
                            $("#editUserName").closest('.form-group').addClass('has-success');
                        } // /else

                        if (quantity == "") {
                            $("#editQuantity").after('<p class="text-danger">Quantity field is required</p>');
                            $('#editQuantity').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editQuantity").find('.text-danger').remove();
                            // success out for form 
                            $("#editQuantity").closest('.form-group').addClass('has-success');
                        } // /else

                        if (rate == "") {
                            $("#editRate").after('<p class="text-danger">Rate field is required</p>');
                            $('#editRate').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editRate").find('.text-danger').remove();
                            // success out for form 
                            $("#editRate").closest('.form-group').addClass('has-success');
                        } // /else

                        if (brandName == "") {
                            $("#editBrandName").after('<p class="text-danger">Brand Name field is required</p>');
                            $('#editBrandName').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editBrandName").find('.text-danger').remove();
                            // success out for form 
                            $("#editBrandName").closest('.form-group').addClass('has-success');
                        } // /else

                        if (categoryName == "") {
                            $("#editCategoryName").after('<p class="text-danger">Category Name field is required</p>');
                            $('#editCategoryName').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editCategoryName").find('.text-danger').remove();
                            // success out for form 
                            $("#editCategoryName").closest('.form-group').addClass('has-success');
                        } // /else

                        if (UserStatus == "") {
                            $("#editUserStatus").after('<p class="text-danger">User Status field is required</p>');
                            $('#editUserStatus').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editUserStatus").find('.text-danger').remove();
                            // success out for form 
                            $("#editUserStatus").closest('.form-group').addClass('has-success');
                        } // /else					

                        if (UserName && quantity && rate && brandName && categoryName && UserStatus) {
                            // submit loading button
                            $("#editUserBtn").button('loading');

                            var form = $(this);
                            var formData = new FormData(this);

                            $.ajax({
                                url: form.attr('action'),
                                type: form.attr('method'),
                                data: formData,
                                dataType: 'json',
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(response) {
                                        console.log(response);
                                        if (response.success == true) {
                                            // submit loading button
                                            $("#editUserBtn").button('reset');

                                            $("html, body, div.modal, div.modal-content, div.modal-body").animate({ scrollTop: '0' }, 100);

                                            // shows a successful message after operation
                                            $('#edit-User-messages').html('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                                '</div>');

                                            // remove the mesages
                                            $(".alert-success").delay(500).show(10, function() {
                                                $(this).delay(3000).hide(10, function() {
                                                    $(this).remove();
                                                });
                                            }); // /.alert

                                            // reload the manage student table
                                            manageUserTable.ajax.reload(null, true);

                                            // remove text-error 
                                            $(".text-danger").remove();
                                            // remove from-group error
                                            $(".form-group").removeClass('has-error').removeClass('has-success');

                                        } // /if response.success

                                    } // /success function
                            }); // /ajax function
                        } // /if validation is ok 					

                        return false;
                    }); // update the User data function

                    // update the User image				
                    $("#updateUserImageForm").unbind('submit').bind('submit', function() {
                        // form validation
                        var UserImage = $("#editUserImage").val();

                        if (UserImage == "") {
                            $("#editUserImage").closest('.center-block').after('<p class="text-danger">User Image field is required</p>');
                            $('#editUserImage').closest('.form-group').addClass('has-error');
                        } else {
                            // remov error text field
                            $("#editUserImage").find('.text-danger').remove();
                            // success out for form 
                            $("#editUserImage").closest('.form-group').addClass('has-success');
                        } // /else

                        if (UserImage) {
                            // submit loading button
                            $("#editUserImageBtn").button('loading');

                            var form = $(this);
                            var formData = new FormData(this);

                            $.ajax({
                                url: form.attr('action'),
                                type: form.attr('method'),
                                data: formData,
                                dataType: 'json',
                                cache: false,
                                contentType: false,
                                processData: false,
                                success: function(response) {

                                        if (response.success == true) {
                                            // submit loading button
                                            $("#editUserImageBtn").button('reset');

                                            $("html, body, div.modal, div.modal-content, div.modal-body").animate({ scrollTop: '0' }, 100);

                                            // shows a successful message after operation
                                            $('#edit-UserPhoto-messages').html('<div class="alert alert-success">' +
                                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                                '</div>');

                                            // remove the mesages
                                            $(".alert-success").delay(500).show(10, function() {
                                                $(this).delay(3000).hide(10, function() {
                                                    $(this).remove();
                                                });
                                            }); // /.alert

                                            // reload the manage student table
                                            manageUserTable.ajax.reload(null, true);

                                            $(".fileinput-remove-button").click();

                                            $.ajax({
                                                url: 'php_action/fetchUserImageUrl.php?i=' + UserId,
                                                type: 'post',
                                                success: function(response) {
                                                    $("#getUserImage").attr('src', response);
                                                }
                                            });

                                            // remove text-error 
                                            $(".text-danger").remove();
                                            // remove from-group error
                                            $(".form-group").removeClass('has-error').removeClass('has-success');

                                        } // /if response.success

                                    } // /success function
                            }); // /ajax function
                        } // /if validation is ok 					

                        return false;
                    }); // /update the User image

                } // /success function
        }); // /ajax to fetch User image


    } else {
        alert('error please refresh the page');
    }
} // /edit User function

// remove User 
function removeUser(UserId = null) {
    if (UserId) {
        // remove User button clicked
        $("#removeUserBtn").unbind('click').bind('click', function() {
            // loading remove button
            $("#removeUserBtn").button('loading');
            $.ajax({
                url: 'php_action/removeUser.php',
                type: 'post',
                data: { UserId: UserId },
                dataType: 'json',
                success: function(response) {
                        // loading remove button
                        $("#removeUserBtn").button('reset');
                        if (response.success == true) {
                            // remove User modal
                            $("#removeUserModal").modal('hide');

                            // update the User table
                            manageUserTable.ajax.reload(null, false);

                            // remove success messages
                            $(".remove-messages").html('<div class="alert alert-success">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert
                        } else {

                            // remove success messages
                            $(".removeUserMessages").html('<div class="alert alert-success">' +
                                '<button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> ' + response.messages +
                                '</div>');

                            // remove the mesages
                            $(".alert-success").delay(500).show(10, function() {
                                $(this).delay(3000).hide(10, function() {
                                    $(this).remove();
                                });
                            }); // /.alert

                        } // /error
                    } // /success function
            }); // /ajax fucntion to remove the User
            return false;
        }); // /remove User btn clicked
    } // /if Userid
} // /remove User function

function clearForm(oForm) {
    // var frm_elements = oForm.elements;									
    // console.log(frm_elements);
    // 	for(i=0;i<frm_elements.length;i++) {
    // 		field_type = frm_elements[i].type.toLowerCase();									
    // 		switch (field_type) {
    // 	    case "text":
    // 	    case "password":
    // 	    case "textarea":
    // 	    case "hidden":
    // 	    case "select-one":	    
    // 	      frm_elements[i].value = "";
    // 	      break;
    // 	    case "radio":
    // 	    case "checkbox":	    
    // 	      if (frm_elements[i].checked)
    // 	      {
    // 	          frm_elements[i].checked = false;
    // 	      }
    // 	      break;
    // 	    case "file": 
    // 	    	if(frm_elements[i].options) {
    // 	    		frm_elements[i].options= false;
    // 	    	}
    // 	    default:
    // 	        break;
    //     } // /switch
    // 	} // for
}