<?php
session_start();
ob_start();
if (!isset($_SESSION['id_usar'])){
   header('Location: login.php');
	};

?>

<?php
include("connect.php");
$querySELECT_products= "SELECT `id_products`, `name`, `type_products`, `contaty`, `selling_price` FROM `products`";
 $resultSELECT_products= mysqli_query($connection,$querySELECT_products);

 $querySELECT_products2= "SELECT `id_products`, `name`, `type_products`, `contaty`, `selling_price` FROM `products` ORDER BY `products`.`id_products` ASC";
 $resultSELECT_products2= mysqli_query($connection,$querySELECT_products2);

 $querySELECT_customers= "SELECT `id_customers`, `name` FROM `customers`";
 $resultSELECT_customers= mysqli_query($connection,$querySELECT_customers);

 $querySELECT_products3= "SELECT products_sala.	id_products, products.name , products.selling_price FROM `products_sala`
 INNER JOIN products ON products_sala.id_products=products.id_products ";
 $resultSELECT_products3= mysqli_query($connection,$querySELECT_products3);

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
    <link rel="stylesheet" href="css/style.css">
    <!-- render all elment  -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- font awesome  -->
    <link rel="stylesheet" href="css/all.min.css">
    <title>Reset</title>
  
           
</head>
<body>
  <?php
         
         include("navbar.php");
         ?>
    <!-- start landing -->
    <div class="landing">
        <!-- فاتوره  -->
        <div class="bill">
            <div class="container">
              <div class="content">


              <select id="countriesDropdown" oninput="filterTable()">
              <?php while($sproducts= mysqli_fetch_assoc($resultSELECT_products)) { ?>
                    <option ><?php echo $sproducts['name']; ?></option>
                    <?php } ?>
</select>

<table id="myTable">
  <tr><th>الاسم</th><th>النوع</th><th>السعر</th><th>الكميه</th><th>اضافة </th></tr><!-- header row uses 'th' instead of 'td' -->
  <?php while($sproducts2= mysqli_fetch_assoc($resultSELECT_products2)) { ?>
  <tr> <td><?php echo $sproducts2['name']; ?></td><td><?php echo $sproducts2['type_products']; ?></td><td><?php echo $sproducts2['selling_price']; ?></td><td><?php echo $sproducts2['contaty']; ?></td>
 <td><a href="proses.php?id_receipt_=<?php echo $sproducts2['id_products'];  ?>" >  اضافة</a></td></tr>
  <?php } ?>
</table>
                  

                 
              </div>
              <div class="form">
                <form action="receipt_print.php" method="post">
                  <table>
                    <tbody>
                    <?php while($sproducts3= mysqli_fetch_assoc($resultSELECT_products3)) { ?>
                      <tr>
                      <td>
                          <label>اسم المنتج</label>
                          <label> <?php echo $sproducts3['name']; ?></label>
                          <input type="hidden" name="contanr[id_products][]" value="<?php echo $sproducts3['id_products'] ?>">
                          <input type="hidden" name="contanr[name][]" value="<?php echo $sproducts3['name'] ?>">
                        </td>
                        <td>
                          <label>الكميه</label>
                          <input type="text" name="contanr[quintity][]"  required>
                        </td>
                        <td>
                          <label>السعر</label>
                          <label><?php echo $sproducts3['selling_price']; ?></label>
                          <input type="hidden"  name="contanr[selling_price][]" value="<?php echo $sproducts3['selling_price'] ?>">
                        </td>
                        <td>
                      
                          <a href="proses.php?id_receipt_delte=<?php echo $sproducts3['id_products'];  ?>" ><i class="fa-solid fa-rectangle-xmark"></i></a>
                        </td>
                        <?php } ?>
                      </tr>
                    </tbody>
                  </table>


                  <br><br><br><br><br><br>
                  <label style="color:#00000069">العميل</label>
                    <select  name="id_customers">
                    <?php while($customers = mysqli_fetch_assoc($resultSELECT_customers)) { ?>
                    <option value="<?php echo $customers['id_customers']; ?>"><?php echo $customers['name']; ?></option>
                    <?php } ?>
                  </select> 
                  
                  <input class="submit-bill" type="submit" value="submit">
              </form>
                <!-- <br> -->
              
              </div>



            </div>
        </div>
    </div>
   
    <script>
function filterTable() {
  // Variables
  let dropdown, table, rows, cells, country, filter;
  dropdown = document.getElementById("countriesDropdown");
  table = document.getElementById("myTable");
  rows = table.getElementsByTagName("tr");
  filter = dropdown.value;

  // Loops through rows and hides those with countries that don't match the filter
  for (let row of rows) { // `for...of` loops through the NodeList
    cells = row.getElementsByTagName("td");
    country = cells[0] || null; // gets the 2nd `td` or nothing
    // if the filter is set to 'All', or this is the header row, or 2nd `td` text matches filter
    if (filter === "All" || !country || (filter === country.textContent)) {
      row.style.display = ""; // shows this row
    }
    else {
      row.style.display = "none"; // hides this row
    }
  }
}

    </script>
</body>
</html>