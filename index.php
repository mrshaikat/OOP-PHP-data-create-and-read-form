<?php
	
	require_once "libs/function.php";
	$student = new Student;

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Development Area</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>

 
	
	

	<div class="wrap shadow">
		<div class="card">
			<div class="card-body">
				<h2>Sign Up</h2>

				<?php 
 
		 if(isset( $_POST['submit'])){

		 $name = $_POST['name'];
		 $email = $_POST['email'];
		 $cell = $_POST['cell'];
		 $uname = $_POST['uname'];

		$uname_check =  $student -> checkUname($uname);

		 if( empty($name) || empty($email) || empty($cell) || empty($uname) ){

			echo "<strong>Fild Must not be empty</strong>";

		 }elseif( $uname_check == false ){
			echo "<strong>Username Already Exist</strong>";
		 }
		 else{

			$data = $student -> insertStudent($name,$email, $cell, $uname);

						if($data == true){

						echo "Sign Up successfully";
					}else{
						echo "Data has some";
					}



	}
}
 ?>

				<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" type="text">
					</div>
					<div class="form-group">
						<label for="">Username</label>
						<input name="uname" class="form-control" type="text">
					</div>
					<div class="form-group">
						<input name="submit" class="btn btn-primary" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
		</div>
	</div>
	


			<div class="data-all">
			<table class=" table table-striped table-hover">

					<thead>
						<tr>
							<th>Name</th>
							<th>Email</th>
							<th>Cell</th>
							<th>Username</th>
						</tr>
					</thead>

					<tbody>
						<?php 

							$all_data = $student -> allData();

							while( $data = $all_data -> fetch_assoc() ):
						
						?>
						<tr>
							<td><?php echo  $data['name'];?></td>
							<td><?php echo  $data['email'];?></td>
							<td><?php echo  $data['cell'];?></td>
							<td><?php echo  $data['uname'];?></td>
						</tr>


							<?php endwhile; ?>
					</tbody>

			</table>
			</div>




	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>


