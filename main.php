<?php
session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['UserID'];

if ($username==''){
	print "<script>alert('You have not logged in!!!!!');</script>";
	header("refresh:0.1;url=index.html");
}
else {
	echo "<h1>Hello ".$username."</h1>";
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
                                                                 