<?php
    include('./header.php');
    include('../database/config.php');
    // include('../database/function.php');

    $data = '';
    $masach = $_GET['masach'];
    if (!empty($masach)) {
        $data = sachtheomasach($masach);
        if(isset($_POST['tensach'])) {
            $tensach = $_POST['tensach'];
            $matg = $_POST['matg'];
            $maloai = $_POST['maloai'];
            $manxb = $_POST['manxb'];
            $sotrang = $_POST['sotrang'];
            $soluong = $_POST['soluong'];
            suasach($masach, $tensach, $matg, $maloai, $manxb, $sotrang, $soluong);
            // setcookie("alert","Sửa đầu sách thành công!", time() + 1, "/");
            // setcookie("status", "success", time() + 1, "/");
            header('Location: ./index_admin.php');
        }
    }else {
        setcookie("alert","Sửa đầu sách thất bại!", time() + 1, "/");
        header('Location: ./index_admin.php');
    }

    

?>

<div class="container-fluid">
    <br>
        <div class="title">Sửa Đầu Sách</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-6 col-sm-offset-1">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label for="matg" class="col-sm-4 col-form-label">Mã sách:</label>
                            <div class="col-sm">
                                <input type="text" name="masach" value="<?php echo $data['masach']?>" class="form-control" id="inputTacGia" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tensach" class="col-sm-4 col-form-label">Tên sách:</label>
                            <div class="col-sm">
                                <input type="text" name="tensach" value="<?php echo sachtheomasach($data['masach'])['tensach']?>" class="form-control" id="inputSach">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tacgia" class="col-sm-4 col-form-label">Tác giả:</label>
                            <div class="col-sm">
                                <select id="id_tacgia" class="form-control" name="matg">
                                    <option selected value="<?php echo $data['matg'] ?>">
                                        <?php echo tgtheomatg($data['matg'])['tentg'] ?>
                                    </option>
                                    <?php
                                        $sql = "SELECT * FROM `tacgia`";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc())
                                            echo '<option value="' . $row['matg'] . '">' . $row['tentg'] . '</option>';
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="loaisach" class="col-sm-4 col-form-label">Thể loại:</label>
                            <div class="col-sm">
                                <select id="id_theloai" class="form-control" name="maloai">
                                    <option selected value="<?php echo $data['maloai'] ?>">
                                        <?php echo loaitheomaloai($data['maloai'])['loaisach'] ?>
                                    </option>
                                    </option>
                                    <?php
                                        $sql = "SELECT * FROM `loaisach`";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc())
                                            echo '<option value="' . $row['maloai'] . '">' . $row['loaisach'] . '</option>';
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="nhaxuatban" class="col-sm-4 col-form-label">Nhà xuất bản:</label>
                            <div class="col-sm">
                                <select id="id_theloai" class="form-control" name="manxb">
                                    <option selected value="<?php echo $data['manxb'] ?>">
                                        <?php echo nxbtheomanxb($data['manxb'])['nhaxuatban'] ?>
                                    </option>
                                    <?php
                                        $sql = "SELECT * FROM `nhaxuatban`";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch_assoc())
                                            echo '<option value="' . $row['manxb'] . '">' . $row['nhaxuatban'] . '</option>';
                                    ?>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="sotrang" class="col-sm-4 col-form-label">Số trang:</label>
                            <div class="col-sm">
                                <input type="text" name="sotrang" value="<?php echo sachtheomasach($data['masach'])['sotrang']?>" class="form-control" id="inputsotrang" >
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="soluong" class="col-sm-4 col-form-label">Số lượng:</label>
                            <div class="col-sm">
                                <input type="text" name="soluong" value="<?php echo sachtheomasach($data['masach'])['soluong']?>" class="form-control" id="inputsoluong">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/index_admin.php" class="btn btn-danger">Thoát</a>
                        </div>
                        <br>
                    </form>
                </div>
            </div>
