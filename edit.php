<?php
include 'includes/header.php';
// require_once './app/DbConnection.php';

// $getUserz= new Operation();
// $getUser = $getUserz->getUser('$id');

$opert= new Operation();
$result= $opert->runUpdate();

if($result) {

  header('location:view.php');

}
if(isset($_GET['eid'])) {

    $id= $_GET['eid'];
    $getUser= $opert->getUser($id);

}

?>

<div class="container">

<div class="row">
  
  <div class="col-lg-7 m-auto">
    
    <div class="card mt-5 bg-dark">
      
      <div class="card-header text-center bg-light">
        
        <h1> Register Here </h1>

      </div>


      <form action="edit.php" method="POST">
      <div class="card-body">

      <div class="form-group">
        
        <input type="text" class="form-control" name="id" value="<?= $getUser->id ?>" placeholder="id" required hidden/>

      </div>

      <div class="form-group">
        
        <input type="text" class="form-control" name="username" value="<?= $getUser->username ?>" placeholder="username" required />

      </div>


      <div class="form-group">
        
        <input type="text" class="form-control" name="email" value="<?= $getUser->email ?>" 
        placeholder="email" required />

      </div>

      <div class="form-group">
        
        <input type="text" class="form-control" name="firstname" value="<?= $getUser->firstname?>"
         placeholder="firstname" required />

      </div>

      <div class="form-group">
        
        <input type="text" class="form-control" name="lastname" value="<?= $getUser->lastname ?>" placeholder="lastname" required />

      </div>

      <button class="btn btn-primary" name="update"> Update </button>

    </div>

  </form>


    </div>

  </div>

</div>

</div>

</div>

<?php

include 'includes/footer.php';
?>