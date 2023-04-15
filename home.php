  
<!-- search bar -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="search-bar">
                <form action="" method="post">
                    <div class="mb-3 mt-3">
                        <input type="text" name="search" id="search" placeholder="Search" class="form-control" autocomplete="off">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- body -->
<style>
    a{
        text-decoration: none;
    }
    .card img{
        height: 200px;
    }
</style>
<div class="container my-1">
    <div class="row">
        <div class="col-md-12">
            <div class="h-100 rounded">
                <h3>Collection</h3>
                <hr>
                <div class="row results">
                <?php
                include "db.php";
                $sql = "SELECT * FROM category";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0){
                    while($rows = mysqli_fetch_array($result)){
                ?>
                    <div class="col-md-3 mb-2">
                        <a href="category.php?category=<?= $rows['category_name']?>">
                            <div class="card shadow">
                                <div class="card-body">
                                    <img src="admin/images/<?= $rows['category_image'];?>" class="w-100">
                                    <h4 class="text-center my-2"><?= $rows['category_name']?></h4>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php        
                    }
                }else{
                    echo "<center><h3>No data found</h3></center>
                    <div class='spinner-border' style='width: 3rem; height: 3rem;' role='status'>
                    <span class='visually-hidden'>Loading...</span>
                </div>";
                }
                ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $("#search").keyup(function(){
            var text = $("#search").val();

            $.ajax({
                url: "search.php",
                method: "POST",
                data:{text:text},
                success:function(data){
                    $(".results").html(data);
                }
            });
        });
    });
</script>