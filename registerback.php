<?php
	$fn= $_POST['fname'];
	$ln= $_POST['lname'];
	$c= $_POST['cnic'];
	$pwd= $_POST['pass'];
	include_once('config.php');
	
	$res= mysqli_query($link,"SELECT cnic FROM credentials WHERE cnic= '$c'");
	$val= mysqli_fetch_array($res);
	if($val) { 
		echo "<script>alert('User already exists! Log In to continue');";
		echo "window.location= 'index.html'; </script>"; 
	}
	else { 
		$added= mysqli_query($link, "INSERT INTO credentials VALUES('$c','$fn','$ln','$pwd')");
		$st= mysqli_query($link, "INSERT INTO student VALUES('$c','$fn','$ln','','','','','','','','','','','','');");
	}
	if($added && $st) { header("location: index.html"); }
	else { 
		echo "<script>alert('Error while creating account! Register again to continue');";
		echo "window.location= 'index.html'; </script>"; 
	} 
?>
