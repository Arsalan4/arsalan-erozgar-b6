
<!DOCTYPE html>
<html>
<head>
	<title>PHP CRUD</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<?php require_once'process.php' ?>
	<?php 
	if(isset($_SESSION['message'])):?>
		<div calss="alert alert-<?=$_SESSION['msg_type']?>">
			<?php 
			echo $_SESSION['message'];
			unset($_SESSION['message']);
			?>
			</div>
		<?php endif ?>


<?php $mysqli= new mysqli('localhost', 'root','','crud') or die(mysqli_error($mysqli));
	$result=$mysqli->query("SELECT * FROM crud_data") or die ($mysqli->error);
?>
	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th colspan="2">Action</th>
				</tr>
				
			</thead>
			<?php while($row =$result->fetch_assoc()): ?>
				<tr>
					<td><?php  echo $row['name']; ?></td>
					<td><?php  echo $row['location']; ?></td>
					<td>
						<a href="index.php?edit=<?php echo $row['id']; ?>"
							class="btn btn-info">Edit</a>
							<a href="process.php?delete=<?php echo $row['id'];?>"
								class="btn btn-danger">Delete</a>
					</td>
				</tr>
			<?php endwhile; ?>
		</table>


	<div class="row justify-content-center">
	<form action="process.php" method="post">
				<input type="hidden"name="id" value="<?php echo $id; ?>">

		<div class="form-group">
		<label>Name</label>
		<input type="text" name="name" class="form-control" placeholder="Enter your name" 
		value="<?php echo $name ?>">
		<br>
		
		</div>
				<div class="form-group">

		<label>Location</label>
		<input type="text" name="location" class="form-control" placeholder="Enter your locaion" 
		value="<?php echo $location ?>"
		<br>
	</div>
	<div class="form-group">
		<?php if($update == true): ?>
		    <button type="submit" class="btn btn-info" name="update">Update</button>
		   <?php else: ?>
	      <button type="submit" class="btn btn-primary" name="save">SAVE</button>
	      <?php endif ?>
	</div>
		</div>


	
		
	</form>
	</div>
	</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
</body>
</html>
