
<?php
$connect = mysqli_connect("localhost","root","","academicservicedb");
mysqli_set_charset($connect, "utf8");

$sql = 'UPDATE course SET Course_ID = "'.$_POST['cid'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Name_Course = "'.$_POST['nc'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Detail_Course = "'.$_POST['dc'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Price = "'.$_POST['p'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Start_Course = "'.$_POST['sc'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET End_Course = "'.$_POST['ec'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Course_Benfit = "'.$_POST['Benfit'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Content_Course = "'.$_POST['Content'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Picture_Banner = "'.$_POST['imagecourse'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET Level_Course = "'.$_POST['levelcourse'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE course SET teacher_ID = "'.$_POST['editteacherid'].'" WHERE Course_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
// อันเก่าของมาดี
// $sql = 'UPDATE `course` SET `Course_ID`='.$_POST['cid'].',`Name_Course`="'.$_POST['nc'].'",`Detail_Course`='.$_POST['dc'].',`Price`="'.$_POST['p'].',`Start_Course`="'.$_POST['sc'].',`End_Course`="'.$_POST['ec'].',`Course_Benfit`="'.$_POST['cb'].',`Content_Course`="'.$_POST['cc'].'" WHERE `Course_ID`= '.$_POST['idforupdate'];


$result = mysqli_query($connect,$sql);
if ($result) {
    echo '<script language="javascript" type="text/javascript"> 
		    alert("สำเร็จ ! ทำการแก้ไขคอร์สเรียนเรียบร้อยแล้ว");
		    window.location = "admin_managecourse.php";
            </script>';
} else {
    echo 'No Complete';
}

// header("Location: admin_managecourse.php");

mysqli_close($connect);
?>
