
var postBtn = document.getElementById('postBtn');
var postText = document.getElementById('textPost');

postBtn.addEventListener('click', savePost);

function savePost(e){

  xhttp = new XMLHttpRequest;
  url = "config/auth.php?textPost="+escape(postText.value)+"&postBtn=Post";
  xhttp.open('GET', url, true);
  xhttp.send();
  xhttp.onreadystatechange = getResult;
  e.preventDefault();
}

function getResult(){
  if(this.status == 200 && this.readyState == 4){
    if(this.responseText == "post_success"){
        location.reload();
    }
  }
}
