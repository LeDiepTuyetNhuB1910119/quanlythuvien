<?php
    include('./header.php');
    //include('../database/function.php');
    
    if (isset($_POST['loaisach'])) {
        $loaisach= $_POST['loaisach'];
        if(!timloai($loaisach)){
            if(themloai($loaisach)){
                // setcookie("alert","Thêm loại sách thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: ./QLLS.php');
            } else {
                // setcookie("alert","Thêm loại sách thất bại!", time() + 1, "/");
                // setcookie("status", "error", time() + 1, "/");
                header('Location: ./QLLS.php');
            }
        } else{
            // setcookie("alert","Loại sách đã tồn tại!", time() + 1, "/");
            // setcookie("status", "error", time() + 1, "/");
            header('Location: ./addLS.php');
        }
    }
?>

<div class="container-fluid">
    <br>
        <div class="title">Thêm Loại Sách</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-sm-offset-1">
                    <form  action="" method="post">
                        <div class="form-group row">
                            <label for="loaisach" class="col-sm-3 col-form-label">Tên loại sách:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputLoaiSach" name="loaisach">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/QLLS.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div>