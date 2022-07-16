<?php
    include('./header.php');
    //include('../database/function.php');
    
    if (isset($_POST['tennv'])) {
        echo "good";
        $tennv = $_POST['tennv'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        $matkhau = md5($_POST['matkhau']);
        if(!timnv($tennv)){
            if(themnv($tennv, $sdt, $email, $diachi, $matkhau)){
                header('Location: ./QLnv.php');
            } else {
                header('Location: ./QLnv.php');
            }
        } else{
            header('Location: ./addnv.php');
        }
    }
?>

<div class="container-fluid">
    <br>
        <div class="title">Thêm nhân viên</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-sm-offset-1">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="tennv" class="col-sm-3 col-form-label">Tên nhân viên:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputNhanVien" name="tennv">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="sdt" class="col-sm-3 col-form-label">Số điện thoại:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control " id="inputsdtNhanVien" name="sdt">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 col-form-label">Email:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="email">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="diachi" class="col-sm-3 col-form-label">Địa chỉ:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputdiachiNhanVien" name="diachi">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="matkhau" class="col-sm-3 col-form-label">Mật khẩu:</label>
                            <div class="col-sm">
                                <input type="password" class="form-control" id="exampleInputPassword1" name="matkhau">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/qlnv.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div><br>