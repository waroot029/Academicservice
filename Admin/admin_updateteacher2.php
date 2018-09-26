
<?php
$connect = mysqli_connect("localhost","root","","academicservicedb");
mysqli_set_charset($connect, "utf8");

$sql = 'UPDATE teacher SET teacher_ID = "'.$_POST['cid'].'" WHERE teacher_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE teacher SET teacher_name = "'.$_POST['nc'].'" WHERE teacher_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);
$sql = 'UPDATE teacher SET teacher_detail = "'.$_POST['dc'].'" WHERE teacher_ID = "'.$_POST["idforupdate"].'"';
$result = mysqli_query($connect,$sql);

// อันเก่าของมาดี
// $sql = 'UPDATE `course` SET `Course_ID`='.$_POST['cid'].',`Name_Course`="'.$_POST['nc'].'",`Detail_Course`='.$_POST['dc'].',`Price`="'.$_POST['p'].',`Start_Course`="'.$_POST['sc'].',`End_Course`="'.$_POST['ec'].',`Course_Benfit`="'.$_POST['cb'].',`Content_Course`="'.$_POST['cc'].'" WHERE `Course_ID`= '.$_POST['idforupdate'];


$result = mysqli_query($connect,$sql);
if ($result) {
    echo 'Congratulations! The record is updated';
} else {
    echo 'No Complete';
}
header("Location: admin_manageteacher.php");

mysqli_close($connect);
?>
