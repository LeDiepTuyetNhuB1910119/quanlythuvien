<?php
    include('./header.php');
    //include('../database/function.php');

    $key='';
    if(isset($_GET["tim"]) && !empty($_GET["tim"])) {
        $key = $_GET["tim"];
        $dataPM = timdlpm($key);

    } else {
        $dataPM = dspm();

        if (!empty($_GET['mapm'])) {
            if(xoapm($_GET['mapm'])){
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
        }
    }

?>

<div class="container-fluid">
    <br>
        <div class="title">Danh Mục Phiếu Mượn Sách</div>
        <hr>
        <b>Tổng cộng: <span class="text-primary"><?php echo count($dataPM)?></span></b> phiếu mượn<br><br>
        <div class="row">
            <div class="col-md-3">
                <form class="d-flex">
                    <input class="form-control form-control-sm me-2" name="tim" value="<?php echo $key ?>" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col-md">
                <div class="d-flex justify-content-end">
                    <a href="../admin/addPM.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered border-secondary table-hover">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Mã phiếu mượn</th>
                <th scope="col">Người ghi nhận</th>
                <th scope="col">Tên độc giả</th>
                <th scope="col">Ngày mượn</th>
                <th scope="col">Ngày hẹn trả</th>
                <th scope="col">Ngày trả</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
                <?php if(!empty($dataPM)) {
                    foreach ($dataPM as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value['mapm']?></th>
                            <td><?php echo nvtheomanv($value['manv'])['tennv']?></td>
                            <td><?php echo dgtheomadg($value['madg'])['tendg']?></td>
                            <td><?php echo $value['ngaymuon']?></td>
                            <td><?php echo $value['ngayhentra']?></td>
                            <td><?php echo $value['ngaytra']?></td>
                            <td>
                                <a href="../admin/ChitietPM.php?mapm=<?php echo $value['mapm']?>" class="link-dark"><i class="fas fa-eye"></i></a>
                                <?php if(!$value['ngaytra']):?>
                                    &nbsp;&nbsp;<a href="../admin/editPM.php?mapm=<?php echo $value['mapm']?>" class="link-dark"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                    <a href="?mapm=<?php echo $value['mapm']?>" class="link-dark"><i class="fas fa-trash"></i></a>
                                <?php endif; ?>
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