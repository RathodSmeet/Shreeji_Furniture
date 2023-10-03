<?php
session_start(); 
include "connect.php"; 
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contactus</title>

	 <!-- Customized Bootstrap Stylesheet -->
	 <link href="css/bootstrap.min.css" rel="stylesheet">
	<?php include 'header.php'; ?>
</head>
<body class="mt-5">

<?php include 'message.php'; ?>

<div class="container mt-5">
	<div class="row">
		<div class= "col-md-12">
			<div class="card">
				<div class="card-header">
					<h4>Customer Details
					<a href="index.php" class="btn btn-danger float-end">Back</a>
					</h4>
					<table class="table table-bordered table-striped">
						<thead>
							<tr>
								<th>id</th>
								<th>Name</th>
								<th>Email</th>
								<th>Subject</th>
								<th>Message</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $s = mysqli_query($con,"select * from contact");
							while($row = mysqli_fetch_array($s))
							{
							?>
						
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['Name']; ?></td>
								<td><?php echo $row['Email']; ?></td>
								<td><?php echo $row['Subject']; ?></td>
								<td><?php echo $row['Message']; ?></td>
								<td>
									<a href="coustmer_view.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>
									<a href="coustmer_edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
									<form action="coustmer_delete.php" method="POST" class="d-inline">
										<button type="submit" name="coustmer_delete" value="<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
									</form>
									
								</td>
							</tr>
						</tbody>
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>