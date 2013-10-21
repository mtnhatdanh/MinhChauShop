<?php
	require_once("lb/connect.php");
	$mod = $_GET['mod'];
	if($mod=='') $mod = 'trangchu';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!-- InstanceBegin template="/Templates/template.dwt.php" codeOutsideHTMLIsLocked="false" -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Victoria Coffee</title>

  <meta name="author" content="Minh Giang">
  <meta name="viewport" content="width=device-width">

  <!-- CSS  -->
  <link rel="stylesheet" href="css/example.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
  <link href="style.css" rel="stylesheet" type="text/css" />

 
   <!-- SlidesJS Optional -->
  <style>
    body {
      -webkit-font-smoothing: antialiased;
      font: normal 15px/1.5 "Helvetica Neue", Helvetica, Arial, sans-serif;
      color: #232525;
      padding-top:0px;
    }

    #slides {
      display: none
    }

    #slides .slidesjs-navigation {
      margin-top:3px;
    }

    #slides .slidesjs-previous {
      margin-right: 5px;
      float: left;
    }

    #slides .slidesjs-next {
      margin-right: 5px;
      float: left;
    }

    .slidesjs-pagination {
      margin: 6px 0 0;
      float: right;
      list-style: none;
    }

    .slidesjs-pagination li {
      float: left;
      margin: 0 1px;
    }

    .slidesjs-pagination li a {
      display: block;
      width: 13px;
      height: 0;
      padding-top: 13px;
      background-image: url(img/pagination.png);
      background-position: 0 0;
      float: left;
      overflow: hidden;
    }

    .slidesjs-pagination li a.active,
    .slidesjs-pagination li a:hover.active {
      background-position: 0 -13px
    }

    .slidesjs-pagination li a:hover {
      background-position: 0 -26px
    }

    #slides a:link,
    #slides a:visited {
      color: #333
    }

    #slides a:hover,
    #slides a:active {
      color: #9e2020
    }

    .navbar {
      overflow: hidden
    }
  </style>
  <!-- End SlidesJS Optional-->

<!-- SlidesJS Required: These styles are required if you'd like a responsive slideshow -->
  <style>
    #slides {
      display: none
    }

    .container {
      margin: 0 auto
    }

    /* For tablets & smart phones */
    @media (max-width: 767px) {
      body {
        padding-left: 20px;
        padding-right: 20px;
      }
      .container {
        width: auto
      }
    }

    /* For smartphones */
    @media (max-width: 480px) {
      .container {
        width: auto
      }
    }

    /* For smaller displays like laptops */
    @media (min-width: 768px) and (max-width: 979px) {
      .container {
        width: 920px
      }
    }

    /* For larger displays */
    @media (min-width: 1200px) {
      .container {
        width: 920px
      }
    }
  </style>
  <!-- End SlidesJS Optional-->

  
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.slides.min.js"></script>
<script type="text/javascript" src="js/scrolltopcontrol.js"></script>


</head>

<body>

<div id="topbanner">
	<img src="images/topbanner.jpg" />
</div>
<div id="wrap">
<div id="header">
  <div class="container" style="margin-bottom:15px">
    <div id="slides">
      <img src="img/p1.jpg" alt="Victoria Coffee">
      <img src="img/p2.jpg" alt="Victoria Coffee">
      <img src="img/p3.jpg" alt="Victoria Coffee">
      <a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
      <a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
    </div>
  </div>
  

  <!-- SlidesJS Required: Initialize SlidesJS with a jQuery doc ready -->
  <script>
    $(function() {
      $('#slides').slidesjs({
        width: 900,
        height: 200,
        navigation: true,
        play: {
	        auto: true
        }
      });
    });
  </script>
  <!-- End SlidesJS Required -->
  
<div id="menu">
    <ul>
	    <li <?php if($mod == 'trangchu') echo 'class="active"';?>><a href="?mod=trangchu">Trang chủ</a></li>
	    <li><a href="#">Sự kiện</a></li>
	    <li><a href="#">Khuyến mãi</a></li>
	    <li><a href="#">Giới thiệu</a></li>
	    <li><a href="?mod=lienhe">Liên hệ</a></li>
    </ul>
</div>
<div id="content">
    <div id="maincontent">
	<?php 
    	include("modules/$mod.php");
	?>
	</div>
<div id="sidebar1">
<h2 class="subhead">Categories</h2>
<ul class="menu">
<?php
	$sql = "select `idLoai`,`tenloai` from `dmloai` where `anhien`='1'";
	$rs = mysql_query($sql);
	while ($r=mysql_fetch_assoc($rs))
	{
?>
        <li><a class="left_menu" onclick="loadAjax('<?php echo $r['idLoai'];?>')" href="javascript:{}"><?php echo($r['tenloai']);?></a></li>
<?php
 	}
?>
</ul>
<script>
	$(document).ready(function() {
		$('.left_menu').click(function(){
			$('.left_menu').removeClass('mnactive');
			$(this).addClass('mnactive');
		});	
	});
	function loadAjax(idLoai) {
		$.ajax({
			type: 'GET',
			url: 'modules/sanpham.php',
			data: {idLoai: idLoai},
			success: function(result) {
				$('#maincontent').html(result);
			}
		});
	}
</script>

<!--Facebook Like Button-->
<div id="facebookBt">
<iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2F115.78.130.245%2Fvictoriacoffee&amp;send=false&amp;layout=button_count&amp;width=450&amp;show_faces=true&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:21px;" allowTransparency="true"></iframe>
</div>


</div>
<div class="clear"></div>
</div>
<div id="footer">
&copy; Created by Minh Giang
<span class="credit">Mail to: <a href="mailto:mtnhatdanh@gmail.com">mtnhatdanh@gmail.com</a> </span>

</div>
</div>
</body>
<!-- InstanceEnd --></html>
