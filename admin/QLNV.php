<?php
    include('./header.php');
    //include('../database/function.php');

    $key='';
    if(isset($_GET["tim"]) && !empty($_GET["tim"])) {
        $key = $_GET["tim"];
        $dataNV = timdlnv($key);

    } else {
        $dataNV = dsNV();

        if (!empty($_GET['manv'])) {
            if(xoanv($_GET['manv'])){
                // setcookie("alert","Xóa nhân viên thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
        }
    }


?>

<div class="container-fluid">
    <br>
        <div class="title">Danh Mục Nhân Viên</div>
        <hr>
        <b>Tổng cộng: <span class="text-primary"><?php echo count($dataNV)?></span></b> nhân viên<br><br>
        <div class="row">
            <div class="col-md-3">
                <form class="d-flex">
                    <input class="form-control form-control-sm me-2" name="tim" value="<?php echo $key ?>" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col-md">
                <div class="d-flex justify-content-end">
                <a href="../admin/addNV.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered border-dark table-hover">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Mã nhân viên</th>
                <th scope="col">Tên nhân viên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
                <?php if(!empty($dataNV)) {
                    foreach ($dataNV as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value['manv']?></th>
                            <td><?php echo $value['tennv'] ?></td>
                            <td><?php echo $value['sdt'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['diachi'] ?></td>
                            <td>
                                <a href="../admin/editNV.php?manv=<?php echo $value['manv']?>" class="link-dark"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="?manv=<?php echo $value['manv']?>" class="link-dark"><i class="fas fa-trash"></i></a>
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