<!--TRANG CHỦ-->
<!--Hiển thị các chức năng: 
	- Xem tình trạng sân
	- Thêm, xóa sân bóng
	- Đặt sân
	- Xem ds khách hàng trong ngày
	- In hóa đơn
-->
<?php
	include("session.php");
	include("header/header.php");
?>
<?php
$connect = mysqli_connect("localhost", "root", "", "quanlysanbongmini"); //ket noi database
$query = "SELECT * FROM dat_san WHERE ngay_dat = CURDATE() ORDER BY id DESC"; //lay danh sach ngay hien tai trong database
$result = mysqli_query($connect, $query);
 ?>
<!DOCTYPE html>
<html>

<head>
    <title>Đặt sân</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="javascipt/sandadat.js"></script>
    <style type="text/css">
    .san1:hover {
        opacity: 0.8;
    }

    .san2:hover {
        opacity: 0.8;
    }

    .san3:hover {
        opacity: 0.8;
    }

    .san4:hover {
        opacity: 0.8;
    }

    .san5:hover {
        opacity: 0.8;
    }
    </style>
</head>

<body>
    <br />
    <br />
    <div class="container" style="width:1100px;">
        <h3 align="center"><b>TÌNH TRẠNG SÂN BÓNG</b></h3>
        <h4><b>Ngày: <span id="date1"></span></b></h4>
        <br />
        <div class="table-responsive">
            <table>
                <tr>
                    <th></th>
                    <th>7:00</th>
                    <th>8:00</th>
                    <th>9:00</th>
                    <th>10:00</th>
                    <th>11:00</th>
                    <th>12:00</th>
                    <th>13:00</th>
                    <th>14:00</th>
                    <th>15:00</th>
                    <th>16:00</th>
                    <th>17:00</th>
                    <th>18:00</th>
                    <th>19:00</th>
                    <th>20:00</th>
                    <th>21:00</th>
                </tr>
                <tr class="san1">
                    <th>Sân 1</th>
                    <td><button type="button" name="age" id="san17" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san18" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san19" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san110" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san111" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san112" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san113" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san114" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san115" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san116" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san117" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san118" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san119" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san120" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san121" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
					<td><button id="delete1" class="btn btn-danger">X</button></td>
                </tr>
                <tr class="san2">
                    <th>Sân 2</th>
                    <td><button type="button" name="age" id="san27" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san28" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san29" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san210" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san211" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san212" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san213" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san214" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san215" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san216" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san217" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san218" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san219" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san220" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san221" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
					<td><button id="delete2" class="btn btn-danger">X</button></td>
                </tr>
                <tr class="san3">
                    <th>Sân 3</th>
                    <td><button type="button" name="age" id="san37" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san38" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san39" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san310" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san311" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san312" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san313" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san314" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san315" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san316" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san317" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san318" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san319" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san320" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san321" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
					<td><button id="delete3" class="btn btn-danger">X</button></td>		
                </tr>
                <tr class="san4">
                    <th>Sân 4</th>
                    <td><button type="button" name="age" id="san47" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san48" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san49" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san410" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san411" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san412" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san413" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san414" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san415" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san416" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san417" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san418" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san419" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san420" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san421" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
					<td><button id="delete4" class="btn btn-danger">X</button></td>
                </tr>
                <tr class="san5">
                    <th>Sân 5</th>
                    <td><button type="button" name="age" id="san57" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san58" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san59" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san510" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san511" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san512" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san513" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san514" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san515" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san516" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san517" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san518" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san519" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san520" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san521" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
					<td><button id="delete5" class="btn btn-danger">X</button></td>		
                </tr>
				<tr class="san6">
                    <th>Sân 6</th>
                    <td><button type="button" name="age" id="san67" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san68" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san69" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san610" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san611" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san612" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san613" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san614" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san615" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san616" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san617" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san618" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san619" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san620" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
                    <td><button type="button" name="age" id="san621" data-toggle="modal" data-target="#add_data_Modal"
                            class="btn btn-success btn-lg">Add</button></td>
					<td><button id="delete6" class="btn btn-danger">X</button></td>		
                </tr>
            </table>
			<p><button id="add" class="btn btn-success">+</button></p>
            <br />
            <h4><b>Danh sách khách hàng ngày: <span id="date3"></span></b></h4>
            <br />
            <div id="employee_table">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Khách hàng</th>
                        <th width="30%">Điện thoại</th>
                        <th width="20%">Thành tiền</th>
                        <th width="10%">Chi tiết</th>
                        <th width="10%">Hóa đơn</th>
                    </tr>
                    <?php
				while($row = mysqli_fetch_array($result))
				{
				?>
                    <tr>
                        <td><?php echo $row["ten_kh"]; ?></td>
                        <td><?php echo $row["sdt"]; ?></td>
                        <td>300.000</td>
                        <td><input type="button" name="view" value="Xem" id="<?php echo $row["id"]; ?>"
                                class="btn btn-info btn-xs view_data" /></td>
                        <td><a href="inhoadon.php?pid=<?php echo $row["id"]; ?>" target="_blank"
                                class="btn btn-primary btn-xs">In hóa đơn</a></td>
                    </tr>
                    <?php
		  		}
		  		?>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
