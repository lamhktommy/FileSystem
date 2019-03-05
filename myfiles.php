<body style="background: white;">
<div id="navi">
	<nav>
		<a href="myfiles.php">My Files</a>
		<a href="newfolder.php">Create new folder</a>
		<a href="upload.php">Upload files</a>
		<a href="logout.php">Logout</a>
	</nav>
</div>  
<table>
	<th> FileName</th>
	<th> Action</th>

<?php
session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['UserID'];

if ($username==''){
	print "<script>alert('You have not logged in!!!!!');</script>";
	header("refresh:0.1;url=index.html");
}
else {
	$conn=mysqli_connect('sophia.cs.hku.hk', 'hklam', 'Y6117501', 'hklam') or die ('Error! '.mysqli_connect_error($conn));
	/*
	$query="SELECT * FROM FS_Folder WHERE UserID='$userid'";
	$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
	while($row = mysqli_fetch_array($result)) {
		$inode = $row['Inode'];
		$fname = $row['FolderName'];
		print "FolderName: ".$fname;
	}	
	*/
	$query="SELECT FileName, FileContent,FileID FROM FS_Files WHERE UserID='$userid'";
	$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
	while($row = mysqli_fetch_array($result)) {
		$fname = $row['FileName'];
		$content = $row['FileContent'];
		$fid = $row['FileID'];
		echo "<tr>
					<td>$fname</td>
					<td><a href='delete.php?fid=$fid'>Delete</a> 
						<a href='download.php?fid=$fid'>Download</a>
					</td>
				</tr>";
		//print "FileName: ".$fname."<br>";
		/*
		if (fnmatch("*.jpg", $fname) or fnmatch("*.jpeg", $fname)){

			//header("Content-Type: image/jpg");
			//header("Content-Disposition: attachment; filename=$fname");
			
		}
		else { //txt
			//print $content."<br>";
		}
		*/
	}	
}
mysqli_free_result($result);
mysqli_close($conn);
?>
</table>
</body>
