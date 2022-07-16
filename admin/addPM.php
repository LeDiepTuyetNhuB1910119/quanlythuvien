<?php
    include('./header.php');
    //include('../database/function.php');
    
    if ( isset($_POST['madg'])) {
        $manv = $_POST['manv'];
        $madg = $_POST['madg'];
        $ngaymuon = $_POST['ngaymuon'];
        $ngayhentra = $_POST['ngayhentra'];

        if(thempm($madg, $ngaymuon, $ngayhentra, $manv)){
            header('Location: ./qlpm.php');
        }

    }
    
?>

<div class="container-fluid">
    <br>
        <div class="title">Thêm Phiếu Mượn</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-sm-offset-1">
                    <form action="" method="post">
                        <div class="form-group row">
                                <label for="tennv" class="col-sm-3 col-form-label">Người ghi nhận:</label>
                                <div class="col-sm">
                                    <select id="ma_nv" class="form-control" name="manv">
                                        <option selected disabled>Chọn nhân viên</option>
                                            <?php
                                                $sql = "SELECT * FROM `nhanvien`";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc())
                                                    echo '<option value="' . $row['manv'] . '">' . $row['tennv'] . '</option>';
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="tendg" class="col-sm-3 col-form-label">Tên độc giả:</label>
                                <div class="col-sm">
                                    <select id="ma_dg" class="form-control" name="madg">
                                        <option selected disabled>Chọn độc giả</option>
                                            <?php
                                                $sql = "SELECT * FROM `docgia`";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc())
                                                    echo '<option value="' . $row['madg'] . '">' . $row['tendg'] . '</option>';
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="myDate2" class="col-sm-3 col-form-label">Ngày mượn:</label>
                                <div class="col-sm">
                                    <input type="date" name="ngaymuon" id="myDate2" class="form-control"
                                        min="2022-01-01" max="2025-12-31" value="">
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="myDate2" class="col-sm-3 col-form-label">Ngày hẹn trả:</label>
                                <div class="col-sm">
                                    <input type="date" name="ngayhentra" id="myDate2" class="form-control"
                                        min="2022-01-01" max="2025-12-31" value="">
                                </div>
                            </div>
                            <br>
                            <div class="cangiua">
                                <button type="submit" class="btn btn-success">Lưu</button>
                                <a href="../admin/qlpm.php" class="btn btn-danger">Thoát</a>
                            </div>
                    
                    </form>
                </div>
            </div><br>