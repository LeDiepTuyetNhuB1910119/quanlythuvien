<?php
    include('./header.php');
    include('../database/config.php');
    // include('../database/function.php');
    
    $mapm = $_GET['mapm'];
    $masach = $_GET['masach'];
    $data = ctpmtheomapmmasach($mapm, $masach);
    $soluong = ctpmtheomasach($masach)['soluong'];
    
    if (!empty($masach)) {
        if(isset($_POST['soluong'])){
            $soluong = $_POST['soluong'];
            if(suactpm($mapm, $masach, $soluong)) {
                header('Location: ./ctpm.php?mapm=<?php echo $mapm ?>');
            }
        }
    }

    

?>

<div class="container-fluid">
    <br>
        <div class="title">Sửa Chi Tiết Phiếu Mượn <?php echo $mapm ?></div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-6 col-sm-offset-1">
                    <form action="" method="post">
                            
                        <div class="form-group row">
                            <label for="mapm" class="col-sm-4 col-form-label">Mã phiếu mượn:</label>
                            <div class="col-sm">
                                <input type="text" name="mapm" value="<?php echo $mapm ?>" class="form-control" id="inputpm" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tensach" class="col-sm-4 col-form-label">Tên sách:</label>
                            <div class="col-sm">
                                <select id="ma_sach" class="form-control" name="masach" aria-label="Disabled input example" disabled>
                                    <option selected value="<?php echo $masach?>">
                                        <?php echo sachtheomasach($masach)['tensach'] ?>
                                    </option>
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
                            <label for="soluong" class="col-sm-4 col-form-label">Số lượng:</label>
                            <div class="col-sm">
                                <input type="text" class="form-control" id="inputsoluong" value ="<?php echo $soluong?>" name="soluong">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/ChitietPM.php?mapm=<?php echo $mapm?>" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div>
            <br>
