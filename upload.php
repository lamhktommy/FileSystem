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
<h1> Upload Files</h1>                
<form method="POST" enctype="multipart/form-data">
	<input type="file" name='userfile'>
	<input type="submit" value="upload">	
</form>

<?php
if (isset($_FILES['userfile']) and isset($_FILES['userfile']['name'])){
	$fname = $_FILES['userfile']['name'];
	$conn=mysqli_connect('sophia.cs.hku.hk', 'hklam', 'Y6117501', 'hklam') or die ('Error! '.mysqli_connect_error($conn));
	$query = "SELECT * FROM FS_Files WHERE UserID='$userid'";
	$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
	
	$same = false;//check whether have same name
	while($row = mysqli_fetch_array($result)) {
		if ($row['FileName']==$fname){
			$same = true;
			echo "<form action='updatefile.php' method='POST'>
					<h2>There is a file with same name as $fname. Do you want to update it?</h2>
					<button class='btn' type='submit'>Yes</button><br>
				   	<a href='upload.php'><button type='button'>No</button></a><br>
				</form>";
			$_SESSION['file'] = $_FILES['userfile'];
			$content = file_get_contents($_FILES["userfile"]["tmp_name"]); 
			$_SESSION['content'] = $content;
		}
	}
	if (!$same){
		$file = addslashes(file_get_contents($_FILES["userfile"]["tmp_name"])); 
		$query = "INSERT INTO FS_Files (UserID,FileName,FileContent) VALUES('$userid','$fname','$file');";
		$result = mysqli_query($conn, $query) or die ('Failed to query 1'.mysqli_error($conn));
	}
}

mysqli_free_result($result);
mysqli_close($conn);
?>




