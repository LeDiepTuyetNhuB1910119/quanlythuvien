<?php
    include('./header.php');
    include('../database/config.php');
    // include('../database/function.php');

    $data = '';
    $madg = $_GET['madg'];
    if (!empty($madg)) {
        $data = dgtheomadg($madg);
        if(isset($_POST['tendg'])){
            suadg($_GET['madg'], $_POST['tendg'], $_POST['sdt'], $_POST['email'], $_POST['diachi']);
            // setcookie("alert","Sửa độc giả thành công!", time() + 1, "/");
            // setcookie("status", "success", time() + 1, "/");
            header('Location: ./QLdg.php');
        }
    }else {
        // setcookie("alert","Sửa độc giả thất bại!", time() + 1, "/");
        header('Location: ./QLdg.php');
    }

    

?>

<div class="container-fluid">
    <br>
        <div class="title">Sửa Độc Giả</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-6 col-sm-offset-1">
                    <form  action="" method="post">
                            
                        <div class="form-group row">
                            <label for="madg" class="col-sm-4 col-form-label">Mã độc giả:</label>
                            <div class="col-sm">
                                <input type="text" name="madg" value="<?php echo $data['madg']?>" class="form-control" id="inputDocGia" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tendg" class="col-sm-4 col-form-label">Tên độc giả:</label>
                            <div class="col-sm">
                                <input type="text" name="tendg" value="<?php echo dgtheomadg($data['madg'])['tendg']?>" class="form-control" id="inputDocGia">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="sdt" class="col-sm-4 col-form-label">Số điện thoại:</label>
                            <div class="col-sm">
                                <input type="text" name="sdt" value="<?php echo dgtheomadg($data['madg'])['sdt']?>" class="form-control" id="inputsdtDocGia">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="exampleFormControlInput1" class="col-sm-4 col-form-label">Email:</label>
                            <div class="col-sm">
                                <input type="text" name="email" value="<?php echo dgtheomadg($data['madg'])['email']?>" class="form-control" id="inputemailDocGia">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="diachi" class="col-sm-4 col-form-label">Địa chỉ:</label>
                            <div class="col-sm">
                                <input type="text" name="diachi" value="<?php echo dgtheomadg($data['madg'])['diachi']?>" class="form-control" id="inputdiachiDocGia">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/qldg.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div>
            <br>
