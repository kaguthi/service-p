<?php
session_start();
include "../db.php";
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
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Categories</h6>
                <div class="preview-img"></div>
                <form action="upload.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="category-name">Category Name</label>
                        <input type="text" name="category-name" id="category-name" class="form-control" required>
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="category-name">Category image</label>
                        <input type="file" name="category-image" id="category-image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Submit" name="submit-btn" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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