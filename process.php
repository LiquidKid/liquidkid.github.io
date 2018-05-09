<?php
$title = 'LKD - Store';
require('requires/header.php');

$fullName = mysqli_real_escape_string($connection, $_POST['fullName']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$products = $_POST['products'];
$totalTax = $_POST['totalTax'];
?>
<main>
	<section class="checkOut">
		<article class="cart">
		<?php
			$sql = "INSERT INTO orders (customerName,emailAddress,productsPurchased,totalCost) 
			VALUES ('$fullName','$email','$products','$totalTax')";

			if(mysqli_query($connection,$sql)){
					echo "<p>".$_POST['fullName'].", your order has been submitted!'</p>";
					echo "<p>expect your package to arrive in two to three weeks.</p>";
					session_destroy();
					}else{
					echo mysqli_error($connection);
				};
		?>
		<img src="images/lkglogo.svg" alt="lkdlogo">
		</article>
	</section>
</main>
<?php
require("requires/footer.php");
?>