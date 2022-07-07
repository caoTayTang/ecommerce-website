<div id="overlay"></div>
<div id="header">
	<div id="hamburger" onclick="logo(this)">
		<div id="hamburger_container">
			  <div class="bar1"></div>
			  <div class="bar2"></div>
			  <div class="bar3"></div>
		</div>
	</div>
	<div id="logo">
		<a href="/ecommerce-website/index.php">
			<img src="/ecommerce-website/resource/logo-white.png" >
		</a>
	</div>
	<div id="search_bar">
		<form>
			<?php if (!isset($search)) 
					$search = "";
				// Prevent undefine when include header file in other index.php
			?>
			<input type="text" placeholder="Search" name="query" value="<?php echo $search ?>">
		</form>
	</div>
	<div id="user" onclick="location.href='/ecommerce-website/login.php'"></div>
	<div id="shopping_cart" onclick="location.href='/ecommerce-website/shopping_cart.php'"></div>
	<div id="help" onclick="location.href='/ecommerce-website/help.php'"></div>
</div>
<script>

	function logo(x) {
		let toggleBar = document.getElementById('menu');
 		let menu = document.getElementById('hamburger_container');
		let overlay = document.getElementById('overlay');
		let cancel = document.getElementById('cancel_button')
	  	
	  	toggleBar.style.display = "block";
	  	menu.style.position = "fixed";
	  	overlay.style.display = "block";

// If cancle div or the gray overlay be clicked
		cancel.addEventListener("click",() => {
			toggleBar.style.display = "none";
			menu.style.position = "relative";
	  		overlay.style.display = "none";
		})
	
		overlay.addEventListener("click", () => {
			toggleBar.style.display = "none";
			menu.style.position = "relative";
	  		overlay.style.display = "none";
		});


	}

</script>