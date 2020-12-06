<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าสมัครสมาชิก - ...</title>
    <link rel="stylesheet" href="register.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<?php
        require_once('connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if(isset($_POST['submit'])){
            /**
             * ตั้งชื่อไฟล์ภาพใหม่
             */
            $temp = explode('.',$_FILES['fileUpload']['name']);
            $new_name = round(microtime(true)) . '.' . end($temp);
            /**
             * ตรวจสอบเงื่อนไขที่ว่า สามารถย้ายไฟล์รูปภาพเข้าสู่ storage ของเราได้หรือไม่
             */
            if(move_uploaded_file($_FILES['fileUpload']['tmp_name'], 'uploads/' .$new_name)){
                /**
                 * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
                 * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมาณผลการทำงานของคำสั่ง sql
                 */
                $sql = "INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `address`, `email`, `phone`, `picture`) 
                        VALUES (NULL, '".$_POST['username']."', '".$_POST['password']."', '".$_POST['first_name']."', '".$_POST['last_name']."', '".$_POST['address']."', '".$_POST['email']."', '".$_POST['phone']."', '". $new_name."');";
                $result = $conn->query($sql);
                /**
                 * ตรวจสอบเงื่อนไขที่ว่าการประมวณผลคำสั่งนี่สำเร็จหรือไม่
                 */                
                if($result){ 
                    echo '<script>
                swal("สำเร็จแล้ว!", "ขอให้สนุกกับเว็บของเรา :)", "success");
               </script>';
               header('Refresh:3; url=index.php');
            }else{
                echo 'no';
                }
            }
        }
    ?>
                    <form action="" method="POST" enctype="multipart/form-data">           
                        <div class="card-header text-center">
  <div class="card-body">
  <center>
  <h1 style="font-size: 26px;font-family: sans-serif; color: #ffbf00;">สมัครสมาชิก - ...</h1>
  </center>
                            <div class="form-group row">
                                <label for="username" style="color: #ff4d4d; font-failmy: myfont;" class="col-sm-3 col-form-label">ชื่อผู้ใช้งาน</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" style="color: #ff4d4d; font-failmy: myfont;" class="col-sm-3 col-form-label">รหัสผ่าน</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>    
                            </div>
                            <div class="form-group row">
                                <label for="first_name" style="color: #ff4d4d; font-failmy: myfont;font-failmy: myfont;" class="col-sm-3 col-form-label">ชื่อจริง</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="first_name" name="first_name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="last_name" style="color: #ff4d4d; font-failmy: myfont;" class="col-sm-3 col-form-label">นามสกุล</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="last_name" name="last_name" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="email" style="color: #ff4d4d; font-failmy: myfont;" class="col-sm-3 col-form-label">อีเมล</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="phone" style="color: #ff4d4d; font-failmy: myfont;" class="col-sm-3 col-form-label">เบอร์โทรศัพท์</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="phone" name="phone" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="address" style="color: #ff4d4d; font-failmy: myfont;" class="col-sm-3 col-form-label">ที่อยู่</label>
                                <div class="col-sm-9">
                                    <textarea cols="10" rows="5"class="form-control" id="address" name="address" required></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="fileUpload" style="color: #ff4d4d; font-failmy: myfont;" class="col-sm-3 col-form-label">อัพโหลดรูปภาพ</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="fileUpload" name="fileUpload" onchange="readURL(this)">
                                </div>    
                            </div>
                            <figure class="figure text-center d-none">
                                <img id="imgUpload" class="figure-img img-fluid rounded" alt="">
                            </figure>
                        </div>
                        <div class="card-footer text-center">
                            <input type="submit" name="submit" class="btn btn-success" value="สมัครสมาชิก">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>

    
    <script>
        /**
         * ประกาศ function readURL()
         * เพื่อทำการตรวจสอบว่า มีไฟล์ภาพที่กำหนดถูกอัพโหลดหรือไม่
         * ถ้ามีไฟล์ภาพที่กำหนดถูกอัพโหลดอยู่ ให้แสดงไฟล์ภาพนั้นผ่าน elements ที่มี id="imgUpload"
         */
        function readURL(input){
            if(input.files[0]){
                var reader = new FileReader();
                $('.figure').addClass('d-block');
                reader.onload = function (e) {
                    console.log(e.target.result)
                    $('#imgUpload').attr('src',e.target.result).width(240);
                }  
                reader.readAsDataURL(input.files[0]);
            }         
        }
    </script>
</form>
</body>
</html>