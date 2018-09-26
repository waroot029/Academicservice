<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header.php';?>

<!-- ภาพปก Banner -->
<div class="banner">    	   
    <img src="images/photos/banner.jpg"  class="img-responsive" alt="slide">
    <div class="welcome-message">
        <div class="wrap-info">
            <div class="information">
                <h1  class="animated fadeInDown">Academic Service COC</h1>
                <p class="animated fadeInUp">Welcome  to COC-Course.</p>                
            </div>
        </div>
    </div>
</div>

<?php
session_start();


include_once 'dbconnect.php';

//set validation error flag as false
$error = false;

//ส่วนของการ Insert สมัครสมาชิก + ตรวจการดักข้อความที่กรอก
if (isset($_POST['signup'])) {
	$firstname = mysqli_real_escape_string($con, $_POST['firstname']);
	$lastname = mysqli_real_escape_string($con, $_POST['lastname']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
	$phone = mysqli_real_escape_string($con, $_POST['phone']);

	
	//name can contain only alpha characters and space
	if (!preg_match("/^[a-zA-Z ]+$/",$firstname)) {
		$error = true;
		$firstname_error = "Name must contain only alphabets and space";
	}
	if (!preg_match("/^[a-zA-Z ]+$/",$lastname)) {
		$error = true;
		$lastname_error = "Name must contain only alphabets and space";
	}
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$error = true;
		$email_error = "Please Enter Valid Email ID";
	}
	if(strlen($password) < 6) {
		$error = true;
		$password_error = "Password must be minimum of 6 characters";
	}
	if($password != $cpassword) {
		$error = true;
		$cpassword_error = "Password and Confirm Password doesn't match";
	}
	if (!preg_match("/^[0-9]+$/",$phone)) {
		$error = true;
		$phone_error = "Name must contain only alphabets and space";
	}
	if (!$error) {
		if(mysqli_query($con, "INSERT INTO users(firstname,lastname,phone,email,password) VALUES('" . $firstname . "','" . $lastname . "','" . $phone . "', '" . $email . "', '" . md5($password) . "')")) {
			$successmsg = "Successfully Registered! <a href='index.php'>Click here to Login</a>";
		} else {
			$errormsg = "Error in registering...Please try again later!";
		}
	}
}

// ส่วนสำหรับการ Login
if (isset($_POST['login'])) {

	$email = mysqli_real_escape_string($con, $_POST['email']);
	$password = mysqli_real_escape_string($con, $_POST['password']);
	$result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");

	if ($row = mysqli_fetch_array($result)) {
		$_SESSION['usr_id'] = $row['user_id'];
		$_SESSION['usr_name'] = $row['username'];
		header("Location: user_home.php");
		
	} else {
		$errormsg = "Incorrect Email or Password!!!";
	}
}
?>
 



<div id="information" class="spacer reserve-info ">
<div class="container">
<div class="row">
<div class="col-sm-7 col-md-8">
<center></center><br>
<center></center><br>



	
	</div>
</div>




<div id="myModal" class="modal">

  <!-- Modal content -->
	<div class="form">
      
      <ul class="tab-group">
        <li class="tab active"><a href="#signup">สมัครสมาชิก</a></li>
        <li class="tab"><a href="#login">เข้าสู่ระบบ</a></li>
      </ul>
      
      <div class="tab-content">
        <div id="signup">   
		  <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="signupform">
          
          <div class="top-row">
            <div class="field-wrap">
              <input type="text" name="firstname" placeholder="ชื่อ " required value="<?php if($error) echo $firstname; ?>" class="form-control" />
					  	<span class="text-danger"><?php if (isset($firstname_error)) echo $firstname_error; ?></span>
            </div>
        
            <div class="field-wrap">
              <input type="text" name="lastname" placeholder="นามสกุล " required value="<?php if($error) echo $lastname; ?>" class="form-control" />
							<span class="text-danger"><?php if (isset($lastname_error)) echo $lastname_error; ?></span>
            </div>
          </div>

          <div class="field-wrap">
            <input type="text" name="email" placeholder="อีเมลล์ " required value="<?php if($error) echo $email; ?>" class="form-control" />
						<span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span>
          </div>
          
          <div class="field-wrap">
						<input type="password" name="password" placeholder="รหัสผ่าน " required class="form-control" />
						<span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
		  </div>
		  
		  <div class="field-wrap">
            <input type="password" name="cpassword" placeholder="ยืนยันรหัสผ่าน " required class="form-control" />
						<span class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
          </div>
		  
		  
          <div class="field-wrap">
            <label>
              เบอร์โทร<span class="req"></span>
            </label>
            <input type="text" name="phone" placeholder="ระบุเบอร์โทรศัพท์ " required class="form-control" />
						<span class="text-danger"><?php if (isset($phone_error)) echo $phone_error; ?></span>
		  </div>
				
          <button type="submit" name="signup" class="button button-block"/>สมัครสมาชิก</button>
          
          </form>
				  <span class="text-success"><?php if (isset($successmsg)) { echo $successmsg; } ?></span>
				  <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
	
			
        <div id="login">   
          <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
          
            <div class="field-wrap">
            <label>
              Email <span class="req"></span>
            </label>
						<input type="text" name="email" placeholder="Your Email" required class="form-control" />
          </div>
          
          <div class="field-wrap">
            <label>
              Password<span class="req"></span>
            </label>
            <input type="password" name="password" placeholder="Your password" required class="form-control" />
          </div>
          
          <p class="forgot"><a href="#">ลืมรหัสผ่าน?</a></p>
          
          <button class="button button-block" name="login">เข้าสู่ระบบ</button>
          
          </form>
		  <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
	


  </div>

</div>

<?php include 'footer.php';?>


<script src="js/popupcourse.js"></script>
