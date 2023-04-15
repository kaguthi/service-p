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
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Add Services</h6>
                <div class="preview-img"></div>
                <form action="upload.php" method="post" enctype="multipart/form-data">
                    <div class="mb-3 mt-3">
                        <label for="service-name">Service Name</label>
                        <input type="text" name="service-name" id="service-name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="service-price">Service Price</label>
                        <input type="number" name="service-price" id="service-price" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="service-image">Service Image</label>
                        <input type="file" name="service-image" id="service-image" class="form-control" required>
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
                        <textarea name="description" id="description" cols="30" rows="10" class="form-control" required></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" value="Submit" class="btn btn-primary" name="submit-btn" id="submit-btn">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
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