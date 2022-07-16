<?php
    include('./header.php');

    $key='';
    if(isset($_GET["tim"]) && !empty($_GET["tim"])) {
        $key = $_GET["tim"];
        $dataS = timdlsach($key);

    } else {    
        $dataS = dss();

        if (!empty($_GET['masach'])) {
            if(xoasach($_GET['masach'])){
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
        }
    }

?>

<div class="container-fluid">
    <br>
        <div class="title">Danh Mục Sách</div>
        <hr>
        <b>Tổng cộng: <span class="text-primary"><?php echo count($dataS)?></span></b> đầu sách<br><br>
        <div class="row">
            <div class="col-md-3">
                <form class="d-flex">
                    <input class="form-control form-control-sm me-2" name="tim" value="<?php echo $key ?>" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col-md">
                <div class="d-flex justify-content-end">
                    <a href="../admin/addS.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered border-dark table-hover">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Mã sách</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Tác giả</th>
                <th scope="col">Thể loại</th>
                <th scope="col">Nhà xuất bản</th>
                <th scope="col">Số trang</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
                <?php if(!empty($dataS)) {
                    foreach ($dataS as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value['masach']?></th>
                            <td><?php echo $value['tensach'] ?></td>
                            <td><?php echo tgtheomatg($value['matg'])['tentg']?></td>
                            <td><?php echo loaitheomaloai($value['maloai'])['loaisach']?></td>
                            <td><?php echo nxbtheomanxb($value['manxb'])['nhaxuatban']?></td>
                            <td><?php echo $value['sotrang'] ?></td>
                            <td><?php echo $value['soluong'] ?></td>
                            <td>
                                <a href="../admin/editS.php?masach=<?php echo $value['masach']?>" class="link-dark"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="?masach=<?php echo $value['masach']?>" class="link-dark"><i class="fas fa-trash"></i></a>
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