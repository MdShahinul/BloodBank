<?php
include('function.php');
 $cn=connection();

  if(isset($_POST["btn"])) 
    {
      $s = "Select * from donorregistration where email = '".$_POST["email"] ."'"; 
      $result = mysqli_query($cn, $s);
      $r= mysqli_num_rows($result); 
      if ($r < 1) {
        $target_dir = "../doner_pic/"; 
        $filename = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $filename;
        //aloow certain file formats
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
            $s="insert into donorregistration(name,gender,age,mobile,bg_id,email,pwd,pic) values('" . $_POST["name"] ."','" . $_POST["gender"] . "','" . $_POST["age"] . "','" . $_POST["mobile"] . "','" . $_POST["bg"] . "','" . $_POST["email"] . "','" . $_POST["Password"] .  "','" . $filename ."')";  
          $result = mysqli_query($cn,$s);
          // mysqli_close($cn);
          echo "<script>alert('Registration Complete');</script>";
          }else{
              echo "<script>alert('Registration Incomplete');</script>";
            }

      }else{
       echo "<script>alert('This Email Already Use');</script>"; 
      }

    }
?> 


<?php include('header.php'); ?>  

<div class="container">
<h1 style="margin-left: 100px;">Create User</h1>
<form class="form-horizontal" method="POST" id="registerForm" enctype="multipart/form-data">
    <div class="form-group ">
      <label for="name" class="col-sm-3 control-label">Donor Name</label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="name" required id="name" placeholder="Donor Name">
        </div>
    </div> 
    <div class="form-group">
      <label class="control-label col-sm-3" for="gender">Gender</label>
        <div class="col-sm-5">
          <label class="radio inline col-sm-2" for="gender-0">
            <input name="gender" id="gender-0" value="Male" name="gender" checked="checked" type="radio">Male
          </label>
          <label class="radio inline col-sm-2" for="gender-1">
            <input name="gender" id="gender-1" value="Female" name="gender" type="radio">Female
          </label>
        </div>
    </div>
    <div class="form-group">
      <label for="age" class="control-label col-sm-3">AGE </label>
        <div class="col-sm-5">
          <input type="text" class="form-control" name="age"  required id="age" placeholder="age"  pattern="[0-9]{2,2}" title="please enter only  numbers between 2 to 2 for age">
        </div>
    </div>
    <div class="form-group">
        <label for="mobileNo" class="control-label col-sm-3">Mobile No</label>
          <div class="col-sm-5">
            <input type="text" class="form-control col-sm-5" name="mobile" required pattern="[0-9]{10,11}" id="mobileNo" placeholder="Moblie No">
          </div>
    </div>
    <div class="form-group">
      <label for="bloodgroup" class="control-label col-sm-3">Blood Broup</label>
        <div class="col-sm-5">
         <select class="form-control" id="bloodgroup" name="bg" required=""><option value="">Select</option>
        
             <?php
                $s= "select * from bloodgroup"; 
                $result = mysqli_query($cn, $s); 
                $s = mysqli_num_rows($result); 
                while ($data = mysqli_fetch_array($result))
                 {
                  if(isset($_POST["show"])&& $data[0]==$_POST["s1"])
                  {
                  echo "<option value=$data[0] selected>$data[1]</option>";
                  }
                  else
                  {
                    echo "<option value=$data[0]>$data[1]</option>";
                  } 
                }
              mysqli_close($cn); 
       ?>
        </select>
      </div>
    </div>

      <div class="form-group">
        <label for="email" class="col-sm-3 control-label">Email :</label>
          <div class="col-sm-5">
            <input type="email" class="form-control" id="email" placeholder="Email" name="email">
          </div>
      </div>

      <div class="form-group ">
        <label for="Password" class="control-label col-sm-3">Password</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" id="Password" name="Password" required id="Password" placeholder="password">
          </div>
      </div>

      <div class="form-group ">
        <label for="confirmPassord" class="control-label col-sm-3">Confirm Password</label>
          <div class="col-sm-5">
            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required id="confirmPassord" placeholder="confirm Password">
          </div>
      </div>

      <div class="form-group">
        <label for="photo" class="control-label col-sm-3">Select Photo</label>
          <div class="col-sm-5">
            <input type="file" id="photo" placeholder="Photo" name="image">
          </div>
       </div>

      <div class="">
        <label for="" class="col-sm-3"></label>
        <div class="col-sm-5">
           <button type="submit" name="btn" class="btn btn-primary">Create</button>
        </div>

      </div>

</form>
</div>

  <script>  // Password check 
    var password = document.getElementById("Password") , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
      if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
      } else {
        confirm_password.setCustomValidity('');
      }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;   
  </script>


  <?php include('footer.php'); ?> 
