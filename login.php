<?php session_start(); ?>
<?php include('admin/function.php') ?>

    <?php
      $_SESSION['donorstation']=""; 
      if (isset($_POST["btn"])) {

        $cn = connection(); 
        $s = "select * from admin where email = '" . $_POST["email"] . "' and pass = '". $_POST["password"] ."' "; 
        $result = mysqli_query($cn, $s); 
        $r=mysqli_num_rows($result);
        mysqli_close($cn);
        if($r>0)
          {
            $_SESSION["email"]=$_POST["email"];
            $_SESSION['donorstatus']="yes";
        //header("location:donor/index.php");
          echo "<script>location.replace('admin/index.php');</script>";
          }
          else
          {
            $cn = connection();
          $s = "select * from donorregistration where email = '" . $_POST["email"] . "' and pwd = '". $_POST["password"] ."' "; 
          $result = mysqli_query($cn, $s); 
          $r=mysqli_num_rows($result);
          mysqli_close($cn);
          if($r>0)
            {
              $_SESSION["email"]=$_POST["email"];
              $_SESSION['donorstatus']="yes";
          //header("location:donor/index.php");
            echo "<script>location.replace('donor/index.php');</script>";
            }
            else
            {
              echo "<script>alert('Invalid User Name Or Password');</script>";
            }     
            }     
        }
    ?>

  <?php include('header.php'); ?>


<div class="container" style="min-height: 400px; width: 1200px;">
  <h1 style="margin-left: 100px;">LogIn</h1>
    <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data">
      
      <div class="form-group ">
        <label for="name" class="col-sm-3 control-label">User Name</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" name="email" required id="name" placeholder="User Name">
          </div>
      </div>

      <div class="form-group ">
        <label for="password" class="col-sm-3 control-label">Password </label>
          <div class="col-sm-5">
            <input type="password" class="form-control" name="password" required id="password" placeholder="Passwrod">
          </div>
      </div> 
       <div class="">
          <label for="" class="col-sm-3"></label>
          <div class="col-sm-5">
            <button type="submit" name="btn" class="btn btn-primary">LogIn</button>
          </div>
        </div>
    </form>
</div>  

  <?php include('footer.php');  ?>