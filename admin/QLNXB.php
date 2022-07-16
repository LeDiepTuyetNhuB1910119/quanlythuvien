<?php
    include('./header.php');
    //include('../database/function.php');

    $key='';
    if(isset($_GET["tim"]) && !empty($_GET["tim"])) {
        $key = $_GET["tim"];
        $dataNXB = timdlnxb($key);

    } else {
        $dataNXB = dsnxb();
        if (!empty($_GET['manxb'])) {
            if(xoanxb($_GET['manxb'])){
                // setcookie("alert","Xóa nhà xuất bản thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
        }
    }

?>

<div class="container-fluid">
    <br>
        <div class="title">Danh Mục Nhà Xuất Bản</div>
        <hr>
        <b>Tổng cộng: <span class="text-primary"><?php echo count($dataNXB)?></span></b> nhà xuất bản<br><br>
        <div class="row">
            <div class="col-md-3">
                <form class="d-flex">
                    <input class="form-control form-control-sm me-2" name="tim"value="<?php echo $key ?>" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col-md">
                <div class="d-flex justify-content-end">
                    <a href="../admin/addNXB.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered border-secondary table-hover">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Mã nhà xuất bản</th>
                <th scope="col">Tên nhà xuất bản</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
                <?php if(!empty($dataNXB)) {
                    foreach ($dataNXB as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value['manxb']?></th>
                            <td><?php echo $value['nhaxuatban'] ?></td>
                            <td>
                                <a href="../admin/editNXB.php?manxb=<?php echo $value['manxb']?>" class="link-dark"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="?manxb=<?php echo $value['manxb']?>" class="link-dark"><i class="fas fa-trash"></i></a>
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