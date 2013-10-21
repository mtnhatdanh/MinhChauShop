<?php
	require('libs/mysql.php');
	include('libs/functions.php');
	session_start();
	ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<!-- // Stylesheets // -->
<link rel="stylesheet" href="
<?php $theme=$_COOKIE['shop_theme'];$css='css/style_'.$theme.'.css'; if(file_exists($css)) echo $css; else echo 'css/style.css'; ?>
" type="text/css" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/default.advanced.css" type="text/css" />
<link rel="stylesheet" href="css/contentslider.css" type="text/css"  />
<link rel="stylesheet" href="css/jquery.fancybox-1.3.1.css" type="text/css" media="screen" />
<!-- // Javascript // -->
<!--<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.min14.js"></script>-->
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.1.2.js"></script>
<script type="text/javascript" src="js/jcarousellite_1.0.1.js"></script>
<script type="text/javascript" src="js/scroll.js"></script>
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript" src="js/acordn.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/Times_New_Roman_400.font.js"></script>
<script type="text/javascript" src="js/cufon.js"></script>
<script type="text/javascript" src="js/contentslider.js"></script>
<script type="text/javascript" src="js/jquery.fancybox-1.3.1.js"></script>
<script type="text/javascript" src="js/lightbox.js"></script>
<script type="text/javascript" src="js/scw.js"></script>
<script type="text/javascript" src="js/functions.js"></script>
</head>

<body>
<a name="top"></a>
<div id="wrapper_sec">
	<!-- Header -->
	<div id="masthead">
    	<div class="secnd_navi">
        	<ul class="links">
            	<li><?php
					if(isset($_SESSION['email']))//Neu chua dang nhap
						echo 'Xin chào '.$_SESSION['name'];				
				?></li>
                <li><a href="<?php if(isset($_SESSION['email'])) echo '?mod=nguoidung';else echo '?mod=nguoidung_dangky' ?>">My Account</a>
                </li>
                <li><a href="#">My Wishlist</a></li>
                <li><a href="?mod=giohang">Giỏ hàng</a></li>
                <li><a href="?mod=thanhtoan">Thanh toán</a></li>
                <li class="last">
                <?php
					if(!isset($_SESSION['email']))//Neu chua dang nhap
						echo '<a href="?mod=dangnhap">Đăng nhập</a>';
					else
						echo '<a href="?mod=dangxuat">Đăng xuất</a>';
				?>
                </li>
            </ul>
            <ul class="network">
            	<li>Share with us:</li>
                <li><a href="#"><img src="images/linkdin.gif" alt="" /></a></li>
                <li><a href="#"><img src="images/rss.gif" alt="" /></a></li>
                <li><a href="#"><img src="images/twitter.gif" alt="" /></a></li>
                <li><a href="#"><img src="images/facebook.gif" alt="" /></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    	<div class="logo">
        	<a href="index.html"><img src="images/logo.png" alt="" /></a>
            <h5 class="slogn">The best watches for all</h5>
        </div>
        <!--<form action="?mod=sanpham_timkiem" method="post">
        <ul class="search">
        	<li><input type="text" id="searchBox" name="kw" placeholder="Nhập từ khóa"  class="bar" /></li>
            <li><input type="submit" id="timkiem" style="border:none;width:0px;height:0px" /><a href="javascript:document.getElementById('timkiem').click()" class="searchbtn">Search for Products</a></li>
        </ul>
        </form>-->
        <ul class="search">
        	<li><input onkeypress="if(event.keyCode==13)window.location='?mod=sanpham_timkiem&kw='+this.value" type="text" id="kw" name="kw" placeholder="Nhập từ khóa"  class="bar" /></li>
            <li><a href="javascript:window.location='?mod=sanpham_timkiem&kw='+$('#kw').val()" class="searchbtn">Search for Products</a></li>
        </ul>
        <div class="clear"></div>
        <div class="navigation">
            <ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
                <li><a href="index.php">Trang chủ</a></li>
                <li><a href="static.html">Giới thiệu</a></li>
                <li class="dir"><a href="#">Sản phẩm</a>
                    <ul class="bordergr big">
                    <?php
						$sql='SELECT `idCL` , `TenCL`
						FROM `nncms_chungloai`
						WHERE `AnHien` =1
						ORDER BY `ThuTu` ASC';
						$rs=mysql_query($sql);
						while($r=mysql_fetch_assoc($rs))
						{
					?>
                        <li class="dir" style="height:200px;"><span class="colr navihead bold"><?php echo $r['TenCL']?></span>
                            <ul>
                            	<?php
								//$idLoai=$r['idCL'];
								$sql2='SELECT `idLoai` , `TenLoai`
								FROM `nncms_loaisp`
								WHERE `idCL` ='.$r['idCL'].'
								AND `AnHien` =1
								ORDER BY `ThuTu` ASC';
								$rs2=mysql_query($sql2);
								while($r2=mysql_fetch_assoc($rs2))
								{
                                ?>
                                	<li><a href="?mod=sanpham&idLoai=<?php echo $r2['idLoai'] ?>"><?php echo $r2['TenLoai']?></a></li>
                                <?php
								}
								?>
                            </ul>
                        </li>
                    <?php
						}
					?>
                    </ul>
                </li>
                <li><a href="login.html">BedSheets</a></li>
                <li class="dir"><a href="#">Pages</a>
                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Pages</span>
                            <ul>
                                <li class="clear"><a href="index.html">Home Page</a></li>
                                <li class="clear"><a href="account.html">Account Page</a></li>
                                <li class="clear"><a href="cart.html">Shopping Cart Page</a></li>
                                <li class="clear"><a href="categories.html">Categories</a></li>
                                <li class="clear"><a href="detail.html">Product Detail Page</a></li>
                                <li class="clear"><a href="listing.html">Listing Page</a></li>
                                <li class="clear"><a href="login.html">Login Page</a></li>
                                <li class="clear"><a href="static.html">Static Page</a></li>
                                <li class="clear"><a href="contact.html">Contact Page</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="contact.html">Contact</a></li>
                <li class="dir"><a href="#">Themes</a>
                    <ul class="bordergr small">
                        <li class="dir"><span class="colr navihead bold">Themes</span>
                            <ul>
                                <li class="clear"><a href="?mod=giaodien&theme=1">Blue</a></li>
                                <li class="clear"><a href="?mod=giaodien&theme=2">Green</a></li>
                                <li class="clear"><a href="?mod=giaodien&theme=3">Orange</a></li>
                                <li class="clear"><a href="?mod=giaodien&theme=4">Purple</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="lang">
            <!--<div id="google_translate_element"></div>  
                 
            <script>
			function googleTranslateElementInit()
			{
            new google.translate.TranslateElement({pageLanguage: 'vi',layout: google.translate.TranslateElement.InlineLayout.SIMPLE},'google_translate_element');
			}
            </script>
			 <script src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>    
