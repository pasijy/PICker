
<div id="id02" class="modalregister">
  <span onclick="document.getElementById('id02').style.display='none'" 
class="closeregister" title="Close Modal">&times;</span>

  <!-- Modal Content -->
    
    <div class="container modal-contentregister animate">
        
<h3>PICker Sign up</h3>
<form method="POST" action="saveUser.php">
            <input type="text" name="givenName" placeholder="Your name" required /> <br />
        <input type="text" name="givenEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email address" required /> <br />
        <input type="password" name="givenPw" placeholder="Password" required /> <br />
        <input type="password" name="givenPwAgain" placeholder="Password again" required /> <br /> <br />
        <!--<input type="submit" name="save" />
        <input type="reset" />-->
        <button type="submit" value="Submit" name="save">Submit</button>
        <button type="reset" value="Reset" name="reset">Reset</button><br />
    
    
    
</form>
    <div class="container">
      <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
      <!-- <span class="psw">Forgot <a href="#">password?</a></span> -->
    </div>
      </div>
</div>

<script>
// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


    <!--<form method="POST" action="saveUser.php">
        <input type="text" name="givenName" placeholder="Your name" required /> <br />
        <input type="text" name="givenEmail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" placeholder="Email address" required /> <br />
        <input type="password" name="givenPw" placeholder="Password" required /> <br />
        <input type="password" name="givenPwAgain" placeholder="Password again" required /> <br /> <br />
        <input type="submit" name="save" /><br />
        <input type="reset" /> <br />
    </form>
    <button onclick="goBack()">Cancel</button>
    <script>
        function goBack() {
        window.history.back();
    }
    </script>-->
    <script>
    var salasana = document.querySelector('input[name="givenPw"]');
    var varmistus = document.querySelector('input[name="givenPwAgain"]');
    var fillPattern = function() {
        varmistus.pattern = this.value;
    }
    salasana.addEventListener('keyup', fillPattern);
    </script>

<!-- Tee rekisteröitymislomake
PUUTTUU:
- Lomakkeen kenttien ehdot annetulle datalle.
- Salasana ja sen varmistus samoja.
-->