<?php
	if(!isset($_SESSION['email']))header('location:?mod=dangnhap');
	
	$idDH=$_GET['idDH'];
	//Lay tinh trang cua don hang
	$sql='select `TinhTrang` from `nncms_donhang` where `idDH`='.$idDH;
	$rs=mysql_query($sql);
	$r=mysql_fetch_assoc($rs);
	$TinhTrang=$r['TinhTrang'];
	
	//echo $TinhTrang;
	
	if(count($_POST)>0 && $TinhTrang==0)//Neu nguoi dung da submit form va Tinh trang don hang la Moi dat
	{
	$HoTen=$_POST['HoTen'];
	$DienThoai=$_POST['DienThoai'];
	$DiaChi=$_POST['DiaChi'];
	$NgayGiao=convertDate($_POST['NgayGiao']);
	
	$GhiChu=$_POST['GhiChu'];
	$Email=$_POST['Email'];//Email nguoi nhan hang

	//update data vao bang don hang
	
	$sql="update `nncms_donhang` set
	`TenNguoiNhan`='$HoTen',
	`DiaDiemGiao`='$DiaChi',
	`NgayGiaoHang`='$NgayGiao',
	`Email`='$Email',
	`DienThoai`='$DienThoai',
	`GhiChu`='$GhiChu'
	 where `idDH`=$idDH";
	 
	mysql_query($sql);
	
	//update so luong san pham trong don hang
	
	//Cập nhật lần lượt từng sản phẩm có trong đơn hàng
	
	$sql='SELECT `idSP` FROM `nncms_donhangchitiet`	WHERE `idDH` ='.$idDH;
	$rs=mysql_query($sql);
	while($r=mysql_fetch_assoc($rs))
	{
		$idSP=$r['idSP'];
		$SoLuong=max(1,round($_POST[$idSP]));
		$sql="update `nncms_donhangchitiet` set `SoLuong`=$SoLuong where `idSP`=$idSP AND `idDH`=$idDH";
		mysql_query($sql);
	}
	//Chuyen den trang nguoi dung
	echo '<script>alert("Đơn hàng đã được cập nhật thành công !");window.location="?mod=nguoidung";</script>';
	
	}
?>
	<form action="" method="post" id="thanhtoan" onsubmit="">
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
					$sql='SELECT `idSP` , `SoLuong` , `Gia`
						FROM `nncms_donhangchitiet`
						WHERE `idDH` ='.$idDH;
					$rs=mysql_query($sql);
					$dem=0;
					$sum=0;
					while($r=mysql_fetch_assoc($rs))
					{
						$k=$r['idSP'];
						$v=$r['SoLuong'];
						$Gia=$r['Gia'];
						$sum+=$Gia*$v;
						
						$dem++;
						$sql2='SELECT `TenSP` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `idSP` ='.$k;
						$rs2=mysql_query($sql2);
						$r2=mysql_fetch_assoc($rs2);
						
				?>
               
                <ul class="cartlist <?php if($dem%2==1) echo 'gray'?>">
                	<li class="remove txt"><?php echo $dem?></li>
                    <li class="thumb"><a href="detail.html"><img src="images/sanpham/<?php echo $r2['UrlHinh'] ?>" alt="" /></a></li>
                    <li class="title txt"><a href="detail.html"><?php echo $r2['TenSP'] ?></a></li>
                    <li class="price txt"><?php echo number_format($Gia,0,'.',',') ?></li>
                    <li class="qty"><input name="<?php echo $k ?>" value="<?php echo $v?>" /></li>
                    <li class="total txt"><?php echo number_format($Gia*$v,0,'.',',') ?></li>
                </ul>
               
                <?php
					}
				?> 
               
                <div class="clear"></div>
                <div class="subtotal">
                
               	  <h3 class="colr"><?php echo number_format($sum,0,'.',',') ?> VND</h3>
                </div>
                <div class="clear"></div>
              </div>
                <div class="clear"></div>
                
                    <!-- Phần hiển thị thông tin người nhận hàng -->  
              <script>
						var scwBaseYear        = scwDateNow.getFullYear();
						
						// How many years do want to be valid and to show in the drop-down list?
						
						var scwDropDownYears   = 2;
			  </script>
              <?php
					$sql='SELECT `ThoiGianDat` , `TenNguoiNhan` , `DiaDiemGiao` , `NgayGiaoHang` , `Email` , `DienThoai` , `GhiChu` , `TinhTrang`
					FROM `nncms_donhang`
					WHERE `idDH` ='.$idDH;
				$rs=mysql_query($sql);
				$r=mysql_fetch_assoc($rs);
			  ?>
               <h2 class="heading colr">THÔNG TIN NGƯỜI NHẬN HÀNG</h2>
<div class="registrd" style="background-image:none;float:left;border:none;height:300px; width:700px">
                        
                          <ul class="forms">
                   	    <li class="txt">Họ tên<span class="req">*</span></li>
                            <li class="inputfield"><input name="HoTen" type="text" class="bar" id="HoTen" value="<?php echo $r['TenNguoiNhan'] ?>" /></li>
                        </ul>
                         <ul class="forms">
                        	<li class="txt">Email<span class="req">*</span></li>
                            <li class="inputfield"><input name="Email" value="<?php echo $r['Email'] ?>" type="text" class="bar" id="Email" /></li>
                        </ul>                                        
                        <ul class="forms">
                        	<li class="txt">Điện thoại<span class="req">*</span></li>
                            <li class="inputfield"><input name="DienThoai" value="<?php echo $r['DienThoai'] ?>" type="text" class="bar" id="DienThoai" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Địa chỉ<span class="req">*</span></li>
                            <li class="inputfield">
                              <textarea name="DiaChi" class="bar" id="DiaChi"><?php echo $r['DiaDiemGiao'] ?></textarea>
                          </li>
                        </ul>
                         <ul class="forms">
                       	  <li class="txt">Ngày đặt<span class="req">*</span></li>
                            <li class="inputfield"><input name="NgayGiao" value="<?php echo date('d/m/Y H:i:s',strtotime($r['ThoiGianDat'])) ?>" type="text" class="bar" id="NgayGiao" disabled="disabled"/></li>
                        </ul>
                        <ul class="forms">
                       	  <li class="txt">Ngày giao<span class="req">*</span></li>
                            <li class="inputfield"><input name="NgayGiao" value="<?php echo date('d/m/Y',strtotime($r['NgayGiaoHang'])) ?>" type="text" class="bar" id="NgayGiao" onfocus="scwShow(this,event)" onclick="scwShow(this,event)" readonly="readonly" /></li>
                        </ul>
                        <ul class="forms">
                        	<li class="txt">Ghi chú<span class="req">*</span></li>
                            <li class="inputfield">
                              <textarea name="GhiChu" class="bar" id="GhiChu"><?php echo $r['GhiChu'] ?></textarea>
                          </li>
                        </ul>
                        
                       
                          <div class="clear"></div><br />

                    <a href="javascript:history.back()" class="simplebtn"><span>Quay lại</span></a>&nbsp;&nbsp;&nbsp;
                    <?php
						if($TinhTrang==0)
						{
					?>
                     <input type="submit" id="submit" style="width:0px;height:0px;border:none" />
                     <a href="javascript:document.getElementById('submit').click()" class="simplebtn"><span>Cập nhật</span></a>
                     <?php
						}
					 ?>
                    </div>
                     </form>