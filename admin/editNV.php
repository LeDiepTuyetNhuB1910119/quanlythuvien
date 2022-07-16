<?php
    include('./header.php');
    include('../database/config.php');
    // include('../database/function.php');

    $data = '';
    $manv = $_GET['manv'];
    if (!empty($manv)) {
        $data = nvtheomanv($manv);
        if(isset($_POST['tennv'])) {
            $tennv = $_POST['tennv'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            suanv($manv, $tennv, $sdt,  $diachi);
            header('Location: ./QLnv.php');
        }
    }else {
        header('Location: ./QLnv.php');
    }

    

?>

<div class="container-fluid">
    <br>
        <div class="title">Sửa Nhân Viên</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-6 col-sm-offset-1">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="manv" class="col-sm-4 col-form-label">Mã nhân viên:</label>
                            <div class="col-sm">
                                <input type="text" name="manv" value="<?php echo $data['manv']?>" class="form-control" id="inputNhanVien" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tennv" class="col-sm-4 col-form-label">Tên nhân viên :</label>
                            <div class="col-sm">
                                <input type="text" name="tennv" value="<?php echo nvtheomanv($data['manv'])['tennv']?>" class="form-control" id="inputNhanVien">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="sdt" class="col-sm-4 col-form-label">Số điện thoại:</label>
                            <div class="col-sm">
                                <input type="text" name="sdt" value="<?php echo nvtheomanv($data['manv'])['sdt']?>" class="form-control" id="inputsdtNhanVien">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="diachi" class="col-sm-4 col-form-label">Địa chỉ:</label>
                            <div class="col-sm">
                                <input type="text" name="diachi" value="<?php echo nvtheomanv($data['manv'])['diachi']?>" class="form-control" id="inputdiachiDocGia">
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
