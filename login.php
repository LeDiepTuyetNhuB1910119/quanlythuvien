<!-- <?php
    require('./database/function.php');
    require('./database/config.php');
    
    if(!empty($_POST['email']) && !empty($_POST['matkhau']) ) {
        $email = $_POST['email'];
        $matkhau = md5($_POST['matkhau']);

        $sql_login = "SELECT * FROM nhanvien 
                    WHERE email = '$email'
                    AND matkhau = '$matkhau'";

        $result_login = $conn->query($sql_login);

        if($result_login->num_rows >0){
            while($row = $result_login->fetch_assoc()){
                $manv = $row['manv'];
            }
            setcookie('email', $email, 0, '/');
            setcookie('manv', $manv, 0, '/');
            header('Location: ./admin/index_admin.php');

        }else{
            setcookie('thongbao_login_admin', 'Bạn đã nhập sai tài khoản hoặc mật khẩu',  time()+1, '/');
            header('Location: ./login.php');
        }
    }

?> -->


<!DOCTYPE html>
<html>
<head>
    <title>Thư viện Lemon</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <link rel="stylesheet" href="./icon/fontawesome-free-5.15.4-web/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script> -->

</head>
<body>
    <div class="login_wrapper">
        <div class="row justify-content-center" >
            <div class="col-sm-9 col-sm-offset-1">
                <H4 style="text-align:center">Đăng nhập</H4><br>
                <form action="" method="POST">
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm">
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="matkhau" class="col-sm-3 col-form-label">Mật khẩu:</label>
                        <div class="col-sm">
                            <input type="password" name="matkhau" class="form-control" id="exampleInputPassword1">
                        </div>
                    </div>
                    <br>
                    <div class="cangiua"><button type="submit" class="btn btn-success">Đăng nhập</button></div>
                </form>
            </div>
        </div>
        <br>
    </div>
</body>
</html>