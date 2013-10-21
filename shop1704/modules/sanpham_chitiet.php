  <?php
		$idSP=$_GET['idSP'];
		$sql='SELECT `idSP` ,`idLoai`, `TenSP` , `Gia` , `MoTa` , `ChiTiet` , `UrlHinh` , `TonKho`
		FROM `nncms_sanpham`
		WHERE `idSP` ='.$idSP;
		$rs=mysql_query($sql);
		$r=mysql_fetch_assoc($rs);
			
		?>      	  
              <h4 class="heading colr"><?php echo $r['TenSP']?></h4>
        	  <div class="prod_detail">
        	    <div class="big_thumb">
        	      <div id="slider2">
                    <div class="contentdiv"> <img src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /> <a rel="example_group" href="images/sanpham/<?php echo $r['UrlHinh']?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a> </div>
                    <div class="contentdiv"> <img src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /> <a rel="example_group" href="images/sanpham/<?php echo $r['UrlHinh']?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a> </div>
                    <div class="contentdiv"> <img src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /> <a rel="example_group" href="images/sanpham/<?php echo $r['UrlHinh']?>" title="Lorem ipsum dolor sit amet, consectetuer adipiscing elit." class="zoom">&nbsp;</a> </div>
        	       
      	        </div>
        	      <a href="javascript:void(null)" class="prevsmall"><img src="images/prev.gif" alt="" /></a>
        	      <div style="float:left; width:189px !important; overflow:hidden;">
        	        <div class="anyClass" id="paginate-slider2">
        	          <ul>
        	            <li><a href="#" class="toc"><img src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /></a></li>
        	            <li><a href="#" class="toc"><img src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /></a></li>
                         <li><a href="#" class="toc"><img src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /></a></li>
      	            </ul>
      	          </div>
      	        </div>
        	      <a href="javascript:void(null)" class="nextsmall"><img src="images/next.gif" alt="" /></a>
        	      <script type="text/javascript" src="js/cont_slidr.js"></script>
      	      </div>
        	    <div class="desc">
        	      <div class="quickreview"> <a href="#" class="bold black left"><u>Be the first to review this product</u></a>
        	        <div class="clear"></div>
        	        <p class="avail"><span class="bold">Availability:</span><?php echo $r['TonKho']?></p>
        	        <h6 class="black">Quick Overview</h6>
        	        <p> <?php echo $r['MoTa']?> </p>
      	        </div>
        	      <div class="addtocart">
        	        <h4 class="left price colr bold"><?php echo $r['Gia']?></h4>
        	        <div class="clear"></div>
        	        <ul class="margn addicons">
        	          <li> <a href="#">Add to Wishlist</a> </li>
        	          <li> <a href="#">Add to Compare</a> </li>
      	          </ul>
        	        <div class="clear"></div>
        	        <ul class="left qt">
        	          <li class="bold qty">QTY</li>
        	          <li>
        	            <input name="qty" id="qty" type="text" class="bar" />
      	            </li>
        	          <li><a href="javascript:void(0)" onclick="window.location='?mod=giohang_xuly&act=3&idSP=<?php echo $idSP ?>&qty='+document.getElementById('qty').value" class="simplebtn"><span>Add To Cart</span></a></li>
      	          </ul>
      	        </div>
        	      <div class="clear"></div>
      	      </div>
        	    <div class="prod_desc">
        	      <h4 class="heading colr">Product Description</h4>
        	      <p> <?php echo $r['ChiTiet']?> </p>
      	      </div>
      	    </div>
        	  <div class="listing">
        	    <h4 class="heading colr">New Products for March 2010</h4>
        	    <ul>
                <?php
					$sql=' SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE `AnHien` =1 AND `idLoai`='.$r['idLoai'].' AND `idSP`!='.$idSP.'
						ORDER BY `idSP` DESC
						LIMIT 0 , 20 ';
					$rs4=mysql_query($sql);
					$dem=0;
					while($r=mysql_fetch_assoc($rs4))
					{
				?>
                	<li <?php $dem++; if($dem%4==0) echo 'class="last"'?>>
                    	<a href="sanpham_chitiet.php?idSP=<?php echo $r['idSP']?>" class="thumb"><img onerror='this.src="images/noimage.jpg"' src="images/sanpham/<?php echo $r['UrlHinh']?>" alt="" /></a>
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
        	  <div class="tags_big">
        	    <h4 class="heading">Product Tags</h4>
        	    <p>Add Your Tags:</p>
        	    <span>
        	      <input name="tags" type="text" class="bar" />
       	        </span>
        	    <div class="clear"></div>
        	    <span><a href="#" class="simplebtn"><span>Add Tags</span></a></span>
        	    <p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
      	    </div>
        	  <div class="clear"></div>