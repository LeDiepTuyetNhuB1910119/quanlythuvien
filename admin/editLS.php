<?php
    include('./header.php');
    include('../database/config.php');
    // include('../database/function.php');

    $data = '';
    $maloai = $_GET['maloai'];
    if (!empty($maloai)) {
        $data = loaitheomaloai($maloai);
        if(isset($_POST['loaisach'])){
            sualoai($_GET['maloai'], $_POST['loaisach']);
            // setcookie("alert","Sửa loại sách thành công!", time() + 1, "/");
            // setcookie("status", "success", time() + 1, "/");
            header('Location: ./QLLS.php');
        }
    }else {
        // setcookie("alert","Sửa loại sách thất bại!", time() + 1, "/");
        header('Location: ./QLLS.php');
    }

    

?>

<div class="container-fluid">
    <br>
        <div class="title">Sửa Loại Sách</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-6 col-sm-offset-1">
                    <form  action="" method="post">
                            
                        <div class="form-group row">
                            <label for="maloai" class="col-sm-4 col-form-label">Mã loại sách:</label>
                            <div class="col-sm">
                                <input type="text" name="maloai" value="<?php echo $data['maloai']?>" class="form-control" id="inputLoaiSach" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="loaisach" class="col-sm-4 col-form-label">Tên loại sách:</label>
                            <div class="col-sm">
                                <input type="text" name="loaisach" value="<?php echo loaitheomaloai($data['maloai'])['loaisach']?>" class="form-control" id="inputLoaiSach">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/qlls.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div>
