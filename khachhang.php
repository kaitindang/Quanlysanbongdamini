<!--TRANG KHÁCH HÀNG-->
<!--Các chức năng: 
    - Xem, sửa, xóa khách hàng
    - Tìm kiếm khách hàng theo tên, sdt
    - In hóa đơn
-->
<?php
	include("session.php");
	include("header/header2.php");
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Khách hàng</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="container">
        <br />
        <h2 align="center"><b>QUẢN LÝ KHÁCH HÀNG</b></h2><br />
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon">Tìm kiếm</span>
                <input type="text" name="search_text" id="search_text" placeholder="Nhập tên hoặc số diện thoại" class="form-control" />
            </div>
        </div>
        <br />
        <div id="result"></div>
    </div>
</body>

</html>

<script>
$(document).ready(function() {

    load_data();

    function load_data(query) {
        $.ajax({
            url: "Timkiem.php",
            method: "POST",
            data: {
                query: query
            },
            success: function(data) {
                $('#result').html(data);
            }
        });
    }
    $('#search_text').keyup(function() {
        var search = $(this).val(); //Lấy dữ liệu từ ô tìm kiếm
        if (search != '') { //Tìm thấy thì hiển thị ra màn hình
            load_data(search);
        } else {    //Ngược lại in thông báo
            load_data();
        }
    });
});
</script>