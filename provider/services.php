<?php
session_start();
include "../db.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>view user</title>
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
                            <h6 class="mb-4">View services</h6>
                            <div class="table-responsive">
                                <table class="table" id="service-data">
                                    <thead>
                                        <tr>
                                            <th scope="col">Service Id</th>
                                            <th scope="col">Service Name</th>
                                            <th scope="col">Service Price</th>
                                            <th scope="col">Service image</th>
                                            <th scope="col">description</th>
                                            <th scope="col">category</th>
                                            <th scope="col">Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $provider_id = $_SESSION["uid"];
                                        $sql = "SELECT * FROM services WHERE provider_id = '$provider_id'";
                                        $result = mysqli_query($conn, $sql);
                                        if (mysqli_num_rows($result) > 0){
                                            while($rows = mysqli_fetch_array($result)){
                                        ?>
                                        <tr>
                                            <td><?php echo $rows['service_id'];?></td>
                                            <td><?php echo $rows['service_name'];?></td>
                                            <td><?php echo $rows['service_price'];?></td>
                                            <td><img src="uploads/<?php echo $rows['service_image'];?>" width="50px" height="50px" style="border: 1px solid black;"></td>
                                            <td><?php echo $rows['description'];?></td>
                                            <td><?php echo $rows['category_name'];?></td>
                                            <td>
                                                <button type="button" class="btn bg-success btn-edit"><a href="editService.php?id=<?= $rows['service_id'];?>">Edit</a></button>
                                                <button class="btn bg-danger delete-service" type="button" value="<?= $rows['service_id'];?>">Delete</button>
                                            </td>
                                        </tr>
                                        <?php
                                        }}
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <?php include "footer.php";?>
            <!-- Footer End -->
        <!-- </div> -->
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    <script>
       $(document).ready(function () {
            $('#service-data').DataTable();
        });
    </script>
</body>

</html>