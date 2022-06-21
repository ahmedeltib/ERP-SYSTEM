<?php 
session_start();
?>
<?php
         
include("connect.php");


if($_SERVER['REQUEST_METHOD']=="POST"){
	if(!empty ($_POST['email']) and !empty($_POST['pass']) ){
	
	$email=  $_POST['email'];
	
	$pass = $_POST['pass'];
	
	$query = "SELECT `id_usar`, `pass`, `email` FROM `usar` WHERE  email = '{$email}' and pass = '{$pass}' ";
	
	$result = mysqli_query($connection, $query);
	$admin = mysqli_fetch_assoc($result);

	
	if ($email == $admin['email'] and $pass == $admin['pass'] ){
		
		$_SESSION['id_usar'] =  $admin['id_usar'] ;
		
	header('Location:index.php');
	}   else{
		$error ="يرجي التاكد من الرقم السري او اسم المستخدم ";
		
	}

	}

}
?>

<!DOCTYPE html>
<html dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- all main css  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- render all elment  -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- font awesome  -->
    <link rel="stylesheet" href="css/all.min.css">
    <title>sigin in</title>
</head>
<body>
    <!-- start login -->
    <style>
        body {
            background: linear-gradient(to bottom, #FDE599 25%, #99ccff 100%);
        }
    </style>

   <div class="login-1">
        <div class="form">
            <div class="content">
            <?php if(!empty($error)){ ?>
   <div class="modal-content animate"  style="text-align:center">
  
  
  <h1 style="font-size:60px"> <?php echo $error; ?> </h1>
  
</div>
		<?php } ?>
        <img src="media/logos/taramsistorelogo.svg">
        
<div class="title" style="color: #C60909;">مَرْحَباً بِكَ فِي البَرْنَامِجِ الْمُحَاسَبِي</div>
                <form action="" method="post">
                    <label dir="rtl">البريد الإلكتروني</label> 
                    <input class="main-input" type="email" name="email">  
                    <label dir="rtl">كلمة السر </label>
                    <input class="main-input" type="pass" name="pass">
                  
                    <input class="submit-sigin-in" type="submit"value="تسجيل الدخول" name="submit">
                </form>
            </div>
        </div>
   </div>
   <!-- end login -->
</body>
</html>