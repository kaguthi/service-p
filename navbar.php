<?php
session_start();
?>
<style>
  .profile a{
    display: flex;
    /* align-items: center; */
  }
  .profile a i{
    /* margin-left: 5px;
    margin-right: 5px; */
    margin: 8px 5px  5px  5px;
    /* margin-bottom: 5px; */
  }
  /* .profile a p{
    margin-top: 5px;
  } */
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid">
    <div class="title">
      <h2>Service Provider</h2>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active " aria-current="page" href="index.php">Home</a>
        <a class="nav-link"  href="aboutus.php">About Us</a>
        <?php
        if(isset($_SESSION['uname'])){
        ?>
          <div class="profile">
            <a class="navbar-brand" href="logout.php">
              <i class='bx bxs-user'></i>
              <p><?php echo $_SESSION['uname'];?></p>
            </a>
          </div>
          <!-- <a href="logout.php" class="text-white"></a> -->
        <?php
        }else{
        ?>
          <a class="nav-link" href="switch.php">Sign Up</a>
          <a class="nav-link" href="switch2.php">Login</a>
        <?php
        }?>
      </div>
    </div>
  </div>
</nav>