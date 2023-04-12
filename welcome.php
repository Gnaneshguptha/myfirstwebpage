<?php include 'config.php'; ?>
<!-- ////////// -->
<!-- after login user needs to enter personal details  -->
<?php
    session_start();
    if (!isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: index.php");
        die();//exit
    }

    // include 'config.php';

    $query = mysqli_query($conn, "SELECT * FROM users WHERE email='{$_SESSION['SESSION_EMAIL']}'");

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        echo "   Welcome " . $row['name'] . " <a href='logout.php' id='sd'>Logout</a>";
       
    }
?>
<!-- //////// -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <link rel="stylesheet" href="css/style2.css">
</head>
<body>
<a href='userdetails.php' id='sd1'>Check your Details Here</a>
    <section class="container">
      <header>Registration Form</header>
      <form action=""  method="POST" class="form">
        <div class="input-box">
          <label>Full Name</label>
          <input type="text" placeholder="Enter full name" required  name="fname"/>
        </div>

        <div class="input-box">
          <label>Email Address</label>
          <input type="text" placeholder="Enter email address" required name="mail" />
        </div>

        <div class="column">
          <div class="input-box">
            <label>Phone Number</label>
            <input type="number" placeholder="Enter phone number" required  name="phone"/>
          </div>
          <div class="input-box">
            <label>Birth Date</label>
            <input type="date" placeholder="Enter birth date" required name="dob"/>
          </div>
        </div>
        <div class="gender-box">
          <h3>Gender</h3>
          <div class="gender-option">
            <div class="gender">
              <select name="gen" id="">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
           </select>
          </div>
        </div>
        <div class="input-box address">
          <label>Address</label>
          <input type="text" placeholder="Enter street address" required name="add1" />
          <input type="text" placeholder="Enter street address line 2" required  name="add2"/>
          <div class="column">
            <div class="select-box">
              <select name="country">
                <option hidden>Country</option>
                <option>America</option>
                <option>Japan</option>
                <option>India</option>
                <option>Nepal</option>
              </select>
            </div>
            <input type="text" placeholder="Enter your city" required name="city"/>
          </div>
          <div class="column">
            <input type="text" placeholder="Enter your region" required name="region" />
            <input type="number" placeholder="Enter postal code" required name="pincode" />
          </div>
        </div>
        <input type="submit" id="button" name="but">
      </form>
    </section>
    <?php
    //according to the input user needs to enter the data after that it is stored into the db
    if(isset($_POST['but']))
    {
        $fname=$_POST['fname'];
        $mail=$_POST['mail'];
        $dob=$_POST['dob'];
        $gen=$_POST['gen'];
        $add1=$_POST['add1'];
        $add2=$_POST['add2'];
        $country=$_POST['country'];
        $reg=$_POST['region'];
        $pin=$_POST['pincode'];

        $query="INSERT INTO regform (fullname,email,dob,gender,Address,Address2,country,region,pincode) VALUES('$fname','$mail','$dob','$gen','$add1','$add2','$country',' $reg','$pin')";        
        $data=mysqli_query($conn,$query);
        // to check the user detials 
        header("Location: userdetails.php");
    } 
    ?>
</body>
</html>