-->
            </ul>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <!-- Banner Section -->
	<!--<div id="banner">
    	<div id="slider4" class="nivoSlider">
			<a href="detail.html"><img src="images/banner1.jpg" alt="" /></a>
			<a href="detail.html"><img src="images/banner2.jpg" alt="" /></a>
            <a href="detail.html"><img src="images/banner3.jpg" alt="" /></a>
            <a href="detail.html"><img src="images/banner4.jpg" alt="" /></a>
		</div>
        <script type="text/javascript" src="js/jquery.nivo.slider.pack.js"></script>
		<script type="text/javascript" src="js/nivo.js"></script>
    </div>
    <div class="clear"></div>-->
    <!-- Scroolling Products -->
    <div class="content_sec">
    	<!-- Column2 Section -->
        <div class="col2">
        	<div class="col2_top">&nbsp;</div>
            <div class="col2_center">
            <?php
				$mod=$_GET['mod'];
				if($mod=='')$mod='trangchu';
				include("modules/$mod.php");
			?>
            </div>
            <div class="clear"></div>
            <div class="col2_botm">&nbsp;</div>
        </div>
        <!-- Column1 Section -->
    	<div class="col1">
        	<!-- Categories -->
                <div class="category">
                	<div class="col1center">
                    <div class="small_heading">
                        <h5>Categories</h5>
                    </div>
                    <div class="glossymenu">
                    <?php
					    $sql='SELECT `idCL` , `TenCL`
						FROM `nncms_chungloai`
						WHERE `AnHien` =1
						ORDER BY `ThuTu` ASC';
						$rs=mysql_query($sql);
						while($r=mysql_fetch_assoc($rs))
						{
					?>
                        <a class="menuitem submenuheader" href="#" ><?php echo $r['TenCL'] ?></a>
                        <div class="submenu">
                            <ul>
                            <?php
								//$idLoai=$r['idCL'];
								$sql2='SELECT `idLoai` , `TenLoai`
								FROM `nncms_loaisp`
								WHERE `idCL` ='.$r['idCL'].'
								AND `AnHien` =1
								ORDER BY `ThuTu` ASC';
								$rs2=mysql_query($sql2);
								while($r2=mysql_fetch_assoc($rs2))
								{
                                ?>
                                	<li><a href="javascript:callAjax('response.php?mod=sanpham&idLoai=<?php echo $r2['idLoai'] ?>','.col2_center')"><?php echo $r2['TenLoai']?></a></li>
								<?php
                                }
                                ?>
                            
                            </ul>
                        </div>
                      <?php
						}
					  ?>
                        
                        
                      </div>
                    </div>
                    <div class="clear"></div>
                    <div class="left_botm">&nbsp;</div>
                </div>
                <!-- My Cart Products -->
                <?php 
					$cart=$_SESSION['cart'];
				?>
                <div class="mycart">
                	<div class="col1center">
                    <div class="small_heading">
                        <h5>My Cart</h5>
                        <div class="clear"></div>
                        <span class="veiwitems">(<?php echo count($cart)?>) Sản phẩm - <a href="?mod=giohang" class="colr">Chi tiết</a></span>
                    </div>
                    <ul>
                    <?php				
						$sum=0;
						if(count($cart)>0)foreach($cart as $k=>$v)
						{
							$sql='select `TenSP`,`Gia` from `nncms_sanpham` where `idSP`='.$k;
							$rs=mysql_query($sql);
							$r=mysql_fetch_assoc($rs);
							$sum+=$r['Gia']*$v;
					?>
                        <li>
                            <p class="bold title">
                                <a href="detail.html"><?php echo $r['TenSP']?></a>
                            </p>
                            <div class="grey">
                                <p class="left">QTY: <span class="bold"><?php echo $v?></span></p>
                                <p class="right">Price: <span class="bold"><?php echo number_format($r['Gia'],0,'.',',')?></span></p>
                            </div>
                        </li>
                     <?php
					 	}
					 ?>
                    </ul>
                    <p class="right bold sub">Tổng tiền: <?php echo number_format($sum,0,'.',',')?> VND</p>
                    <div class="clear"></div>
                    <a href="?mod=thanhtoan" class="simplebtn right"><span>Thanh toán</span></a>
                    </div>
                    <div class="clear"></div>
                    <div class="left_botm">&nbsp;</div>
                </div>
               
                <div class="poll">
                <div class="col1center">
            	<div class="small_heading">
            		<h5>Poll</h5>
                </div>
                 <?php
					$sql='SELECT `id` , `content`
					FROM `nncms_binhchon_cauhoi`
					WHERE `active`=1
					ORDER BY `n_order` ASC';
					$rs=mysql_query($sql);
					while($r=mysql_fetch_assoc($rs))
					{
				?>
                
                <p><?php echo $r['content']?></p>
                <form action="?mod=binhchon_xuly" method="post" id="binhchon">
                <ul>
                	<?php
						$idPoll=$r['id'];
						$sql2="SELECT `id` , `content`
						FROM `nncms_binhchon_luachon`
						WHERE `id_poll` =$idPoll
						ORDER BY `n_order` ASC";
						$rs2=mysql_query($sql2);
						while($r2=mysql_fetch_assoc($rs2))
						{
					?>
                			<li><input name="luachon" type="radio" value="<?php echo $r2['id'] ?>" /> <?php echo $r2['content'] ?></li>
                    <?php
						}
					?>
                </ul>
                <!--<input name="submit" type="submit" value="Vote" />-->
                </form>
               <a href="javascript:document.getElementById('binhchon').submit()" class="simplebtn"><span>Vote</span></a>
               <div class="clear"></div>
				<?php
					}
                ?> 
                </div>
                <div class="clear"></div>
                    <div class="left_botm">&nbsp;</div>
            </div>
            	
              <div class="poll">
               <div class="col1center">
            	<div class="small_heading">
            		<h5>Poll</h5>
                </div>
                
                 <?php
				 	$timeout=1;//Thời gian timeout 30 phút
					$id=session_id();
					$user=$_SESSION['email'];
					
					//Xóa những người dùng đã hết timeout
					$sql='delete from `online` where unix_timestamp()-`lastvisit`>'.($timeout*60);
					mysql_query($sql);
					
					//Chèn ngườin dùng vào CSDL
					$sql="replace into `online` set `id`='$id',`lastvisit`=unix_timestamp(),`user`='$user'";					
					mysql_query($sql);
					
					//Đếm số người đang truy cập
					$sql='select count(*) from `online`';
					$rs=mysql_query($sql);
					$r=mysql_fetch_row($rs);
					$users=$r[0];
					
					$sql="select count(*) from `online` where `user`!=''";
					$rs=mysql_query($sql);
					$r=mysql_fetch_row($rs);
					$members=$r[0];
					$members=str_pad($members,8,'0',STR_PAD_LEFT);//Dem them cao so 0 vao dau cho du 8 chu so
					$n=strlen($members);
					for($i=0;$i<$n;$i++)
					{
						$digit=substr($members,$i,1);
						$members_img=$members_img.'<img align="absmiddle" src="images/digit/'.$digit.'.png" width="12" height="16" />';
					}
					
					//Đếm số lượt truy cập
					$sql='update `counter` set `cnt`=`cnt`+1';
					mysql_query($sql);
					
					$sql='select `cnt` from `counter`';
					$rs=mysql_query($sql);
					$r=mysql_fetch_row($rs);
					$visits=$r[0];
					$visits=str_pad($visits,8,'0',STR_PAD_LEFT);//Dem them cao so 0 vao dau cho du 8 chu so
					$n=strlen($visits);
					for($i=0;$i<$n;$i++)
					{
						$digit=substr($visits,$i,1);
						$visits_img=$visits_img.'<img align="absmiddle" src="images/digit/'.$digit.'.png" width="12" height="16" />';
					}
					
				?>
                
                Số người đang online: <img src="images/digit/<?php echo $users?>.png" width="12" height="16" /> <br />
                Số thành viên: <?php echo $members_img?><br />
                Số khách: <?php echo $users-$members?><br />
                Số lượt truy cập: <?php echo $visits_img?>
                
                
               
                
                </div>
                <div class="clear"></div>
                    <div class="left_botm">&nbsp;</div>
            </div>  
                
            <div class="clear"></div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!-- Footer Section -->
	<div id="footer">
    	<div class="foot_inr">
        <div class="foot_top">
        	<div class="foot_logo">
            	<a href="#"><img src="images/footer_logo.png" alt="" /></a>
            </div>
            <div class="botm_navi">
            	<ul>
                	<li><a href="#">Home page</a></li>
                    <li><a href="#">Who we are</a></li>
                    <li><a href="#">Formoda news &amp; blog</a></li>
                    <li><a href="#">Follow us on Twitter</a></li>
                    <li><a href="#">Befriend us on Facebook</a></li>
                </ul>
                <ul>
                	<li><a href="#">Shipping &amp; Returns</a></li>
                    <li><a href="#">Secure Shopping</a></li>
                    <li><a href="#">International Shipping</a></li>
                    <li><a href="#">Affiliates</a></li>
                    <li><a href="#">Group Sales</a></li>
                </ul>
                <ul>
                	<li><a href="#">Sign In</a></li>
                    <li><a href="#">View Cart</a></li>
                    <li><a href="#">Wish List</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
                <ul>
                	<li>Contact us</li>
                    <li>T: 01230 012312</li>
                    <li>E: <a href="mailto:info@abc.com">info@abc.com</a></li>
                    <li><a href="#">Site map</a></li>
                    <li><a href="#">Terms of use &amp; privacy</a></li>
                </ul>
            </div>
        </div>
        <div class="foot_bot">
        	<div class="emailsignup">
        	<h5>Join Our Mailing List</h5>
            <ul class="inp">
            	<li><input name="newsletter" type="text" class="bar" /></li>
                <li><a href="#" class="signup">Signup</a></li>
            </ul>
            <div class="clear"></div>
        </div>
            <div class="botm_links">
            	<ul>
                	<li class="first"><a href="#">Home</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Privacy</a></li>
                </ul>
                <div class="clear"></div>
                <p>© 2010 DUMY. All Rights Reserved</p>
            </div>
            <div class="copyrights">
        	<p>
            	Registered address: County House, 1 New Road, BTQ5 8LZ. Company No. 6172469<br />
Office address: NewTrends Ltd, The Byre, Berry Pomeroy, Devon, TQ9 6LH
            </p>
        </div>
        <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <div class="topdiv">
        	<a href="#top" class="top">Top</a>
        </div>
        </div>
    </div>
</body>
</html>
