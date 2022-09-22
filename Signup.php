<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Sign up - Brand</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter&amp;display=swap">
</head>
    <body><section class="py-5 mt-5"><div class="container py-5"><div class="row mb-4 mb-lg-5">
      <div class="col-md-8 col-xl-6 text-center mx-auto"><p class="fw-bold text-success mb-2">Sign up</p></div></div>
      <div class="row d-flex justify-content-center" style="font-style: italic;"><div class="col-md-6 col-xl-4">
        <div class="card"><div class="card-body text-center d-flex flex-column align-items-center">
          <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person">
  <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"></path>


</svg></div>
<?php
$nameErr = $emailErr = $generr = $lnameErr = $phoneErr = $passErr=$passcErr =$err =  "";
$name = $email = $gender = $phone = $pwd = $pwdc = $lname =  "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $nameErr = "Name is required";
  } else {
    $name =$_POST["fname"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed";
      $name = "";
    }
  }
  if (empty($_POST["lname"])) {
    $lnameErr = "Name is required";
  } else {
    $lname =$_POST["fname"];
    if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
      $lnameErr = "Only letters and white space allowed";
      $lname = "";
    }
  }
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = $_POST["email"];
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format";
      $email="";
    }
  }
  if (empty($_POST["phone"])) {
    $phoneErr = "number required";
  } else {
    $phone = ($_POST["phone"]);
    $phoneErr = "";
    if(strlen($phone)!= 10)
    
    {
      $phoneErr = "number only have 10 digits";
      $phone = "";
    }
    }  
    if (empty($_POST["gender"])) {
          $generr="select a valid gender";
    }else {
      
      $gender = $_POST["gender"];
      $generr = "";
      

      
    }

    if (empty($_POST["password"])) {
      $passErr = "Password is required";
    } else {
      $pwd =$_POST["password"];
      if(!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/', $pwd)) 
        {
            $passErr = "Password must contain letters,numbers,special chararcters and Atleast 8 characters in length";
            $pwd = "";
        }
    }



   
      if (empty($_POST["passwordc"])) {
        $passcErr = "Password is required";
         } else {
         $pwdc =$_POST["passwordc"];
         if($pwd != $pwdc){
          $passcErr = "Password does not match";
          $pwdc = "";}
        }

        if(strlen($name)>0 && strlen($email)>0  && strlen($gender)>0  && strlen($lname)>0  && strlen($pwdc)>0 && strlen($phone)>0 && strlen($pwd)>0 ){
        header("location:success.html");}
        else{
          $err = "fill all the fields";
        

          



        }

        }
  ?>



<span style="color: var(--bs-red);font-weight: bold;font-family: 'Architects Daughter', serif;">
    <?php echo $err;?> </span>
<form method="post"><div class="mb-3">


  <input class="form-control" type="text" name="fname" placeholder="First Name">
  <span style="color: var(--bs-red);font-weight: bold;font-family: 'Architects Daughter', serif;">
    <?php echo $nameErr;?> </span>
</div>
  <div class="mb-3"><input class="form-control" type="text" name="lname" placeholder="Last Name">
    <span style="color: var(--bs-red);font-weight: bold;font-family: 'Architects Daughter', serif;">
    <?php echo $lnameErr;?> </span>
  </div>
  <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email">
    <span style="color: var(--bs-red);font-weight: bold;font-family: 'Architects Daughter', serif;">
    <?php echo $emailErr;?> </span>
  </div>
  <div class="mb-3"><input class="form-control" type="text" name="phone" placeholder="Phone No">
    <span style="color: var(--bs-red);font-weight: bold;font-family: 'Architects Daughter', serif;">
    <?php echo $phoneErr;?> </span>
  </div>
  <div class="mb-3"><select class="form-select" name= "gender"><option value="" selected="">Gender</option><option value="male">Male</option>
    <option value="female">Female</option><option value="others">Others</option>
  </select>
  <span style="color: var(--bs-red);font-weight: bold;font-family: 'Architects Daughter', serif;">
  <?php echo $generr;?> </span>
</div><div class="mb-3">
  <input class="form-control" type="password" name="password" placeholder="Password">
  <span style="color: var(--bs-red);font-weight: bold;font-family: 'Architects Daughter', serif;">
  <?php echo $passErr;?> </span></div><div class="mb-3">
  <input class="form-control" type="password" name="passwordc" placeholder="Re Type Password">
  <span style="color: var(--bs-red);font-weight: bold;font-family: 'Architects Daughter', serif;">
  <?php echo $passcErr;?> </span></div><div class="mb-3"><button class="btn btn-primary shadow d-block w-100" type="submit">Sign up</button></div>
<p class="text-muted">Already have an account?&nbsp;<a href="login.html">Log in</a></p></form></div></div></div></div></div></section>
<footer class="bg-primary-gradient"><div class="container py-4 py-lg-5"><hr><div class="text-muted d-flex justify-content-between align-items-center pt-3"><a href="https://github.com/Adithyan-R-K" target="_top"><p class="mb-0">Copyright © 2022&nbsp;</p></a><ul class="list-inline mb-0"><li class="list-inline-item"></li></ul></div></div></footer><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.min.js"></script></body></html>