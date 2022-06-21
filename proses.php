
<?php 
include("connect.php");

if(isset($_GET['id_receipt_'])){

        
	$id_receipt_= $_GET['id_receipt_'];
			   $queryINSERTreceipt = "INSERT INTO `products_sala`(`id_products`) VALUES ('{$id_receipt_}')";
   $resultINSERTreceipt= mysqli_query($connection, $queryINSERTreceipt);
   if(!$mysqli_connect_errno){
	header('Location: fatora.php');
   }

	header('Location: fatora.php');

};




        
	if(isset ($_GET['id_receipt_delte'])){
	
		$id_product_ = $_GET['id_receipt_delte'];
		$queryDELETE_product= "DELETE FROM `products_sala` WHERE id_products ='{$id_product_}'";
	 $resultDELETEproduct= mysqli_query($connection,$queryDELETE_product);
	  header('Location: fatora.php');
		

};

	?>

	