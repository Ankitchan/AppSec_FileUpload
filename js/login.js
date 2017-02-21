var jqueryValidator;

$.validator.addMethod("regex_valid", function(value,element){

	if (value == '') {
		return t;
		} 
	else {
		return /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/.test(value);
		}
	
	}, "Please provide proper password");

$(document).ready(function(){

	jqueryValidator = $("#loginform").validate({

		rules : {
				
			uname :	{
				required:true,
				minlength: 6,
				maxlength: 25
			},
			pass : {
				required:true,
				minlength:8,
				maxlength:45,
				regex_valid: true
			}
		},

		mesages : {

		    uname : {
			    required : "Please specify User Name",
			    minlength : "should be more than 6 characters",
			    maxlength : "cannot be greater than 25 characters"
		    },
		  
		    pass : {
			    required : "Please provide password",
			    minlength : "Password should be minimum of 8 characters",
			    maxlength : "Password cannot be greater than 45 characters"
		    }
		},

		highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
		errorElement : 'span'

	});

});