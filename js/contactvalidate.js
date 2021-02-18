$().ready(function(){
    $("#contactform").validate({
        rules: {
            fullname:"required",
            email:{
                email:true,
                required:true,
            },
            phone:{
                required:true,
                phone:true,
            },
            feedback:"required",
        },
        messages: {
            fullname: "Please provide your name",
            email:{
                email:"Please enter a valid email",
                required:"Please provide your email",
            },
            phone:{
                phone:"Please enter a valid Phone Number",
                required:"Please provide your Phone Number",
            },
        },
        errorPlacement: function(error,element){
            error.appendTo(element.parents(".form-group"));
            //error.appendTo(element.parents(".pwd"));
        }
    })
})