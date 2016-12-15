<!-- Button to open the modal login form -->
<!--<button onclick="document.getElementById('id01').style.display='block'">Login</button>-->

<!-- The Modal -->
<div id="id01" class="modallogin">
  <span onclick="document.getElementById('id01').style.display='none'" 
class="closelogin" title="Close Modal">&times;</span>

  <!-- Modal Content -->
    
    <div class="container modal-contentlogin animate">
        
<h4>PICker Login</h4>
<form method="POST" action="login.php">
    <input type="text" name="givenEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email address" required /><br />
    <input type="password" name="givenPw" placeholder="Password" required /><br />
    <!--<input type="submit" value="Login" name="login" />-->
    <button type="submit" value="Login" name="login">Login</button>
    <!--<input type="reset" value="Reset" />-->
    <button type="reset" value="Reset" name="reset">Reset</button><br />
    
    
    
    
</form>
    <div class="container">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>
      </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
