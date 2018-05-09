<?php
$title = 'LKD - Store';
require('requires/header.php');
?>
<main>
	<section class="checkOut">
		<article class="cart">
			<?php
			if(!isset($_SESSION['cart']) or $_SESSION['cart'] == null){
				print '<h2> empty cart </h2>';
			}else{

			$whereIn = implode(',', $_SESSION['cart']);

			$sql = "SELECT * FROM products WHERE id IN ($whereIn)";
			$result = mysqli_query($connection,$sql);
			$_SESSION['total'] = 0;

			while($row=mysqli_fetch_array($result)){
				echo '<h2>'.$row['name'].'</h2><p>'.$row['price'].'</p>';
				$_SESSION['total'] += $row['price'];
			};

			$total = number_format($_SESSION['total'], 2, '.', '') ;
			$tax = number_format($total * 0.05, 2, '.', '');
			$totalTax = number_format($total + $tax, 2, '.', '');

			echo "<p>".$total."</p>";
				 "<p>".$tax."</p>";
				 "<p>".$totalTax."</p>";
			};
			?>

			<form action="process.php" method="post">
				<input type="text" name="fullName" placeholder="Full Name" required>
				<input type="email" name="email" placeholder="Email" required>
				<input type="hidden" name="products" value="<?php print $whereIn ?>">
				<input type="hidden" name="totalTax" value="<?php print $totalTax ?>">
				<input type="submit" value="Confirm Purchase" >
			</form>
			<img src="images/lkglogo.svg" alt="lkdLogo">
		</article>
	</section>
</main>
<?php
require("requires/footer.php");
?>