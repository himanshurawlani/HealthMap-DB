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
    <button class="w3-quarter w3-btn" style="width:33.33%">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>64</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Select</h4>
      </div>
    </button>
    <button class="w3-quarter w3-btn" onclick="invoke_insert_modal();" style="width:33.33%"
	<?php if($_SESSION['username']=="jayesh")
			echo "disabled";?>
		>
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>66</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Insert</h4>
      </div>
    </button>
    <!--<button class="w3-quarter w3-btn">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>23</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Update</h4>
      </div>
    </button>
	-->
    <button class="w3-quarter w3-btn" style="width:33.33%" onclick="document.getElementById('id01').style.display='block'"
		<?php if($_SESSION['username']=="jayesh")
			echo "disabled";?>
	>
      <div class="w3-container w3-orange w3-text-white w3-padding-16">
        <div class="w3-left"><i class="fa fa-users w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3>78</h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Delete</h4>
      </div>
    </button>
  </div>
  
  
  <div id="id01" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:600px">

      <div class="w3-center"><br>
      <form class="w3-container">
        <div class="w3-section">
          <label><b>Enter primary key</b></label>
          <input class="w3-input w3-border w3-margin-bottom" type="number" placeholder="Primary Key" name="pk" id="nn" required>
          <button class="w3-button w3-block w3-green w3-section w3-padding" onclick="deletedata();">Delete</button>
         </div>
      </form>

      <div class="w3-container w3-border-top w3-padding-16 w3-light-grey">
        <button onclick="document.getElementById('id01').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
      </div>

    </div>
  </div>
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
  </div>

  <br>	 

  <!-- End page content -->
</div>

<!-- Alert Modal-->
<div id="insert_modal_alert" class="w3-modal">
  <div class="w3-modal-content">

    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('insert_modal_alert').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Insert new row</h2>
    </header>


    <div class="w3-container">
      <span onclick="document.getElementById('insert_modal_alert').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <br>
      <form class="w3-container">
        <label>State</label>
        <input class="w3-input" type="text" id="state" required>

        <label>Priority</label>
        <input class="w3-input" type="number" id="priority" required>

        <label>Message Id</label>
        <input class="w3-input" type="number" id="msgid" required>

        <label>Message</label>
        <input class="w3-input" type="text" id="message" required>
        <br>
        <div class="w3-center"><button class="w3-btn w3-blue-gray" onclick="insertAlert(
		document.getElementById('state').value,
		document.getElementById('priority').value,
		document.getElementById('msgid').value,
		document.getElementById('message').value
		)">Save</button></div>  
      </form>

    </div>
  </div>
</div>

<!--HC modal-->
<div id="insert_modal_hc" class="w3-modal">
  <div class="w3-modal-content">

    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('insert_modal_hc').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Insert new row</h2>
    </header>


    <div class="w3-container">
      <span onclick="document.getElementById('insert_modal_hc').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <br>
      <form class="w3-container">
        <label>Center ID</label>
        <input class="w3-input" type="number" id="cid" required>

        <label>Center Name</label>
        <input class="w3-input" type="text" id="cname" required>

        <label>Center Location</label>
        <input class="w3-input" type="text" id="cloc" required>

        <label>Center Type</label>
        <input class="w3-input" type="text" id="ctype" required>
        <br>
        <div class="w3-center"><button class="w3-btn w3-blue-gray" onclick="insertHC(
		document.getElementById('cid').value,
		document.getElementById('cname').value,
		document.getElementById('cloc').value,
		document.getElementById('ctype').value,
		
		);">Save</button></div>  
      </form>

    </div>
  </div>
</div>

<!--Patient modal-->
<div id="insert_modal_patient" class="w3-modal">
  <div class="w3-modal-content">

    <header class="w3-container w3-teal"> 
      <span onclick="document.getElementById('insert_modal_patient').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <h2>Insert new row</h2>
    </header>


    <div class="w3-container">
      <span onclick="document.getElementById('insert_modal_patient').style.display='none'" 
      class="w3-button w3-display-topright">&times;</span>
      <br>
      <form class="w3-container">
        <label>Center ID</label>
        <input class="w3-input" type="number" id="cidp" required>

        <label>Patient Name</label>
        <input class="w3-input" type="text" id="pname" required>

        <label>Patient Location</label>
        <input class="w3-input" type="text" id="ploc" rerquired>

        <label>Patient Age</label>
        <input class="w3-input" type="number" id="page" required>

        <label>Disease</label>
        <input class="w3-input" type="text" id="disease" required>

        <label>Gender</label>
        <input class="w3-input" type="text" id="gender" required>

        <label>Aadhar Number</label>
        <input class="w3-input" type="number" id="ano" required>

        <br>
        <div class="w3-center"><button class="w3-btn w3-blue-gray" onclick="insertPatient(
          document.getElementById('cidp').value,
          document.getElementById('pname').value,
          document.getElementById('ploc').value,
          document.getElementById('page').value,
          document.getElementById('disease').value,
          document.getElementById('gender').value,
          document.getElementById('ano').value
        );">Save</button></div>  
      </form>

    </div>
  </div>
</div>



<script>
function insertPatient(cid,pname,ploc,page,disease,gender,ano){
	
	$.ajax({
		type:'POST',
		data:{
			'id':cid,
			'name':pname,
			'loc':ploc,
			'age':page,
			'dise':disease,
			'gen':gender,
			'aano':ano
		},
		url:'insert_patient.php',
		success:function(msg){
			if(msg=="Success"){
				console.log("Success:"+msg);
			}else{
				console.log("fail:"+msg);
			}
		}
	});
}

function insertHC(cid,cname,cloc,ctype){
	$.ajax({
		type:'POST',
		data:{
			'id':cid,
			'name':cname,
			'loc':cloc,
			'type':ctype
		},
		url:'insert_hc.php',
		success:function(msg){
			if(msg=="Success"){
				console.log("Success:"+msg);
			}else{
				console.log("fail:"+msg);
			}
		}
	});
}

function insertAlert(state,priority,msgid,message){
	$.ajax({
		type:'POST',
		data:{
			'state':state,
			'priority':priority,
			'msgid':msgid,
			'message':message
		},
		url:'insert_alert.php',
		success:function(msg){
			if(msg=="Success"){
				console.log("Success:"+msg);
			}else{
				console.log("fail:"+msg);
			}
		}
	});
}

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
			data:{
				'selected_table':data
			},
			url:'setSessionSelectedTable.php',
			success:function(msg)
			{
				console.log("Response of setSession is:"+msg);
			}
		}
	);
	location.reload();
}


//determine which insert modal to invoke based on selected table
function invoke_insert_modal(){
  
  var table = "<?php echo $_SESSION['selected_table']; ?>";
  if(table=='ALERT_GUJ' || table=='ALERT_MAH' || table=='ALERT_MAIN'){
    document.getElementById('insert_modal_alert').style.display='block'
  }else if(table=='HC_CENTER_GUJ' || table=='HC_CENTER_MAH' || table=='HC_CENTER_MAIN'){
    document.getElementById('insert_modal_hc').style.display='block'
  }else{  
    document.getElementById('insert_modal_patient').style.display='block'
  }
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

function deletedata(){
	var t = document.getElementById("nn").value;
	deleteaj(t);
}

function deleteaj(data)
{
	$.ajax(
		{
			type:'POST',
			url:'deleteUsingPrimary.php',
			data:{
				'delete_data':data
			},
			success:function(msg)
			{
				console.log("Response of setSession is:"+msg);
			}
		}
	);
}


</script>


</body></html>