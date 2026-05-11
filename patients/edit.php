<?php

include("../config/db.php");
include("../includes/header.php");

$id = $_GET['id'];

$result = mysqli_query($conn,
"SELECT * FROM patients WHERE id='$id'");

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $name = $_POST['patient_name'];
    $email = $_POST['email'];

    $check = mysqli_query($conn,

    "SELECT * FROM patients
    WHERE email='$email'
    AND id != '$id'");

    if(mysqli_num_rows($check) > 0){

        echo "<div class='alert alert-danger'>
        Email Already Exists
        </div>";

    } else {

        mysqli_query($conn,
        "UPDATE patients SET

        patient_name='$name',
        email='$email'

        WHERE id='$id'");

        echo "<div class='alert alert-success'>
        Patient Updated
        </div>";
    }
}

?>

<form method="POST">

<div class="mb-3">

<label>Name</label>

<input type="text"
name="patient_name"
class="form-control"
value="<?php echo $row['patient_name']; ?>">

</div>

<div class="mb-3">

<label>Email</label>

<input type="email"
name="email"
class="form-control"
value="<?php echo $row['email']; ?>">

</div>

<button name="update"
class="btn btn-primary">

Update

</button>

</form>

<?php include("../includes/footer.php"); ?>