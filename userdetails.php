 <?php include'config.php' ?>
<?php
//after filling the registaton form user details will appear here
$query="select *from  regform";
$result=mysqli_query($conn,$query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UsersDetails</title>
    <link rel="stylesheet" href="css2/bootstrap.css">
</head>
<body>
<body class="bg-secondary">
<h1 align="center"class="text-light" >UsersDetails Created Account In This Web Page</h1>
<div class="container">
    <div class="row">
        <div class="col m-auto">
            <div class="card mt-5">
                <table class="table table-bordered">
                    <tr>
                        <td> UserName </td>
                        <td> Mail-Id </td>
                        <td> DOB </td>
                        <td> Gender </td>
                        <td> Country  </td>
                        <td> Pincode </td>
                    </tr>

                    <?php 
                            // fetching the data from database and displaying it
                            while($row=mysqli_fetch_assoc($result))
                            {
                                $UserID = $row['fullname'];
                                $Usermail = $row['email'];
                                $Userdob = $row['dob'];
                                $Usergen = $row['gender'];
                                $Userc=$row['country'];
                                $Userpincode=$row['pincode'];
                    ?>
                            <tr>
                                <td><?php echo $UserID ?></td>
                                <td><?php echo $Usermail ?></td>
                                <td><?php echo $Userdob ?></td>
                                <td><?php echo $Usergen ?></td>
                                <td><?php echo $Userc ?></td>
                                <td><?php echo $Userpincode ?></td>
                            </tr>        
                    <?php 
                            }  
                    ?>                                                                    
                           

                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>
</body>
</html>