function likePlus() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("likes").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "likes.php", true);
  xhttp.send();
} 

function likeMinus() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("likes").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "dislikes.php", true);
  xhttp.send();
} 

function addComment() {
  /*var kommentti = document.querySelector('input[name="comment"]').value;*/
   var kommentti = document.querySelector('textarea[name="comment"]').value; 
    
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    var json = JSON.parse(xhttp.responseText);
    var output = '';
    for(var i in json){
      output += '<li>' +
                    json[i].Comm + '</li><br />';

        }
    }
      document.querySelector('#commentsGiven').innerHTML = output;
      // document.getElementById("commentsGiven").innerHTML = xhttp.responseText + "sdfsdf";
    document.getElementById("kake").innerHTML = kommentti;
  };
  xhttp.open("GET", "submit.php?k=" + kommentti, true);
    //xhttp.open("GET", "index.php?kuvapolku=" + kommentti, true);
  xhttp.send();
} 
addComment();

/*function showComment(){
   var kommentti = document.querySelector('input[name="comment"]').value;
    
  var xhttp2 = new XMLHttpRequest();
  xhttp2.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    var json = JSON.parse(xhttp2.responseText);
    var output = '';
    for(var i in json){
      output += '<li>' +
                    json[i].Comm + '</li>';

        }
    }
      document.querySelector('ul').innerHTML = output;
      // document.getElementById("commentsGiven").innerHTML = xhttp.responseText + "sdfsdf";
    document.getElementById("kake").innerHTML = kommentti;
  };
  xhttp2.open("GET", "submit.php?k=" + kommentti, true);
    //xhttp.open("GET", "index.php?kuvapolku=" + kommentti, true);
  xhttp2.send();
} */
function vaihdaPlussa(){
    
    if(document.getElementById("vihrNappi").src == "img/plussaa.png"){
        document.getElementById("vihrNappi").src = "img/1harmaaplussaa.png";
    }
    else{
        //document.getElementById("vihrNappi").src == "img/plussaa.png";
    }
}

var message = document.querySelector('#message');

var upload = function(evt) {
    evt.preventDefault();
    message.innerHTML = 'Upload in progress...';
    var input = document.querySelector('input[type="file"]');

    var data = new FormData();
    data.append('fileToUpload', input.files[0]);

    fetch('upload.php', {
        method: 'POST',
        body: data
    }).then(function(response) {
        return response.text();
    }).then(function(text) {
        message.innerHTML = text;
    });
}