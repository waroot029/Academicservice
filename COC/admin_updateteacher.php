
<!-- Link ไปส่วนของ Header พวก Menu ต่างๆ  -->
<?php include 'header_admin.php';?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">       
<link rel="stylesheet" href="css/admin_managecourse.css">

<div id="information" class="spacer reserve-info ">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 col-md-8">
               <form name="frminsert" action="admin_updateteacher2.php" method="post">

            <?php
											$connect = mysqli_connect("localhost","root","","academicservicedb");
											mysqli_set_charset($connect, "utf8");
											
											if (!isset($smtUpdate)) {
													$sql = 'select * from teacher where teacher_ID ='.$_POST['idforupdate'].'';
													$result = mysqli_query($connect,$sql);
													$row = mysqli_fetch_array($result);
													if (!$result) {
														echo '<b>Error</b>'.mysqli_error().'<br>';
													}
												else {
													echo '<div class="login-form">';
                                                    echo '<div class="form-group">';
                                                
                                                    echo '<label for="Room Remake" class="col-sm-4 col-form-label">คอร์ส ID</label>';
                                                    echo '<input type="text" class="form-control login-field" name="cid" value="'.$row['teacher_ID'].'"disabled />';

													echo '<label for="Room Remake" class="col-sm-4 col-form-label">ชื่อผู้สอน</label>';
                                                    echo '<input type="text" class="form-control login-field" name="nc" value="'.$row['teacher_name'].'" />';
                                                    echo '</div>';

                                                    echo ' <div class="form-group">';
                                                    echo '  <label for="Detail" class="col-sm-4 col-form-label">รูปโปรไฟล์</label>';
                                                    echo ' <input type="file" name="imageteacher" value="'.$row['Teacher_Picture'].'  >';
                                                    echo ' </div>';

                                                    // echo '<div class="form-group">';
                                                    // echo '<label for="Detail" class="col-sm-4 col-form-label">รูปโปรไฟล์</label>'
                                                    // echo '<input type="file" name="image" value="'$_FILES['image']['name'];'" />'
                                                    // echo '</div>'

                                                    // echo '<label for="Room Remake" class="col-sm-4 col-form-label">ชื่อผู้สอน</label>';
                                                    // echo '<input type="text" class="form-control login-field" name="nc" value="'.$row['teacher_name'].'" />';
                                                    // echo '</div>';

                                                    echo '<div class="form-group">';
                                                    echo '<label for="Price" class="col-sm-4 col-form-label">รายละเอียด/ประวัติผู้สอน</label>';
                                                    echo '<input type="text" class="form-control login-field" name="dc" value="'.$row['teacher_detail'].'" />  ';
                                                    echo '</div>';

													
													echo '<input type="hidden" name="idforupdate" value="'.$row['teacher_ID'].'">'."\n";
													echo '</table>';
													echo '</div>';

											}
												}
												
		?>
                                                        <!-- <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">รายละเอียดผู้สอน</label>
                                                        <input type="textarea" class="form-control login-field"  placeholder="เพิ่มรายละเอียดผู้สอน" id="txtDetail" name="txtDetail" />  
                                                    </div>

                                                        <div class="form-group">
                                                    <label for="Detail" class="col-sm-4 col-form-label">หมวดหมู่</label>
                                                        <input type="text" class="form-control login-field"  placeholder="หมวดหมู่ที่เกี่ยวข้อง" id="txtDetail" name="txtDetail" />  
                                                    </div> -->

                                                      <input type="submit" class="btn btn-primary btn-lg btn-block " value="แก้ไข">

                                        </div>
                                    </form>

            </div>
       </div>
</div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>


<!-- JS สำหรับ เมนู Tab ด้านบน -->          
          <script>
          function openCity(evt, cityName) {
            var i, x, tablinks;
            x = document.getElementsByClassName("city");
            for (i = 0; i < x.length; i++) {
               x[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < x.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" w3-red", ""); 
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " w3-red";
          }
          </script>
        
    </div>      <!--ปิด   <div class="w3-container w3-content w3-padding-64" style="max-width:1500px" id="band">  -->
        
            </div>
	    </div>
    </div>
</div>



<?php include 'footer.php';?>
