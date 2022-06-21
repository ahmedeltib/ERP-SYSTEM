<?php
session_start();
ob_start();
if (!isset($_SESSION['id_usar'])){
   header('Location: login.php');
	};

?>

<?php
//session_start();
?>
<?php
//ob_start();
//if (!isset($_SESSION['username'])){
//    header('Location: login.php');
//	};
include("connect.php");
?>
<?php 


	
$querySELECT_item= "SELECT SUM(receipt_products.contty) AS ttyproduct, products.name, products.contaty, products.selling_price,products.purchasing_price,products.type_products, stores.name FROM `products`
INNER JOIN stores ON products.id_stor=stores.id_stores 
INNER JOIN receipt_products ON products.id_products=receipt_products.id_products
GROUP BY products.id_products";
 $resultSELECTitem= mysqli_query($connection,$querySELECT_item);
	
		
  

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
    <title>sales</title>
</head>
<body>
<?php
         
         include("navbar.php");
         ?>
    <!-- end header -->
    <!-- start landing -->
    <div class="landing">
        <!-- مبيعات يوميه  -->
        <div class="daily-sales">
            <div class="container">
                <div class="form">
                   
                </div>
                <table>
                    <thead>
                        <tr>
                            <td>اسم المنتج</td>
                            <td> نوع المنتج </td>
                            <td>سعر البيع</td>
                            <td>سعر الشراء</td>
                            <td>الكميه المباعه</td>
                            <td>الكميه الموجوده</td>
                            <td>اسم المخزن </td>
                           
                            
                        </tr>

                        
                    </thead>
                    <tbody>
                    <?php while($item = mysqli_fetch_assoc($resultSELECTitem)) { ?>
      <tr>
     
        <td><?php echo $item['name']; ?> </td>
          <td><?php echo $item['type_products']; ?> </td>
          
        <td><?php echo $item['selling_price']; ?> </td>
        <td><?php echo $item['purchasing_price']; ?> </td>
        <td><?php echo $item['ttyproduct']; ?> </td>
          <td><?php echo $item['contaty']; ?> </td>
          
        <td><?php echo $item['name']; ?> </td>
        
         
      </tr>
    <?php } ?> 

                        </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- end landing -->
</body>
</html>