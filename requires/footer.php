<div class="footer"><a href="products.html"><?php
  $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
  echo "&larr;<a href='$url'>Return to Last Page</a>"; 
?>
</a>
</div>
</main>	
<!--	<script>
		window.onscroll = function myFunction();
		
		var nav = document.getElementsByClassName("mynav");
		var navTop = nav.offsetHeight;
		
		function myFunction(){
			if (window.pageYOffset >= navTop){
				nav.classList.remove("mynav");
				nav.classList.add("navTop");
			}
			else{
				nav.classList.remove("navTop");
			}
		}
		I decided to leave this in, in order to get some feedback on what I've done wrong here,
		It was supposed to destroy my nav class and replace it with a second one styled to be a fixed nav.
</script>-->
</body>
</html>