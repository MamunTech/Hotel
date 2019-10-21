	<?php 
/*
extract($_POST);
if(isset($save))
{
	switch($ch)
	{
		case '+':
		$res=$fn+$sn;
		break;
		
		case '-':
		$res=$fn-$sn;
		break;
		
		case '*':
		$res=$fn*$sn;
		break;
		
	}
	
}
*/
?>

<!--
<!DOCTYP html>
<html>
	<head>
		<title>Calculator- switch</title>
		
	</head>
	<body>
		<form method="post">
		<table border="1" align="center">
			<tr>
				<th>Your Result</th>
				<th><input type="number" readonly="readonly" disabled="disabled" value="<?php  echo @$res;?>" /></th>
			</tr> 
			
			<tr>
				<th>Enter your First num</th>
				<th><input type="number" name="fn" value="<?php  echo @$fn;?>"/></th>
			</tr> 
			<tr>
				<th>Enter your Second num</th>
				<th><input type="number" name="sn" value="<?php  echo @$sn;?>"/></th>
			</tr>
			<tr>
				<th>Select Your Choice</th>
				<th>
				<select name="ch">
					<option>+</option>
					<option>-</option>
					<option>*</option>
				</select>
				</th>
			</tr>
			<tr>
				
				<th colspan="2">
				<input type="submit" name="save" value="Show Result"/>
				</th>
			</tr>
		</table>
		</form>
	</body>
</html>

-->











<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "phphotel")or die("ERROR: Could not connect. " . mysqli_connect_error());;
 
// Check connection
/*
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}*/
 $total=0;
 
 
// Attempt select query execution
$sql = "SELECT * FROM user_reg";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>name</th>";
                echo "<th>phone</th>";
                echo "<th>email</th>";
                echo "<th>price</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
            echo "</tr>";
			$total+= $row['price'];
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
 echo "Total is=".$total." Taka";
// Close connection
mysqli_close($link);
?>







