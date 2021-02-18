        $("#show_hide_password a").on('click', function(event) {
				event.preventDefault();
				if($('#show_hide_password input').attr("type") == "text"){
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').removeClass( "fas fa-eye" );
					$('#show_hide_password i').addClass( "far fa-eye-slash" );
				}else if($('#show_hide_password input').attr("type") == "password"){
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass( "fas fa-eye-slash" );
					$('#show_hide_password i').addClass( "fas fa-eye" );
				}
				});
				$("#show_hide_password2 a").on('click', function(event) {
				event.preventDefault();
				if($('#show_hide_password2 input').attr("type") == "text"){
					$('#show_hide_password2 input').attr('type', 'password');
					$('#show_hide_password2 i').addClass( "fas fa-eye-slash" );
					$('#show_hide_password2 i').removeClass( "fas fa-eye" );
				}else if($('#show_hide_password2 input').attr("type") == "password"){
					$('#show_hide_password2 input').attr('type', 'text');
					$('#show_hide_password2 i').removeClass( "fas fa-eye-slash" );
					$('#show_hide_password2 i').addClass( "fas fa-eye" );
				}
				});