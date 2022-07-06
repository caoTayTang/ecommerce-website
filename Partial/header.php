<div id="header">
	<div id="hamburger" onclick="logo(this)">
		<div id="hamburger_container">
			  <div class="bar1"></div>
			  <div class="bar2"></div>
			  <div class="bar3"></div>
		</div>
	</div>
	<div id="logo">
		<a href="#">
			<img src="/ecommerce-website/resource/logo-white.png" >
		</a>
	</div>
	<div id="search_bar">
		<form>
			<input type="text" placeholder="Search" name="query">
		</form>
	</div>
	<div id="user" onclick="location.href='login.php'"></div>
	<div id="shopping_cart" onclick="location.href='shopping_cart.php'"></div>
	<div id="help" onclick="location.href='help.php'"></div>
</div>
<script>
	function logo(x) {
	  x.classList.toggle("change");
	  let logo = document.getElementById('menu');
	  let display = window.getComputedStyle(logo).display;

	  let menu = document.getElementById('hamburger_container');
	  if (display == "none") {
		  	logo.style.display = "block";
		  	menu.style.position = "fixed";
		  }else if (display == "block") {
		  		logo.style.display = "none";
		  		menu.style.position = "relative";
		  }

	}
</script>