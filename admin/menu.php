<div id="menu">
    <div id="cancel_button"></div>

	<div class="dropdown">
        <button class="dropbtn" onclick="location.href='/admin/overview/index.php'">Tổng quan</button>
        <div class="dropdown-content">
            <a href="/admin/overview/index.php">Thống kê doanh thu</a>
            <a href="/admin/overview/orders.php">Thống kê hoá đơn</a>
            <a href="/admin/overview/products.php">Thống kê sản phẩm</a>
            <a href="/admin/overview/customers.php">Thống kê khách hàng</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='../orders'">Quản lý đơn hàng</button>
        <div class="dropdown-content">
            <a href="/admin/orders/pending_orders.php">Đơn chờ duyệt</a>
            <a href="/admin/orders/approved_orders.php">Đơn đã duyệt</a>
            <a href="/admin/orders/canceled_orders.php">Đơn đã huỷ</a>
        </div>

    </div>


    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='/admin/products/index.php'">Quản lý sản phẩm</button>
        <div class="dropdown-content">
            <a href="/admin/products/form_insert.php">Thêm sản phẩm</a>
        </div>
    </div>

    <div class="dropdown">
        <button class="dropbtn" onclick="location.href='/admin/employees'">Quản lý nhân viên</button>
        <div class="dropdown-content">
            <a href="/admin/employees/form_insert_employee.php">Thêm nhân viên</a>
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
