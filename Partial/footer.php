<!-- the fixed circle -->
<div id="float" onclick="window.scrollTo({ top: 0, behavior: 'smooth' });"> </div> 
<div id="footer">
	<div id="contact">
        <div id="pagination">
            <?php 
                $concatChar = '?';
                if ( isset($_GET['query']) ) {
                    $concatChar = "?query=$search&";
                }
             ?>
            <?php for($i = 1; $i <= $page; $i++) { ?>
                <a href="index.php<?php echo $concatChar ?>page=<?php echo $i ?>"> 
                    <?php echo $i ?>
                </a> 
            <?php } ?>
        </div>
	    <img src="/ecommerce-website/resource/logo-black.png" height="90px">
    </div>  
	<div id="info">
		<h2>Thông tin</h2>
		<ul>
			<li>
				<a href="">Giúp đỡ</a>
			</li>
			<li>
				<a href="">Theo dõi người dùng</a>
			</li>
			<li>
				<a href="">Giao hàng và đổi trả</a>
			</li>
		</ul>
	</div>
	<div id="about">
		<h2>Về Kaios</h2>
		<ul>
			<li>
				<a href="">Kaios the fox</a>
			</li>
			<li>
				<a href="">Làm việc cho chúng tôi</a>
			</li>
			<li>
				<a href="">Nhân sự</a>
			</li>
		</ul>
	</div>
	<div id="more">
		<h2>Ưu đãi</h2>
		<ul>
			<li>
				<a href="">Voucher</a>
			</li>
			<li>
				<a href="">Ngày hội giảm giá</a>
			</li>
			<li>
				<a href="">Mobile app</a>
			</li>
		</ul>
	</div>

	<div id="bottom">
		<div id="left">&nbsp&nbsp© 2022 Kaios</div>
		<div id="right">Vietnam, Ho Chi Minh city &nbsp&nbsp</div>
	</div>
</div>