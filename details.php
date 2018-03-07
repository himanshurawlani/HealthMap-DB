<?php session_start(); ?>
<!-- saved from url=(0064)https://www.w3schools.com/w3css/tryw3css_templates_analytics.htm -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><title>W3.CSS Template</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<style>
html,body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
</style>
<style id="style-1-cropbar-clipper">/* Copyright 2014 Evernote Corporation. All rights reserved. */
.en-markup-crop-options {
    top: 18px !important;
    left: 50% !important;
    margin-left: -100px !important;
    width: 200px !important;
    border: 2px rgba(255,255,255,.38) solid !important;
    border-radius: 4px !important;
}

.en-markup-crop-options div div:first-of-type {
    margin-left: 0px !important;
}
</style>
<script>

function logout()
{
	$.ajax(
	{
		type:"POST",
		url:"logout.php",
		success:function(){
			location.replace("homepage.php");
		}
	}
	);
}
</script>

</head>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;Menu</button>
  <button class="w3-bar-item w3-right w3-btn" onclick="logout();">Logout</button>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="avatar2.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong><?php echo $_SESSION["username"]; ?></strong></span><br>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-envelope"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-user"></i></a>
      <a href="#" class="w3-bar-item w3-button"><i class="fa fa-cog"></i></a>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Table Names</h5>
  </div>
  <div class="w3-bar-block">
    <button class="w3-bar-item w3-button w3-padding-16 w3-hide-large w3-dark-grey w3-hover-black" onclick="w3_close()" title="close menu"><i class="fa fa-remove fa-fw"></i>&nbsp; Close Menu</button>
    <button id="alertsTable" onclick="changeSelectedTableA();" class="w3-bar-item w3-button w3-padding"><i class="fa fa-bell fa-fw"></i>&nbsp; Alerts</button>
    <button id="hcTable" onclick="changeSelectedTableH();" class="w3-bar-item w3-button w3-padding"><i class="fa fa-eye fa-fw"></i>&nbsp; Health Care</button>
    <button id="patTable" onclick="changeSelectedTableP();" class="w3-bar-item w3-button w3-padding"><i class="fa fa-users fa-fw"></i>&nbsp; Patients</button>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> My Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <button class="w3-quarter w3-btn">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>52</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Select</h4>
      </div>
    </button>
    <button class="w3-quarter w3-btn" onclick="location.replace('detailsCopy.php');">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>99</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Insert</h4>
      </div>
    </button>
    <button class="w3-quarter w3-btn">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Update</h4>
      </div>
    </button>
    <button class="w3-quarter w3-btn">
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>50</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Delete</h4>
      </div>
    </button>
  </div>
  
  <div class="w3-container">
    <h5>Table</h5>
    <?php
		$service = "localhost/XE";
		$connec=oci_connect($_SESSION["username"],$_SESSION["password"],$service);
		$table = $_SESSION["selected_table"];
		$values 	= "SELECT * FROM $table";
		$p_values	= oci_parse($connec,$values);
		oci_execute($p_values);
		$cols = oci_num_fields($p_values);
		echo '<table class="w3-table w3-striped w3-bordered w3-border w3-hoverable w3-white"><tbody>';
		echo '<tr>';
			for($i=0;$i<$cols;$i++)
			{
				$column_name=oci_field_name($p_values,$i+1);
				echo '<td>'.$column_name.'</td>';
			}
		echo '</tr>';
				 
		while(($row = oci_fetch_array($p_values)))
		{
			echo '<tr>';
			for($i=0;$i<$cols;$i++)
			{
				echo '<td>'.$row[$i].'</td>';
			}
			echo '</tr>';
		}
		echo '</tbody></table>';
	?>
	<br>
    <button class="w3-button w3-dark-grey">More rows &nbsp;<i class="fa fa-arrow-right"></i></button>
  </div>
  
  
  <div class="w3-panel">
    <div class="w3-row-padding" style="margin:0 -16px">
      <div class="w3-third">
        <h5>Regions</h5>
        <img src="region.jpg" style="width:100%" alt="Google Regional Map">
      </div>
      <div class="w3-twothird">
        <h5>Feeds</h5>
        <table class="w3-table w3-striped w3-white">
          <tbody><tr>
            <td><i class="fa fa-user w3-text-blue w3-large"></i></td>
            <td>New record, over 90 views.</td>
            <td><i>10 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bell w3-text-red w3-large"></i></td>
            <td>Database error.</td>
            <td><i>15 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-users w3-text-yellow w3-large"></i></td>
            <td>New record, over 40 users.</td>
            <td><i>17 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-comment w3-text-red w3-large"></i></td>
            <td>New comments.</td>
            <td><i>25 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-bookmark w3-text-blue w3-large"></i></td>
            <td>Check transactions.</td>
            <td><i>28 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-laptop w3-text-red w3-large"></i></td>
            <td>CPU overload.</td>
            <td><i>35 mins</i></td>
          </tr>
          <tr>
            <td><i class="fa fa-share-alt w3-text-green w3-large"></i></td>
            <td>New shares.</td>
            <td><i>39 mins</i></td>
          </tr>
        </tbody></table>
      </div>
    </div>
  </div>
  <br>	

  <!-- Footer -->
  <footer class="w3-container w3-padding-16 w3-light-grey">
    <h4>FOOTER</h4>
    <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
  </footer>

  <!-- End page content -->
</div>


<script>
window.onload= function(){
	document.getElementById("<?php echo $_SESSION["selected_table_name"]; ?>").classList.add("w3-blue");
}

function changeSelectedTableA()
{
	if(!document.getElementById("alertsTable").classList.contains('w3-blue'))
	{
		document.getElementById("alertsTable").classList.add('w3-blue');
		if(document.getElementById("hcTable").classList.contains('w3-blue'))
			document.getElementById("hcTable").classList.remove('w3-blue');
		if(document.getElementById("patTable").classList.contains('w3-blue'))
			document.getElementById("patTable").classList.remove('w3-blue');
		
		setSession("alertsTable");
	}
}
function changeSelectedTableH()
{
	if(!document.getElementById("hcTable").classList.contains('w3-blue'))
	{
		document.getElementById("hcTable").classList.add('w3-blue');
		if(document.getElementById("alertsTable").classList.contains('w3-blue'))
			document.getElementById("alertsTable").classList.remove('w3-blue');
		if(document.getElementById("patTable").classList.contains('w3-blue'))
			document.getElementById("patTable").classList.remove('w3-blue');
		
		setSession("hcTable");
	}
}
function changeSelectedTableP()
{
	if(!document.getElementById("patTable").classList.contains('w3-blue'))
	{
		document.getElementById("patTable").classList.add('w3-blue');
		if(document.getElementById("hcTable").classList.contains('w3-blue'))
			document.getElementById("hcTable").classList.remove('w3-blue');
		if(document.getElementById("alertsTable").classList.contains('w3-blue'))
			document.getElementById("alertsTable").classList.remove('w3-blue');
		
		setSession("patTable");
	}
}
function setSession(data)
{
	$.ajax(
		{
			type:'POST',
			url:'setSessionSelectedTable.php',
			data:{
				'selected_table':data
			},
			success:function(msg)
			{
				console.log("Response of setSession is:"+msg);
			}
		}
	);
	location.reload();
}


// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
    if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
        overlayBg.style.display = "none";
    } else {
        mySidebar.style.display = 'block';
        overlayBg.style.display = "block";
    }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
    overlayBg.style.display = "none";
}
</script>


</body></html>