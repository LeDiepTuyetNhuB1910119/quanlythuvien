<?php
  include('../database/config.php');
  include('../database/function.php');

  if (isset($_COOKIE['email'])) {
     $manv = $_COOKIE['manv'];
     $data = nvtheomanv($manv);
     $tennv = $data['tennv'];

  } else {
    header('Location: ../login.php');
  }

?> 

<!DOCTYPE html>
<html>
<head>
    <title>Thư viện Lemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="stylesheet" href="../icon/fontawesome-free-5.15.4-web/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script> -->

</head>
<body>
    <div class="container-fluid" style="font-size: 15px; background-color: rgb(135 206 255)">
      <div class="row">
        <div class="col-md-auto">
          <nav id="navbar-example3" class="navbar navbar-light flex-column align-items-stretch p-3">
            <a class="navbar-brand" href="index_admin.php">Lemon</a>
            <nav class="nav flex-column">
              <a class="nav-link active" aria-current="page" href="index_admin.php">Quản Lý Sách</b></a>
              <a class="nav-link" href="QLDG.php">Quản Lý Độc Giả</a>
              <a class="nav-link" href="QLNXB.php">Quản Lý Nhà Xuất Bản</a>
              <a class="nav-link" href="QLTG.php"> Quản Lý Tác Giả</a>
              <a class="nav-link" href="QLLS.php">Quản Lý Loại Sách</a>
              <a class="nav-link" href="QLPM.php">Quản Lý Phiếu Mượn</a>
              <?php if($_COOKIE['manv'] == 1):?>
                <a class="nav-link" href="QLNV.php">Quản Lý Nhân Viên</a>
              <?php endif; ?>
            </nav>
          </nav>
        </div>
        <div class="col-md bg-light">
          <div class="row">
            <div class="col" style="background-color: #e3f2fd;">
              <ul class="nav justify-content-end">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Tài khoản: <?php echo $tennv ?></a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="./logout.php">Đăng xuất</a></li>
                  </ul>
                </li>
              </ul>
            </div>
          
      



  
