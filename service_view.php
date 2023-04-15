<?php
include "util.php";
include "navbar.php";
if(isset($_GET['service'])){
?>
<style>
  .profile-pic{
    border-radius: 50%;
  }
</style>
<div class="">
  <div class="container-fluid bg-dark">
      <div class="row mb-3">
          <h3 class="text-white">Service</h3>
      </div>
  </div>
</div>

<div class="container py-5">
  <?php
  include "db.php";
  $sid = $_GET['service'];
  $sql = "SELECT * FROM services WHERE service_id = '$sid'";
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    while($rows = mysqli_fetch_array($result)){
      ?>
      <div class="row">
        <div class="col-md-4 shadow ">
          <img src="provider/uploads/<?= $rows['service_image']?>" class="img-fluid rounded-start" alt="service image">
        </div>
        <div class="col-md-8">
          <h2><?=$rows['service_name']?></h2>
          <hr>
          <h6>Service Description:</h6>
          <p><?= $rows['description']?></p>
          <h3>Ksh.<?=$rows['service_price']?></h3>
          <?php
          if(isset($_SESSION['uname'])){
            $provider_id = $rows['provider_id'];
            $sql_query = "SELECT * FROM provider WHERE provider_id = '$provider_id'";
            $sql_run = mysqli_query($conn, $sql_query);
            if(mysqli_num_rows($sql_run) > 0){
              while($row = mysqli_fetch_array($sql_run)){
          ?>
            <div class="row">
              <h5 class="mb-3">Contact details</h5>
              <div class="col-md-4">
                <img class="profile-pic"src="provider/<?= $row['profile_pic']?>" width="100px" height="100px">
              </div>
              <div class="col-md-8">
                <p><strong>Telephone Number:</strong> 0<?=$row['telephone']?></p>
                <p><strong>Email:</strong> <?=$row['email']?></p>
              </div>
            </div>
          <?php
              }
            }else{
              echo "No data found";
            }
          }else{
            echo "<h3>You must log in to see the service provider details!!</h3>";
          }
          ?>
          <p class="card-text mb-3"><strong>Created At: </strong><small class="text-muted"><?=$rows['createdAt']?></small></p>
        </div>
      </div>
      <?php
    }
  }else{
    echo "No service found";
  }
  ?>
</div>
<?php
}else{
  echo "No service found";
  // header("Location: ")
}?>