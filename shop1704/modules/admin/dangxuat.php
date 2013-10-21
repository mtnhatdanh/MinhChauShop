<?php
//Huy session
unset($_SESSION['email']);
unset($_SESSION['name']);
//chuyen den trang dang nhap
header('location:?mod=dangnhap');
?>