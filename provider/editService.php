<?php
session_start();
include "sidebar.php";
?>
<style>
    .preview-img{
        width: 200px;
        height: 200px;
        border: 1px solid #ccc;
    }
    .preview-img img{
        width: 200px;
        height: 200px;
    }
</style>
<?php
if(isset($_GET['id'])){
?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Services</h6>
                    <div class="preview-img"></div>
                    <form action="upload.php" method="post" enctype="multipart/form-data">
                        <?php
                        include "../db.php";
                        $sid = $_GET['id'];
                        $sql_query = "SELECT * FROM services WHERE service_id = '$sid'";
                        $sql_run = mysqli_query($conn, $sql_query);
                        if(mysqli_num_rows($sql_run) > 0){
                            $data = mysqli_fetch_array($sql_run)
                            ?>
                            <div class="mb-3 mt-3">
                                <label for="service-name">Service Name</label>
                                <input type="hidden" name="service-id" value="<?= $data['service_id']?>">
                                <input type="text" name="service-name" id="service-name" value="<?= $data['service_name']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="service-price">Service Price</label>
                                <input type="number" name="service-price" id="service-price" value="<?= $data['service_price']?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="service-image">Service Image</label>
                                <input type="file" name="service-image" id="service-image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="service-image">Current Image</label>
                                <input type="hidden" name="old-image" value="<?= $data['service_image']?>">
                                <img src="uploads/<?= $data['service_image']?>" alt="service image" width="100px" height="100px">
                            </div>
                            <!-- add category -->
                            <div class="mb-3">
                                <select name="category-name" id="category-name" class="form-control">
                                <?php
                                include "../db.php";
                                $sql = "SELECT * FROM category";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0){
                                    while($rows = mysqli_fetch_array($result)){
                                ?>
                                    <option value="<?= $rows['category_name']?>"><?php echo $rows['category_name'];?></option>
                                    <?php
                                }
                                }?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"><?= $data['description']?></textarea>
                            </div>
                            <div class="mb-3">
                                <input type="submit" value="Update" class="btn btn-primary" name="edit-btn" id="submit-btn">
                            </div>
                            <?php
                        }else{
                            echo "No data found";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
}else{
    echo "No id found";
}
?>
<?php
include "footer.php"
?>
<script>
    const previewImg = document.querySelector(".preview-img");
    const productImage = document.querySelector("#service-image");

    productImage.addEventListener('change', function(){
        const image = this.files[0];
        // console.log(image);
        const reader = new FileReader();
        reader.onload = () =>{
            const imgUrl = reader.result;
            const img = document.createElement('img');
            img.src = imgUrl;
            previewImg.appendChild(img);
        }
        reader.readAsDataURL(image);
    });
</script>
<script>
    <?php
    if(isset($_SESSION['msg'])){?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?= $_SESSION['msg']?>');
    <?php    
    unset($_SESSION['msg']);
    }
    if (isset($_SESSION['error'])){
    ?>
        alertify.set('notifier','position', 'top-right');
        alertify.error("<?= $_SESSION['error']?>"); 
    <?php
    unset($_SESSION['error']);
    }
    ?>
</script>