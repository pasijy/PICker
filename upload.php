
    <div id="myModal" class="modal">
       
        <div class="modal-content">
    <span class="close">&times;</span>
        
    <form action="upload2.php" method="post" enctype="multipart/form-data">
        <br />
        <br />
        Select image to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
      
        <input type="submit" value="Upload Image" name="submit">
    </form>
 

    <button onclick="document.getElementById('myModal').style.display='none'">Cancel</button>
    </div>
    </div>
    <script>
    // Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal 
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
    </script>
    <script>
        function goBack() {
        window.history.back();
        }
    </script>
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
    </script>

    <script src="js/main.js"></script>


