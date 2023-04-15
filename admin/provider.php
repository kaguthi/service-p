<?php
session_start();
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>view Provider</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
</head>

<body>
    <!-- <div class="container-xxl position-relative bg-white d-flex p-0"> -->
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <?php include "sidebar.php";?>
            <!-- Table Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                                <table class="table" id="provider-data">
                                    <thead>
                                        <tr>
                                            <th scope="col">Provider Id</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Telephone</th>
                                            <th scope="col">Password</th>
                                            <th scope="col">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sql = "SELECT * FROM provider";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0){
                                            while($rows = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['provider_id'];?></td>
                                            <td><?php echo $rows['username'];?></td>
                                            <td><?php echo $rows['lastname'];?></td>
                                            <td><?php echo $rows['email'];?></td>
                                            <td><?php echo $rows['telephone'];?></td>
                                            <td><?php echo $rows['password'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-success edit-btn"><i class="fa fa-pen text-white"></i></button>
                                                <button type="submit" class="btn btn-danger delete-provider" value="<?= $rows['provider_id']?>"><i class="fa fa-eraser text-white"></i></button>
                                            </td>
                                        </tr>
                                        <?php  
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->
            <div class="modal fade" id="edit-designer">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Service Provider</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form action="editProvider.php" method="post">
                            <div class="mb-3 mt-3">
                                <input type="hidden" name="providerid" id="providerid" class="form-control">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="lastname">Lastname</label>
                                <input type="text" name="lastname" id="lastname" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="telephone">Telephone</label>
                                <input type="tel" name="telephone" id="telephone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Update" class="btn btn-primary" name="update-btn">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

            <?php include "footer.php";?>
            <!-- Footer End -->
        <!-- </div> -->
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script>
        $(document).ready(function () {
            $('#provider-data').DataTable();
            $(".edit-btn").on('click', function(){
                $("#edit-designer").modal("show");
                    $tr = $(this).closest('tr');
                    var data = $tr.children("td").map(function(){
                        return $(this).text();
                    }).get();
                    console.log(data);

                    $("#providerid").val(data[0]);
                    $("#username").val(data[1]);
                    $("#lastname").val(data[2]);
                    $("#email").val(data[3]);
                    $("#telephone").val(data[4]);
                    $("#password").val(data[5]);
            });
        });
    </script>
    <script>
        <?php
        if(isset($_SESSION['msg'])){?>
            alertify.set('notifier','position', 'top-right');
            alertify.success('<?= $_SESSION['msg']?>');
        <?php    
        unset($_SESSION['msg']);
        }if (isset($_SESSION['error'])){
        ?>
            alertify.set('notifier','position', 'top-right');
            alertify.error("<?= $_SESSION['error']?>"); 
        <?php
        unset($_SESSION['error']);
        }
        ?>
    </script>
</body>

</html>