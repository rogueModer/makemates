
addfollowerBtn = document.querySelectorAll('.addfollowerBtn');
viewProfileBtn = document.querySelectorAll('.viewProfileBtn');

// Giving Event to All follower Buttons For Click Individually

for(var i=0; i<addfollowerBtn.length; i++){
    selectBtn = addfollowerBtn[i];
    selectBtn.onclick = addfollower;
}

function addfollower(){
    var fuser_id = this.value;
    xhttp = new XMLHttpRequest;
    url = "requestfollower.php?addfollower=" + escape(fuser_id);
    xhttp.open('GET', url, true);
    xhttp.send();
    xhttp.onreadystatechange = getResult1;
}

function getResult1(){
    if(xhttp.status == 200 && xhttp.readyState == 4 ){
        if(xhttp.responseText == "follower_add") {
            location.reload();                
        }
    }
}


// Unfollower the user follower from their follower list

unfollowerBtn = document.querySelectorAll('.unfollowerBtn');
// Giving Event to All follower Buttons For Click Individually
for(var j=0; j<unfollowerBtn.length; j++){
    selectBtn = unfollowerBtn[j];
    selectBtn.onclick = unfollower;
}

function unfollower(){
    var fuser_id = this.value;
    xhttp = new XMLHttpRequest;
    url = "requestfollower.php?unfollower=" + escape(fuser_id);
    xhttp.open('GET', url, true);
    xhttp.send();

    xhttp.onreadystatechange = getResult2;

}

function getResult2(){
    if(xhttp.status == 200 && xhttp.readyState == 4 ){
        if(xhttp.responseText == "follower_removed") {
            location.reload();                
        }
    }
}



