$().ready(function()
{
    $("#changepwdform").validate({
        rules: {
            oldpwd: {
                required: true,
                minlength: 5,
            },
            pwd1: {
                required: true,
                minlength: 5,
            },
            pwd2: {
                required: true,
                minlength: 5,
                equalTo: "#pwd1",
            },
        },
        message: {
            oldpwd: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            pwd1: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            pwd2: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long",
                equalTo: "Please enter same password as above",
            },
        },
        errorPlacement: function(error,element){
            error.appendTo(element.parents(".form-group"));
            //error.appendTo(element.parents(".pwd"));
        }
    })
})