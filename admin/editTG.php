<?php
    include('./header.php');
    include('../database/config.php');
    // include('../database/function.php');

    $data = '';
    $matg = $_GET['matg'];
    if (!empty($matg)) {
        $data = tgtheomatg($matg);
        if(isset($_POST['tentg'])){
            suatg($_GET['matg'], $_POST['tentg']);
            // setcookie("alert","Sửa tác giả thành công!", time() + 1, "/");
            // setcookie("status", "success", time() + 1, "/");
            header('Location: ./QLTG.php');
        }
    }else {
        setcookie("alert","Sửa tác giả thất bại!", time() + 1, "/");
        header('Location: ./QLTG.php');
    }

    

?>

<div class="container-fluid">
    <br>
        <div class="title">Sửa Tác Giả</div>
        <hr>
            <div class="row justify-content-center" >
                <div class="col-sm-6 col-sm-offset-1">
                    <form  action="" method="post">
                            
                        <div class="form-group row">
                            <label for="matg" class="col-sm-4 col-form-label">Mã tác giả:</label>
                            <div class="col-sm">
                                <input type="text" name="matg" value="<?php echo $data['matg']?>" class="form-control" id="inputTacGia" aria-label="Disabled input example" disabled>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="tentg" class="col-sm-4 col-form-label">Tên tác giả:</label>
                            <div class="col-sm">
                                <input type="text" name="tentg" value="<?php echo tgtheomatg($data['matg'])['tentg']?>" class="form-control" id="inputTacGia">
                            </div>
                        </div>
                        <br>
                        <div class="cangiua">
                            <button type="submit" class="btn btn-success">Lưu</button>
                            <a href="../admin/qltg.php" class="btn btn-danger">Thoát</a>
                        </div>
                    </form>
                </div>
            </div>
