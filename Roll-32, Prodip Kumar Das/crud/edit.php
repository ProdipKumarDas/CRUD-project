<?php
$conn =  new mysqli('localhost','root','','crud');

$editid = $_GET['editid'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CRUD</title>
  </head>
  <body>

  <div class="container">
        <div class="row justify-content-center">
           <div class="col-md-6">
<?php

if(isset($_POST['submit'])){
	
$name  = $_POST['stu_name'];
$phone = $_POST['phone'];
$email = $_POST['email'];


$updatesql = "update info
             set
			 name = '$name',
			 phone = '$phone',
			 email = '$email'
			 where id = '$editid'";
			 
$updaterun = $conn->query($updatesql);


if($updaterun){
	 
	echo' <div class="alert alert-success" role="alert">
	  student data updated Successfully.
	</div>';
	
 }else{
	 echo'<div class="alert alert-danger" role="alert">
	 student data not updated.
	</div>';
	 
 }
	
	
}


?>		   
		   
		   
		   
		   
<?php
$sql = "select * from info where id = '$editid'";

$run = $conn->query($sql);

$row = $run->fetch_assoc();


?>		   
		   <form action="" method="post">
               <div class="mb-2">
               <label class="form-label">Name</label>
               <input type="text" class="form-control" name="stu_name" placeholder="Enter Name" value="<?php echo $row['name']?>">
               </div>

               <div class="mb-2">
               <label class="form-label">Phone</label>
               <input type="number" class="form-control" name="phone" placeholder="Enter Phone" value="<?php echo $row['phone']?>">
               </div>

               <div class="mb-2">
               <label  class="form-label">Email</label>
               <input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $row['email']?>">
               </div>
             
               <button type="submit" class="btn btn-primary" name="submit">Update</button>

          </form> 
		    </div>
        </div>
</div>

  
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>