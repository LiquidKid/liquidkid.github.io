<?php
$title = 'LKD - Store';
require('requires/header.php');
?>
<!doctype html>
<main>
	<h1>Home</h1>
		<section class="merchandise">
	<?php
		$sql = "SELECT id,name,image,img_alt,price,date FROM products ORDER BY date LIMIT 4";
		$result = mysqli_query($connection, $sql);

		if (mysqli_num_rows($result)>0) {
			while($row = mysqli_fetch_array($result)) {
				echo '
						<article class="merch">
						<a href="product_detail.php?id='.$row['id'].'">
						<img src="images/full/'.$row['image'].'" alt="'.$row['img_alt'].'"></a>
						<h3>'.$row['name'].'</h3>
						<h3>$'.$row['price'].'</h3>
						</article>
						';
			}
		}else{
			echo "<p>No products availible.</p>";
		}
	?>
		</section>
	</main>
	<?php
	require('requires/footer.php');
	?>
</body>
</html>
