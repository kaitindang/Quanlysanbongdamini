<!--TRANG ĐĂNG NHẬP-->

<html>

<head>
    <title>Đăng nhập</title>
    <style type="text/css">
    .login-page {
        width: 380px;
        padding: 8% 0 0;
        margin: auto;
    }

    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }

    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }

    input {
        background: #f2f2f2;
    }

    .login {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #43A047;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }

    .login:hover,
    .login:active,
    .form login:focus {
        background: #088A29;
    }

    body {
        background: #76b852;
        /* fallback for old browsers */
        background: -webkit-linear-gradient(right, #76b852, #8DC26F);
        background: -moz-linear-gradient(right, #76b852, #8DC26F);
        background: -o-linear-gradient(right, #76b852, #8DC26F);
        background: linear-gradient(to left, #76b852, #8DC26F);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
    </style>
</head>

<body>
    <?php
	include("config.php");
	session_start();
	
	if (isset($_SESSION['login_user'])) {
		header("location:index.php");
		die();
	}
	
	$error="";
	if($_SERVER["REQUEST_METHOD"] == "POST") {
		$username = mysqli_real_escape_string($db,$_POST['username']);
		$password = mysqli_real_escape_string($db,$_POST['password']);
		
		$sql = "SELECT id FROM tai_khoan WHERE username='$username' AND password='$password'"; //kiem tra co trung username và password trong database
		$rs = mysqli_query($db, $sql);
		$count = mysqli_num_rows($rs);
		
		if ($count == 1) {
			$_SESSION['login_user'] = $username;
			header("location:index.php");
		} else {
			$error = "Username or Password is not correct!!!";
		}
		
	}
?>

    <div class="login-page">
        <div class="form">
            <form class="login-form" action="login.php" method="POST">
                <h2><b>Admin Login</b></h2>
                <input type="text" name="username" placeholder="username" />
                <input type="password" name="password" placeholder="password" />
                <input type="submit" class="login" value="Login">
				<p style="color:red"><?php echo $error; ?></p>
            </form>
        </div>
    </div>
</body>

</html>