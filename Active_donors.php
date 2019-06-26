<?php



include('header.php');
include('navbar.php');
?>


<!-- Datatables example -->
	<div class="card shadow mb-2">
		<div class="card-header py-3  badge-danger ">
			  
		  <h5 class="m-0 font-weight-bold text-white">  Hello, <span style="color: blue"> <?php echo $_SESSION['username']?></span> Welcome To Active Donors Management Page:
	      </h5>
	        
	    </div>
	<div class="card-body">

	
			<?php
			include('connection.php');
            if(isset($_POST['search']))
            {
            	$searchKey = $_POST['search'];

            	 $query = " SELECT * FROM donor where name LIKE '%$searchKey%'";
          

            }else
            {
            	 $query = " SELECT * FROM donor where status='1'";
                  $searchKey = "";

            }
             $query_run = mysqli_query($connection, $query);

           
			?>

				<?php
		if(isset($_SESSION['success']) && $_SESSION['success'] !='')
		{
			echo ' <div class="alert alert-success"> '.$_SESSION['success'].' </div>';
			unset($_SESSION['success']);
		}

		if(isset($_SESSION['status']) && $_SESSION['status'] !='')
		{
			echo '<div class="alert alert-danger"> '.$_SESSION['status'].' </div>';
			unset($_SESSION['status']);
		}


		?>
		<div class="row">
		<div class="col-md-12 ">
			
		<form action="" method="post">
	        <div class="row">
			 <div class="col-12 col-md-6">
			 </div>
			 	<div class="col-6 col-sm-4" style="margin-left: 10%">
			 <input type="search" name="search" class="form-control "   placeholder="Search by name:" value="<?php echo $searchKey; ?>">
			</div>
			<div class="col-sm-2-0">
				<button class="btn btn-info "> <i class="fas fa-search fa-sm"></i></button>
			</div>
		</div>
		</form>
	</div>
		<br>
	

			<table class="table table-hover" id="dataTable" width="90%" cellspacing="0">
				<thead class="badge-danger text-white">
					<tr>
						
						<th>Name</th>
						<th>Gender</th>
						<th>Phone</th>
						<th>By User</th>
						<th>Image</th>
						<th>Action</th>
						
					
					
					</tr>
				</thead>
				<tbody>
					<?php
					if(mysqli_num_rows($query_run) > 0)
					{
					
						while($row = mysqli_fetch_assoc($query_run))
						{
						?>
					<tr>
					
						<td><?php echo $row['name'];?></td>
						<td><?php echo $row['gender'];?></td>
						<td><?php echo $row['phone'];?></td>
						<td><?php echo $row['username_fk'];?></td>
    					<td><?php echo '<img src="upload/'. $row['image'].'" width="60px;" height="60px;" alt="image">' ?> </td>

						
						<td>
						<button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn btn-danger">Delete</button>
      					

        					 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#active<?php echo $row['donor_id']?>" <?php if($row['status'] == '1') { echo 'disabled'; }
        					 ?>><?php
         				 if($row['status'] == '1') { echo 'Activated'; } else {  echo 'Active'; }?></button>
         
						</td>
					      
					</tr>
					<!---->
					<div class="modal fade" id="deletdonor<?php echo $row['donor_id']?>" role="dialog">
    					<div class="modal-dialog modal-sm">
     					 <div class="modal-content">
       					 <div class="modal-header">
       					 	 <h4 class="modal-title">Are you sure ?</h4>
        					  <button type="button" class="close" data-dismiss="modal">&times;</button>
       					  
       					 </div>
       					 <div class="modal-body">
       					   <p>You Want to delete donor <span style="color: red"><?php echo $row['name'];?> ?</span></p>
       					 </div>
       					 <div class="modal-footer">
       					   <button type="button" class="btn btn-default" data-dismiss="modal"> Close</button>
       					  <a href="delete_Active.php?donor_id=<?php echo $row['donor_id'];?>"> <button type="button"  class="btn btn-danger"> Delete</button></a>
       					 </div>
      					</div>
   					 </div>
  					</div>
 					 <!-- end of delete state modal -->

 				<?php	
						}
						}else
					{
						echo '<div class="alert alert-warning"> No Record Founded: </div>';
					}

					?>
				</tbody>
				
			</table>
		</div>
	</div>

</div>


 <?php 
include('footer.php');
include('scripts.php');
?>