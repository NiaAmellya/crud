<?php
include('db.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Student Crud Operation</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container jumbotron">
		<h4 class="text-center">
		   Crud Operation in PHP and Mysql 
		   <span style="margin-left: 30px;">
		   	     <a href="#"><i class="fa fa-plus" data-toggle="modal" data-target="#myModal"></i></a>
		   </span>
		</h4>
		<table class="table table-bordered table-striped table-hover">
			<tr>
				<th class="text-center">ID</th>
				<th class="text-center">Name</th>
				<th class="text-center">E-mail</th>
				<th class="text-center">Phone</th>
				<th class="text-center">Address</th>
				<th class="text-center">Picture</th>
				<th class="text-center">Edit</th>
				<th class="text-center">Delete</th>
			</tr>

			<?php

        	$get_data = "SELECT * FROM user";
        	$run_data = mysqli_query($con,$get_data);

        	while($row = mysqli_fetch_array($run_data))
        	{
        		$id = $row['id'];
        		$name = $row['name'];
        		$email = $row['email'];
        		$phone = $row['phone'];
        		$address = $row['address'];
        		$image = $row['image'];

        		echo "

        		<tr>
				<td class='text-center'>$id</td>
				<td class='text-center'>$name</td>
				<td class='text-center'>$email</td>
				<td class='text-center'>$phone</td>
				<td class='text-center'>$address</td>
				<td class='text-center'><img src='images/$image' style='width:50px; height:50px;'></td>
				<td class='text-center'>
					<span>
					     <a href='#'>
					         <i class='fa fa-pencil' data-toggle='modal' data-target='#edit$id' style='' aria-hidden='true'></i>
					    </a>
					</span>
					
				</td>
				<td class='text-center'>
					<span>
						<a href='#'>
						     <i class='fa fa-trash' data-toggle='modal' data-target='#$id' style='' aria-hidden='true'></i>
						</a>
					</span>
					
				</td>
			</tr>


        		";
        	}

        	?>

			
			
		</table>
	</div>



	
	<!---Add in modal---->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-center">Add Data</h4>
      </div>
      <div class="modal-body">
        <form action="add.php" method="POST" enctype="multipart/form-data">


        	<div class="form-group">
        		<label>ID</label>
        		<input type="text" name="id" class="form-control" placeholder="Your ID.....">
        	</div>

        	<div class="form-group">
        		<label>Name</label>
        		<input type="text" name="name" class="form-control" placeholder="Your Name.....">
        	</div>

        	<div class="form-group">
        		<label>E-Mail</label>
        		<input type="email" name="email" class="form-control" placeholder="Your Email.....">
        	</div>

        	<div class="form-group">
        		<label>Phone</label>
        		<input type="text" name="phone" class="form-control" placeholder="Your Phone.....">
        	</div>

        	<div class="form-group">
        		<label>Address</label>
        		<input type="text" name="address" class="form-control" placeholder="Your Address.....">
        	</div>

        	<div class="form-group">
        		<label>Image</label>
        		<input type="file" name="image" class="form-control" >
        	</div>

        	
        	 <input type="submit" name="submit" class="btn btn-info btn-large" value="Submit">
        	
        	
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!------DELETE modal---->




<!-- Modal -->
<?php

$get_data = "SELECT * FROM user";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	echo "

<div id='$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal'>&times;</button>
        <h4 class='modal-title text-center'>Are you want to sure??</h4>
      </div>
      <div class='modal-body'>
        <a href='delete.php?id=$id' class='btn btn-danger' style='margin-left:250px'>Delete</a>
      </div>
      
    </div>

  </div>
</div>


	";
}


?>

<!----edit Data--->

<?php

$get_data = "SELECT * FROM user";
$run_data = mysqli_query($con,$get_data);

while($row = mysqli_fetch_array($run_data))
{
	$id = $row['id'];
	$name = $row['name'];
	$email = $row['email'];
	$phone = $row['phone'];
	$address = $row['address'];
	$image = $row['image'];
	echo "

<div id='edit$id' class='modal fade' role='dialog'>
  <div class='modal-dialog'>

    <!-- Modal content-->
    <div class='modal-content'>
      <div class='modal-header'>
             <button type='button' class='close' data-dismiss='modal'>&times;</button>
             <h4 class='modal-title text-center'>Edit your Data</h4> 
      </div>

      <div class='modal-body'>
        <form action='edit.php?id=$id' method='post' enctype='multipart/form-data'>

             
        	<div class='form-group'>
        		<label>Name</label>
        		<input type='text' name='name' class='form-control' value='$name'>
        	</div>

        	<div class='form-group'>
        		<label>E-Mail</label>
        		<input type='email' name='email' class='form-control' value='$email'>
        	</div>

        	<div class='form-group'>
        		<label>Phone</label>
        		<input type='text' name='phone' class='form-control' value='$phone'>
        	</div>

        	<div class='form-group'>
        		<label>Address</label>
        		<input type='text' name='address' class='form-control' value='$address'>
        	</div>

        	<div class='form-group'>
        		<label>Image</label>
        		<input type='file' name='image' class='form-control' required>
        		<img src = 'images/$image' style='width:50px; height:50px'>
        	</div>

        	
        	 <input type='submit' name='submit' class='btn btn-info btn-large' value='Submit'>
        	



        </form>
      </div>

    </div>

  </div>
</div>


	";
}


?>


</body>
</html>