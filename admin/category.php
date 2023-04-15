<?php
session_start();
include "../db.php";
include "sidebar.php";
?>
<!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->
        <!-- Table Start -->
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Responsive Table</h6>
                        <div class="table-responsive">
                            <table class="table" id="category-data">
                                <thead>
                                    <tr>
                                        <th scope="col">Category Id</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Category Image</th>
                                        <th scope="col">Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $sql = "SELECT * FROM category";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0){
                                        while($rows = mysqli_fetch_array($result)){
                                    ?>
                                    <tr>
                                        <td><?= $rows['category_id'];?></td>
                                        <td><?= $rows['category_name'];?></td>
                                        <td><img src="images/<?= $rows['category_image'];?>" width="50px" height="50px" style="border: 1px solid black;"></td>
                                        <td>
                                            <button type="button" class="btn btn-success edit-btn"><a href="editCategory.php?id=<?= $rows['category_id'];?>">Edit</a></button>
                                            <button type="submit" class="btn btn-danger delete-btn" value="<?= $rows['category_id'];?>" name="delete-btn">Delete</button>
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
    $(document).ready(function(){
        $("#category-data").DataTable();
    })
</script>
    <script>
        <?php
        if(isset($_SESSION['msg'])){?>
            alertify.set('notifier','position', 'top-right');
            alertify.success('<?= $_SESSION['msg']?>');
        <?php    
        }if (isset($_SESSION['error'])){
        ?>
            alertify.set('notifier','position', 'top-right');
            alertify.error("<?= $_SESSION['error']?>"); 
        <?php
        }
        ?>
    </script>