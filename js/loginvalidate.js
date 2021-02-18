$().ready(function()
{
    $("#loginform").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            pwd1: "required",
        },
        messages:{
            email: {
                required: "Please enter an email",
                email: "Please enter a valid email address",
            },
            pwd1: {
                required: "Please provide a password",
            },
        },
        errorPlacement: function(error,element){
            error.appendTo(element.parents(".form-group"));
                //error.appendTo(element.parents(".pwd"));

        }
})
})