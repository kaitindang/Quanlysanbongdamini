<!--Thanh menu-->
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/dfcb4f6ee6.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" type="image/png" href="images/icon.png" />
    <style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav {
        overflow: hidden;
        background-color: #333;
    }

    .topnav a {
        float: right;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        color: #4CAF50;
    }

    .topnav a.active {
        background-color: #4CAF50;
        color: white;
    }

    </style>
</head>

<body>
    <div class="topnav" id="myTopnav">
        <a href='logout.php' style='color:red; text-decoration:none'><i class="fas fa-sign-out-alt"></i>Đăng xuất</a>
        <a href="thongke.php" style="text-decoration:none"><i class="fas fa-chart-line"></i>Doanh thu</a>
        <a href="khachhang.php" style="text-decoration:none"><i class="fa fa-users"></i>Khách hàng</a>
        <a class="active" href="index.php" style="text-decoration:none"><i class="fa fa-home"></i>Trang chủ</a>
        <a style="color:white; float:left" style="text-decoration:none">Admin <i class="fa fa-user-circle"></i><b><?php echo $_SESSION['login_user']; ?></b></a>
    </div>
</body>
<script>
	$(function(){
    var current = location.pathname;
    $('.topnav a').each(function(){
        var $this = $(this);
        if($this.attr('href').indexOf(current) !== -1){
            $this.addClass('active');
        }
    });
});
</script>
</html>