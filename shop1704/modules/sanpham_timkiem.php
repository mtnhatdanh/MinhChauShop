<?php
			//$kw=$_GET['kw'];
			
			//print_r($_POST);
			//$kw=$_POST['kw'];
			
			$kw=$_REQUEST['kw'];
			$idLoai=$_REQUEST['idLoai'];
			$Gia=$_REQUEST['Gia'];
			
			$gia1 = array(1=>'Dưới 1 triệu','1 triệu -> 5 triệu','5 triệu -> 10 triệu','10 triệu -> 15 triệu','Trên 15 triệu');
			$gia2 = array(1=>' AND `Gia` < 1000000',' AND (`Gia` between 1000000 and 5000000)',' AND (`Gia` between 5000000 and 10000000)',' AND (`Gia` between 10000000 and 15000000)',' AND (`Gia` > 15000000)');
			
			//Bien cho dieu kien where
			$dieukien="`AnHien` =1 AND `TenSP` like '%$kw%'";
			
			if($idLoai>0)//Có tìm theo loại SP
			$dieukien=$dieukien . " AND `idLoai`=$idLoai";
			
			if($Gia>0)$dieukien=$dieukien. $gia2[$Gia];
			
			/*
			if($Gia==1)//Có tìm theo giá
			$dieukien=$dieukien . " AND `Gia` < 1000000";
			
			if($Gia==2)//Có tìm theo giá
			$dieukien=$dieukien . " AND (`Gia` between 1000000 and 5000000)";
			
			if($Gia==3)//Có tìm theo giá
			$dieukien=$dieukien . " AND (`Gia` between 5000000 and 10000000)";
			
			if($Gia==4)//Có tìm theo giá
			$dieukien=$dieukien . " AND (`Gia` between 10000000 and 15000000)";
			
			if($Gia==5)//Có tìm theo giá
			$dieukien=$dieukien . " AND (`Gia` > 15000000)";
			*/
			
			$p=$_GET['page'];
			if($p=='')$p=1;
			$sort=$_GET['sort'];
			
			$ipp=40;
			//Tinh so trang
			$sql="SELECT `idSP` , `TenSP` , `Gia` , `UrlHinh`
						FROM `nncms_sanpham`
						WHERE $dieukien ";
						
			$rs4=mysql_query($sql);
			$noi=mysql_num_rows($rs4);
			$nop=ceil($noi/$ipp);
			
			$p=min(max(0,$p),$nop);
			//$p=min($nop,$p);
			
		?>
          <h3 class="heading colr">KẾT QUẢ TÌM KIẾM</h3>
          <form action="" method="post" id="timkiem">
          <table width="500" border="0" align="center">
  <tr>
    <td width="89" align="center">Từ khóa</td>
    <td width="401"><label>
      <input name="kw" type="text" id="kw" value="<?php echo $kw?>" size="40" />
      <a href="javascript:void()" onclick="$('.tim_nc').show()">Tìm nâng cao</a></label></td>
  </tr>
  <tr class="tim_nc" <?php if($Gia==0)echo 'style="display:none"'?>>
    <td align="center">Giá</td>
    <td><label>
      <select name="Gia" id="Gia">
        <option value="0">-- Chọn khoảng giá --</option>
        
        <?php
			
			foreach($gia1 as $k=>$v)
			{
		?>
        		<option <?php if($k==$Gia) echo 'selected'?> value="<?php echo $k?>"><?php echo $v?></option>
        <?php
			}
		?>
        
      </select>
    </label></td>
  </tr>
  <tr class="tim_nc" <?php if($idLoai==0)echo 'style="display:none"'?>>
    <td align="center">Loai</td>
    <td><label>
      <select name="idLoai" id="idLoai">
        <option value="0">-- Chọn loại sản phẩm --</option>
        <?php
			$sql='select `idLoai`,`TenLoai`,`TenCL` from `nncms_chungloai` a, `nncms_loaisp` b where a.idCL=b.idCL order by `TenCL`,`TenLoai` ';
			$rs=mysql_query($sql);
			while($r=mysql_fetch_assoc($rs))
			{
		?>
        		<option <?php if($r['idLoai']==$idLoai) echo 'selected'?> value="<?php echo $r['idLoai']?>"><?php echo $r['TenCL'],' - ',$r['TenLoai']?></option>
        <?php
			}
		?>
      </select>
    </label></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
      <input type="submit" name="submit" id="submit" value="Tìm" />
    </label></td>
  </tr>
</table>
</form>
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
						WHERE $dieukien
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