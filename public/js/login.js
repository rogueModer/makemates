
const loginForm = document.getElementById('loginForm');

loginForm.addEventListener('submit', loginSubmit);

function loginSubmit(e){

	let userEmail = document.getElementById('username').value;
	let userPass = document.getElementById('passkey').value;

	if(userEmail == "" || userPass == ""){
		document.getElementById('result').innerHTML = "All fields are mandatory.";
	    document.getElementById('result').setAttribute('class', 'alert alert-danger mb-3 text-center');
	}
	else{
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', 'config/auth.php', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		urlData = "username=" + userEmail + "&passkey=" + userPass + "&loginBtn=Login";
		xhttp.send(urlData);

		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				result = JSON.parse(this.responseText);
							if(result.status == "login_in"){
		            	document.getElementById('result').innerHTML = result.msg;
		            	document.getElementById('result').setAttribute('class', 'alert alert-success mb-3 text-center');

		            	setTimeout(()=> {
											window.location = result.page;
			            }, 1000);
	           	}
	            else{
									document.getElementById('result').innerHTML = result.msg;
		            	document.getElementById('result').setAttribute('class', 'alert alert-danger mb-3 text-center');
	         	 	}
			}
		}
	}

	e.preventDefault();
}
