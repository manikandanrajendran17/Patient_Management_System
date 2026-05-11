<?php

include("../config/db.php");
include("../includes/header.php");

$result = mysqli_query($conn,
"SELECT * FROM patients
ORDER BY id ASC");

?>

<a href="create.php"
class="btn btn-success mb-3">

Add Patient

</a>

<table class="table table-bordered">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Action</th>

</tr>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['patient_name']; ?></td>

<td><?php echo $row['email']; ?></td>

<td>

<a href="edit.php?id=<?php echo $row['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a href="delete.php?id=<?php echo $row['id']; ?>"
class="btn btn-danger btn-sm">

Delete

</a>

</td>

</tr>

<?php } ?>

</table>

<?php include("../includes/footer.php"); ?>