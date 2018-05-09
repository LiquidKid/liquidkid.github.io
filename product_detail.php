<?php
$title = 'LKD - Store';
require('requires/header.php');
?>
<main>
	<?php 
		$id = $_GET['id'];
		$sql = "SELECT image,name,description,img_alt FROM products WHERE id=$id LIMIT 1";
		$result = mysqli_query($connection, $sql);

		if (mysqli_num_rows($result)>0) {
			$row = mysqli_fetch_array($result);
	?>
		<section class="product">
			<?php
	
			echo '
				<article class="salesheet">
				<img src="images/full/'.$row['image'].'" alt="'.$row['img_alt'].'">
				</article>
				';
		} else {
			echo "<p>No item found.</p>";
		}
	?>
			<article class="salesheet">
			<div class="sales">
				<?php
				echo
				"<h2>".$row['name']."</h2>"
				?>
				<p>Choose a Color</p>
			<label for="color"></label>
			<select name="color" id="color">
				<option value="blk">Black</option>
				<option value="white">White</option>
				<option value="red">Red</option>
				<option value="blue">Blue</option>
				<option value="grey">Grey</option>
				<option value="orange">Orange</option>
				<option value="yellow">Yellow</option>
			</select>
			<p>Pick Your Size</p>
			<label for="size"></label>
			<select name="size" id="size">
				<option value="small">Small</option>
				<option value="med">Medium</option>
				<option value="lrg">Large</option>
				<option value="xl">Extra Large</option>
			</select>
			<p>Choose Quantity <small>(Limit of three due to availibility)</small></p>
			<input type="number" name="quantity" min="1" max="3">
			<?php
				echo '<p>'.$row['description'].'</p>';
			?>
			<a href="add_cart.php?id=<?php echo $id ?>"><button>Add to Cart</button></a>
			</div>
        </article>
	</section>
</main>
<?php
require("requires/footer.php");
?>