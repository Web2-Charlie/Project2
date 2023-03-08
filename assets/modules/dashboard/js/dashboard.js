
$(document).ready(function() {
    $(document).on('click', '#delete', function(){
        //console.log('test')
        var id = $(this).attr('data-id')
        delete_user({userid: id})
    })
})

function delete_user(data = {}) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url+'dashboard/delete_Employee',
                type: 'post',
                // data: {userid:user_id},
                data: data,
                cache: false,
                async: false,
                success:function(data) {
                    Swal.fire(
                        'Deleted!',
                        'Employee file has been deleted.',
                        'success'
                      ).then(function(){
                        window.location.reload(base_url+'dashboard/index');
                    })
                }
        
            }) 
        }
        else{
            Swal.fire({
                icon: 'info',
                title: 'Yeah...',
                text: 'Employee file is safe',
                // footer: '<a href="">Why do I have this issue?</a>'
              })
        }
    })
    // let user_id = id;
   
}

function getData(id, lastname, firstname, email, username, password) {
    $('#id').val(id);
    $('#lastname').val(lastname);
    $('#firstname').val(firstname);
    $('#email').val(email);
    $('#username').val(username);
    $('#password').val(password);
}

function updateDetail() {
    let user_id =  document.getElementById('id').value;
    let lastname = document.getElementById('lastname').value;
    let firstname = document.getElementById('firstname').value;
    let username = document.getElementById('username').value;
    let email = document.getElementById('email').value;
    let psw = document.getElementById('password').value;
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this action!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, update it!'
        }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: base_url+'dashboard/edit_Profile',
                type: 'post',
                // data: {userid:user_id},
                data:{userid: user_id, lname: lastname, fname: firstname, email: email, $uname: username, password: psw},
                cache: false,
                async: false,
                success:function(data) {
                    Swal.fire(
                        'Deleted!',
                        'Employee file has been deleted.',
                        'success'
                        ).then(function(){
                        window.location.reload(base_url+'dashboard/index');
                    })
                }
        
            }) 
        }
        else{
            Swal.fire({
                icon: 'info',
                title: 'Yeah...',
                text: 'Employee file is safe',
                // footer: '<a href="">Why do I have this issue?</a>'
                })
        }
    })

}