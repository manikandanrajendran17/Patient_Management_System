<?php

include("../config/db.php");
include("../includes/header.php");

if(isset($_POST['submit'])){

    $name = trim($_POST['patient_name']);
    $email = trim($_POST['email']);

    if($name == "" || $email == ""){

        echo "<div class='alert alert-danger'>
        All Fields Required
        </div>";

    } else {

        $check = mysqli_query($conn,
        "SELECT * FROM patients
        WHERE email='$email'");

        if(mysqli_num_rows($check) > 0){

            echo "<div class='alert alert-danger'>
            Email Already Exists
            </div>";

        } else {

            $sql = "INSERT INTO patients
            (patient_name,email)
            VALUES
            ('$name','$email')";

            mysqli_query($conn,$sql);

            echo "<div class='alert alert-success'>
            Patient Added
            </div>";
        }
    }
}

?>

<form method="POST">

<input type="text"
name="patient_name"
placeholder="Enter Name">

<br><br>

<input type="email"
name="email"
placeholder="Enter Email">

<br><br>

<button name="submit">
Submit
</button>

</form>

<?php include("../includes/footer.php"); ?>
