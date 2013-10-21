        	<h2 class="heading colr">CÁC SẢN PHẨM ĐƯỢC QUAN TÂM NHIỀU NHẤT</h2>
            <div id="prod_scroller">
            <a href="javascript:void(null)" class="prev">&nbsp;</a>
       	  <div class="anyClass scrol">
                <ul>
                <?php
					$sql=' SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `AnHien` =1
						ORDER BY `SoLanXem` DESC
						LIMIT 0 , 8 ';
					$rs3=mysql_query($sql);
					while($r=mysql_fetch_assoc($rs3))
					{
				?>
                    <li>
                    	<a href="?mod=sanpham_chitiet&idSP=<?php echo $r['idSP']?>"><img src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /></a>
                      <h6 class="colr"><?php echo $r['TenSP']?></h6>
                        <p class="price bold"><?php echo number_format($r['Gia'],0,'.',',')?> VND</p>
                        <a href="?mod=giohang_xuly&act=1&idSP=<?php echo $r['idSP']?>" class="adcart">Add to Cart</a>
                  </li>
				<?php
					}
				?>
                </ul>
			</div>
            <a href="javascript:void(null)" class="next">&nbsp;</a>
        </div>
            <div class="clear"></div>
            <div class="listing">
            	<h4 class="heading colr">New Products for March 2010</h4>
                <ul>
                <?php
					$sql=' SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `AnHien` =1
						ORDER BY `idSP` DESC
						LIMIT 0 , 20 ';
					$rs4=mysql_query($sql);
					$dem=0;
					while($r=mysql_fetch_assoc($rs4))
					{
				?>
                	<li <?php $dem++; if($dem%4==0) echo 'class="last"'?>>
                    	<a href="?mod=sanpham_chitiet&idSP=<?php echo $r['idSP']?>" class="thumb"><img onerror='this.src="images/noimage.jpg"' src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /></a>
                        <h6 class="colr"><?php echo $r['TenSP']?></h6>
                        <div class="stars">
                        	<a href="#"><img src="images/star_green.gif" alt="" /></a>
                            <a href="#"><img src="images/star_green.gif" alt="" /></a>
                            <a href="#"><img src="images/star_green.gif" alt="" /></a>
                            <a href="#"><img src="images/star_green.gif" alt="" /></a>
                            <a href="#"><img src="images/star_grey.gif" alt="" /></a>
                            <a href="#">(3) Reviews</a>
                        </div>
                        <div class="addwish">
                        	<a href="#">Add to Wishlist</a>
                            <a href="#">Add to Compare</a>
                        </div>
                        <div class="cart_price">
                        	<a href="cart.html" class="adcart">Add to Cart</a>
                            <p class="price"><?php echo number_format($r['Gia']/1000000,2,'.',',')?>Tr</p>
                        </div>
                    </li>
                <?php
					}
				?>
                </ul>
            </div>