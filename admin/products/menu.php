<div id="menu">
    <div id="cancel_button"></div>

    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='/admin/orders'">Quản lý đơn hàng</button>
        <div class="dropdown-content">
            <a href="/admin/orders/pending_orders.php">Đơn chờ duyệt</a>
            <a href="/admin/orders/approved_orders.php">Đơn đã duyệt</a>
            <a href="/admin/orders/canceled_orders.php">Đơn đã huỷ</a>
        </div>
        
    </div>

	<div class="dropdown">
        <button class="dropbtn" onclick="location.href='/admin/products'">Quản lý sản phẩm</button>
        <div class="dropdown-content">
            <a href="/admin/products/form_insert.php">Thêm sản phẩm</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='/admin/type/index.php'">Quản lý  thể loại</button>
        <div class="dropdown-content">
            <a href="/admin/type/form_insert.php">Thêm thể loại</a>
        </div>
    </div>
    
    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='/admin/manufacturers/index.php'">Quản lý  nhà sản xuất</button>
        <div class="dropdown-content">
            <a href="/admin/manufacturers/form_insert.php">Thêm nhà sản xuất</a>
        </div>
    </div>

    </div>
</div>