<div id="dataModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Chi tiết khách hàng</h4>
            </div>
            <div class="modal-body" id="employee_detail"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<div id="add_data_Modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"><b>Nhập thông tin khách hàng</b></h4>
            </div>
            <div class="modal-body">
                <form method="post" id="insert_form">
                    <label>Sân số</label>
                    <select name="masan" id="masan" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                    <label>Khách hàng</label>
                    <input type="text" name="name" id="name" class="form-control" />
                    <br />
                    <label>Số điện thoại</label>
                    <input name="phone" id="phone" class="form-control">
                    </input>
                    <br />
                    <label>Giờ bắt đầu</label>
                    <select name="start" id="start" class="form-control">
                        <option value="7:00">7:00</option>
                        <option value="8:00">8:00</option>
                        <option value="9:00">9:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                    </select>
                    <label>Giờ kết thúc</label>
                    <select name="end" id="end" class="form-control">
                        <option value="8:00">8:00</option>
                        <option value="9:00">9:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        <option value="19:00">19:00</option>
                        <option value="20:00">20:00</option>
                        <option value="21:00">21:00</option>
                    </select>
                    <br />
                    <label>Ngày đặt:<span id="date2"></span></label>
                    <br />
                    <input type="hidden" name="employee_id" id="employee_id" />
                    <input type="submit" name="insert" id="insert" value="Xác nhận" class="btn btn-success" />
                    <!-- nut dat san-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                <!-- nut dong-->
            </div>
        </div>
    </div>
</div>
<script>
//Xu ly insert khach hang vao database
$(document).ready(function() {
    
    //Them khach hang(dat san)
    $('#insert_form').on("submit", function(event) {
        event.preventDefault();
        if ($('#name').val() == "") {
            alert("Vui lòng nhập tên khách hàng");
        } else if ($('#phone').val() == '') {
            alert("Vui lòng nhập số điện thoại");
        } else {
            $.ajax({
                url: "insert.php",
                method: "POST",
                data: $('#insert_form')
            .serialize(), //Mã hóa các giá trị này thành giá trị chuỗi, giá trị sẽ được hiển thị theo các cặp
                beforeSend: function() {
                    $('#insert').val("Thêm");
                },
                success: function(data) {
                    $('#insert_form')[0].reset();
                    $('#add_data_Modal').modal('hide');
                    $('#employee_table').html(data);
                }
            });
        }
    });
    //Xu ly lay danh sach khach hang theo id tu database hien thi ra button view
    $(document).on('click', '.view_data', function() {
        var employee_id = $(this).attr("id"); //attr la lay id de gui qua file select.php xu ly
        $.ajax({
            url: "select.php",
            method: "POST",
            data: {
                employee_id: employee_id
            },
            success: function(data) {
                $('#employee_detail').html(data);
                $('#dataModal').modal('show');
            }
        });
    });
});
</script>
<script>
// Lấy ngày giờ hiện tại
var today = new Date();
var date = today.getDate() + '-' + (today.getMonth() + 1) + '-' + today.getFullYear();
document.getElementById("date1").innerText = date;
document.getElementById("date2").innerText = date;
document.getElementById("date3").innerText = date;
</script>
<script>
    $(document).ready(function(){
        $("#delete1").click(function(){
            $(".san1").toggle('slow');
        });
		
		$("#delete2").click(function(){
            $(".san2").toggle('slow');
        });
		
		$("#delete3").click(function(){
            $(".san3").toggle('slow');
        });
		
		$("#delete3").click(function(){
            $(".san3").toggle('slow');
        });
		
		$("#delete4").click(function(){
            $(".san4").toggle('slow');
        });
		
		$("#delete5").click(function(){
            $(".san5").toggle('slow');
        });
		
		$("#delete6").click(function(){
            $(".san6").toggle('slow');
        });	
    })
</script>
<script>
    $(document).ready(function(){
        
        $(".san6").hide();
        $("#add").click(function(){
            $(".san6").show('slow');
        })
    })
</script>