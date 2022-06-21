<?php
session_start();
ob_start();
if (!isset($_SESSION['id_usar'])){
   header('Location: login.php');
	};

?>

<?php
include("connect.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
	 
	  $name =$_POST['name'];
      
   
  $queryINSERTstores = "INSERT INTO `stores`(`name`) VALUES
  ('{$name}')";


$resultINSERTstores =  mysqli_query($connection, $queryINSERTstores);
 
  $result=" تم الاضافة بنجاح";
  if(!$resultINSERTstores){
  $erore=" لم تتم  العمليه بنجاح     ";}

	 }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main file css  -->
    <link rel="stylesheet" href="css/style.css">
    <!-- render all elment  -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- font awesome  -->
    <link rel="stylesheet" href="css/all.min.css">
    <title> اضافة مستخدم</title>
</head>
<body>
    <!-- start header -->
    <?php
         
         include("navbar.php");
         ?>
    <!-- end header -->
    <!-- start landing -->
    <div class="landing">
    <?php if(!empty($result)){ ?>
   <div class="modal-content animate"  style="text-align:center">
  
  
  <h1 style="font-size:60px"> <?php echo $result; ?> </h1>
  
</div>
		<?php } ?>

        <?php if(!empty($erore)){ ?>
   <div class="modal-content animate"  style="text-align:center">
  
  
  <h1 style="font-size:60px"> <?php echo $erore; ?> </h1>
  
</div>
		<?php } ?>
   
        <!-- اضافه موظف  -->
        <div class="add-prodect">
            <div class="container">
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
                    <label>اسم مخزن</label>
                    <input type="text" placeholder="your name" name="name">
                  </select>
                <br><br><br>
                    <input class="submit-add-prodect" type="submit" value="submit">
                </form>
            </div>
        </div>
    </div>
    <!-- end landing -->
</body>
</html>