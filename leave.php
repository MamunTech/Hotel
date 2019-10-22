<?php
$connect=mysqli_connect('localhost','root','','phphotel');



      
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	
	<div class="container">

		<form action="serch.php" method="post">
					
			
			
			<?php
			
			/*$in="In";
			$out="Out";
			
			
			switch($status){
				case '$in':
					echo "<h1>this guest is staying</h1>";
				break;
				
				case 0:
					echo "<h1>Please reload the page again</h1>";	
				break;
				
				case $out:
					echo "<h1>this guest is alrealdy out</h1>";
				break;
				
				
			}
			*/
			
			
			if($status=="In"){
				echo "<h1>this guest is staying</h1>";
							
				echo "	<lable>Phone</lable>
						<input type='tel' name='phone' class='form-control' required />
				
						<lable>Out Date</lable>
						<input type='date' name='out_date' class='form-control' required />

						<lable>Out Time</lable>
						<input type='time' name='out_time' class='form-control'  />
						
						<lable>Guest Status: </lable>
						<select name='status'>
							<option>Out</option>
						</select>
						
						<br />
						
						<button   type='submit' name='submit' class='btn btn-primary'  >leave</button> ";
						
						
					

			}
			elseif($status=="Out"){
				echo "<h1>this guest is alrealdy out</h1>";	
			}
			else{
				echo "<h1>Put number in search bar or reload this page</h1>";	
				
			}
			
			
			if(isset($_POST['submit'])){
				//parsing data from form
				$phone=$_POST['phone'];
				$out_date=$_POST['out_date'];
				$out_time=$_POST['out_time'];
				$status=$_POST['status'];
				echo $out_date;
				echo $status;
				
			// caculate total payable amount
				$query=mysqli_query($connect,"SELECT * FROM user_reg WHERE phone LIKE $phone") or die("Could not search");
					//print_r ($query);
								
					$value=mysqli_fetch_array($query);
					
					$date1=date_create($value['in_date']);
					//echo $out_date;
					$date2= date_create($out_date);
					//echo $date1;
					echo nl2br("\r\n");
					//echo $date2 ;
					echo nl2br("\r\n");
					$interval = date_diff($date1, $date2);
					
					$num=$interval->format('%R%a days');
					echo "<h1>You live here for $num </h1>";
					echo nl2br("\r\n");
					
					if($num==0){
						// if same day leave
						echo $value['price'];
					}
					else{
					echo nl2br("\r\n");
					$price=$value['price'];
					$tprice=$price*$num;
					echo "<h1>Total amount you have to pay $tprice </h1>";
					}
				
				
				
				
				
					//update out date, time and status, payment
					$sql = "UPDATE user_reg SET  out_date='$out_date',out_time='$out_time',status='Out', payment='$tprice' WHERE phone=$phone";
					if(mysqli_query($connect, $sql)){
						echo "Records were updated successfully.";
					}
					else {
							echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
					}
			}
			
			
			?>
			
			
			
		</form>	
	
</div>
	
	<br />
	<br />
	<br />
	
	
	
</body>
</html>
		