$(document).ready(function(){
    $(".delete-service").click(function(event){
        event.preventDefault();
        var id = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover the file once deleted',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result)=> {
            if(result.isConfirmed){
                $.ajax({
                    url: "deleteService.php",
                    method: "POST",
                    data: {id:id},
                    success:function(response){
                        console.log(response);
                        if(response == 200){
                            Swal.fire('Success','Your file is deleted successfully','success');
                            $("#service-data").load(location.href + " #service-data");
                        }else if(response == 500){
                            Swal.fire('Error','Your file is deleted successfully','error');
                        }
                    }
                })
            }
        });
    });

    // delete category
    $(".delete-btn").on('click',function(event){
        event.preventDefault();
        var id = $(this).val();
        
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover the file once deleted',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url: "deleteCategory.php",
                    method: "POST",
                    data:{id:id},
                    success:function(response){
                        console.log(response);
                        if(response == 200){
                            Swal.fire('Success','Your file is deleted successfully','success');
                            $("#category-data").load(location.href + " #category-data");
                        }else if(response == 500){
                            Swal.fire('Error','Your file is deleted successfully','error');
                        }
                    }
                });
            }
        })
    });

    // delete provider
    $(".delete-provider").click(function(event){
        event.preventDefault();
        var id = $(this).val();

        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover the file once deleted',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url: "deleteProvider.php",
                    method: "POST",
                    data:{id:id},
                    success:function(response){
                        console.log(response);
                        if(response == 200){
                            Swal.fire('Success','Your file is deleted successfully','success');
                            $("#provider-data").load(location.href + " #provider-data");
                        }else if(response == 500){
                            Swal.fire('Error','Your file is deleted successfully','error');
                        }
                    }
                });
            }
        });
    });

    // delete user
    $(".delete-user").click(function(event){
        event.preventDefault();
        var id = $(this).val();
        Swal.fire({
            title: 'Are you sure?',
            text: 'You will not be able to recover the file once deleted',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result)=>{
            if(result.isConfirmed){
                $.ajax({
                    url: "deleteUser.php",
                    method: "POST",
                    data:{id:id},
                    success:function(response){
                        console.log(response);
                        if(response == 200){
                            Swal.fire('Success','Your file is deleted successfully','success');
                            $("#user-data").load(location.href + " #user-data");
                        }else if(response){
                            Swal.fire('Error','Your file is deleted successfully','error');
                        }
                    }
                });
            }
        })
    })
});