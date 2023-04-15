<?php
include "util.php";
include "navbar.php";
?>
<style>
    a{
        text-decoration: none;
    }
    .card-body img{
        height: 200px;
    }
    .card{
        height: 350px;
    }
</style>
<div class="container-fluid bg-dark">
    <div class="row">
        <h3 class="text-white mt-3">Collection/<?=$_GET['category']?></h3>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
<div class="container py-2">
    <div class="row">
        <div class="col-md-12">
            <div class="row results">
                <?php
                include "db.php";
                $cname = $_GET['category'];
                $sql = "SELECT * FROM services WHERE category_name = '$cname'";
                $result = mysqli_query($conn, $sql);
                if(mysqli_num_rows($result) > 0 ){
                    while($rows = mysqli_fetch_array($result)){
                ?>
                <div class="col-md-3 mb-2">
                    <a href="service_view.php?service=<?= $rows['service_id']?>">
                        <div class="card shadow">
                            <div class="card-body">
                                <img src="provider/uploads/<?= $rows['service_image'];?>" class="w-100">
                                <h6 class="my-1"><?= $rows['service_name']?></h6>
                                <h6 class="my-2 text-success">Price: Ksh.<?= $rows['service_price']?></h6>
                                <p class="card-text my-3"><strong>Created At: </strong><small class="text-muted"><?=$rows['createdAt']?></small></p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
                    }
                }else{
                    echo "<h1>NO Data Found</h1>";
                }
                ?>
            </div>
        </div>
    </div>
</div> 
<script>
    $(document).ready(function(){
        $("#search").keyup(function(){
            var text = $("#search").val();

            $.ajax({
                url: 'search2.php',
                method: "POST",
                data:{text:text},
                success:function(data){
                    $(".results").html(data);
                }
            })
        })
    })
</script>