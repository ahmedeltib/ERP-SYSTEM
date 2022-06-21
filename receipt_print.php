<?php
session_start();
ob_start();
if (!isset($_SESSION['id_usar'])){
   header('Location: login.php');
	};

?>
<?php


include("connect.php");
$datee= date('Y-m-d');
?>
<?php

if($_SERVER['REQUEST_METHOD']=="POST"){
	$id_usarsessn=$_SESSION['id_usar'] ;
//     $querySELECT_usar= "SELECT `id_usar` FROM `usar` WHERE id_usar= '{$id_usar_sessn}'";
// $resultSELECT_usar= mysqli_query($connection,$querySELECT_usar);
// $usar = mysqli_fetch_assoc($resultSELECT_usar);
// $id_usar=$usar['id_usar'];


		$egmaly1=array();
	
        $Data= $_POST['contanr'];
$Data1= $_POST['contanr']['id_products'];
		
	
		$i=-1;
        $x=0;
		$countr=count($Data1);
        $countr++;
		
        while($i<$countr){
    $i++;
            if(!empty($Data['id_products'][$x])) {
            $quintity=$Data['quintity'][$x];
            $id_products=$Data['id_products'][$x];
			$name=$Data['name'][$x];
			$selling_price=$Data['selling_price'][$x];
            $id_customers=$_POST['id_customers'];
			
		  $query_contaty="SELECT `contaty`FROM `products` WHERE id_products= '{$id_products}'";
 $resul_contaty= mysqli_query($connection,$query_contaty);
			$contaty = mysqli_fetch_assoc($resul_contaty);
            $safy =  $contaty['contaty'] - $Data['quintity'][$x] ; 
	
				$egmaly1[]=$selling_price* $quintity;

                $query_UPDATE_contaty="UPDATE `products` SET `contaty` = '{$safy}' WHERE id_products= '{$id_products}'";
                mysqli_query($connection,$query_UPDATE_contaty);

               
                          
				
                $x++;
				} }


               
		$egmaly1_sum=array_sum($egmaly1);


		 $queryINSERTreceipt = "INSERT INTO `receipt`(`receipt_date`, `receipt_Values`, `id_customers`, `id_usar`)
          VALUES ('{$datee}','{$egmaly1_sum}','{$id_customers}','{$id_usarsessn}')";
                  mysqli_query($connection, $queryINSERTreceipt);

                  $querySELECT_id_receipt= "SELECT `id_receipt` FROM `receipt` ORDER BY `receipt`.`id_receipt` DESC LIMIT 1";
                  $resultSELECT_id_receipt= mysqli_query($connection,$querySELECT_id_receipt);
                  $id_receipt12 = mysqli_fetch_assoc($resultSELECT_id_receipt);
                  $id_receipt13 = $id_receipt12['id_receipt'] ;
 
		   $querySELECT_customers= "SELECT * FROM `customers` WHERE id_customers= '{$id_customers}'";
$resultSELECT_customers= mysqli_query($connection,$querySELECT_customers);
$customers = mysqli_fetch_assoc($resultSELECT_customers);

$products_sala= "DELETE FROM `products_sala`";
 mysqli_query($connection,$products_sala);



// $query_receipt="SELECT `id_receipt`, `receipt_date` FROM `receipt` ORDER BY `receipt`.`id_receipt` DESC LIMIT 1";
//  $resul_receipt= mysqli_query($connection,$query_receipt);
// 			$receipt = mysqli_fetch_assoc($resul_receipt);
	
}
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
    <title>فاتوره</title>
</head>
<body>
<?php
         
         include("navbar.php");
         ?>
    <!-- start landing -->
    <div class="landing">
        <!-- اعداد فاتوره  -->
        <div class="invoice-preparation">
            <div class="container">
               <h3 style="text-align: center;
    font-size: 36px;"> رقم الفاتورة</h3>
                <table>
                    <thead>
                        <tr>
                            <td>اسم المنتج</td>
                            <td>السعر</td>
                            <td> الكميه </td>
                            <td> اجمالي السعر </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php   $i=-1;
        $x=0;
		$countr=count($Data1);
        $countr++;
		
        while($i<$countr){
    $i++;
            if(!empty($Data['id_products'][$x])) {
                $id_products=$Data['id_products'][$x];
                $quintity=$Data['quintity'][$x]; 
                $egmaly12=$selling_price* $quintity ;

                $queryINSERTreceipt_products = "INSERT INTO `receipt_products`(`id_receipt`, `id_products`, `contty`, `egmaly_price`) 
                VALUES  ('{$id_receipt13}','{$id_products}','{$quintity}','{$egmaly12}')";
                    mysqli_query($connection, $queryINSERTreceipt_products);
               

                ?>
                        <tr>
                        
                            <td><?php echo $name=$Data['name'][$x]; ?></td>
                            <td><?php echo $selling_price=$Data['selling_price'][$x]; ?></td>
                            <td><?php echo $quintity=$Data['quintity'][$x]; ?></td>
                            <td><?php echo $selling_price* $quintity ?> </td>
                        </tr>

                        <?php   $egmaly1[]=$selling_price* $quintity;
                        $egmaly1_sum=array_sum($egmaly1);
				
                $x++;
                 }} ?>
                        </table>
                        <table>
                        <thead>
                        <tr>
                            <td> اجمالي المستحق</td>
                            <td><?php echo $egmaly1_sum ?></td>
                           
                        </tr>
                    </thead>
                      </table>
                      <table>
                        <thead>
                        <tr>
                            <td>  اسم العميل</td>
                            <td><?php echo $customers['name']; ?></td>
                            
                        </tr>
                    </thead>
                      </table>
                      <table>
                        <thead>
                        <tr>
                            <td> رقم العميل </td>
                            <td><?php echo $customers['phone']; ?></td>
                            
                        </tr>
                    </thead>
                      </table>
                      <table>
                        <thead>
                        <tr>
                            <td>  العنوان</td>
                            <td><?php echo $customers['addres']; ?></td>
                            
                        </tr>
                    </thead>
                      </table>
                      

               
               
            </div>
        </div>
    </div>
    <!-- end landing -->
</body>
</html>