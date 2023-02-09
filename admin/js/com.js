$(document).ready(function(){



/*front end*/
$('#btn-post').on('click', function(){
    var black=document.getElementById('blurr-back')
        var post=document.getElementById('new-post')
        post.style.display='block'
        black.style.display='block'
        document.body.style.overflowY='hidden'
})
$('#blurr-back').on('click', function(){
    var black=document.getElementById('blurr-back')
        var post=document.getElementById('new-post')
        post.style.display='none'
        black.style.display='none'
        document.body.style.overflowY='scroll'
})
$('#btn-update').on('click', function(){
    var black=document.getElementById('blurr-back-update')
        var post=document.getElementById('new-post-update')
        post.style.display='block'
        black.style.display='block'
        document.body.style.overflowY='hidden'

        //get from class
        var title=$(this).closest('.detail').find('.title')[0].innerText;
        var pay=$(this).closest('.detail').find('.pay_amount')[0].innerText
        var description=$(this).closest('.detail').find('.description')[0].innerText
        var id=$(this).closest('.detail').find('.leid')[0].innerText
        
        //add them to input fields
        document.getElementById('txtpostupdate').value=title
        document.getElementById('txtpayupdate').value=pay
        document.getElementById('txtdescriptionupdate').innerHTML=description
        document.getElementById('prev_id').value=id
})
$('#blurr-back-update').on('click', function(){
    var black=document.getElementById('blurr-back-update')
        var post=document.getElementById('new-post-update')
        post.style.display='none'
        black.style.display='none'
        document.body.style.overflowY='scroll'
})
/*end of front end*/
// deletiton
$('.del_application').on('click',function(){
    var state=confirm
    if(state='true'){
        var id=$(this).closest('tr').find('td:eq(0)').text().trim()
        $.ajax({
            url:'delete.php',
            method:'POST',
            data:{id:id},
            success:function(data){
                $('#application_table').html(data)
            }
        })
    }else{

    }
})
$('.reject').on('click', function(){
    var id=$(this).closest('tr').find('td:eq(0)').text().trim()
        $.ajax({
            url:'reject.php',
            method:'POST',
            data:{id:id},
            success:function(data){
                $('#application_table').html(data)
            }
        })
})
    $('#del_post').on('click',function(){
        var state=confirm('Delete Post?');
        if(state='true'){
            var id=$(this).closest('.detail').find('.leid')[0].innerText
            $.ajax({
                url:'delpost.php',
                method:'POST',
                data:{id:id},
                success:function(data){
                    $('#del_post').html(data)
                }
            })
        }else{
           console.log('false');
        }
})
//end of it 

/*update post*/
$('#btn_updatepost').on('click',function(){
    var title=$('#txtpostupdate').val()
    var pay=$('#txtpayupdate').val()
    var description=$('#txtdescriptionupdate').val()
    var result=document.getElementById('postresultupdate')
    var data=$('#frmupdate').serialize() + '&btn_updatepost=btn_updatepost ';
    if(title==""){
        result.style.color='red'
        $('#postresultupdate').html('Please fill the title')
        setTimeout(function(){
            $('#postresultupdate').html('')
        },2000)
    }else if(description==""){
        result.style.color='red'
        $('#postresultupdate').html('Please give a description')
        setTimeout(function(){
            $('#postresultupdate').html('')
        },2000)
    }else{
        $.ajax({
            url:'post_action.php',
            method:'POST',
            data:data,
            success:function(data){
                result.style.color='green'
        $('#postresultupdate').html(data)
        setTimeout(function(){
            $('#postresultupdate').html('')
        },3000)
            }
        })
        setTimeout(function(){
            document.getElementById('txtpost').value=""
            document.getElementById('txtpay') .value=""
            document.getElementById('txtdescription') .value=""
        }, 1500)
    }
})

/*view posts*/
$('.btn-view').on('click', function(){
    var postid=$(this).closest('.view-card').find('.post_id')[0].innerText;
    $.ajax({
        url:'post_action.php',
        method:'POST',
        data:{postid:postid},
        success:function(data){
            
        }
    })
    location.href='view.php'
})
/*end of viewing posts*/
/*approval*/
$('.approve').on('click', function(){
    var appid=$(this).closest('tr').find('td:eq(0)').text().trim()
    $.ajax({
        url:'approve.php',
        method:'POST',
        data:{appid:appid},
        success:function(data){
            $('#dbresult').html(data)
        }
    })
})

/*end of approval*/
$('#btn-post-attachment').on('click', function(){
    var title=$('#txtpost').val()
    var pay=$('#txtpay').val()
    var description=$('#txtdescription').val()
    var result=document.getElementById('postresult')
    var data=$('#frmpost').serialize() + '&btn-post-attachment=btn-post-attachment ';
    if(title==""){
        result.style.color='red'
        $('#postresult').html('Please fill the title')
        setTimeout(function(){
            $('#postresult').html('')
        },2000)
    }else if(description==""){
        result.style.color='red'
        $('#postresult').html('Please give a description')
        setTimeout(function(){
            $('#postresult').html('')
        },2000)
    }else{
        $.ajax({
            url:'post_action.php',
            method:'POST',
            data:data,
            success:function(data){
                result.style.color='green'
        $('#postresult').html(data)
        setTimeout(function(){
            $('#postresult').html('')
        },3000)
            }
        })
        setTimeout(function(){
            document.getElementById('txtpost').value=""
            document.getElementById('txtpay') .value=""
            document.getElementById('txtdescription') .value=""
        }, 1500)
    }
    
})

    document.getElementById('signin').onclick=function(){
        var login=document.getElementById('adminlog')
        var sign=document.getElementById('adminsign')
        if(login.style.display='block'){
            login.style.display='none'
            sign.style.display='block'
        }else{
            //do nothing
        }
    }
    document.getElementById('back').onclick=function(){
        var login=document.getElementById('adminlog')
        var sign=document.getElementById('adminsign')
        if(login.style.display='none'){
            login.style.display='block'
            sign.style.display='none'
        }else{
            //do nothing
        }
    }

   /*sign up*/
   $('#companysign').on('click',function(){
    var companyname=$('#companyname').val()
    var companyemail=$('#companyemail').val()
    var companyspeciality=$('#companyspeciality').val()
    var companypassword=$('#companypassword').val()
    var companypasswordtwo=$('#companypasswordtwo').val()
    var result=document.getElementById('companyresult')
    result.style.color='red'
    var data=$('#companysign').serialize() + '&companysign=companysign';
    
    if(companyname==""){
        $('#companyresult').html("Company's name? ")
        setTimeout(function(){
            $('#companyresult').html("")
        },1500)
    }else if(companyemail==""){
        $('#companyresult').html("Company's email? ")
        setTimeout(function(){
            $('#companyresult').html("")
        },1500)
    }else if(companyspeciality==""){
        $('#companyresult').html("Company's speciality? ")
        setTimeout(function(){
            $('#companyresult').html("")
        },1500)
    }else if(companypassword==""){
        $('#companyresult').html("Create password")
        setTimeout(function(){
            $('#companyresult').html("")
        },1500)
    }else if(companypasswordtwo==""){
        $('#companyresult').html("Confirm password")
        setTimeout(function(){
            $('#companyresult').html("")
        },1500)
    }else if(companypassword!=companypasswordtwo){
        $('#companyresult').html("Passwords do not match")
        setTimeout(function(){
            $('#companyresult').html("")
        },1500)
    }else{
        $.ajax({
            url:'post_action.php',
            method:'POST',
            data:data,
            success:function(data){
                $('#companyresult').html(data)
                setTimeout(function(){
            $('#companyresult').html("")
        },1500) 
            }
        })
        setTimeout(function(){
            document.getElementById('companyname').value=""
            document.getElementById('companyemail').value=""
            document.getElementById('companyspeciality').value=""
            document.getElementById('companypassword').value=""
            document.getElementById('companypasswordtwo').value=""
        }, 1500)
    }
})
    
/*end of script*/
})