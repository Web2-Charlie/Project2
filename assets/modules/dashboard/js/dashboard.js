
$(document).ready(function() {
    $(document).on('click', '#delete', function(){
        // console.log('test')
        var id = $(this).attr('data-id')
        delete_user({userid: id})
    })
})

function delete_user(data = {}) {
    // let user_id = id;
    $.ajax({
        url: base_url+'dashboard/delete_Employee',
        type: 'post',
        // data: {userid:user_id},
        data: data,
        cache: false,
        async: false,
        success:function(data) {
            
        }

    })
    
}