<!--TRANG DOANH THU-->
<!--Chức năng:
    - Xem doanh thu
    - In biểu đồ
-->
<head>
	<title>Doanh Thu</title>
</head>
<?php
	include("session.php");
	include("header/header3.php");
?>
<?php
    $connect = mysqli_connect("localhost", "root", "", "quanlysanbongmini"); //Kết nối database
    $date1 = date('Y-m-d'); //Lấy ngày giờ hiện tại
    $date2 = date('Y-m-d', strtotime($date1. ' - 1 days')); //-1 day
    $date3 = date('Y-m-d', strtotime($date1. ' - 2 days'));
    $date4 = date('Y-m-d', strtotime($date1. ' - 3 days'));
    $date5 = date('Y-m-d', strtotime($date1. ' - 4 days'));
    $date6 = date('Y-m-d', strtotime($date1. ' - 5 days'));
    $date7 = date('Y-m-d', strtotime($date1. ' - 6 days'));
    $query1 = "SELECT * FROM dat_san WHERE ngay_dat = '$date1'"; //Tìm kiếm theo ngày
    $query2 = "SELECT * FROM dat_san WHERE ngay_dat = '$date2'";
    $query3 = "SELECT * FROM dat_san WHERE ngay_dat = '$date3'";
    $query4 = "SELECT * FROM dat_san WHERE ngay_dat = '$date4'";
    $query5 = "SELECT * FROM dat_san WHERE ngay_dat = '$date5'";
    $query6 = "SELECT * FROM dat_san WHERE ngay_dat = '$date6'";
    $query7 = "SELECT * FROM dat_san WHERE ngay_dat = '$date7'";
    $result1 = mysqli_query($connect, $query1);
    $result2 = mysqli_query($connect, $query2);
    $result3 = mysqli_query($connect, $query3);
    $result4 = mysqli_query($connect, $query4);
    $result5 = mysqli_query($connect, $query5);
    $result6 = mysqli_query($connect, $query6);
    $result7 = mysqli_query($connect, $query7);

	$a1 = array(100);
    while($row = mysqli_fetch_array($result1))	
    {
    ?>
        <?php $a1[] .= $row["ngay_dat"]; ?>
    
    <?php
    }
	$a2 = array(100); 
    while($row = mysqli_fetch_array($result2))	
    {
    ?>
        <?php $a2[] .= $row["ngay_dat"]; ?>
    
    <?php
    }
	$a3 = array(100);  
	while($row = mysqli_fetch_array($result3))	
    {
    ?>
		<?php $a3[] .= $row["ngay_dat"]; ?>
	   
    <?php
    }
	$a4 = array(100);  
	while($row = mysqli_fetch_array($result4))	
    {
    ?>
        <?php $a4[] .= $row["ngay_dat"]; ?>
    
    <?php
    }
	$a5 = array(100);  
	while($row = mysqli_fetch_array($result5))	
    {
    ?>
        <?php $a5[] .= $row["ngay_dat"]; ?>
    
    <?php
    }
	$a6 = array(100);  
	while($row = mysqli_fetch_array($result6))	
    {
    ?>
        <?php $a6[] .= $row["ngay_dat"]; ?>
    
    <?php
    }
	$a7 = array(100);  
	while($row = mysqli_fetch_array($result7))	
    {
    ?>
        <?php $a7[] .= $row["ngay_dat"]; ?>
    
    <?php
    }
 ?>  
<html>
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>       <!--Dùng thư viện highcharts-->
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
</head>
<body>
	<br/>
	<br/>
	<h2 id="chart1" style="min-width: 310px; height: 500px; margin: 0 auto"></h2>
</body>
</html>
<script>
	$(function () {
    Highcharts.chart('chart1', {
        title: {
            text: 'Thống kê doanh thu',
        },
        xAxis: {
            categories: ['<?php echo $date7 ?>', '<?php echo $date6 ?>', '<?php echo $date5 ?>', 
			'<?php echo $date4 ?>', '<?php echo $date3 ?>', '<?php echo $date2 ?>', '<?php echo $date1 ?>']
        },
        yAxis: {
            title: {
                text: 'Doanh Thu (VND)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: 'K'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            data: [<?php echo (count($a7)-1)*300;?>,<?php echo (count($a6)-1)*300;?>,<?php echo (count($a5)-1)*300;?>, <?php echo (count($a4)-1)*300;?>, 
            <?php echo (count($a3)-1)*300;?>, <?php echo (count($a2)-1)*300;?>, <?php echo (count($a1)-1)*300;?>]
        }]
    });
});
</script>