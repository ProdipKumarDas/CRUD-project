<?php

  $conn =  new mysqli('localhost','root','','crud');
  
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

               $stuname =  $_POST['stu_name'];
               $phone =  $_POST['phone']; 
               $email = $_POST['email']; 
			   
			   
			 $sql = "insert into info(name,phone,email)values('$stuname','$phone','$email')";
			 
			$result = $conn->query($sql);
			 
			 if($result){
				 
				echo' <div class="alert alert-success" role="alert">
				  student data inserted Successfully
				</div>';
				
			 }else{
				 echo'<div class="alert alert-danger" role="alert">
				 student data not inserted
				</div>';
				 
			 }
			 
			 
			 

          }

          
          ?>


           <form action="" method="post">
               <div class="mb-2">
               <label class="form-label">Name</label>
               <input type="text" class="form-control" name="stu_name" placeholder="Enter Name">
               </div>

               <div class="mb-2">
               <label class="form-label">Phone</label>
               <input type="number" class="form-control" name="phone" placeholder="Enter Phone">
               </div>

               <div class="mb-2">
               <label  class="form-label">Email</label>
               <input type="email" class="form-control" name="email" placeholder="Enter Email">
               </div>
             
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>

          </form> 

	<br>	  
	<br>	  
	<br>	  
		 
<?php
if(isset($_GET['stuid'])){
	
	$id = $_GET['stuid'];
	
	$delsql = "delete from info where id = '$id'";
	
	$delresult = $conn->query($delsql);
	
	if($delresult){
				 
		echo' <div class="alert alert-success" role="alert">
		  student data deleted Successfully.
		</div>';
		
	 }else{
		 echo'<div class="alert alert-danger" role="alert">
		 student data not deleted.
		</div>';
		 
	 }
			 
	
	
}



?>
		 
		<table class="table table-bordered table-sm table-hover">  
		
		   <tr bgcolor="green">
		      <th>Name</th>
		      <th>Phone</th>
		      <th>Email</th>
		      <th>Action</th>
		   </tr>
	<?php
	$sql2 = "select * from info"; 
	$run = $conn->query($sql2);

	while($result = $run->fetch_assoc()){ ?>
		
		   <tr>
		      <td><?php echo $result['name'];?></td>
		      <td><?php echo $result['phone'];?></td>
		      <td><?php echo $result['email'];?></td>
		      <td>
			     <a href="edit.php?editid=<?php echo $result['id']?>"><button type="button" class="btn btn-warning">Edit</button> | </a>
			     <a href="index.php? stuid=<?php echo $result['id']?>"><button type="button" class="btn btn-danger">delete</button></a>
			  </td>
		   </tr>
		
<?php } ?>	   
		   
		  
		   
		   
		   
		</table>  
		  
		  
		  
           </div>
        </div>
</div>

  




    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>