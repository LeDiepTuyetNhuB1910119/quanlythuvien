<?php
    include('./header.php');
    include('../database/config.php');
    // include('../database/function.php');

    $data = '';
    $mapm = $_GET['mapm'];
    if (!empty($mapm)) {
        $data = pmtheomapm($mapm);
        if(isset($_POST['ngaytra'])) {
            $ngayhentra = $_POST['ngayhentra'];
            $ngaytra = $_POST['ngaytra'];
            suapm($mapm, $ngayhentra, $ngaytra);
            header('Location: ./qlpm.php');
        }
    }else {
        header('Location: ./qlpm.php');
    }

    

?>

<div class="container-fluid">
    <br>
        <div class="title">Sửa Phiếu Mượn</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-6 col-sm-offset-1">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="mapm" class="col-sm-4 col-form-label">Mã phiếu mượn:</label>
                            <div class="col-sm">
                                <input type="text" name="mapm" value="<?php echo $data['mapm']?>" class="form-control" id="inputTacGia" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tennv" class="col-sm-4 col-form-label">Người ghi nhận:</label>
                            <div class="col-sm">
                                <input type="text" name="tennv" value="<?php echo nvtheomanv($data['manv'])['tennv']?>" class="form-control" id="inputNhanVien" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tendg" class="col-sm-4 col-form-label">Tên độc giả:</label>
                            <div class="col-sm">
                                <input type="text" name="tendg" value="<?php echo dgtheomadg($data['madg'])['tendg']?>" class="form-control" id="inputDocGia" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="ngaymuon" class="col-sm-4 col-form-label">Ngày mượn:</label>
                            <div class="col-sm">
                                <input type="date" name="ngaymuon" value="<?php echo $data['ngaymuon']?>" class="form-control" id="inputNgayMuon" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="myDate2" class="col-sm-4 col-form-label">Ngày hẹn trả:</label>
                            <div class="col-sm">
                                <input type="date" name="ngayhentra" id="myDate2" class="form-control"
                                    min="2022-01-01" max="2025-12-31" value="<?php echo $data['ngayhentra']?>">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="myDate2" class="col-sm-4 col-form-label">Ngày trả:</label>
                            <div class="col-sm">
                                <input type="date" name="ngaytra" id="myDate2" class="form-control"
                                    min="2022-01-01" max="2025-12-31" value="<?php echo $data['ngaytra']?>">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/qlpm.php" class="btn btn-danger">Thoát</a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
