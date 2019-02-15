
const signUpForm = document.getElementById('registerForm');

signUpForm.addEventListener('submit', signUpSubmit);

function signUpSubmit(e){

	let fn = document.getElementById('fn').value;
	let un = document.getElementById('un').value;
	let eId = document.getElementById('eId').value;
	let pswd = document.getElementById('pswd').value;
	let cpswd = document.getElementById('cpswd').value;

	if(fn == "" || un == "" || eId == "" || pswd == "" || cpswd == ""){
		document.getElementById('result1').innerHTML = "All fields are mandatory.";
	    document.getElementById('result1').setAttribute('class', 'alert alert-danger mb-3 text-center');
	}
	else{
		var xhttp = new XMLHttpRequest();
		xhttp.open('POST', 'config/auth.php', true);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		urlData = "fullName=" + fn + "&username=" + un + "&emailId=" + eId + "&passkey=" + pswd + "&cpasskey=" + cpswd + "&signUpBtn=submit";
		xhttp.send(urlData);

		xhttp.onreadystatechange = function(){
			if(this.readyState == 4 && this.status == 200){
				let result = JSON.parse(this.responseText);

				if(result.status == "success"){
	            	document.getElementById('result1').innerHTML = result.msg;
	            	document.getElementById('result1').setAttribute('class', 'alert alert-success mt-2 mb-3 text-center');
	            	setTimeout(()=>{ window.location.reload();}, 2000);
	            }
	            else{
						document.getElementById('result1').innerHTML = result.msg;
		            	document.getElementById('result1').setAttribute('class', 'alert alert-danger mb-3 text-center');
	            }
			}
		}
	}
	e.preventDefault();
}
