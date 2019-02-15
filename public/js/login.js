$(document).ready(function(){
	$('#loginForm').submit(function(e){

		$un = $('#username').val();
		$ps = $('#passkey').val();

		if($un == "" || $ps == ""){
			$('#result').text('* All Fields are mandotory');
		} else{

			$.ajax({
				method: 'POST',
				url : 'config/auth.php',
				resetForm: false,
				data : { username : $un, passkey: $ps, loginBtn : 'submit'},
				success : function(res){
						var res = JSON.parse(res);

						if(res.status = "login_in"){
							window.location.reload();
						} else if(res.status = "incorrect_password"){
							$('#result').text("* Incorrect username or password");
						} else{
							$('#result').text("* May be user does not exist.");
						}
				}
			});

		}
	
		e.preventDefault();
	});
});