<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าล็อคอิน - ...</title>
    <link rel="stylesheet" href="login.css">
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <?php
        require_once('connect.php'); // ดึงไฟล์เชื่อมต่อ Database เข้ามาใช้งาน
        /**
         * ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_POST['submit'] ได้ถูกกำหนดขึ้นมาหรือไม่
         */
        if (isset($_POST['submit'])) { 
            /**
             * กำหนดตัวแปรเพื่อมารับค่า
             */
            $username =  $conn->real_escape_string($_POST['username']);
            $password = $conn->real_escape_string($_POST['password']);
            /**
             * สร้างตัวแปร $sql เพื่อเก็บคำสั่ง Sql
             * จากนั้นให้ใช้คำสั่ง $conn->query($sql) เพื่อที่จะประมาณผลการทำงานของคำสั่ง sql
             */
            $sql = "SELECT * FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'";
            $result = $conn->query($sql);

            /**
             * ตรวจสอบการเข้าสู่ระบบ
             */
            if($result->num_rows > 0){
                /**
                 * แสดงข้อมูลของ user 
                 * เก็บข้อมูลเข้าสู่ session เพื่อนำไปใช้งาน 
                 */
                $row = $result->fetch_assoc();
                $_SESSION['id'] = $row['id'];
                $_SESSION['first_name'] = $row['first_name'];
                $_SESSION['last_name'] = $row['last_name'];
                $_SESSION['picture'] = $row['picture'];
                header('location:index.php');
            }else echo '<script>
            swal("เสียใจจัง!", "ชื่อผู้ใช้ และ รหัสผ่านไม่ถูกต้อง", "error");
           </script>';
        }
    ?>
<form action="" method="POST">
<body class="align">
  <div class="grid">
    <div id="login">
      <h2><span class="fontawesome-lock"></span>หน้าล็อคอิน</h2>
      <fieldset>
      <center>
          <label for="username" style="font-size: 22px; font-failmy: myfont;">Username</label>
</center>
          <input type="text" id="username" placeholder="ชื่อผู้ใช้" name="username">
          <br>
          <br>
          <center>
          <label for="password" style="font-size: 22px; font-failmy: myfont;">Password</label>
          </center>
          <input type="password" id="password" placeholder="รหัสผ่าน" name="password">
          <br>
          <br>
          <input type="submit" name="submit" class="btn btn-success" value="เข้าสู่ระบบ">

        </fieldset>

      </form>

    </div> <!-- หน้าล็อคอิน -->
    </div>

    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->    
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
</body>
</html>