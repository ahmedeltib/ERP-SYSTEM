<?php
session_start();
ob_start();
if (!isset($_SESSION['id_usar'])){
   header('Location: login.php');
	};

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- render all elment  -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- font awesome  -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>sales</title>
</head>
<body>
   
		
         <?php
         
         include("navbar.php");
         ?>
    <!-- end header -->
    <!-- start landing -->
    <div class="landing">
        <div class="design">
            <div class="container">
                <div class="content">
                    

                    
                    
                    <div class="box">
                        <a href="add-usar.php">
                            <i class="fa-solid fa-id-badge"></i>
                            <p >اضافه موظفين</p>
                        </a>
                    </div>
                    
                    
                    <div class="box">
                        <a href="logout.php">
                            <i class="fa-solid fa-gear"></i>
                            <p >تسجيل خروج</p>
                        </a>
                        </div>
                    


                </div>
                <div class="text">
                <img src="media/logos/taramsistorelogo.svg" width="350" height="350">
                <h3 style="color: #C60909;">اهلا بك في النظام الالكتروني المحاسبي</h3>
                    <p style="color: #C60909;">نظام الكتروني محاسبي يستخدم في تسجيل معاملات الشركة المالية لتسجيلها بشكل الكتروني واعطاء التقارير بذلك</p>
                </div>
            </div>
        </div>
    </div>
    <!-- end landing -->
</body>
</html>