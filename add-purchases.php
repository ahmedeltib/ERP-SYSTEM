<?php
session_start();
ob_start();
if (!isset($_SESSION['id_usar'])){
   header('Location: login.php');
	};

?>

<?php
include("connect.php");
$querySELECT_suppliers= "SELECT `id_Suppliers`, `name`, `Addresses`, `phone` FROM `suppliers`";
 $resultSELECT_suppliers= mysqli_query($connection,$querySELECT_suppliers);
 $querySELECT_stores= "SELECT `id_stores`, `name` FROM `stores`";
 $resultSELECT_stores= mysqli_query($connection,$querySELECT_stores);

if($_SERVER['REQUEST_METHOD']=="POST"){
	 
	  $name =$_POST['name'];
      $type_products=$_POST['type_products'];
      $contaty =$_POST['contaty'];
      $id_supplier=$_POST['id_supplier'];
      $purchasing_price =$_POST['purchasing_price'];
      $selling_price=$_POST['selling_price'];
      $id_stor =$_POST['id_stor'];
      $madfo=$_POST['madfo'];
      $baky =$_POST['baky'];
      $datee= date('Y-m-d');
      
      
  $queryINSERTproducts = "INSERT INTO `products`(`name`, `type_products`, `contaty`, `id_supplier`, `purchasing_price`, `selling_price`, `id_stor`) VALUES 
  ('{$name}','{$type_products}','{$contaty}','{$id_supplier}','{$purchasing_price}','{$selling_price}','{$id_stor}')";
  $resultINSERTproducts =  mysqli_query($connection, $queryINSERTproducts);
 


  $query_products="SELECT `id_products` FROM `products` ORDER BY `products`.`id_products` DESC LIMIT 1";
  $resul_products= mysqli_query($connection,$query_products);
             $products = mysqli_fetch_assoc($resul_products);
         
       $id_products28 =$products['id_products'];

         $queryINSERTpurchases = "INSERT INTO `purchases`(`id_supplier`, `datee`, `madfo`, `baky`, `id_products`, `contty`) VALUES 
  ('{$id_supplier}','{$datee}','{$madfo}','{$baky}','{$id_products28}','{$contaty}')";
  $resultINSERTpurchases =  mysqli_query($connection, $queryINSERTpurchases);


  $result=" تم الاضافة بنجاح";
  if(!$resultINSERTproducts){
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
                    <label>اسم المنتج</label>
                    <input type="text" placeholder="your name" name="name">
                    <label>نوع المنتج</label>
                    <input type="text"  name="type_products">
                    <label> الكميه</label>
                    <input type="text"  name="contaty">
                    <label> سعر البيع</label>
                    <input type="text"  name="selling_price">
                    <label> سعر الشراء</label>
                    <input type="text"  name="purchasing_price">
                    <label> المدفوع  </label>
                    <input type="text"  name="madfo">
                    <label>  المتبقي</label>
                    <input type="text"  name="baky">
                  

                    <label>المخزن</label>
                    <select  name="id_stor">
                    <?php while($stores = mysqli_fetch_assoc($resultSELECT_stores)) { ?>
                    <option value="<?php echo $stores['id_stores']; ?>"><?php echo $stores['name']; ?></option>
                    <?php } ?>
                  </select>
             

                    <label>المورد</label>
                    <select  name="id_supplier">
                    <?php while($supplier = mysqli_fetch_assoc($resultSELECT_suppliers)) { ?>
                    <option value="<?php echo $supplier['id_Suppliers']; ?>"><?php echo $supplier['name']; ?></option>
                    <?php } ?>
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