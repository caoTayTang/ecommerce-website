<div id="menu">
    <div id="cancel_button"></div>

    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='../orders'">Quản lý đơn hàng</button>
        <div class="dropdown-content">
            <a href="/admin/orders/pending_orders.php">Đơn chờ duyệt</a>
            <a href="/admin/orders/approved_orders.php">Đơn đã duyệt</a>
            <a href="/admin/orders/canceled_orders.php">Đơn đã huỷ</a>
        </div>

    </div>

	<div class="dropdown">
        <button class="dropbtn" onclick="location.href='../products/index.php'">Quản lý sản phẩm</button>
        <div class="dropdown-content">
            <a href="/admin/products/form_insert_type.php">Thêm thể loại</a>
            <a href="/admin/products/form_insert.php">Thêm sản phẩm</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='../orders'">Quản lý nhân viên</button>
    </div>

    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='../manufacturers/index.php'">Quản lý  nhà sản xuất</button>
        <div class="dropdown-content">
            <a href="/admin/manufacturers/form_insert.php">Thêm nhà sản xuất</a>
        </div>
    </div>

</div>
