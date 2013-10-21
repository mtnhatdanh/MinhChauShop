<?php
	if(!isset($_SESSION['email']))header('location:?mod=dangnhap');
	
	$cart=$_SESSION['cart'];
	$email=$_SESSION['email'];//email nguoi dat hang
	
	//print_r($_POST);
	
	if(count($_POST)>0)//Neu nguoi dung da submit form
	{
	$HoTen=$_POST['HoTen'];
	$DienThoai=$_POST['DienThoai'];
	$DiaChi=$_POST['DiaChi'];
	$NgayGiao=convertDate($_POST['NgayGiao']);
	
	$GhiChu=$_POST['GhiChu'];
	$Email=$_POST['Email'];//Email nguoi nhan hang
	
	//Lay idNguoiDung tu $email
	$sql="select `idNguoiDung` from `nncms_nguoidung` where `email`='$email'";
	$rs=mysql_query($sql);
	$r=mysql_fetch_assoc($rs);
	$idNguoiDung=$r['idNguoiDung'];
	
	
	//Insert data vao bang don hang
	
	$sql="insert into `nncms_donhang` values('NULL','$idNguoiDung',now(),'$HoTen','$DiaChi','$NgayGiao','$Email','$DienThoai','$GhiChu','0')";
	mysql_query($sql);
	
	//Insert data vao bang don hang chi tiet
	$idDH=mysql_insert_id();
	foreach($cart as $k=>$v)
	{
		//Lay gia san pham
		$sql='select `Gia` from `nncms_sanpham` where `idSP`='.$k;
		$rs=mysql_query($sql);
		$r=mysql_fetch_assoc($rs);
		$Gia=$r['Gia'];
		//Insert 1 san pham vao bang don hang chi tiet
		$sql="insert into `nncms_donhangchitiet` values('$idDH','$k','$v','$Gia')";
		mysql_query($sql);
	}
	//Xoa giỏ hàng
	unset($_SESSION['cart']);
	//Chuyen den trang nguoi dung
	echo '<script>alert("Bạn đã đặt hàng thành công !");window.location="?mod=nguoidung";</script>';
	
	}
?>
                <h2 class="heading colr">THÔNG TIN CHI TIẾT ĐƠN HÀNG</h2>
                <div class="shoppingcart">
            	<ul class="tablehead">
                	<li class="remove colr">No</li>
                    <li class="thumb colr">&nbsp;</li>
                    <li class="title colr">Product Name</li>
                    <li class="price colr">Unit Price</li>
                    <li class="qty colr">QTY</li>
                    <li class="total colr">Sub Total</li>
                </ul>
             
                <?php
					$dem=0;
					$sum=0;
					if(count($cart)>0)foreach($cart as $k=>$v)
					{
						$dem++;
						$sql='SELECT `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `idSP` ='.$k;
						$rs=mysql_query($sql);
						$r=mysql_fetch_assoc($rs);
						$sum+=$r['Gia']*$v;
				?>
               
                <ul class="cartlist <?php if($dem%2==1) echo 'gray'?>">
                	<li class="remove txt"><?php echo $dem?></li>
                    <li class="thumb"><a href="detail.html"><img src="images/sanpham/<?php echo $r['UrlHinh'] ?>" alt="" /></a></li>
                    <li class="title txt"><a href="detail.html"><?php echo $r['TenSP'] ?></a></li>
                    <li class="price txt"><?php echo number_format($r['Gia'],0,'.',',') ?></li>
                    <li class="qty txt"><?php echo $v?></li>
                    <li class="total txt"><?php echo number_format($r['Gia']*$v,0,'.',',') ?></li>
                </ul>
               
                <?php
					}
				?> 
               
                <div class="clear"></div>
                <div class="subtotal">
                	<a href="?mod=giohang" class="simplebtn"><span>Cập nhật đơn hàng</span></a>
               	  <h3 class="colr"><?php echo number_format($sum,0,'.',',') ?> VND</h3>
                </div>
                <div class="clear"></div>
              </div>
                <div class="clear"></div>
                
              <!-- Phần hiển thị thông tin người mua hàng -->  
              <?php
			  	
				$sql="SELECT `HoTen` , `DienThoai` , `DiaChi` , `NgaySinh` , `GioiTinh`
				FROM `nncms_nguoidung`
				WHERE `Email` = '$email'";
				$rs=mysql_query($sql);
				$r=mysql_fetch_assoc($rs);
			  ?>
               <h2 class="heading colr">THÔNG TIN NGƯỜI MUA HÀNG</h2>
