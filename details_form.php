<!DOCTYPE HTML>  
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<style>
.error,.MobileNoerror {color: #FF0000;}
.card {
        text-align: center;
        padding: 40px 0;
        background: #EBF0F5;
      }
      p {
  font-size: 14px;
  color: #6b7280;
}
body {
  min-height: 100vh;
  display: grid;
  place-items: center;
  background-color: #e2e8f0;
}
/* span.Radio-name {
    margin-left: -35%;
} */
.signup-form {
  width: 480px;
  padding: 32px;
  border-radius: 8px;
  background-color: #ffffff;
  box-shadow: 2px 4px 8px #6b728040;
  text-align: center;
}

.header {
  margin-bottom: 48px;
}

.header h1 {
  font-weight: bolder;
  font-size: 28px;
  color: #6366f1;
}

.input {
  position: relative;
  margin-bottom: 24px;
}

.input input, .input textarea {
  /* width: 82%; */
  border: none;
  padding: 8px 40px;
  border-radius: 4px;
  background-color: #f3f4f6;
  color: #1f2937;
  font-size: 16px;
}

.input.radio {
    /* width: 82%; */
    border: none;
    border-radius: 4px;
    padding: 8px 40px !important;
    background-color: #f3f4f6;
    color: #1f2937;
    font-size: 16px;
    display: flex;
}
/* .input.radio i.fa-solid.fa-envelope {
    margin-left: 10px;
} */
.input input::placeholder {
  color: #6b7280;
}

.input i {
  top: 50%;
  width: 36px;
  position: absolute;
  transform: translateY(-50%);
  color: #6b7280;
  font-size: 16px;
}

.signup-btn {
  width: 100%;
  border: none;
  padding: 8px 0;
  margin: 24px 0;
  border-radius: 4px;
  background-color: #6366f1;
  color: #ffffff;
  font-size: 16px;
  cursor: pointer;
}

.signup-btn:active {
  background-color: #4f46e5;
  transition: all 0.3s ease;
}

.social-icons i {
  height: 36px;
  width: 36px;
  line-height: 36px;
  border-radius: 50%;
  margin: 24px 8px 48px 8px;
  background-color: gray;
  color: #ffffff;
  font-size: 16px;
  cursor: pointer;
}

i.fa-facebook-f {
  background-color: #3b5998;
}

i.fa-twitter {
  background-color: #1da1f2;
}

i.fa-google {
  background-color: #dd4b39;
}

a {
  color: #6366f1;
  text-decoration: none;
}

        h1 {
          color: #88B04B;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-weight: 900;
          font-size: 40px;
          margin-bottom: 10px;
        }
        p {
          color: #404F5E;
          font-family: "Nunito Sans", "Helvetica Neue", sans-serif;
          font-size:20px;
          margin: 0;
        }
      i {
        color: #9ABC66;
        font-size: 100px;
        line-height: 200px;
        margin-left:-15px;
      }
      .card {
        background: white;
        padding: 60px;
        border-radius: 4px;
        box-shadow: 0 2px 3px #C8D0D8;
        display: inline-block;
        margin: 0 auto;
      }
      .radio-input{
        text-align: initial;
        border: none;
        padding: 8px 40px;
        border-radius: 4px;
        background-color: #f3f4f6;
        color: #1f2937;
        font-size: 16px;
      }
      span.tag{
        color: #6b7280;
      }
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }
</style>
</head>
<body>  

