function search(){
    var content = $('#content_search').val();
    if(content.length == 0){
        var html = "<p style='color: red; margin-left:-25px ; '>Bạn chưa nhập nội dung tìm kiếm.</p>";
        $('#livesearch').html(html);
        document.getElementById('show_sanpham').style.display = "flex";
    }else{
        $.ajax({
            url : "xuly_searchsp.php",
            type : "post",
            dataType:"text",
            data : {
                 content_search : $('#content_search').val()
            },
            success : function (result){
                $('#livesearch').html(result);
                document.getElementById('show_sanpham').style.display = "none";
            }
            
        });
    }
    
}

function loaihh(key){
    document.getElementById('show_sanpham').style.display = "none";
    document.getElementById('livesearch').innerHTML = key;
    $.ajax({
        url : "xuly_showdanhmuc_loaihh.php",
        type : "post",
        dataType:"text",
        data : {
            loai_hh : key
        },
        success : function (result){
            $('#livesearch').html(result);
            document.getElementById('show_sanpham').style.display = "none";
        }
        
    });
}

function clear_inputsearch(){
    document.getElementById('content_search').value = "";
}

/// Dropdown người dùng 

$('#btn_dropdown').on('click', function(){
    $('#dropdown_user').toggle("show");
});


function add_cart(mshh_submit) {
    var dataForm = $("#addCartForm"+mshh_submit).serialize();
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php?'+dataForm,
        data: {
            themsp_cart: "true",
        }, 
        success: function(result){
            $('#ajax_addcart').html(result);
        }
    });
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            count_cart: "add",
        }, 
        success: function(count){
            $('#count_cart').html(count);
        }
    });
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            tongthanhtien: "true",
        }, 
        success: function(count){
            $('#tongdonhang').html(count);
        }
    });
    $('#show_cart').css({"display":"block"});
    return false;
}

function plus_sp(mshh){
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            plus_sp: mshh,
        }, 
        success: function(result){
            $('#soluong_mua_'+mshh).html(result);
        }
    });
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            thanhtien: mshh,
        }, 
        success: function(result){
            $('#thanhtien_sp_'+mshh).html(result);
        }
    });
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            tongthanhtien: "true",
        }, 
        success: function(count){
            $('#tongdonhang').html(count);
        }
    });
}

function minus_sp(mshh){
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            minus_sp: mshh,
        }, 
        success: function(result){
            $('#soluong_mua_'+mshh).html(result);
        }
    });
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            thanhtien: mshh,
        }, 
        success: function(result){
            $('#thanhtien_sp_'+mshh).html(result);
        }
    });
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            tongthanhtien: "true",
        }, 
        success: function(count){
            $('#tongdonhang').html(count);
        }
    });
}

function delete_sp_cart(mshh){
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            delete_sp_cart: mshh,
        }, 
        success: function(result){
            $('#ajax_addcart').html(result);
        }
    });
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            count_cart: "delete",
        }, 
        success: function(count){
            $('#count_cart').html(count);
        }
    });
    $.ajax({
        type: "POST",
        url: './xuly_giohang.php',
        data: {
            tongthanhtien: "true",
        }, 
        success: function(count){
            $('#tongdonhang').html(count);
        }
    });
    $('#show_cart').css({"display":"block"});
}

function close_cart(){
    $('#show_cart').css({"display":"none"});
}

function open_cart(){
    $('#show_cart').css({"display":"block"});
}


$('.delete_sp').on('mouseover',function(){
    $('.delete_sp').css({"background-color":"red"})
});
$('.delete_sp').on('mouseout',function(){
    $('.delete_sp').css({"background-color":"transparent"})
});

$('#btn_new_address').on('click',function(){//Sử dụng địa chỉ cũ 
    $('#btn_new_address').css({"display":"none"});
    $('#btn_old_address').css({"display":"inline-block"});

    $('#diachi_moi_div').css({"display":"block"});
    $('#diachi_cu').css({"display":"none"});

    $('#diachi_moi').prop('disabled', false);
    $('#diachi_cu').prop('disabled', true);
});

$('#btn_old_address').on('click',function(){//Sử dụng địa chỉ mới
    $('#btn_new_address').css({"display":"inline-block"});
    $('#btn_old_address').css({"display":"none"});

    $('#diachi_moi_div').css({"display":"none"});
    $('#diachi_cu').css({"display":"block"});

    $('#diachi_moi').prop('disabled', true);
    $('#diachi_cu').prop('disabled', false);
});

function check_dky(){
    var pass = document.dky_kh.password.value;
    var repass = document.dky_kh.repassword.value;

    if(pass != repass){
        $('#thongbao_repass').html('Mật khẩu xác nhận không khớp!');
        return false;
    }else{
        $('#thongbao_repass').htm();
    }
}