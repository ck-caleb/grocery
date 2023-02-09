$(document).ready(function(){
// data tables
$('#product_table') .DataTable()


$('#btn_login').on('click', function(){
   var email=$('#email').val()
    var password=$('#password').val()
    var data=$('#frmlogin').serialize() + '&btn_log=btn_login';
    if(email==""){
        $('#leresult').html("All fields required")
        setTimeout(function(){
            $('#leresult').html("")
        }, 1500)
    }else if(password==""){
        $('#leresult').html("All fields required")
        setTimeout(function(){
            $('#leresult').html("")
        }, 1500)
    }else{
        $.ajax({
            url:'handler.php',
            method:'POST',
            data:data,
            success:function(data){
                document.getElementById('leresult').style.color='green';
                $('#leresult').html(data)
                setTimeout(function(){
                    $('#leresult').html("")
                }, 1500)
            }
        })
        setTimeout(function(){
        //     document.getElementById('email').value=""
        // document.getElementById('password').value=""
        },1500)
    }
})

})

