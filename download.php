<?php
session_start();
$username=$_SESSION['username'];
$userid = $_SESSION['UserID'];
$fid = $_GET['fid'];
if ($username==''){
	print "<script>alert('You have not logged in!!!!!');</script>";
	header("refresh:0.1;url=index.html");
}
else {
	//print "<h1>Hello ".$username."</h1>";

	if(!empty($_GET['fid'])){

		$conn=mysqli_connect('sophia.cs.hku.hk', '*****', '*****', '*****') or die ('Error! '.mysqli_connect_error($conn));
		$query="SELECT * FROM FS_Files WHERE FileID='$fid'";
		$result = mysqli_query($conn, $query) or die ('Failed to query '.mysqli_error($conn));
		while($row = mysqli_fetch_array($result)) {
			$fname = $row['FileName'];
			$content = $row['FileContent'];
		}
		$ext = pathinfo($fname, PATHINFO_EXTENSION);
		switch ($ext) 
	    {
	      case "pdf": $ctype="application/pdf"; break;
	      case "exe": $ctype="application/octet-stream"; break;
	      case "zip": $ctype="application/zip"; break;
	      case "doc": $ctype="application/msword"; break;
	      case "xls": $ctype="application/vnd.ms-excel"; break;
	      case "ppt": $ctype="application/vnd.ms-powerpoint"; break;
	      case "gif": $ctype="image/gif"; break;
	      case "png": $ctype="image/png"; break;
	      case "jpeg":
	      case "jpg": $ctype="image/jpg"; break;
	      default: $ctype="application/force-download";
	    }
	    header("Pragma: public"); 
	    header("Expires: 0");
	    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	    header("Cache-Control: private",false); 
	    header("Content-Type: $ctype");
	    header("Content-Disposition: attachment; filename=$fname;" );
	    header("Content-Transfer-Encoding: binary");
	    echo $content;
	}
}


?>
