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
<!-- form category -->
<?php
if(isset($_GET['id'])){
    ?>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Edit Categories</h6>
                    <div class="preview-img"></div>
                    <form action="upload.php" method="POST" enctype="multipart/form-data">
                        <?php
                        include "../db.php";
                        $cid = $_GET['id'];
                        $sql = "SELECT * FROM category WHERE category_id = '$cid'";
                        $result = mysqli_query($conn, $sql);
                        if(mysqli_num_rows($result) > 0){
                            $rows = mysqli_fetch_array($result);
                            ?>
                                <div class="mb-3 mt-3">
                                    <input type="hidden" name="category-id" value="<?= $rows['category_id']?>">
                                    <label for="category-name">Category Name</label>
                                    <input type="text" name="category-name" id="category-name" class="form-control"  value="<?= $rows['category_name']?>" required>
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="category-name">Category image</label>
                                    <input type="file" name="category-image" id="category-image" class="form-control">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="category-name">Current image</label>
                                    <input type="hidden" name="old-image" value="<?= $rows['category_image']?>">
                                    <img src="images/<?= $rows['category_image']?>" alt="category image" width="100px" height="100px" class="my-2">
                                </div>
                                <div class="mb-3">
                                    <input type="submit" value="Update" name="edit-btn" class="btn btn-primary">
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
    echo "No Id Found";
}
?>
<?php
include "footer.php";
?>
<script>
    const previewImg = document.querySelector(".preview-img");
    const productImage = document.querySelector("#category-image");

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
    if(isset($_SESSION['mess'])){?>
        alertify.set('notifier','position', 'top-right');
        alertify.success('<?= $_SESSION['mess']?>');
    <?php    
    unset($_SESSION['mess']);
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