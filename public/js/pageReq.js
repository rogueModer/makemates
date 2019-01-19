
var reqPage = document.getElementsByClassName('profileReq');

window.onload = function(){
	for(var i=0; i< reqPage.length; i++){
		select = reqPage[i];
		select.onclick = getPage;
	}
}

function getPage(){

	$page = this.name;

	window.location = "profile.php?u="


}



