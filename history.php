<?php
include 'db_connection.php';
$str="select * from transaction";
$res=mysqli_query($conn,$str);

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users</title>

	<!-- External Css -->
	<link rel="stylesheet" type="text/css" href="Css/history.css">

</head>
<body style="background-image: url('image/background.jpg')">

	<!-- Navbar Start-->

		<?php include "navbar.php"; ?>

	<!-- Navbar End -->

	<!-- Contain Start -->

	<div>
		<h1 class="text-center mt-2" style="font-size:60px">Transaction History</h1>
		<div>
			<div class="container">
				<br>
				<div class="table-wrapper-scroll-y my-custom-scrollbar">
				<table class="table table-bordered table-striped mb-0" style="text-align: center;">
					<thead style="position: sticky;top: 0" class="thead-dark">
						<tr>
							<th class="header">S No.</th>
							<th class="header">Sender</th>
							<th class="header">Receiver (A/c no)</th>
							<th class="header">Amount</th>
							<th class="header">Date</th>
						</tr>

						<?php
							while ($rs=mysqli_fetch_array($res)) {
								?>

						<tr>
							<td><?php echo $rs['id']; ?></td>
							<td><?php echo $rs['sender']; ?></td>
							<td><?php echo $rs['receiver']; ?></td>
							<td style="color:red">&#8377; <?php echo $rs['amount']; ?></td>
							<td><?php echo $rs['date']; ?></td>
						</tr>
						
						<?php
							}
						?>

						
					</thead>
				</table>
			</div>
			</div>

	<!-- Contain End -->

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