
$(document).ready(function(){



/***update user status */
$(document).on("click",".updateUserStatus",function(){
    var  status= $(this).children("i").attr("status");
    var user_id=$(this).attr("user_id");
 // alert(niveau_id);
    $.ajax({
      headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-user-status',
      data:{status:status,user_id:user_id},

      success:function(resp){
        location.reload();
        },error:function(){
           alert ('error');
       }
  })

});




/***update user status */
$(document).on("click",".updateCommentStatus",function(){
    var  status= $(this).children("i").attr("status");
    var comment_id=$(this).attr("comment_id");
 // alert(niveau_id);
    $.ajax({
      headers:{
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      type:'post',
      url:'/admin/update-comment-status',
      data:{status:status,comment_id:comment_id},

      success:function(resp){
        location.reload();
        },error:function(){
           alert ('error');
       }
  })

});




/**********delete alert */


$(document).on("click",".confirmDelete",function(){
    var module = $(this) .attr('module');
   var moduleid = $(this) .attr('moduleid');
 //  alert(module);
 //  return false;
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
          Swal.fire(
            'Deleted!',
            'Your file has been deleted.',
            'success'
          )
          window.location="/admin/delete-"+module+"/"+moduleid;
        }
      }) })



});
