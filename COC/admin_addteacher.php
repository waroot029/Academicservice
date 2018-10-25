<html>
<head>
<title>ส่วนสำหรับการ Inset ผู้สอนลง SQL</title>
</head>
<body>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$serverName = "localhost";
	$userName = "root";
	$userPassword = "";
	$dbName = "academicservicedb";

	$conn = mysqli_connect($serverName,$userName,$userPassword,$dbName);
	mysqli_set_charset($conn, "utf8");

	$msg = "";
// เพิ่มรูป ...
	// If upload button is clicked ...
	if (isset($_POST['submit'])) {
		// Get image name
		$image = $_FILES['image']['name'];
		// // Get text
		// $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
	
		// image file directory
		$target = "images/".basename($image);
		
// เพิ่มโปรไฟล์ครู ...	
		$sql = "INSERT INTO teacher (teacher_name,teacher_detail,Teacher_Picture) VALUES ('".$_POST["Nameteacher"]."','".$_POST["Detailteacher"]."','$image')";
		// execute query
		mysqli_query($db, $sql);
	
		if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
			$msg = "Image uploaded successfully";
		}else{
			$msg = "Failed to upload image";
		}
	}
	// $result = mysqli_query($db, "SELECT * FROM images");
	$query = mysqli_query($conn,$sql);
	$result = mysqli_query($db, "SELECT * FROM teacher");

	if($query) {
		echo '<script language="javascript" type="text/javascript"> 
		alert("สำเร็จ ! ทำการเพิ่มโปรไฟล์ผู้สอนเรียบร้อยแล้ว");
		window.location = "admin_manageteacher.php";
		</script>';
	}
    // header("Location: admin_manageteacher.php");
    
	mysqli_close($conn);
?>
</body>
</html>
