<?php
    include('./header.php');
    include('../database/config.php');
    // include('../database/function.php');

    $data = '';
    $manxb = $_GET['manxb'];
    if (!empty($manxb)) {
        $data = nxbtheomanxb($manxb);
        if(isset($_POST['nhaxuatban'])){
            suanxb($_GET['manxb'], $_POST['nhaxuatban']);
            // setcookie("alert","Sửa nhà xuất bản thành công!", time() + 1, "/");
            // setcookie("status", "success", time() + 1, "/");
            header('Location: ./QLNXB.php');
        }
    }else {
        // setcookie("alert","Sửa nhà xuất bản thất bại!", time() + 1, "/");
        header('Location: ./index_admin.php');
    }
?>

<div class="container-fluid">
    <br>
        <div class="title">Sửa Nhà Xuất Bản</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-6 col-sm-offset-1">
                    <form  action="" method="post">
                        <div class="form-group row">
                            <label for="manxb" class="col-sm-4 col-form-label">Mã nhà xuất bản:</label>
                            <div class="col-sm">
                                <input type="text" name="manxb" value="<?php echo $data['manxb']?>" class="form-control" id="inputNXB" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tennxb" class="col-sm-4 col-form-label">Tên nhà xuất bản:</label>
                            <div class="col-sm">
                                <input type="text" name="nhaxuatban" value="<?php echo nxbtheomanxb($data['manxb'])['nhaxuatban']?>" class="form-control" id="inputNXB">
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
