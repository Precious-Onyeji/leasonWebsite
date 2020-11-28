<?php
include ("includes/header.php");
// require_once("app/DbConnection.php");

$opert= new Operation();
$getAllUsers= $opert-> getAllUsers();


?>


<div class="container">
<div class="row mt-5">
<div class="col-lg-12 col-sm-6 m-auto">
    <div class="card">
    
    <div class="card-header text-center">
    <h1> Registered Users </h1>
    </div>

    <div class="card-body">
    <?= isset($_SESSION['Message'])? $opert->showMessage() : ''  ?>    
    <table class="table-bordered">

    <tr>
    
    <td style="width:10% "> Id </td>
    <td style="width:10%"> username </td>
    <td style="width:10%"> email </td>
    <td style="width:10%"> first Name </td>
    <td style="width:10%"> Last Name </td>
    <td style="width:20%"> Actions </td>

    </tr>

    <tr>

    <?php while($getAllUser= mysqli_fetch_object($getAllUsers)):?>
    <td> <?=$getAllUser->id ?></td>
    <td> <?=$getAllUser->username ?></td>
    <td> <?=$getAllUser->email ?></td>
    <td> <?=$getAllUser->firstname ?></td>
    <td> <?=$getAllUser->lastname ?></td>

    <td> <a href="edit.php?eid=<?= $getAllUser->id ?>" class= "btn btn-success"> Edit </a> 
     <a href="delete.php?did=<?= $getAllUser->id ?>" class= "btn btn-danger"> Delete  </a></td>


    </tr>

<?php endwhile;?>
    
    </div>
    </div>

    </div>
</div>
</div>

</div>

<?php
include ("includes/footer.php");
?>