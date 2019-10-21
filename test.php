
<?php


#	/* Attempt MySQL server connection. Assuming you are running MySQL
#	server with default setting (user 'root' with no password) */
#	$link = mysqli_connect("localhost", "root", "")or die("ERROR: Could not connect. " . mysqli_connect_error());;

#	/* 
#	// Check connection
#	if($link === false){
#		die("ERROR: Could not connect. " . mysqli_connect_error());
#	}
#	*/
	 
#	// Attempt create database query execution
#	$sql = "CREATE DATABASE demo"; // "demo" is the database name
#	if(mysqli_query($link, $sql)){
#		echo "Database created successfully";
#	} else{
#		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
#	}
	 
#	// Close connection
#	mysqli_close($link);

?>




<?php
#	/* Attempt MySQL server connection. Assuming you are running MySQL
#	server with default setting (user 'root' with no password) */
#	$link = mysqli_connect("localhost", "root", "", "demo");
	 
#	// Check connection
#	if($link === false){
#		die("ERROR: Could not connect. " . mysqli_connect_error());
#	}
	 
#	// Attempt create table query execution
#	$sql = "CREATE TABLE persons(
#		id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
#		first_name VARCHAR(30) NOT NULL,
#		last_name VARCHAR(30) NOT NULL,
#		email VARCHAR(70) NOT NULL UNIQUE
#	)";
#	if(mysqli_query($link, $sql)){
#		echo "Table created successfully.";
#	} else{
#		echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
#	}
	 
#	// Close connection
#	mysqli_close($link);
?>


<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt insert query execution
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES
            ('John', 'Rambo', 'johnrambo@mail.com'),
            ('Clark', 'Kent', 'clarkkent@mail.com'),
            ('John', 'Carter', 'johncarter@mail.com'),
            ('Harry', 'Potter', 'harrypotter@mail.com')";
if(mysqli_query($link, $sql)){
    echo "Records added successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>