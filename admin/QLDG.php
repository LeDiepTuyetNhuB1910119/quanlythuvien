<?php
    include('./header.php');
    //include('../database/function.php');

    $key='';
    if(isset($_GET["tim"]) && !empty($_GET["tim"])) {
        $key = $_GET["tim"];
        $dataDG = timdldg($key);

    } else {
        $dataDG = dsdg();

        if (!empty($_GET['madg'])) {
            if(xoadg($_GET['madg'])){
                // setcookie("alert","Xóa độc giả thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
        }
    }

?>

<div class="container-fluid">
    <br>
        <div class="title">Danh Mục Độc Giả</div>
        <hr>
        <b>Tổng cộng: <span class="text-primary"><?php echo count($dataDG)?></span></b> độc giả<br><br>
        <div class="row">
            <div class="col-md-3">
                <form class="d-flex">
                    <input class="form-control form-control-sm me-2" name="tim" value="<?php echo $key ?>" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col-md">
                <div class="d-flex justify-content-end">
                    <a href="../admin/addDG.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered border-dark table-hover">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Mã độc giả</th>
                <th scope="col">Tên độc giả</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
                <?php if(!empty($dataDG)) {
                    foreach ($dataDG as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value['madg']?></th>
                            <td><?php echo $value['tendg'] ?></td>
                            <td><?php echo $value['sdt'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['diachi'] ?></td>
                            <td>
                                <a href="../admin/editDG.php?madg=<?php echo $value['madg']?>" class="link-dark"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="?madg=<?php echo $value['madg']?>" class="link-dark"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php }
                } else {
                    ?>
            </tbody>
        </table>
        <?php echo '<p class="text-danger text-center">Danh sách rỗng';}?>
    </div>
</div>