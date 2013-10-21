<?php
			$idLoai=$_GET['idLoai'];
			$p=$_GET['page'];
			if($p=='')$p=1;
			$sort=$_GET['sort'];
			
			$ipp=40;
			//Tinh so trang
			$sql="SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `AnHien` =1 AND `idLoai`=$idLoai";
						
			$rs4=mysql_query($sql);
			$noi=mysql_num_rows($rs4);
			$nop=ceil($noi/$ipp);
			
			$p=min(max(0,$p),$nop);
			//$p=min($nop,$p);
			
		?>
          <h3 class="heading colr">DANH SÁCH SẢN PHẨM</h3>
 
           <div class="sorting">
            	<p class="left colr"><?php echo $noi?> Sản phẩm</p>
                <ul class="right">                
                    <li class="text">Page
                    <?php
						for($i=1;$i<=$nop;$i++)
						{
					?>
                      <a <?php if($i==$p) echo 'style="color:#F00!important;font-weight:bold"' ?> href="?mod=sanpham&idLoai=<?php echo $idLoai ?>&page=<?php echo $i?>&sort=<?php echo $sort ?>" class="colr"><?php echo $i?></a> 
                     <?php
					 	}
                     ?>
                        /<a <?php if(0==$p) echo 'style="color:#F00!important;font-weight:bold"' ?> href="?mod=sanpham&idLoai=<?php echo $idLoai ?>&page=0&sort=<?php echo $sort ?>" class="colr"> All</a> 
                    </li>
                </ul>
                <div class="clear"></div>
                <p class="left">View as: <a href="#" class="bold">Grid</a>&nbsp;<a href="#" class="colr">List</a></p>
                <ul class="right">
                	<li class="text">
                    	Sort by Position
                   	  <a href="<?php echo "?mod=sanpham&idLoai=$idLoai&page=$p&sort="; if($sort==4) echo '3';else echo '4'; ?>" class="colr">Tên SP 
						<?php 
							if($sort==4) echo  '<img src="images/s_asc.png" title="Sắp xếp tăng dần" />';
							if($sort==3) echo '<img src="images/s_desc.png" title="Sắp xếp giảm dần" />';
						?>
						</a>
                      <a href="<?php echo "?mod=sanpham&idLoai=$idLoai&page=$p&sort="; if($sort==2) echo '1';else echo '2'; ?>" class="colr">Giá SP 
                        <?php 
							if($sort==2) echo  '<img src="images/s_asc.png" title="Sắp xếp tăng dần"/>';
							if($sort==1) echo '<img src="images/s_desc.png" title="Sắp xếp giảm dần"/>';
						?>
                        </a> 
                    </li>
                </ul>
</div>
            <div class="clear"></div>
            <div class="listing">
                <ul>
                <?php
					
					$pos=($p-1)*$ipp;
					
					if($sort==1)
						$order=' ORDER BY `Gia` DESC ';
					elseif($sort==2)
						$order=' ORDER BY `Gia` ASC ';
					elseif($sort==3)
						$order=' ORDER BY `TenSP` DESC ';
					elseif($sort==4)
						$order=' ORDER BY `TenSP` ASC ';
						
					
					/*if($p>0)
						$sql="SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `AnHien` =1 AND `idLoai`=$idLoai
						$order
						LIMIT $pos,$ipp";
					else
						$sql="SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `AnHien` =1 AND `idLoai`=$idLoai
						$order
						";*/
						$sql="SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `AnHien` =1 AND `idLoai`=$idLoai
						$order";
						if($p>0)$sql=$sql." LIMIT $pos,$ipp";
						
						
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