<div class="registrd" style="background-image:none;float:left;border:none;height:150px">                
                          <ul class="forms">
                   	    <li class="txt">Họ tên<span class="req">*</span></li>
                            <li class="inputfield"><input name="HoTen" type="text" disabled="disabled" class="bar" id="HoTen2" value="<?php echo $r['HoTen'] ?>" /></li>
                        </ul>
                          <ul class="forms">
                       	  <li class="txt">Ngày sinh<span class="req">*</span></li>
                            <li class="inputfield"><input name="NgaySinh" type="text" disabled="disabled" class="bar" id="NgaySinh2" onfocus="scwShow(this,event)" onclick="scwShow(this,event)"  value="<?php echo date('d/m/Y',strtotime($r['NgaySinh'])) ?>" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Điện thoại<span class="req">*</span></li>
                            <li class="inputfield"><input name="DienThoai" type="text" disabled="disabled" class="bar" id="DienThoai2" value="<?php echo $r['DienThoai'] ?>" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Địa chỉ<span class="req">*</span></li>
                            <li class="inputfield">
                              <textarea name="DiaChi" disabled="disabled" class="bar" id="DiaChi2"><?php echo $r['DiaChi'] ?></textarea>
                            </li>
                        </ul>
                    </div>
                     <div class="clear"></div>
                    <!-- Phần hiển thị thông tin người nhận hàng -->  
              <script>
						var scwBaseYear        = scwDateNow.getFullYear();
						
						// How many years do want to be valid and to show in the drop-down list?
						
						var scwDropDownYears   = 2;
			  </script>
              <?php
			  	$email=$_SESSION['email'];
				$sql="SELECT `HoTen` , `DienThoai` , `DiaChi` , `NgaySinh` , `GioiTinh`
				FROM `nncms_nguoidung`
				WHERE `Email` = '$email'";
				$rs=mysql_query($sql);
				$r=mysql_fetch_assoc($rs);
			  ?>
               <h2 class="heading colr">THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<div class="registrd" style="background-image:none;float:left;border:none;height:270px; width:700px">
                        <form action="" method="post" id="thanhtoan" onsubmit="alert('validate data')">
                          <ul class="forms">
                   	    <li class="txt">Họ tên<span class="req">*</span></li>
                            <li class="inputfield"><input name="HoTen" type="text" class="bar" id="HoTen" /> <a href="javascript:copyInfo()">Giống với người mua hàng</a></li>
                        </ul>
                         <ul class="forms">
                        	<li class="txt">Email<span class="req">*</span></li>
                            <li class="inputfield"><input name="Email" type="text" class="bar" id="Email" /></li>
                        </ul>                                        
                        <ul class="forms">
                        	<li class="txt">Điện thoại<span class="req">*</span></li>
                            <li class="inputfield"><input name="DienThoai" type="text" class="bar" id="DienThoai" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Địa chỉ<span class="req">*</span></li>
                            <li class="inputfield">
                              <textarea name="DiaChi" class="bar" id="DiaChi"></textarea>
                          </li>
                        </ul>
                        <ul class="forms">
                       	  <li class="txt">Ngày giao<span class="req">*</span></li>
                            <li class="inputfield"><input name="NgayGiao" type="text" class="bar" id="NgayGiao" onfocus="scwShow(this,event)" onclick="scwShow(this,event)" readonly="readonly" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Ghi chú<span class="req">*</span></li>
                            <li class="inputfield">
                              <textarea name="GhiChu" class="bar" id="GhiChu"></textarea>
                          </li>
                        </ul>
                        <input type="submit" id="submit" style="width:0px;height:0px;border:none" />
                        </form>
                          <div class="clear"></div><br />

                    <a href="javascript:document.getElementById('submit').click()" class="simplebtn"><span>Thanh toán</span></a>&nbsp;&nbsp;&nbsp;
                     <a href="javascript:document.getElementById('thanhtoan').reset()" class="simplebtn"><span>Nhập lại</span></a>
                    </div>
                    <script>
						function copyInfo()
						{
							document.getElementById('HoTen').value=document.getElementById('HoTen2').value;
							$('#DienThoai').val($('#DienThoai2').val());
							$('#DiaChi').val($('#DiaChi2').val());
							$('#Email').val('<?php echo $email ?>');
						}
					</script>
                    