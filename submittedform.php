<?php
	include_once("config.php");
	// if form is already submitted
	/*if(!isset($_POST["submit"])){
		$c= $_REQUEST['cn'];
	}*/
	if(isset($_POST["submit"]))
	{
		$c= $_POST['cnic'];
		$adr= $_POST['addr'];
		$gen= $_POST['radio'];
		$sch_name= $_POST['sc-name'];
		$sch_roll= $_POST['sc-roll'];
		$sch_board= $_POST['sc-brd'];
		$sch_marks= $_POST['sc-marks'];
		$cllg_name= $_POST['cllg-name'];
		$cllg_roll= $_POST['cllg-roll'];
		$cllg_board= $_POST['cllg-brd'];
		$cllg_marks= $_POST['cllg-marks'];
		$dept= $_POST['dep'];
		
		// File upload path
		$targetDir = "uploads/";
		$fileName = basename($_FILES["picture"]["name"]);
		$targetFilePath = $targetDir.$fileName;
		$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
		// Allow certain file formats
		$allowTypes = array('jpg','jpeg');
		$que= "UPDATE student SET 
				address= '$adr',
				gender= '$gen',
				school_name= '$sch_name',
				school_roll= '$sch_roll',
				school_board= '$sch_board',
				school_score= '$sch_marks',
				college_name= '$cllg_name',
				college_roll= '$cllg_roll',
				college_board= '$cllg_board',
				college_score= '$cllg_marks',
				department= '$dept',
				picture= '$fileName'
				WHERE cnic= '$c'";
							
			if(in_array($fileType, $allowTypes)){
				// Upload file to server
				if(move_uploaded_file($_FILES["picture"]["tmp_name"], $targetFilePath)){
					// Insert image file and other data into database
					$insert = mysqli_query($link,$que);
					$statusMsg= '';
					if(!$insert){
						$statusMsg = "File upload failed, please try again.";
					}
				}else{
					$statusMsg = "Sorry, there was an error uploading your file.";
				}
			}else{
				$statusMsg = 'Sorry, only JPG and JPEG files are allowed to upload.';
			}

		// Display status message
		if($statusMsg!=''){
			echo '<script> alert($statusMsg); 
			window.location= "admission.php";</script>';
			
		}
	}
		
 /*
 form for displaying submitted data
 */
echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">';
echo '<link rel="stylesheet" href="css/styleadmission.css">';

	$q= mysqli_query($link,"SELECT * FROM student where cnic='$c'");
	echo '<div class="wrapper rounded bg-white">';
    echo '<div class="form">';
	echo '<form>';
	while($res= mysqli_fetch_array($q)) {
?>
		<div class="row">
			<div class="col"> 
			<?php
				$p = mysqli_query($link,"SELECT picture FROM student where cnic= '$c'");
				$pic= mysqli_fetch_assoc($p);
				$imageURL = 'uploads/'.$pic["picture"];
				echo "<img src='$imageURL' width='150px' height='200px'/>";	
			?>
			</div>
			<div class="row">
				<div class="col">
				  <label>First name</label>
				  <input type="text" class="form-control-plaintext" value="<?php echo $res['name'] ?>" readonly>
				
				</div>
				<div class="col">
				  <label>Last name</label>
				  <input type="text" class="form-control-plaintext" value="<?php echo $res['father'] ?>" readonly>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col">
			  <label>CNIC</label>
			  <input type="text" class="form-control-plaintext" value="<?php echo $res['cnic'] ?>" readonly>
			</div>
			<div class="col"> <label>Gender</label>
                <input type="text" class="form-control-plaintext" value="<?php echo $res['gender'] ?>" readonly>
            </div>
		</div>
        <div class="row">
            <div class="form-group">
				<label>Address</label>
				<input type="text" class="form-control-plaintext" value="<?php echo $res['address'] ?>" readonly>
  			</div>
        </div>
		<br>
        <div class="row">
			<div class="col-md-6 mt-md-0 mt-3"> <label>Matriculation</label> </div> 
        
		<table class="table">
		  <thead>
			<tr>
			  <th scope="col">School name</th>
			  <th scope="col">Matric Roll#</th>
			  <th scope="col">Board</th>
			  <th scope="col">Obt. Marks</th>
			</tr>
		  </thead>
			<tbody>
			<tr>
				<th scope="row"><input type="text" name="sc-name" class="form-control" value="<?php echo $res['school_name'] ?>" readonly></th>
				<td><input type="text" name="sc-roll" class="form-control" value="<?php echo $res['school_roll'] ?>" readonly></td>
				<td><input type="text" name="sc-brd" class="form-control" value="<?php echo $res['school_board'] ?>" readonly></td>
				<td><input type="text" name="sc-marks" class="form-control" value="<?php echo $res['school_score'] ?>" readonly></td>
			</tr>
			</tbody>
		</table>
		</div>
		
        <div class="row">
			<div class="col-md-6 mt-md-0 mt-3"> <label>Intermediate</label> </div> 
        
		<table class="table">
			<thead>
			<tr>
			  <th scope="col">College name</th>
			  <th scope="col">Inter Roll#</th>
			  <th scope="col">Board</th>
			  <th scope="col">Obt. Marks</th>
			</tr>
		  </thead>
			<tbody>
			<tr>
				<th scope="row"><input type="text" name="cllg-name" class="form-control" value="<?php echo $res['college_name'] ?>" readonly></th>
				<td><input type="text" name="cllg-roll" class="form-control" value="<?php echo $res['college_roll'] ?>" readonly></td>
				<td><input type="text" name="cllg-brd" class="form-control" value="<?php echo $res['college_board'] ?>" readonly></td>
				<td><input type="text" name="cllg-marks" class="form-control" value="<?php echo $res['college_score'] ?>" readonly></td>
			</tr>
			</tbody>
		</table>
		</div>
		
         <div class="row">
			<div class="col-md-6 mt-md-0 mt-3"> <label>Department</label> 
			<input type="text" class="form-control-plaintext" value="<?php echo $res['department'] ?>" readonly>
			</div>
		 </div>
		
		<br />
		
    </div>
	
	<?php
		}
		echo '</form>';
	?>	