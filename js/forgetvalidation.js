$().ready(function()
{
    $("#forgotform").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 10
            },
            phone: {
                required: true,
                phone: true,
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            accno:"required",
        },
        messages:{
            fullname: {
                required: "Please enter your Full Name",
                minlegth: "Please Full Name as per your ID",
            },
            phone: {
                required: "Please enter an phone",
                phone: "Please enter a valid phone address",
            },
            accno: {
                required: "Please provide your Account Number",
            },
            phone: {
                required: "Please enter your phone number",
                digits: "Please enter a valid phone number",
                minlength: "Please enter a valid phone number",
                maxlength: "Please enter a valid phone number",
            },
        },
        errorPlacement: function(error,element){
            error.appendTo(element.parents(".form-group"));
                //error.appendTo(element.parents(".pwd"));

        }
})
        var phone_state = false;
            $('#phone').change(function() {
            var phone = $('#phone').val();
            //console.log(phone);
            if (phone == '') {
                phone_state = false;
                return;
            }
                $.ajax({
                    type: "POST",
                    url: "getacc.php",
                    data: {
                        "phone_check": 1,
                        "phone": phone,
                    },
                    success: function(response) {
                        console.log(response);

                        if (response == 'taken') {
                            phone_state = true;
                            $("#submit").removeAttr("disabled");
                            $('#phone').siblings("span").removeClass();
                            $('#phone').siblings("span").addClass("success");
                            $('#phone').siblings("span").text('Account Found.');
                        } else if (response == 'not_taken') {
                            phone_state = false;
                            $("#submit").attr("disabled","disabled");
                            $('#phone').siblings("span").removeClass();
                            $('#phone').siblings("span").addClass("error");
                            $('#phone').siblings("span").text('NO USER FOUND');
                        }
                    }
                });
            });
})