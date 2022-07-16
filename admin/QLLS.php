<?php
    include('./header.php');
    //include('../database/function.php');

    $key='';
    if(isset($_GET["tim"]) && !empty($_GET["tim"])) {
        $key = $_GET["tim"];
        $dataLS = timdlloai($key);

    } else {
        $dataLS = dsls();
        if (!empty($_GET['maloai'])) {
            if(xoaloai($_GET['maloai'])){
                // setcookie("alert","Xóa loại sách thành công!", time() + 1, "/");
                // setcookie("status", "success", time() + 1, "/");
                header('Location: '.$_SERVER['HTTP_REFERER']);
            }
        }
    }

?>

<div class="container-fluid">
    <br>
        <div class="title">Danh Mục Loại Sách</div>
        <hr>
        <b>Tổng cộng: <span class="text-primary"><?php echo count($dataLS)?></span></b> loại sách<br><br>
        <div class="row">
            <div class="col-md-3">
                <form class="d-flex">
                    <input class="form-control form-control-sm me-2" name="tim" value="<?php echo $key ?>" type="search" placeholder="Nhập từ khóa" aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col-md">
                <div class="d-flex justify-content-end">
                    <a href="../admin/addLS.php" class="btn btn-success"><i class="fas fa-plus"></i> Thêm</a>
                </div>
            </div>
        </div>
        <br>
        <table class="table table-bordered border-secondary table-hover">
        <thead>
            <tr style="text-align: center">
                <th scope="col">Mã loại sách</th>
                <th scope="col">Tên loại sách</th>
                <th scope="col">Thao tác</th>
            </tr>
            </thead>
            <tbody style="text-align: center">
                <?php if(!empty($dataLS)) {
                    foreach ($dataLS as $key => $value) { ?>
                        <tr>
                            <th scope="row"><?php echo $value['maloai']?></th>
                            <td><?php echo $value['loaisach'] ?></td>
                            <td>
                                <a href="../admin/editLS.php?maloai=<?php echo $value['maloai']?>" class="link-dark"><i class="fas fa-edit"></i></a>&nbsp;&nbsp;
                                <a href="?maloai=<?php echo $value['maloai']?>" class="link-dark"><i class="fas fa-trash"></i></a>
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