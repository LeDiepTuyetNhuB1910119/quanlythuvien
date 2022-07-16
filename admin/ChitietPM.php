<?php
    include('./header.php');
    //include('../database/function.php');

    $mapm = $_GET['mapm'];
    $dataCTPM = dsctpm($mapm);
    $sosachmuon = sosachmuon($mapm)['sosachmuon'];

        if (!empty($_GET['masach'])) {
            if(xoactpm($_GET['masach'])){
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
        }
?>

<div class="container-fluid">
    <br>
        <div class="title">Chi Tiết Phiếu Mượn Sách <?php echo $mapm?></div>
        <hr>
        
        <div class="row">
            <div class="col-md-4">
                    <b>Tổng cộng: <span class="text-primary"><?php echo count($dataCTPM)?></span></b> đầu sách, <b><span class="text-primary"><?php echo $sosachmuon?></span></b> quyển sách<br><br>
            </div>
            <div class="col-md">
                <div class="d-flex justify-content-end">
                    <a href="../admin/addChitietPM.php?mapm=<?php echo $mapm?>" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered border-secondary table-hover">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Mã sách</th>
                <th scope="col">Tên sách</th>
                <th scope="col">Số lượng</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
                <?php if(!empty($dataCTPM)) {
                    foreach ($dataCTPM as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value['masach']?></th>
                            <td><?php echo sachtheomasach($value['masach'])['tensach']?></td>
                            <td><?php echo $value['soluong']?></td>
                            <td>
                                <a href="../admin/editChiTietPM.php?mapm=<?php echo $mapm?>&masach=<?php echo $value['masach']?>" class="link-dark"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="?mapm=<?php echo $mapm?>&masach=<?php echo $value['masach']?>" class="link-dark"><i class="fas fa-trash"></i></a>
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