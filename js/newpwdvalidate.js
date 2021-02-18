$().ready(function()
{
    $("#forgotpwdform").validate({
            rules: {
                newpwd: {
                    required: true,
                    minlength: 5,
                },
                confirmnewpwd: {
                    required: true,
                    minlength: 5,
                    equalTo: "#newpwd",
                },
            },
            messages: {
                newpwd: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirmpwd: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter same password as above",
                },
            },
            errorPlacement: function(error,element){
                error.appendTo(element.parents(".form-group"));
                //error.appendTo(element.parents(".pwd"));
            },
    })
})