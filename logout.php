<?php
session_start();
ob_start();
if (!isset($_SESSION['id_usar'])){
   header('Location: login.php');
	};

?>

<?php
session_start();
if(isset($_SESSION['id_usar']))
{
	unset($_SESSION['id_usar']);
}
header("location:index.php");
session_destroy();
?>