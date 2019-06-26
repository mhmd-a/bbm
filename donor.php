<?php 
 include('connection.php');

 
    $city = " SELECT * FROM state";
    $query_run = mysqli_query($connection, $city);

//include('security.php');
include('header.php');
include('navbar.php');
?>


<!-- Modal -->
<div class="modal fade" id="addState" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="exampleModalLabel" >Add Donor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	      
	      <form action="add_donor.php" method="post" enctype="multipart/form-data">
	      <div class="modal-body">
          <div class="form-group">
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name"></input>
          </div>
          
          <div class="form-group">
            <input type="text" class="form-control" name="fathername" id="fathername" placeholder="Enter fathername"></input>
          </div>

          <div class="form-group">
            <select class="form-control" name="gender" id="gender" >
              <option value="male">Male</option>
              <option value="female">Female</option>
               
            </select>
          </div>
          
          <div class="form-group">
                <input type="date" id="datetimepicker3" name="datepicker" class="form-control">
                </div>


          <div class="form-group">
            <input type="text" class="form-control" name="weight" id="weight" placeholder="Enter weight"></input>
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Enter email"></input>
          </div>
          <div class="form-group">
            <select class="form-control" name="blood" id="blood" >
            	<option>Your blood type:-</option>
            <option value="A+">A+</option>
            <option value="B+">B+</option>
            <option value="O+">O+</option>
            <option value="AB+">AB+</option>  
            </select>
          </div>

           <div class="form-group">
            <select class="form-control" name="state" id="state" >
            	<option>Select your State</option>
           <?php
         		  $state = " SELECT * FROM state";
   				 $query_run = mysqli_query($connection, $state);		

					if(mysqli_num_rows($query_run) > 0)
					{
						while($row = mysqli_fetch_assoc($query_run))
						{
						?>
						
						<option value="<?php echo $row['state_name'];?>"><?php echo $row['state_name'];?></option>
						<?php	
						}
					}
					?>
             
            </select>
          </div>

          <div class="form-group">
            <select class="form-control" name="city" id="city" >
          <option> Select your Location</option> 
          <?php

                  $city = " SELECT * FROM city";
    			 $query_run = mysqli_query($connection, $city);

					if(mysqli_num_rows($query_run) > 0)
					{
						while($row = mysqli_fetch_assoc($query_run))
						{
						?>
						
						<option value="<?php echo $row['city_name'];?>"><?php echo $row['city_name'];?></option>
						<?php	
						}
					}
					?>
            </select>
          </div>


          <div class="form-group">
            <input type="text" class="form-control" name="pincode" id="pincode" placeholder="Enter pincode"></input>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter phone"></input>
          </div>
          <div class="form-group">
            <textarea type="text" class="form-control" name="address" id="address" placeholder="Enter Address"></textarea>
          </div>
          
          <div class="form-group">
            <input type="file" class="form-control" name="photo" id="photo" ></input>
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning" name="addDonor_btn">Add</button>
        </div>
        </form>
	   
	   </div>
  </div>
</div>


  <!-- the table displaying data-->


<!-- Datatables example -->
	<div class="card shadow ">
		<div class="card-header py-3  bg-danger ">
			  
		  <h5 class="m-0 font-weight-bold text-white">  Hello, <span style="color: blue"> <?php echo $_SESSION['username']?></span> Welcome To Donors Management Page:
	      </h5>
	         <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addState">
			 add Donor
			 </button>
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
            	 $query = " SELECT * FROM donor ";
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
			
		
	        <div class="row">
			 <div class="col-12 col-md-6">
			 </div>
			 	<div class="col-6 col-sm-4" style="margin-left: 10%">
			 <input type="text" name="search" class="form-control "   placeholder="Search by name:" value="<?php echo $searchKey; ?>">
			</div>
			<div class="col-sm-2-0">
				<button class="btn btn-info "> <i class="fas fa-search fa-sm"></i></button>
			</div>
		</div>
	</div>
		
			<table class="table table-hover" id="dataTable" width="90%" cellspacing="0">
				<thead class="bg-danger text-white">
					<tr>
						
						<th>Name</th>
						<th>Gender</th>
						<th>Phone</th>
						<th>By User</th>
						<th>Image</th>
						<th></th>
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
        				<td></td>
						
						<td>
						<button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn btn-danger">Delete</button>
      					<button type="button" data-toggle="modal" data-target="#editdonor<?php echo $row['donor_id'];?>" class="btn btn-warning">Edit</button>
				

        					 <button type="button" class="btn btn-info" data-toggle="modal" data-target="#active<?php echo $row['donor_id']?>" <?php if($row['status'] == '1') { echo 'disabled'; }?>><?php
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
       					  <a href="delete_donor.php?donor_id=<?php echo $row['donor_id'];?>"> <button type="button"  class="btn btn-danger"> Delete</button></a>
       					 </div>
      					</div>
   					 </div>
  					</div>
 					 <!-- end of delete state modal -->

 					 <!-- active modal -->
					  <div class="modal fade" id="active<?php echo $row['donor_id']?>" role="dialog">
					    <div class="modal-dialog modal-sm">
					      <div class="modal-content">
					        <div class="modal-header">
					          <h4 class="modal-title">Are you sure ?</h4>
					          <button type="button" class="close" data-dismiss="modal">&times;</button>
					        
					        </div>
					        <div class="modal-body">
					          <p>Want to activated this Donor <span style="color: red"><?php echo $row['name'];?></span> ?</p>
					          <form action="edit_status.php?status_id=<?php echo $row['donor_id']?>" method="post">
					            <input type="hidden" name="status" value="1"></input>
					        
					        </div>
					        <div class="modal-footer">
					          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					         <button type="submit" class="btn btn-success">Activate</button>
					        </div>
					        </form>
					      </div>
					    </div>
					  </div>


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