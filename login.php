
<?php

	include "visiting-header.php";

?>




<header>
    <div class="container">
    <div class="row">
     <div class="col-lg-12">
      <form>
          <div class="row">
          	<div class="col-md-4"></div> 
		<div class="col-md-4">
        		<h1 class="form-signin-heading">Please sign in</h1>
        		<label for="inputEmail" class="sr-only">Email address</label>
       			<input type="email" id="inputEmail" name="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        		<label for="inputPassword" class="sr-only">Password</label>
        		<input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required>
        		<div class="checkbox">
          			<label>
            			<input type="checkbox" value="remember-me"> Remember me
          			</label>
        		</div>
        		<inputbutton class="btn btn-lg btn-primary btn-block" id="login">Sign in</button>
          		</div> 
			<div class="col-md-6">
		</div>
	  </div>
	</form>
	</div>
	</div>
    </div> 
<script src="vendor/jquery/jquery.min.js"></script>
<script>
$('#login').click(function()
{
var Email =$('#inputEmail').val();
var Password= $('#inputPassword').val();
            
if((Email=="test@123.com") && (Password=="123")){
		window.location.href = "/home.php";}
else
{
alert("Wrong User ID and Password");
location.reload();
}

 });</script>
    </header>
        <!-- Footer -->
<?php

	include "footer.php";

?>
 