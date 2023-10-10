<?php
include "db_connection.php";

$str="select * from user order by id desc";
		$res=mysqli_query($conn,$str);
		$row=mysqli_fetch_array($res);
		$lastno=$row["acno"];
		if ($lastno == "") {

			$lastno =1001;

		}else{
			$lastno=($lastno + 1);
		}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users</title>

	<!-- External Css -->
	<link rel="stylesheet" type="text/css" href="Css/users.css">

</head>
<body style="background-image: url('image/background.jpg')">

	<!-- Navbar Start-->

		<?php include "navbar.php"; ?>

	<!-- Navbar End -->

	<!-- Contain Start -->

	<div>
		<h1 class="text-center mt-1" style="font-size:60px">Users Of Bank</h1>
		<div>
			<div class="container">
				<br>
				<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped mb-0 mt-1" style="text-align: center;">
					<thead style="position: sticky;top: 0" class="thead-dark">
						<tr>
							<th class="header">S No.</th>
							<th class="header">Name</th>
							<th class="header">Mobile Number</th>
							<th class="header">Email</th>
							<th class="header">Account Number</th>
							<th class="header">Balance Amount</th>
							<th class="header">Action</th>
						</tr>
						<?php
						$str="select * from user";
						$res2=mysqli_query($conn,$str);

							while ($rs=mysqli_fetch_array($res2)) {
								?>


						<tr>
							<td><?php echo $rs['id']; ?></td>
							<td><?php echo $rs['name']; ?></td>
							<td><?php echo $rs['mobile']; ?></td>
							<td><?php echo $rs['email']; ?></td>
							<td><?php echo $rs['acno']; ?></td>
							<td style="color:red">&#8377; <?php echo $rs['balance']; ?></td>
							<td><a href="moneytf.php?id=<?php echo $rs['id']?>"><button class="btn btn-success">Money Transfer</button></a></td>
						</tr>
						<?php
							}
						?>
					</thead>
				</table>
			</div>
			</div>

	<!-- Contain End -->



	<!-- Php Code Start -->

	<?php

	if (isset($_POST['submit'])) {
		$acno=$_POST['acno'];
		$name=$_POST['name'];
		$mobile=$_POST['mobile'];
		$email=$_POST['email'];
		$balance=$_POST['balance'];

		$str="insert into user (acno,name,mobile,email,balance) values ('$acno','$name','$mobile','$email','$balance')";
		$res1=mysqli_query($conn,$str);
		if ($res1) {
			echo "<script>
					alert('User add Successfully');
					window.location.href='users.php';
				</script>";
		}
		
	}
	?>
	<!-- Php Code End -->

	<!-- Footer Start -->

		<footer>
			<center>
				<div class="foot">
				&#169; Copyright 2023, Ayush Gupta
				</div>
			</center>
	</footer>
	<!-- Footer End -->

</body>
</html>