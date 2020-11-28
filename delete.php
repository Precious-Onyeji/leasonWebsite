<?php 
include 'app/operation.php'; 
// $getAllUsers = $opert->getAllUsers();

if(isset($_GET['did'])){
    $id = $_GET['did'];
    $opert= new Operation();
    $deleteUsers = $opert->deleteUser($id);
    

    if($deleteUsers){
        header("location:view.php");
        }
}
