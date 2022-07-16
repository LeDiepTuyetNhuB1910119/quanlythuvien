<?php
    include('./header.php');
    //include('../database/function.php');
    
    if (isset($_POST['tendg'])) {
        $tendg = $_POST['tendg'];
        $sdt = $_POST['sdt'];
        $email = $_POST['email'];
        $diachi = $_POST['diachi'];
        if(!timdg($tendg)){
            if(themdg($tendg, $sdt, $email, $diachi)){
                // setcookie("alert","Thêm độc giả thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: ./QLDG.php');
            } else {
                // setcookie("alert","Thêm độc giả thất bại!", time() + 1, "/");
                // setcookie("status", "error", time() + 1, "/");
                header('Location: ./QLDG.php');
            }
        } else{
            // setcookie("alert","Độc giả đã tồn tại!", time() + 1, "/");
            // setcookie("status", "error", time() + 1, "/");
            header('Location: ./addDG.php');
        }
    }
?>

<div class="container-fluid">
    <br>
        <div class="title">Thêm Độc Giả</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-sm-offset-1">
                    <form  action="" method="post">
                        <div class="form-group row">
                            <label for="tendg" class="col-sm-3 col-form-label">Tên độc giả:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputDocGia" name="tendg">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="sdt" class="col-sm-3 col-form-label">Số điện thoại:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control " id="inputsdtDocGia" name="sdt">
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
                                <input type="text" class="form-control" id="inputdiachiDocGia" name="diachi">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/qldg.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div><br>