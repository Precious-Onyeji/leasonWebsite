<?php

include("includes/header.php");

$opert= new Operation();
$opert->signin();
?>

  <div class="container">
  
    <div class="row">
    
    <div class="col-md-6 col-lg-6 m-auto">

    <div class="card mt-5">
    <div class="card-header">
    <h1> Login to Yooks </h1>
    </div>

    <div class="card-body">
            <?= isset($_SESSION['Message'])? $opert->showMessage() : ''  ?>    

    
    <form action="signin.php" method="POST">
    
    <div class="form-group">
    <label> Username </label>
    <input class="form-control" type="text" placeholder="Input your username" name="username" required />
    </div>

    <div class="form-group">
    <label> Password </label>
    <input class="form-control" type="password" placeholder="Input your password" name="password" required />
    </div>

    <button class="btn btn-primary" name="signin_btn"> Sign in </button>

   <div> <a href="index.php"> <b> Sign up and register on Yooks </b> </a> </div>

    </form>
    </div>
    </div>
    
    </div>
    </div>
  </div>



  <?php include("includes/footer.php"); ?>