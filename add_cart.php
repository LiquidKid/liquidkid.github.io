<?php
require('requires/header.php');

array_push($_SESSION['cart'], $_GET['id']);

header('Location:cart.php');
exit;

?>

<?php
require("requires/footer.php");
?>