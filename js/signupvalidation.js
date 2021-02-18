$().ready(function() {
    $("#signupForm").validate({
        rules: {
            fullname: {
                required: true,
                minlength: 10
            },
            dob: {
                required: true,
                date: true,
            },
            email: {
                required: true,
                email: true,
            },
            phone: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            address: {
                required: true,
                digits: true,
            },
            zip: {
                required: true,
                digits: true,
            },
            city: "required",
            gender: "required",

            pwd1: {
                required: true,
                minlength: 5,
            },
            pwd2: {
                required: true,
                minlength: 5,
                equalTo: "#pwd1",
            },
            agree: "required",
        },

        messages: {
            fullname: {
                required: "Please enter your Full Name",
                minlegth: "Please Full Name as per your ID",
            },
            dob: {
                required: "Please enter your date of birth",
                date: "Please enter a valid date",
            },
            email: {
                required: "Please enter an email",
                email: "Please enter a valid email address",
            },
            phone: {
                required: "Please enter your phone number",
                digits: "Please enter a valid phone number",
                minlength: "Please enter a valid phone number",
                maxlength: "Please enter a valid phone number",
            },
            address: {
                required: "Please enter your address",
                digits: "Please enter a valid address",
            },
            zip: {
                required: "Please enter your zip code",
                digits: "Please enter a valid zip code",
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
    var phone_state = false;
    var email_state = false;
    $('#email').change(function() {
        var email = $('#email').val();
        var emailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
        //console.log(email);
        if (email == '') {
            email_state = false;
            return;
        }
        if (email.match(emailRegex)) {
            $.ajax({
                type: "POST",
                url: "getemail.php",
                data: {
                    "email_check": 1,
                    "email": email,
                },
                success: function(response) {
                    //console.log(email_check);

                    if (response == 'taken') {
                        email_state = false;
                        $("#submit").attr("disabled","disabled");
                        $('#email').siblings("span").removeClass();
                        $('#email').siblings("span").addClass("error");
                        $('#email').siblings("span").text('Sorry... Email already exists');
                    } else if (response == 'not_taken') {
                        email_state = true;
                        $("#submit").removeAttr("disabled");
                        $('#email').siblings("span").removeClass();
                        $('#email').siblings("span").addClass("success");
                        $('#email').siblings("span").text('Email is available');
                    }
                }
            });
        }
        else{
            $('#email').siblings("span").removeClass();
            $('#email').siblings("span").text("");
        }
    });


    $('#phone').change(function() {
        var phone = $('#phone').val();
        //console.log(email);
        if (phone == '') {
            phone_state = false;
            return;
        }
        var checkphone =phone.toString().length;

        if( checkphone== 10){
            $.ajax({
                type: "POST",
                url: "getemail.php",
                data: {
                    "phone_check": 1,
                    "phone": phone,
                },
                success: function(response) {
                    //console.log(response);

                    if (response == 'taken') {
                        phone_state = false;
                        $("#submit").attr("disabled","disabled");
                        $('#phone').siblings("span").removeClass();
                        $('#phone').siblings("span").addClass("error");
                        $('#phone').siblings("span").text('Sorry... Phone Number already exists');
                    } else if (response == 'not_taken') {
                        phone_state = true;
                        $("#submit").removeAttr("disabled");
                        $('#phone').siblings("span").removeClass();
                        $('#phone').siblings("span").addClass("success");
                        $('#phone').siblings("span").text('Phone Number is available');
                    }
                }
            });
        }
        else{
            $('#phone').siblings("span").removeClass();
            $('#phone').siblings("span").text("");
        }
    });
})