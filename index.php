<?php
    /**
     * เปิดใช้งาน Session
     */
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>หน้าแรก - YouName</title>
    <!-- ติดตั้งการใช้งาน CSS ต่างๆ -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>
<link rel="icon" href="img/icon.png">
<!-- Load Facebook SDK for JavaScript -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">โรงเรียน.....</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
            </button>
           <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                    <a class="nav-link" href="index.php">หน้าแรก <span class="sr-only">(current)</span></a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="#">กิจกรรม <span class="sr-only">(current)</span></a>
                 </li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <!-- ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_SESSION['id'] ได้ถูกกำหนดขึ้นมาหรือไม่ -->
                    <?php if(isset($_SESSION['id'])) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     ยินดีต้อนรับ คุณ <?php echo $_SESSION['first_name']; ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="logout.php">ออกจากระบบ</a>
                        </div>
                    </li>
                    <?php }else { ?>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="login.php">เข้าสู่ระบบ</a>
                        <a class="btn btn-warning" href="register.php">สมัครสมาชิก</a>
                    </li>
                    <?php } ?>
               </ul>
            </div>
        </div>
    </nav>

    <section id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="https://sv1.picz.in.th/images/2020/12/06/jgYjF0.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://sv1.picz.in.th/images/2020/12/06/jgYDlZ.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="https://sv1.picz.in.th/images/2020/12/06/jgYAvI.jpg" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </section>
    <section class="jumbotron">
        <div class="container text-center">
            <h1 style="color: #ffbf00;"class="display-4">ยินดีต้อนรับสู่ โรงเรียน...</h1>
            <br>
            <!-- ตรวจสอบเงื่อนไขที่ว่า ตัวแปร $_SESSION['id'] ได้ถูกกำหนดขึ้นมาหรือไม่ -->
            <?php if ( isset($_SESSION['id']) ){ ?>
            <figure class="figure">
                   <img src="uploads/<?php echo $_SESSION['picture'];?>" class="figure-img img-fluid rounded" alt="">
                   <figcaption class="figure-caption"><?php echo $_SESSION['first_name'].' '.$_SESSION['last_name'];?></figcaption>
            </figure>
            <?php } ?>
            <p class="lead">จัดทำขึ้นเพื่อนำไปต่อยอด ในการใช้งานต่างๆ 💓</p>
        </div>
    </section>

    <section class="container text-center mb-5">
        <h1 style="color: #ff8000;"class="display-4 py-2">วิดิโอกิจกรรมต่างๆ</h1>
        <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/rp2RnAXhY8g" allowfullscreen></iframe>
</div>
    </section>

 <footer class="card bg-secondary text-white text-center p-3">
        <span> COPYRIGHT © 2020 
            <a class="text-white" href="https://www.facebook.com/nobphakhu.nachipoon/" target="_blank">NuengKuB</a>
            ALL Right Reserved V.01
        </span>
    </footer>


    <!-- ติดตั้งการใช้งาน Javascript ต่างๆ -->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>