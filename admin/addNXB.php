<?php
    include('./header.php');
    //include('../database/function.php');
    
    if (isset($_POST['nhaxuatban'])) {
        $nhaxuatban = $_POST['nhaxuatban'];
        if(!timnxb($nhaxuatban)){
            if(themnxb($nhaxuatban)){
                // setcookie("alert","Thêm nhà xuất bản thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: ./QLNXB.php');
            } else {
                // setcookie("alert","Thêm nhà xuất bản thất bại!", time() + 1, "/");
                // setcookie("status", "error", time() + 1, "/");
                header('Location: ./QLNXB.php');
            }
        } else{
            // setcookie("alert","Nhà xuất bản đã tồn tại!", time() + 1, "/");
            // setcookie("status", "error", time() + 1, "/");
            header('Location: ./addNXB.php');
        }
    }
?>

<div class="container-fluid">
    <br>
        <div class="title">Thêm Nhà Xuất Bản</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-sm-offset-1">
                    <form  action="" method="post">
                        <div class="form-group row">
                            <label for="nhaxuatban" class="col-sm-3 col-form-label">Tên nhà xuất bản:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputNXB" name="nhaxuatban">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/qlnxb.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div>