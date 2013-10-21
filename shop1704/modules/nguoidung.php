 <?php
 	if(!isset($_SESSION['email'])) header('location:?mod=dangnhap');
 ?>
        	<h4 class="heading colr">My Account</h4>
            <div class="account">
              <div class="account_title">
            <h6 class="bold">Hello, <?php echo $_SESSION['name']?>!</h6>
                    <p>
                        From your My Account Dashboard you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.
                    </p>
                </div>
                <div class="clear"></div>
                <div class="acount_info">
                    <h6 class="heading bold colr">Account Information</h6>
                    <div class="big_sec left">
                        <div class="big_small_sec left">
                        	<div class="headng">
                                <h6 class="bold">Contact Information</h6>
                                <a href="?mod=nguoidung_capnhat" class="right bold">Edit</a>
                            </div>
                            <p class="bold"><?php echo $_SESSION['name']?></p>
                            <a href="#"><?php echo $_SESSION['email']?></a><br />
                            <a href="?mod=nguoidung_capnhat">Change Password</a>
                        </div>
                  <div class="clear"></div>
                        <div class="botm_big">&nbsp;</div>
                    </div>
                    <div class="clear"></div>
              </div>
                <h6 class="heading bold colr">Recent Orders</h6>
                <div class="account_table">
                	<ul class="headtable">
                    	<li class="order bold">Order</li>
                        <li class="date bold">Date</li>
                        <li class="ship bold">Ship to</li>
                        <li class="ordertotal bold">Order Total</li>
                        <li class="status bold last">Status</li>
                        <li class="action bold last">&nbsp;</li>
                    </ul>
                    <?php
						//Lay idNguoiDung tu email
						$email= $_SESSION['email'];
						
						//Cach dung 2 lenh sql
						/*$sql="select `idNguoiDung` from `nncms_nguoidung` where `email`='$email'";
						$rs=mysql_query($sql);
						$r=mysql_fetch_assoc($rs);
						$idNguoiDung=$r['idNguoiDung'];
						//echo $idNguoiDung;
						//Lay Cac don hang cua nguoi dung
						$sql='select * from `nncms_donhang` where `idNguoiDung`='.$idNguoiDung;*/
						
						//Cach dung 1 cau lenh sql
						$sql="SELECT a.* FROM `nncms_donhang` a, `nncms_nguoidung` b WHERE a.`idNguoiDung`=b.`idNguoiDung` AND  b.`email`='$email'";
						
						
						$rs=mysql_query($sql);
						while($r=mysql_fetch_assoc($rs))
						{
					?>
                    <ul class="contable">
                    	<li class="order"><?php echo $r['idDH'] ?></li>
                        <li class="date"><?php echo date('d/m/y H:i',strtotime($r['ThoiGianDat'])) ?></li>
                        <li class="ship"><?php echo $r['TenNguoiNhan'] ?></li>
                        <li class="ordertotal">
						<?php 
							//Tinh tong thanh tien cua don hang
							$sql='SELECT sum( `Gia` * `SoLuong` ) as `tongtien`
								FROM `nncms_donhangchitiet`
								WHERE `idDH` ='.$r['idDH'];
								$rs2=mysql_query($sql);
								$r2=mysql_fetch_assoc($rs2);
								echo number_format($r2['tongtien'],0,'.',',');
						?> VND</li>
                        <li class="status last"><?php
							$TinhTrang=array(-1=>'Đã hủy','Mới đặt','Đã xác nhận','Đang giao hàng','Đã giao hàng','Hoàn tất');
							
							/*if($r['TinhTrang']==0) echo 'Mới đặt'; 
							if($r['TinhTrang']==1) echo 'Đã xác nhận'; 
							if($r['TinhTrang']==2) echo 'Đang giao hàng'; 
							if($r['TinhTrang']==3) echo 'Đã giao hàng'; 
							if($r['TinhTrang']==4) echo 'Hoàn tất'; 
							*/
							echo $TinhTrang[$r['TinhTrang']];
						?></li>
                        <li class="action last">                        
                        <a style="border:none" href="?mod=nguoidung_donhang&idDH=<?php echo $r['idDH']?>">Xem</a>
                        <?php if($r['TinhTrang']==0)//Neu don hang moi dat
						{
						?>
                        	| <a onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng hay không')" href="?mod=nguoidung_donhang_huy&idDH=<?php echo $r['idDH'] ?>" class="first">Hủy</a>
                        <?php
						}
						?></li>
                    </ul>
                   <?php
						}
				   ?>
                </div>
            </div>