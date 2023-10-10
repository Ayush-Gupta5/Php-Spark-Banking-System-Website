<?php

include "db_connection.php";
$id=$_GET['id'];
$str="select * from user where id='$id'";
$res=mysqli_query($conn,$str);
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Money Transfer</title>

	<!-- Internal Css -->
	<link rel="stylesheet" type="text/css" href="Css/moneytf.css">
</head>
<body style="background-image: url('image/background.jpg')">

	<!-- Navbar Start -->

	<?php include "navbar.php";  ?>

	<!-- Navbar End -->

	<!-- Contain Start -->

	<h1 class="text-center mt-5" style="font-size:60px">Money Transfer</h1>

	<center>
		<?php
			while($rs=mysqli_fetch_array($res)){
				?>

		<form method="post">
				<p>Sender A/c Number</p>
				<input type="tel" name="sender" value="<?php echo $rs['name']." ( A/c No: ".$rs['acno'].")" ?>" readonly><p style="color:red">(balance : &#8377; <?php echo $rs['balance']?>)</p><br>
				<input type="hidden" name="senderbal" value="<?php echo $rs['balance'] ?>">
				<p>Receiver A/c Number</p>
				<input type="number" name="receiver" placeholder="Receiver's Account Number" required><br><br>
				<p>Amount to Transfer</p>
				<input type="tel" name="amount" placeholder="Amount to Transfer" required><br><br>
				<?php date_default_timezone_set('Asia/Kolkata');?>
				<input type="hidden" name="date" value="<?php echo date('d/m/y h:i:s A',time()); ?>">
				<button type="submit" name="submit" class="btn btn-success">Send Money</button><br><br>
				<button class="btn btn-danger"><a href="users.php">Cancel</a></button>
		</form>
		<?php
		}
		?>
	</center>

	

	<!-- Contain End -->


	<!-- Php Code Start -->

	<?php
		

		
	if (isset($_POST['submit'])) {

		$sender=$_POST['sender'];
		$receiver=$_POST['receiver'];
		$amount=$_POST['amount'];
		$date=$_POST['date'];
		$senderbal=$_POST['senderbal'];

		$str="select * from user where acno='$receiver'";
		$res1=mysqli_query($conn,$str);
		$row=mysqli_num_rows($res1);

		if ($row>0) {
			if ($senderbal>$amount) {
				$str="insert into transaction (sender,receiver,amount,date) values ('$sender','$receiver','$amount','$date')";
				$res2=mysqli_query($conn,$str);
			

				$sender_new_amt=$senderbal - $amount;
				$str="Update user set balance='$sender_new_amt' where id='$id'";
				$res3=mysqli_query($conn,$str);

				$str="select * from user where acno='$receiver'";
				$res4=mysqli_query($conn,$str);
				$row=mysqli_fetch_array($res4);

				$recevier_curr_amt=$row['balance'];
				$receiver_new_amt=$recevier_curr_amt + $amount;

				$str="update user set balance='$receiver_new_amt' where acno='$receiver'";
				$res5=mysqli_query($conn,$str);
				if ($res2 && $res3 && $res5 ) {
					echo "<script>alert('Transfer successfully');
							window.location.href='users.php';
					</script>";
				}

			}else{
				echo "<script>alert('Insuffient balance');</script>";
			}
		}else{
			echo "<script>alert('Account no. does not exist');</script>";
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