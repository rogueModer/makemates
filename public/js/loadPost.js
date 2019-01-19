// window.addEventListener('load', fetchingPost);
// const userLoadPost = document.getElementById('ulp');

(function fetchingPost(){
	xhttp = new XMLHttpRequest();
	xhttp.open('POST', 'loadpost.php', true);
	xhttp.setRequestHeader('Content-type', "application/x-www-form-urlencoded");
	data = 'q=SELECT users.user_id, users.fn, users.un, textpost.textpost, textpost.date FROM users join textpost ON users.user_id = textpost.user_id order by date desc';
	xhttp.send(data);
	xhttp.onreadystatechange = fetchedPost;

})();

function fetchedPost(){
	if(this.readyState == 4 && this.status == 200){
		let postData = JSON.parse(this.responseText);
	
	}
}