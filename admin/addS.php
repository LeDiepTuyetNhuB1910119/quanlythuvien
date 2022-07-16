<?php
    include('./header.php');
    //include('../database/function.php');
    
    
    if (isset($_POST['tensach'])) {
        $tensach = $_POST['tensach'];
        $matg = $_POST['matg'];
        $maloai = $_POST['maloai'];
        $manxb = $_POST['manxb'];
        $sotrang = $_POST['sotrang'];
        $soluong = $_POST['soluong'];

        if(!timsach($tensach)) {
            if(themsach($tensach, $matg, $maloai, $manxb, $sotrang, $soluong)){
                // setcookie("alert","Thêm dầu sách thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: ./index_admin.php');
            } else {
                // setcookie("alert","Thêm đầu sách thất bại!", time() + 1, "/");
                // setcookie("status", "error", time() + 1, "/");
                header('Location: ./index_admin.php');
            } 

        } else {
            // setcookie("alert","Đầu sách đã tồn tại!", time() + 1, "/");
            // setcookie("status", "error", time() + 1, "/");
            header('Location: ./addS.php');
        }
    }
?>

<div class="container-fluid">
    <br>
        <div class="title">Thêm Đầu Sách</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-sm-offset-1">
                    <form  action="" method="post">
                        <div class="form-group row">
                            <label for="tensach" class="col-sm-3 col-form-label">Tên sách:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputtensach" name="tensach">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tacgia" class="col-sm-3 col-form-label">Tác giả:</label>
                            <div class="col-sm">
                                <select id="id_tacgia" class="form-control" name="matg">
                                    <option selected disabled>Chọn tác giả</option>
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
                            <label for="loaisach" class="col-sm-3 col-form-label">Thể loại:</label>
                            <div class="col-sm">
                                <select id="id_theloai" class="form-control" name="maloai">
                                    <option selected disabled>Chọn thể loại</option>
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
                            <label for="nhaxuatban" class="col-sm-3 col-form-label">Nhà xuất bản:</label>
                            <div class="col-sm">
                                <select id="id_theloai" class="form-control" name="manxb">
                                    <option selected disabled>Chọn nhà xuất bản</option>
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
                            <label for="sotrang" class="col-sm-3 col-form-label">Số trang:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputsotrang" name="sotrang">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="soluong" class="col-sm-3 col-form-label">Số lượng:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputsoluong" name="soluong">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/index_admin.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div><br>