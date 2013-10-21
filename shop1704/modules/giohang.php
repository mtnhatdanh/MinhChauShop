<?php
	//$cart=array(1=>2,5=>6,320=>3,13=>10,50=>2);
	$cart=$_SESSION['cart'];
?>
                <h2 class="heading colr">BedSheets</h2>
                <div class="shoppingcart">
            	<ul class="tablehead">
                	<li class="remove colr">Remove</li>
                    <li class="thumb colr">&nbsp;</li>
                    <li class="title colr">Product Name</li>
                    <li class="price colr">Unit Price</li>
                    <li class="qty colr">QTY</li>
                    <li class="total colr">Sub Total</li>
                </ul>
                <form action="?mod=giohang_xuly&act=4" method="post" id="giohang">
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
                	<li class="remove txt"><a onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này khỏi giỏ hàng hay không ?')" href="?mod=giohang_xuly&act=2&idSP=<?php echo $k ?>"><img src="images/delete.gif" alt="" /></a></li>
                    <li class="thumb"><a href="detail.html"><img src="images/sanpham/<?php echo $r['UrlHinh'] ?>" alt="" /></a></li>
                    <li class="title txt"><a href="detail.html"><?php echo $r['TenSP'] ?></a></li>
                    <li class="price txt"><?php echo number_format($r['Gia'],0,'.',',') ?></li>
                    <li class="qty"><input name="<?php echo $k ?>" type="text" value="<?php echo $v?>" /></li>
                    <li class="total txt"><?php echo number_format($r['Gia']*$v,0,'.',',') ?></li>
                </ul>
               
                <?php
					}
				?> 
                </form>
                <div class="clear"></div>
                <div class="subtotal">
                	<a href="?mod=sanpham" class="simplebtn"><span>Tiếp tục mua</span></a>
                    <a href="javascript:document.getElementById('giohang').submit()" class="simplebtn"><span>Cập nhật</span></a>
                    <a href="?mod=thanhtoan" class="simplebtn"><span>Thanh toán</span></a>
                	<h3 class="colr"><?php echo number_format($sum,0,'.',',') ?> VND</h3>
                </div>
                <div class="clear"></div>
              </div>
                <div class="clear"></div>