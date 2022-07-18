<!-- the fixed circle -->
<div id="float" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });"> </div> 
<div id="footer">
	<div id="contact">
        <?php 
        // admin dont need pagination
        $url = $_SERVER['REQUEST_URI'];
        $contains = strpos($url,"products") || strpos($url,"manufacturers") || strpos($url,"signing") || strpos($url,"cart") || strpos($url,"buy");

        if (strpos($url, "show.php")) {
        	//show.php dont need pagination
        } else if(strpos($url, "admin") && !$contains) {
			include "../partial/pagination.php";
        }else if (!$contains) {
			include "./partial/pagination.php";
    	}
		?>

	    <img src="/ecommerce-website/resource/logo-black.png" height="90px">
    </div>  
	<div id="info">
		<h2>Thông tin</h2>
		<ul>
			<li>
				<a href="javascript:void(0)">Giúp đỡ</a>
			</li>
			<li>
				<a href="javascript:void(0)">Theo dõi người dùng</a>
			</li>
			<li>
				<a href="javascript:void(0)">Giao hàng và đổi trả</a>
			</li>
		</ul>
	</div>
	<div id="about">
		<h2>Về Kaios</h2>
		<ul>
			<li>
				<a href="javascript:void(0)">Kaios the fox</a>
			</li>
			<li>
				<a href="javascript:void(0)">Làm việc cho chúng tôi</a>
			</li>
			<li>
				<a href="javascript:void(0)">Nhân sự</a>
			</li>
		</ul>
	</div>
	<div id="more">
		<h2>Ưu đãi</h2>
		<ul>
			<li>
				<a href="javascript:void(0)">Voucher</a>
			</li>
			<li>
				<a href="javascript:void(0)">Ngày hội giảm giá</a>
			</li>
		</ul>
	</div>
	<div id="bottom">
		<div id="left">&nbsp&nbsp© 2022 Kaios</div>
		<div id="right">Vietnam, Ho Chi Minh city &nbsp&nbsp</div>
	</div>
</div>
