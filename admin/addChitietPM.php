<?php
    include('./header.php');
    //include('../database/function.php');
    
    $mapm = $_GET['mapm'];
    if ( isset($_POST['masach'])) {
        $masach = $_POST['masach'];
        $soluong = $_POST['soluong'];

        if(themctpm($mapm, $masach, $soluong)){
            header('Location: ./ctpm.php?mapm=<?php echo $mapm?>');
        }

    }
    
?>

<div class="container-fluid">
    <br>
        <div class="title">Thêm Chi tiết Phiếu Mượn</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-8 col-sm-offset-1">
                    <form action="" method="post">
                            <div class="form-group row">
                                <label for="madg" class="col-sm-3 col-form-label">Mã phiếu mượn:</label>
                                <div class="col-sm">
                                    <input type="text" name="madg" value="<?php echo $mapm?>" class="form-control" id="inputDocGia" aria-label="Disabled input example" disabled>
                                </div>
                            </div>
                            <br>
                            <div class="form-group row">
                                <label for="tensach" class="col-sm-3 col-form-label">Tên sách:</label>
                                <div class="col-sm">
                                    <select id="ma_sach" class="form-control" name="masach">
                                        <option selected disabled>Chọn sách</option>
                                            <?php
                                                $sql = "SELECT * FROM `sach`";
                                                $result = $conn->query($sql);
                                                while ($row = $result->fetch_assoc())
                                                    echo '<option value="' . $row['masach'] . '">' . $row['tensach'] . '</option>';
                                            ?>
                                    </select>
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
                                <a href="../admin/ChitietPM.php?mapm=<?php echo $mapm?>" class="btn btn-danger">Thoát</a>
                            </div>
                    
                    </form>
                </div>
            </div><br>