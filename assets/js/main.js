
function del(id) {
    let uid = id;
    $.ajax({
        url: 'delete',
        type: 'post',
        data: {userid:uid},
        success:function(data){
            swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
              })
              .then((data) => {
                if (data.isConfirmed) {
                  swal("Poof! Your imaginary file has been deleted!", {
                    icon: "success",
                  });
                  location.reload('index');
                } else {
                  swal("Your imaginary file is safe!");
                }
              });
        }
    })
}
