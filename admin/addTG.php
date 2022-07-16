<?php
    include('./header.php');
    //include('../database/function.php');
    
    if (isset($_POST['tentg'])) {
        $tentg = $_POST['tentg'];
        if(!timtg($tentg)){
            if(themtg($tentg)){
                // setcookie("alert","Thêm tác giả thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: ./QLTG.php');
            } else {
                // setcookie("alert","Thêm tác giả thất bại!", time() + 1, "/");
                // setcookie("status", "error", time() + 1, "/");
                header('Location: ./QLTG.php');
            }
        } else{
            // setcookie("alert","Tác giả đã tồn tại!", time() + 1, "/");
            // setcookie("status", "error", time() + 1, "/");
            header('Location: ./addTG.php');
        }
    }
?>

<div class="container-fluid">
    <br>
        <div class="title">Thêm Tác Giả</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-sm-offset-1">
                    <form  action="" method="post">
                        <div class="form-group row">
                            <label for="tentg" class="col-sm-3 col-form-label">Tên tác giả:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputTacGia" name="tentg">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/qltg.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div>