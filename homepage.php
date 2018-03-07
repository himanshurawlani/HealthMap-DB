<!DOCTYPE html>
<!-- saved from url=(0062)https://www.w3schools.com/w3css/tryw3css_templates_travel2.htm -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>W3.CSS Template</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
</style>

</head><body class="w3-light-grey">

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="#" class="w3-bar-item w3-button w3-text-red w3-hover-red"><b><i class="fa fa-map-marker w3-margin-right"></i>HealthMap</b></a>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <img class="w3-image" src="mountains2.jpg" alt="London" width="1500" height="700">
  <div class="w3-display-middle" style="width:65%">
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button tablink w3-red"><i class="fa fa-plane w3-margin-right"></i>Sign In</button>
    </div>

    <!-- Tabs -->
    <div id="Flight" class="w3-container w3-white w3-padding-16 myLink" style="display: block;">
      <h3>Cure the world with us</h3>
	  <form class="w3-container">
		  <div class="w3-row-padding" style="margin:0 -16px;">
			<div class="w3-half">
			  <label>Username</label>
			  <input id="log_username" class="w3-input w3-border" type="text" placeholder="user_id">
			</div>
			<div class="w3-half">
			  <label>Password</label>
			  <input id="log_password" class="w3-input w3-border" type="password" placeholder="********">
			</div>
			<div id="status"></div>
		  </div>
		  <p><input type="button" class="w3-button w3-dark-grey" value="Login" onclick="validateCreds();"></input></p>
	  </form>
    </div>

  </div>
</header>

 <!-- Newsletter -->
  <div class="w3-container">
    <form class="w3-panel w3-padding-16 w3-black w3-opacity w3-card-2 w3-hover-opacity-off">
      <h2>Get the alerts first!</h2>
      <p>Join our newsletter.</p>
      <label>E-mail</label>
      <input class="w3-input w3-border" type="text" required placeholder="Your Email address">
      <button type="submit" class="w3-button w3-red w3-margin-top">Subscribe</button>
    </form>
  </div>
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-center w3-opacity w3-margin-bottom">
  <h5>Find Us On</h5>
  <div class="w3-xlarge w3-padding-16">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>


<script>
	function validateCreds()
	{
		var response;
		var mail= $('#log_username').val();
		var pwd= $('#log_password').val();
		
		$.ajax(
			{
				type:'POST',
				url:'login.php',
				data:{
					'login_user':mail,
					'login_pass':pwd
				},
				cache:false,
				success:function(msg){
					response=String(msg);
					console.log("Response is : "+response);
					if(response == "Valid")
					{
						$('#status').html("<label class='w3-text-green'>Successfull Login</label>");
						location.replace("detailscopy.php");
					}
					else{
						$('#status').html("<label class='w3-text-red'>Invalid Credentials</label>");
					}
			}
			}
		);
		
	}
</script>


</body></html>