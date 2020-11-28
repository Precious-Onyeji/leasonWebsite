<?php

include 'includes/header.php';
// include 'app/operation.php';


$opert= new Operation();
$opert->getForms();

$opertz= new Operation();
$opertz->signin();

?>




      <div class="container">

        <div class="row">
          
          <div class="col-lg-7 m-auto">
            
            <div class="card mt-5">
              
              <div class="card-header text-center">
                
                <h1> Register Here </h1>

              </div>


              <form action="index.php" method="POST">
              <div class="card-body">
                    <?= isset($_SESSION['Message'])? $opert->showMessage() : ''  ?>    


              <div class="form-group">
                
                <input type="text" class="form-control" name="username" placeholder="username" required />

              </div>

              <div class="form-group">
                
                <input type="password" class="form-control" name="password" placeholder="password" required />

              </div>

              <div class="form-group">
                
                <input type="text" class="form-control" name="email" placeholder="email" required />

              </div>

              <div class="form-group">
                
                <input type="text" class="form-control" name="firstname" placeholder="firstname" required />

              </div>

              <div class="form-group">
                
                <input type="text" class="form-control" name="lastname" placeholder="lastname" required />

              </div>

              <button class="btn btn-primary" name="signUp"> Sign up </button>

              <div> <a href="signin.php"><b>Already registered? Sign in </b></a> </div>

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

<script>
    swal({
    title: "Good job!",
    text: "Your registration was submitted successfully",
    icon: "success",
    button: "Aww yiss!",
  })
