<?php 
    //----------------------------------------------- Nhân viên --------------------------------------------------
    
    // Lấy ds nhân viên
    function dsnv(){
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM nhanvien";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }

    //Lấy nhân viên theo manv
    function nvtheomanv($manv) {
        require '../database/config.php';
        $data;
        $sql = "SELECT * FROM nhanvien WHERE manv = $manv";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Thêm nhân viên
    function themnv($tennv, $sdt, $email, $diachi, $matkhau){
        require '../database/config.php';
        $sql = "CALL themnv('$tennv', '$sdt', '$email', '$diachi', '$matkhau')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Sửa nhân viên
    function suanv($manv, $tennv, $sdt, $diachi) {
        require '../database/config.php';
        $sql = "CALL suanv('$manv', '$tennv', '$sdt', '$diachi')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Xóa nhân viên
    function xoanv($manv){
        require '../database/config.php';
        $sql = "CALL xoanv('$manv')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Tìm nhân viên theo tên 
    function timnv($tennv) {
        require '../database/config.php';
        $data;
        $sql = "SELECT `tennv` FROM `nhanvien` Where `tennv` = '$tennv'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Tìm dl nhân viên
    function timdlnv($key) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM nhanvien
                    WHERE manv LIKE '%$key%' 
                    OR tennv LIKE '%$key%' 
                    OR sdt LIKE '%$key%'
                    OR email LIKE '%$key%'
                    OR diachi LIKE '%$key%'
                ORDER BY manv";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }    


    //-------------------------------------------------- Tác giả ------------------------------------------------

    //Lấy ds tác giả
    function dstg() {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM tacgia";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }

    //Lấy tác giả theo matg
    function tgtheomatg($matg) {
        require '../database/config.php';
        $data;
        $sql = "SELECT * FROM tacgia WHERE matg = $matg";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Thêm tác giả
    function themtg($tentg){
        require '../database/config.php';
        $sql = "CALL themtg('$tentg')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Sửa tác giả
    function suatg($matg, $tentg) {
        require '../database/config.php';
        $sql = "CALL suatg('$matg', '$tentg')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Xóa tác giả
    function xoatg($matg){
        require '../database/config.php';
        $sql = "CALL xoatg('$matg')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Tìm tác giả theo tên 
    function timtg($tentg) {
        require '../database/config.php';
        $data;
        $sql = "SELECT `tentg` FROM `tacgia` Where `tentg` = '$tentg'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Tìm dl tác giả
    function timdltg($key) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM tacgia WHERE matg LIKE '%$key%'  OR tentg LIKE '%$key%' ORDER BY matg";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }


    //-------------------------------------------------- Nhà xuất bản --------------------------------------------

    //Lấy ds nxb
    function dsnxb() {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM nhaxuatban";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    };

    //Lấy nxb theo manxb
    function nxbtheomanxb($manxb) {
        require '../database/config.php';
        $data;
        $sql = "SELECT * FROM nhaxuatban WHERE manxb = $manxb";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Thêm nxb
    function themnxb($nhaxuatban){
        require '../database/config.php';
        $sql = "CALL themnxb('$nhaxuatban')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Sửa nxb
    function suanxb($manxb, $nhaxuatban) {
        require '../database/config.php';
        $sql = "UPDATE `nhaxuatban` SET `nhaxuatban`='$nhaxuatban' WHERE manxb = $manxb;";
        $sql = "CALL suanxb('$manxb', '$nhaxuatban')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Xóa nxb
    function xoanxb($manxb){
        require '../database/config.php';
        $sql = "CALL xoanxb('$manxb')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Tìm nxb theo tên 
    function timnxb($nhaxuatban) {
        require '../database/config.php';
        $data;
        $sql = "SELECT `nhaxuatban` FROM `nhaxuatban` Where `nhaxuatban` = '$nhaxuatban'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Tìm dl nxb
    function timdlnxb($key) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM nhaxuatban WHERE manxb LIKE '%$key%'  OR nhaxuatban LIKE '%$key%' ORDER BY manxb";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }


    //-------------------------------------------------- Loại sách ------------------------------------------------

    //Lấy ds loại sách
    function dsls() {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM loaisach";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    };

    //Lấy loại sách theo maloai
    function loaitheomaloai($maloai) {
        require '../database/config.php';
        $data;
        $sql = "SELECT * FROM loaisach WHERE maloai = $maloai";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Thêm loại sách
    function themloai($loaisach){
        require '../database/config.php';
        $sql = "CALL themloai('$loaisach')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Sửa loại sách
    function sualoai($maloai, $loaisach) {
        require '../database/config.php';
        $sql = "CALL sualoai('$maloai', '$loaisach')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Xóa loại sách
    function xoaloai($maloai){
        require '../database/config.php';
        $sql = "CALL xoaloai('$maloai')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Tìm loại sách theo tên 
    function timloai($loaisach) {
        require '../database/config.php';
        $data;
        $sql = "SELECT `loaisach` FROM `loaisach` Where `loaisach` = '$loaisach'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Tìm dl loại sách
    function timdlloai($key) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM loaisach WHERE maloai LIKE '%$key%' OR loaisach LIKE '%$key%' ORDER BY maloai";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }


    //-------------------------------------------------- Độc giả ------------------------------------------------

    //Lấy ds độc giả
    function dsdg() {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM docgia";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    };

    //Lấy độc giả theo madg
    function dgtheomadg($madg) {
        require '../database/config.php';
        $data;
        $sql = "SELECT * FROM docgia WHERE madg = $madg";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Thêm độc giả
    function themdg($tendg, $sdt, $email, $diachi){
        require '../database/config.php';
        $sql = "CALL themdg('$tendg', '$sdt', '$email', '$diachi')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Sửa độc giả
    function suadg($madg, $tendg, $sdt, $email, $diachi) {
        require '../database/config.php';
        $sql = "CALL suadg('$madg', '$tendg', '$sdt', '$email', '$diachi')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Xóa độc giả
    function xoadg($madg){
        require '../database/config.php';
        //$sql = "DELETE FROM `docgia` WHERE madg = $madg";
        $sql = "CALL xoadg('$madg')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Tìm độc giả theo tên 
    function timdg($tendg) {
        require '../database/config.php';
        $data;
        $sql = "SELECT `tendg` FROM `docgia` Where `tendg` = '$tendg'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Tìm dl độc giả
    function timdldg($key) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM docgia 
                        WHERE madg LIKE '%$key%' 
                        OR tendg LIKE '%$key%' 
                        OR sdt LIKE '%$key%'
                        OR email LIKE '%$key%'
                        OR diachi LIKE '%$key%'
                ORDER BY madg";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }


    //------------------------------------------------------ Sách ------------------------------------------------

    //Lấy ds sách
    function dss() {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM sach";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    };

    //Tìm kiếm sách theo từ khóa
    function timdlsach($key) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM sach WHERE masach IN (
                    SELECT DISTINCT masach FROM sach s INNER JOIN tacgia t on s.matg = t.matg
                                                        INNER JOIN loaisach l on s.maloai = l.maloai
                                                        INNER JOIN nhaxuatban n on s.manxb = n.manxb
                                                WHERE tensach LIKE '%$key%' 
                                                OR tentg LIKE '%$key%'
                                                OR loaisach LIKE '%$key%'
                                                OR nhaxuatban LIKE '%$key%')
                ORDER BY masach
        ";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }

    //Lấy sách theo masach
    function sachtheomasach($masach) {
        require '../database/config.php';
        $data;
        $sql = "SELECT * FROM sach WHERE masach = $masach";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Tìm sách theo tên sách
    function timsach($tensach) {
        require '../database/config.php';
        $data;
        $sql = "SELECT `tensach` FROM `sach` Where `tensach` = '$tensach'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Thêm loại sách
    function themsach( $tensach, $matg, $maloai, $manxb, $sotrang, $soluong){
        require '../database/config.php';
        $sql = "CALL themsach('$tensach', '$matg', '$maloai', '$manxb', '$sotrang', '$soluong')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Sửa sách
    function suasach($masach, $tensach, $matg, $maloai, $manxb, $sotrang, $soluong) {
        require '../database/config.php';
        $sql = "CALL suasach('$masach', '$tensach', '$matg', '$maloai', '$manxb', '$sotrang', '$soluong')";
        $result = mysqli_query($conn, $sql);
        return $result;

    }

    //Xóa sách
    function xoasach($masach){
        require '../database/config.php';
        $sql = "CALL xoasach('$masach')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }


    //-------------------------------------------------- Phiếu mượn ------------------------------------------------

    //Lấy ds phiếu mượn
    function dspm() {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM phieumuon";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    };

    //Lấy phiếu mượn theo mapm
    function pmtheomapm($mapm) {
        require '../database/config.php';
        $data;
        $sql = "SELECT * FROM phieumuon WHERE mapm = $mapm";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    }

    //Thêm phiếu mượn
    function thempm($madg, $ngaymuon, $ngayhentra, $manv) {
        require '../database/config.php';
        $sql = "CALL thempm('$madg', '$ngaymuon', '$ngayhentra', '$manv')";
        $result = mysqli_query($conn, $sql);
        return $result;

    }

    //Sửa phiếu mượn
    function suapm($mapm, $ngayhentra, $ngaytra) {
        require '../database/config.php';
        $sql = "UPDATE `phieumuon` 
                SET `ngaytra`='$ngaytra', `ngayhentra`='$ngayhentra'
                WHERE mapm = $mapm;";
        $conn->query($sql);
        mysqli_close($conn);
    }

    //Xóa phiếu mượn
    function xoapm($mapm){
        require '../database/config.php';
        $sql = "CALL xoapm('$mapm')";
        $result = mysqli_query($conn, $sql);
        return $result;
    }

    //Tìm dl phiếu mượn
    function timdlpm($key) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM phieumuon WHERE mapm IN (
                    SELECT DISTINCT mapm FROM phieumuon p INNER JOIN nhanvien n on n.manv = p.manv
                                                        INNER JOIN docgia d on d.madg = p.madg
                                                WHERE mapm LIKE '%$key%' 
                                                OR tennv LIKE '%$key%'
                                                OR tendg LIKE '%$key%'
                                                OR ngaymuon LIKE '%$key%'
                                                OR ngayhentra LIKE '%$key%'
                                                OR ngaytra LIKE '%$key%')
                ORDER BY mapm
        ";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    }


    //--------------------------------------------- Chi tiết phiếu mượn ------------------------------------------

    //Lấy ds chi tiết phiếu mượn
    function dsctpm($mapm) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM chitietphieumuon WHERE mapm=$mapm";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    };

    // Số sách đã mượn theo từng phiếu mượn
    function sosachmuon($mapm) {
        require '../database/config.php';
        $sql = "SELECT sosachmuon('$mapm') as sosachmuon";
        $result = mysqli_query($conn, $sql);
        $data = $result->fetch_assoc();
        return $data;
    };

    //Lấy chi tiết phiếu mượn the mapm và masach
    function ctpmtheomapmmasach($mapm, $masach) {
        require '../database/config.php';
        $data = array();
        $sql = "SELECT * FROM chitietphieumuon WHERE `mapm` = '$mapm' AND `masach` = '$masach'";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc())
            $data[] = $row;
        mysqli_close($conn);
        return $data;
    };

    //Tìm masach trong chi tiết phiếu mượn
    function ctpmtheomasach($masach) {
        require '../database/config.php';
        $data;
        $sql = "SELECT * FROM chitietphieumuon WHERE `masach` = '$masach'";
        $result = $conn->query($sql);
        $data = $result->fetch_assoc();
        mysqli_close($conn);
        return $data;
    };

    //Thêm chi tiết phiếu mượn
    function themctpm($mapm, $masach, $soluong) {
        require '../database/config.php';
        $sql = "INSERT INTO `chitietphieumuon`(`mapm`, `masach`, `soluong`) VALUES ('$mapm', '$masach', '$soluong')";
        $conn->query($sql);
        mysqli_close($conn);
    }

    //Sửa chi tiết phiếu mượn
    function suactpm($mapm, $masach, $soluong) {
        require '../database/config.php';
        $sql = "UPDATE `chitietphieumuon` SET `masach` = '$masach', `soluong`='$soluong'
                WHERE mapm = $mapm AND masach = $masach";
        $conn->query($sql);
        mysqli_close($conn);
    }

    //Xóa chi tiết phiếu mượn
    function xoactpm($masach){
        require '../database/config.php';
        $sql = "DELETE FROM `chitietphieumuon` WHERE masach = $masach";
        $result = $conn->query($sql);
        mysqli_close($conn);
        return $result;
    }

    


?>