<?php

session_start();
require_once("DbConnection.php");

$dbconn= new DbConnection();
// $dbconn= new DbConnection();

class Operation extends DbConnection {


public function getForms() {
	global $dbconn;
	if(isset($_POST['signUp'])) {

		$username= $_POST['username'];
		$password= $_POST['password'];
		$email= $_POST['email'];
		$firstname= $_POST['firstname'];
		$lastname= $_POST['lastname'];
		$password_hash= password_hash($password, PASSWORD_DEFAULT);

		// $inserted = 
		$inserted= $this->insert($username,$password_hash,$email,$firstname,$lastname);

			if($inserted) {
		$this->setMessage("<div class='alert alert-success'> You have successfully registered for Yooks. Sign in here
		 </div>");
		 header("location:signin.php");
	} else {
		$this->setMessage("<div class='alert alert-success'> Registration not successful
		 </div>");
	}
}
	}


public function insert($username,$password,$email,$firstname,$lastname) {

	$stmt= "INSERT INTO userz (username, password, email,  firstname, lastname) VALUES ('$username', '$password_hash', '$email',  '$firstname', '$lastname');";
	$query= mysqli_query($this->conn,$stmt);

	 if($query) return true;
	 else return false;
}

public function getAllUsers() {

	$getAllUsers= mysqli_query($this->conn, "SELECT * FROM userz");
	return $getAllUsers;

}

public function getUser($id) {

	$getUser= mysqli_query($this->conn, "SELECT * FROM userz WHERE id= '$id'");
	$getUser= mysqli_fetch_object($getUser);
	return $getUser;

}

public function runUpdate() {

	if(isset($_POST['update']) ) {

		$id= $_POST['id'];
		$username= $_POST['username'];
		$email= $_POST['email'];
		$firstname= $_POST['firstname'];
		$lastname= $_POST['lastname'];

		$updateUser= mysqli_query($this->conn, "UPDATE userz SET username='$username',email='$email', firstname='$firstname', lastname='$lastname' WHERE id='$id'");
		// $updated= $this->update($id,$username,$email,$firstname,$lastname);

		if($updateUser) {
			$this->setMessage("<div class='alert alert-success'> User data was updated
			 successfully </div>");
			 header("location:view.php");
		} else {

			$this->setMessage("<div class='alert alert-success'> User data was not updated
			 successfully </div>");
		}
	}
}

public function deleteUser($id) {

	$deleteUser= mysqli_query($this->conn, "DELETE FROM userz WHERE id='$id'");


	if($deleteUser) {
		$this->setMessage("<div class='alert alert-success'> User data deleted Successfully
		 </div>");
		 header("location:view.php");
	} else {
		$this->setMessage("<div class='alert alert-success'> User data not deleted Successfully
		 </div>");
	}
}

 public function signin() {

        if(isset($_POST['signin_btn'])) {
            $username= $_POST['username'];
            $password= $_POST['$password'];
            $getusername= mysqli_query($this->conn,"SELECT * FROM login WHERE username='$username'");

            $getusername= mysqli_fetch_object($getusername);
            $check= password_verify($password, $getusername->password);

        if($username==$getusername->username) {
            $_SESSION['id']=$getusername->id;
            header("location:view.php");
        } else {

        	$this->setMessage("<div class='alert alert-success'> You could not successfully login to your dashboard </div>");
            header("location:index.php"); 
        }
    }
}



public function setMessage($message) {
	if(! empty($message)) 

		$_SESSION["Message"]= $message;

	else
	$message="";
}

public function showMessage() {

	if(isset($_SESSION['Message'])) {

		echo $_SESSION['Message'];
		unset($_SESSION['Message']);

	}

}

} // end Operation extends DbConnection
