<?php
$title = 'LKD - Store';
require('requires/header.php');
?>
<!doctype html>
	<main>
	<h1>MERCH</h1>
	<div class="sortHeader">
	<h3>Sort By:</h3>
		<form action="products.php" method="GET">
					<select name="category" id="category" required>
						<option value="all">All</option>
						<option value="hats">Hats</option>
						<option value="shirts">Shirts</option>
						<option value="sweaters">Sweaters</option>
						<option value="posters">Posters</option>
						<option value="workout">Workout</option>
					</select>
					
					<select name="sort" id="sort" required>
						<option value="highlow">Price High to Low</option>
						<option value="lowhigh">Price Low to High</option>
						<option value="a">Name A-Z</option>
						<option value="z">Name Z-A</option>
						<option value="new">Newest to Oldest</option>
						<option value="old">Oldest to Newest</option>
						<option value="none">None</option>
					</select>
					
					<input type="submit" value="Sort">
					
				</form>
	</div>
	<?php
	
	if(isset($_GET['sort']) && isset($_GET['category'])){
		
		//category
		
		if($_GET['category'] == 'hats'){
			$category = 'WHERE category = "hats"';
		}
		else if($_GET['category'] == 'shirts'){
			$category = 'WHERE category = "shirts"';
		}
		else if($_GET['category'] == 'sweaters'){
			$category = 'WHERE category = "sweaters"';
		}
		else if($_GET['category'] == 'posters'){
			$category = 'WHERE category = "posters"';
		}
		else if($_GET['category'] == 'workout'){
			$category = 'WHERE category = "workout"';
		}
		else{
			$category = '';
		};
		
		// sort
		
		if($_GET['sort'] == 'highlow'){
			$sort = 'ORDER BY price DESC';
		}
		
		else if($_GET['sort'] == 'lowhigh'){
			$sort = 'ORDER BY price ASC';
		}
		
		else if($_GET['sort'] == 'az'){
			$sort = 'ORDER BY name DESC';
		}
		
		else if($_GET['sort'] == 'za'){
			$sort = 'ORDER BY name ASC';
		}
		
		else if($_GET['sort'] == 'new'){
			$sort = 'ORDER BY date DESC';
		}
		
		else if($_GET['sort'] == 'old'){
			$sort = 'ORDER BY date ASC';
		}
		
		else{
			$sort = '';
		};
		
		$sql = "SELECT id,name,thumb,img_alt,price FROM products $category $sort";
		
	}else{
		$sql = "SELECT id,name,thumb,img_alt,price FROM products";
	};
	
	
	$result = mysqli_query($connection,$sql);

?>

		<section class="merchandise">
	<?php

		if (mysqli_num_rows($result)>0) {
			while($row = mysqli_fetch_array($result)) {
				echo '
						<article class="merch">
						<a href="product_detail.php?id='.$row['id'].'">
						<img src="images/thumbs/'.$row['thumb'].'" alt="'.$row['img_alt'].'"></a>
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