<?php
// define variables and set to empty values
$nameErr = $s_nameErr = $ageErr = $mobile_noErr = $educationErr = $skillErr = $marriedErr ="";
$name = $email = $gender = $comment = $website = "";
$valid = false ;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if(empty($_POST["s_name"])) {
    $s_nameErr = "Shop Name is required";
  }
  elseif (empty($_POST["name"])) {
    $nameErr = "Name is required";
  }
  elseif (empty($_POST["age"])) {
    $ageErr = "Age is required";
  }
  elseif(empty($_POST["education"])) {
    $educationErr = "Education is required";
  }
  elseif(empty($_POST["skill"])) {
    $skillErr = "Skill is required";
  }
  elseif(empty($_POST["married"])) {
    $marriedErr = "Married details is required";
  }
  elseif (empty($_POST["mobile_no"])) {
    $mobile_noErr = "Mobile number is required";
  } 
  
  
   else {
    $valid = true ;
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include('conn.php');

if ($valid == true) {
    // $name = test_input($_POST["name"]);
    // $email = test_input($_POST["email"]);
    // $website = test_input($_POST["website"]);
    // $comment = test_input($_POST["comment"]);
    // $gender = test_input($_POST["gender"]);

   $s_name = $_REQUEST['s_name'];
   $name = $_REQUEST['name'];
   $age = $_REQUEST['age'];
   $education = $_REQUEST['education'];
   $married = $_REQUEST['married'];
   $skill = $_REQUEST['skill'];
   $mobile_no = $_REQUEST['mobile_no'];

   $sql="INSERT into bbc_friends(`s_name`,`name`,`age`,`education`,`married`,`skill`,`mobile_no`,`create_at`) values ('".$s_name."','".$name."','".$age."','".$education."','".$married."','".$skill."','".$mobile_no."','".date("Y-m-d")."')";
   $res=mysqli_query($con,$sql);
    if($res){ ?>
       
        <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
        <h1>Success</h1> 
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
      </div>
   <?php }
  }

if($valid == false){
?>

<h2>BBC Group Members Info</h2>

<div class="signup-form">
  <div class="container">
    <div class="header">
      <h1>BBC User Info </h1>
      <p>Get started for free!</p>
    </div>
    <form method="post" action="" class="needs-validation" novalidate> 
      <div class="input">
        <!-- <i class="fa-solid fa-user"></i> -->
        <input type="text" name="s_name" class="form-control" required placeholder="Shop name" >
        <span class="error"><?php echo $s_nameErr;?></span>
      </div>
      <div class="input">
        <!-- <i class="fa-solid fa-envelope"></i> -->
        <input type="text" name="name" class="form-control" required placeholder="Name" >
        <span class="error"><?php echo $nameErr;?></span>
      </div>
      <div class="input">
        <!-- <i class="fa-solid fa-envelope"></i> -->
        <input type="number" class="form-control" required max="35" placeholder="Age" name="age">
        <span class="error"><?php echo $ageErr;?></span>
      </div>
      <div class="input">
        <!-- <i class="fa-solid fa-envelope"></i> -->
        <textarea name="education" class="form-control" required placeholder="Education..." rows="2" cols="10"></textarea>
        <span class="error"><?php echo $educationErr;?></span>
      </div>
      <div class="input">
        <!-- <i class="fa-solid fa-envelope"></i> -->
        <textarea name="skill" class="form-control" required placeholder="Skill..." rows="2" cols="10"></textarea>
        <span class="error"><?php echo $skillErr;?></span>
      </div>
      <div class="input radio-input">
       <span class="tag">Married </span> 
        <!-- <input type="radio" class="radio-inline" name="married" value="yes"><span class="Radio-name">Yes</span>
        <input type="radio" class="radio-inline" name="married" value="no"><span class="Radio-name" checked>No</span> -->
        <label class="radio-inline">
          <input type="radio" name="married" value="yes" >Yes
        </label>
        <label class="radio-inline">
          <input type="radio" name="married" value="no" checked>No
        </label>
      </div>
      <span class="error"><?php echo $marriedErr;?></span>
      <div class="input">
        <!-- <i class="fa-solid fa-lock"></i> -->
        <input type="number" class="form-control" id="txtNumber" required  placeholder="Mobile Number" name="mobile_no">
        <span class="MobileNoerror"><?php echo $mobile_noErr;?></span>
      </div>
      <input class="signup-btn" type="submit" value="Submit" />
    </form>
    
  </div>
</div>


<?php 
}
?>
<script>
  $("#txtNumber" ).keyup(function() {
    var x = $('#txtNumber').val();
    var y = x.toString().length;
    alert(y)
  if( y<10 || y >10 ){
      $('.MobileNoerror').html("Please enter valid mobile number");
  }
  else{
    $('.MobileNoerror').html('');
  }
});
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
</body>
</html>