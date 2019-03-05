<?php

session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['UserID'];

if ($username==''){
	print "<script>alert('You have not logged in!!!!!');</script>";
	header("refresh:0.1;url=index.html");
}

?>

<div id="navi">
	<nav>
		<a href="myfiles.php">My Files</a>
		<a href="newfolder.php">Create new folder</a>
		<a href="upload.php">Upload files</a>
		<a href="logout.php">Logout</a>
	</nav>
</div>        

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>
</head>
<body>
<!-- The Modal -->
<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
   	<form id="form" action="createfolder.php" onsubmit="return validate()" method="POST">
   		<h2>Please Enter Folder Name</h2>
   		<input type="text" name="fname" placeholder="Folder name"><br>
   		<button class='btn' type="submit">Submit</button><br>
   	</form>
  </div>

</div>

<script>
// Get the modal
// Get the button that opens the modal
var modal = document.getElementById("myModal");
var btn = document.getElementById("myBtn");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
window.onload = function(){
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

</body>
</html>


