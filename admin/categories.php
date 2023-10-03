<?php
session_start(); 
include "connect.php"; 
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Categories</title>

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
					<h4>Categories
						<div class="float-end" >
							<a href="index.php" class="btn btn-danger">Back</a>
						</div>
						<div class="float-end" style="margin-right: 10px;">
							<a href="category_images_upload.php" class="btn btn-warning">Upload</a>
						</div>
					</h4>
					<table class="table table-bordered table-striped table-hover">
						<thead>
							<tr>
								<th>id</th>
								<th>Image</th>
								<th>Quote</th>
								<th>Category</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $s = mysqli_query($con,"select * from categories");
							while($row = mysqli_fetch_array($s))
							{
							?>
						
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo $row['image']; ?></td>
								<td><?php echo $row['quote']; ?></td>
								<td><?php echo $row['category']; ?></td>
								
								<td>
									<a href="category_view.php?id=<?= $row['id']; ?>" class="btn btn-info btn-sm">View</a>
									<a href="category_edit.php?id=<?= $row['id']; ?>" class="btn btn-success btn-sm">Edit</a>
									
									<a href="category_delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
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