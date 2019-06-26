 <?php

  include('connection.php');
  include('header.php'); 
  include('navbar.php');
  ?>
    <!-- Sidebar -->
   


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Welcome to Admin Dashboard: </h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><h4> Total Members </h4></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                       
                        <?php
                        include('connection.php');
                        $query = "SELECT member_id FROM member ORDER BY member_id";
                        $query_run = mysqli_query($connection, $query);

                       $row = mysqli_num_rows($query_run);

                       echo  '<h1> '.$row.'</h1>';

                        ?>
 
                      </div>

                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1"><h4>Number of Donors:</h4></div>
                      <div class="h5 mb-0 font-weight-bold text-black">

                           <?php
                        include('connection.php');
                        $query = "SELECT donor_id FROM donor ORDER BY donor_id";
                        $query_run = mysqli_query($connection, $query);

                       $row = mysqli_num_rows($query_run);

                       echo  '<h1> '.$row.'</h1>';

                        ?><br/>
                       
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase text-bold mb-1"><h4>Active Donors</h4></div>
                      <div class="row no-gutters align-items-center">
                        <div class="col-auto">
                          <div class="h5 mb-0 mr-3 font-weight-bold text-gray"><h1>
                             <?php
                        include('connection.php');
                        $query = "SELECT donor_id FROM donor where status = '1' ORDER BY donor_id";
                        $query_run = mysqli_query($connection, $query);

                       $row = mysqli_num_rows($query_run);

                       echo  '<h1> '.$row.'</h1>';

                        ?></h1>

                          </div>
                         </div>
                       
                      </div>
                    </div>
                   
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"><h3>Admin Users</h3></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <h1>
                            <?php
                        include('connection.php');
                        $query = "SELECT member_id FROM member where usertype = 'admin' ORDER BY member_id";
                        $query_run = mysqli_query($connection, $query);

                       $row = mysqli_num_rows($query_run);

                       echo  '<h1> '.$row.'</h1>';

                        ?>
 
                    
                        </h1>
                      </div>
                    </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
                
      <!-- Content Row -->

      <h2>Recent Donors</h2><br/> 

        <nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All Blood Groups</a>
      <a class="nav-item nav-link" id="nav-A-tab" data-toggle="tab" href="#nav-A" role="tab" aria-controls="nav-profile" aria-selected="false">A+</a>
      <a class="nav-item nav-link" id="nav-Aa-tab" data-toggle="tab" href="#nav-Aa" role="tab" aria-controls="nav-contact" aria-selected="false">A-</a>
       <a class="nav-item nav-link" id="nav-B-tab" data-toggle="tab" href="#nav-B" role="tab" aria-controls="nav-contact" aria-selected="false">B+</a>
        <a class="nav-item nav-link" id="nav-Bb-tab" data-toggle="tab" href="#nav-Bb" role="tab" aria-controls="nav-contact" aria-selected="false">B-</a>
         <a class="nav-item nav-link" id="nav-AB-tab" data-toggle="tab" href="#nav-AB" role="tab" aria-controls="nav-contact" aria-selected="false">AB+</a>
         <a class="nav-item nav-link" id="nav-ABab-tab" data-toggle="tab" href="#nav-ABab" role="tab" aria-controls="nav-contact" aria-selected="false">AB-</a>
         <a class="nav-item nav-link" id="nav-O-tab" data-toggle="tab" href="#nav-O" role="tab" aria-controls="nav-contact" aria-selected="false">O+</a>
         <a class="nav-item nav-link" id="nav-Oo-tab" data-toggle="tab" href="#nav-Oo" role="tab" aria-controls="nav-contact" aria-selected="false">O-</a>
    </div>
  </nav>
  <div class="tab-content" id="nav-tabContent">
    <!--Home All Groups-->
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
      
       <table class="table table-hoven table-white">
              
  <thead class="bg-white text-dark ">
    <tr>

      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Gender</th>
         <th scope="col">Donation Time</th>
      <th scope="col">Blood Group</th>
    
      <th scope="col">Action</th>
      <th scope="col"> <?php 
                        $query = "SELECT donor_id FROM donor ORDER BY donor_id";
                        $query_run = mysqli_query($connection, $query);

                       $row = mysqli_num_rows($query_run);

                       echo  '<h5> '.$row.'</h5>';

                        ?></th>


    </tr>
  </thead>
  
  <tbody>
    <?php
    $query = "SELECT * FROM donor";
      $result = mysqli_query($connection, $query);
     
     
    if(mysqli_num_rows($result) > 0)
          {
          
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
    <tr>
    
      <td><?php echo $row['name'];?></td>
       <td><?php echo $row['father_name'];?></td>
       <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['donation date'];?></td>
         <td><b><?php echo $row['blood_group'];?></b></td>



      <td>
        <button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn  btn-danger">Delete</button> 
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#view<?php echo $row['donor_id']?>">View</button>

    </tr>

   <!--Donor Detail Desplay-->
    <div class="modal fade" id="view<?php echo $row['donor_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Donor Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <center><?php echo '<img src="upload/'. $row['image'].'" width="100px;" height="100px;" alt="image">' ?>
      </center></div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label>Name: </label>
        <label><b><?php echo $row['name']?></b></label>
      </div>
      <div class="col-md-8">
         <label>Last Name: </label>
        <label ><b><?php echo $row['father_name'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
       <label>Gender: </label>
        <label ><b><?php echo $row['gender'];?></b></label>
      </div>
      <div class="col-md-8 ">
       <label>Birth Day: </label>
        <label ><b><?php echo $row['dob'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
         <label>Registration Date: </label>
        <label ><b><?php echo $row['donation date'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>By User: </label>
        <label ><b><?php echo $row['username_fk'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Email: </label>
        <label ><b><?php echo $row['email'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>blood Group: </label>
        <label ><b><?php echo $row['blood_group'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <label>State: </label>
        <label ><b><?php echo $row['state'];?></b></label>
      </div>
      <div class="col-md-6">
         <label>City: </label>
        <label ><b><?php echo $row['city'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Address: </label>
        <label ><b><?php echo $row['address'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>State: </label>
        <label ><b><?php echo $row['phone'];?></b></label>
      </div>
    </div>
      <div class="row">
       <div class="col-md-4 ">
         <label>Pincode: </label>
        <label ><b><?php echo $row['pincode'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>Amount of Donated Blood : </label>
        <label ><b><?php echo $row['blood volume'];?></b></label>
      </div>
    </div>

      
    
  </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>

    <!--end the View Model-->  

    <?php 
            }
            }else
          {
            echo '<div class="alert alert-danger"> No Record Founded: </div>';
          }

          ?>

  </tbody>
</table>
    </div>
    <!--End Home-->

    <!--End A+ -->
    <div class="tab-pane fade" id="nav-A" role="tabpanel" aria-labelledby="nav-A-tab">
    <table class="table table-hoven table-white">
              
  <thead class="bg-white text-dark  ">
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Gender</th>
         <th scope="col">Donation Time</th>
      <th scope="col">Blood Group</th>
    
      <th scope="col">Action</th>


    </tr>
  </thead>
  
  <tbody>
    <?php
    $query = "SELECT * FROM donor where blood_group='A+'";
      $result = mysqli_query($connection, $query);
     
     
    if(mysqli_num_rows($result) > 0)
          {
          
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
    <tr>
    
      <td><?php echo $row['name'];?></td>
       <td><?php echo $row['father_name'];?></td>
       <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['donation date'];?></td>
         <td><b><?php echo $row['blood_group'];?></b></td>



      <td>
        <button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn  btn-danger">Delete</button> 
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#view2<?php echo $row['donor_id']?>">View</button>

    </tr>

       <!--Donor Detail Desplay-->
    <div class="modal fade" id="view2<?php echo $row['donor_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Donor Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <center><?php echo '<img src="upload/'. $row['image'].'" width="100px;" height="100px;" alt="image">' ?>
      </center></div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label>Name: </label>
        <label><b><?php echo $row['name']?></b></label>
      </div>
      <div class="col-md-8">
         <label>Last Name: </label>
        <label ><b><?php echo $row['father_name'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
       <label>Gender: </label>
        <label ><b><?php echo $row['gender'];?></b></label>
      </div>
      <div class="col-md-8 ">
       <label>Birth Day: </label>
        <label ><b><?php echo $row['dob'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
         <label>Registration Date: </label>
        <label ><b><?php echo $row['donation date'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>By User: </label>
        <label ><b><?php echo $row['username_fk'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Email: </label>
        <label ><b><?php echo $row['email'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>blood Group: </label>
        <label ><b><?php echo $row['blood_group'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <label>State: </label>
        <label ><b><?php echo $row['state'];?></b></label>
      </div>
      <div class="col-md-6">
         <label>City: </label>
        <label ><b><?php echo $row['city'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Address: </label>
        <label ><b><?php echo $row['address'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>State: </label>
        <label ><b><?php echo $row['phone'];?></b></label>
      </div>
    </div>
      <div class="row">
       <div class="col-md-4 ">
         <label>Pincode: </label>
        <label ><b><?php echo $row['pincode'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>Amount of Donated Blood : </label>
        <label ><b><?php echo $row['blood volume'];?></b></label>
      </div>
    </div>

      
    
  </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
       <?php 
            }
            }else
          {
            echo '<div class="alert alert-danger"> No Record Founded: </div>';
          }

          ?>

  </tbody>
</table>
    </div>
    <!--End A+ -->

    <!--Start A- -->
    <div class="tab-pane fade" id="nav-Aa" role="tabpanel" aria-labelledby="nav-Aa-tab">
      <table class="table table-hoven table-white">
              
  <thead class="bg-white text-dark  ">
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Gender</th>
         <th scope="col">Donation Time</th>
      <th scope="col">Blood Group</th>
    
      <th scope="col">Action</th>


    </tr>
  </thead>
  
  <tbody>
    <?php
    $query = "SELECT * FROM donor where blood_group='A-'";
      $result = mysqli_query($connection, $query);
     
     
    if(mysqli_num_rows($result) > 0)
          {
          
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
    <tr>
    
      <td><?php echo $row['name'];?></td>
       <td><?php echo $row['father_name'];?></td>
       <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['donation date'];?></td>
         <td><b><?php echo $row['blood_group'];?></b></td>



      <td>
        <button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn  btn-danger">Delete</button> 
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#view2<?php echo $row['donor_id']?>">View</button>

    </tr>

       <!--Donor Detail Desplay-->
    <div class="modal fade" id="view2<?php echo $row['donor_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Donor Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <center><?php echo '<img src="upload/'. $row['image'].'" width="100px;" height="100px;" alt="image">' ?>
      </center></div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label>Name: </label>
        <label><b><?php echo $row['name']?></b></label>
      </div>
      <div class="col-md-8">
         <label>Last Name: </label>
        <label ><b><?php echo $row['father_name'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
       <label>Gender: </label>
        <label ><b><?php echo $row['gender'];?></b></label>
      </div>
      <div class="col-md-8 ">
       <label>Birth Day: </label>
        <label ><b><?php echo $row['dob'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
         <label>Registration Date: </label>
        <label ><b><?php echo $row['donation date'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>By User: </label>
        <label ><b><?php echo $row['username_fk'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Email: </label>
        <label ><b><?php echo $row['email'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>blood Group: </label>
        <label ><b><?php echo $row['blood_group'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <label>State: </label>
        <label ><b><?php echo $row['state'];?></b></label>
      </div>
      <div class="col-md-6">
         <label>City: </label>
        <label ><b><?php echo $row['city'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Address: </label>
        <label ><b><?php echo $row['address'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>State: </label>
        <label ><b><?php echo $row['phone'];?></b></label>
      </div>
    </div>
      <div class="row">
       <div class="col-md-4 ">
         <label>Pincode: </label>
        <label ><b><?php echo $row['pincode'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>Amount of Donated Blood : </label>
        <label ><b><?php echo $row['blood volume'];?></b></label>
      </div>
    </div>

      
    
  </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
       <?php 
            }
            }else
          {
            echo '<div class="alert alert-danger"> No Record Founded: </div>';
          }

          ?>

  </tbody>
</table>
    </div>

    <!--End A- -->

    <!--Start B -->
     <div class="tab-pane fade" id="nav-B" role="tabpanel" aria-labelledby="nav-B-tab">
      <table class="table table-hoven table-white">
              
  <thead class="bg-white text-dark  ">
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Gender</th>
         <th scope="col">Donation Time</th>
      <th scope="col">Blood Group</th>
    
      <th scope="col">Action</th>


    </tr>
  </thead>
  
  <tbody>
    <?php
    $query = "SELECT * FROM donor where blood_group='B+'";
      $result = mysqli_query($connection, $query);
     
     
    if(mysqli_num_rows($result) > 0)
          {
          
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
    <tr>
    
      <td><?php echo $row['name'];?></td>
       <td><?php echo $row['father_name'];?></td>
       <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['donation date'];?></td>
         <td><b><?php echo $row['blood_group'];?></b></td>



      <td>
        <button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn  btn-danger">Delete</button> 
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#view2<?php echo $row['donor_id']?>">View</button>

    </tr>

       <!--Donor Detail Desplay-->
    <div class="modal fade" id="view2<?php echo $row['donor_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Donor Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <center><?php echo '<img src="upload/'. $row['image'].'" width="100px;" height="100px;" alt="image">' ?>
      </center></div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label>Name: </label>
        <label><b><?php echo $row['name']?></b></label>
      </div>
      <div class="col-md-8">
         <label>Last Name: </label>
        <label ><b><?php echo $row['father_name'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
       <label>Gender: </label>
        <label ><b><?php echo $row['gender'];?></b></label>
      </div>
      <div class="col-md-8 ">
       <label>Birth Day: </label>
        <label ><b><?php echo $row['dob'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
         <label>Registration Date: </label>
        <label ><b><?php echo $row['donation date'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>By User: </label>
        <label ><b><?php echo $row['username_fk'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Email: </label>
        <label ><b><?php echo $row['email'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>blood Group: </label>
        <label ><b><?php echo $row['blood_group'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <label>State: </label>
        <label ><b><?php echo $row['state'];?></b></label>
      </div>
      <div class="col-md-6">
         <label>City: </label>
        <label ><b><?php echo $row['city'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Address: </label>
        <label ><b><?php echo $row['address'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>State: </label>
        <label ><b><?php echo $row['phone'];?></b></label>
      </div>
    </div>
      <div class="row">
       <div class="col-md-4 ">
         <label>Pincode: </label>
        <label ><b><?php echo $row['pincode'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>Amount of Donated Blood : </label>
        <label ><b><?php echo $row['blood volume'];?></b></label>
      </div>
    </div>

      
    
  </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
       <?php 
            }
            }else
          {
            echo '<div class="alert alert-danger"> No Record Founded: </div>';
          }

          ?>

  </tbody>
</table>
    </div>
     <div class="tab-pane fade" id="nav-Bb" role="tabpanel" aria-labelledby="nav-Bb-tab">
      <table class="table table-hoven table-white">
              
  <thead class="bg-white text-dark  ">
    <tr>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Gender</th>
         <th scope="col">Donation Time</th>
      <th scope="col">Blood Group</th>
    
      <th scope="col">Action</th>


    </tr>
  </thead>
  
  <tbody>
    <?php
    $query = "SELECT * FROM donor where blood_group='B-'";
      $result = mysqli_query($connection, $query);
     
     
    if(mysqli_num_rows($result) > 0)
          {
          
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
    <tr>
    
      <td><?php echo $row['name'];?></td>
       <td><?php echo $row['father_name'];?></td>
       <td><?php echo $row['gender'];?></td>
        <td><?php echo $row['donation date'];?></td>
         <td><b><?php echo $row['blood_group'];?></b></td>



      <td>
        <button type="button" data-toggle="modal" data-target="#deletdonor<?php echo $row['donor_id']?>" class="btn  btn-danger">Delete</button> 
           <button type="button" class="btn btn-info" data-toggle="modal" data-target="#view2<?php echo $row['donor_id']?>">View</button>

    </tr>

       <!--Donor Detail Desplay-->
    <div class="modal fade" id="view2<?php echo $row['donor_id']?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">View Donor Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

  <div class="container-fluid">
    <div class="row">
      <div class="col">
        <center><?php echo '<img src="upload/'. $row['image'].'" width="100px;" height="100px;" alt="image">' ?>
      </center></div>
    </div>
    <div class="row">
      <div class="col-md-4">
        <label>Name: </label>
        <label><b><?php echo $row['name']?></b></label>
      </div>
      <div class="col-md-8">
         <label>Last Name: </label>
        <label ><b><?php echo $row['father_name'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-4">
       <label>Gender: </label>
        <label ><b><?php echo $row['gender'];?></b></label>
      </div>
      <div class="col-md-8 ">
       <label>Birth Day: </label>
        <label ><b><?php echo $row['dob'];?></b></label>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
         <label>Registration Date: </label>
        <label ><b><?php echo $row['donation date'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>By User: </label>
        <label ><b><?php echo $row['username_fk'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Email: </label>
        <label ><b><?php echo $row['email'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>blood Group: </label>
        <label ><b><?php echo $row['blood_group'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-6">
         <label>State: </label>
        <label ><b><?php echo $row['state'];?></b></label>
      </div>
      <div class="col-md-6">
         <label>City: </label>
        <label ><b><?php echo $row['city'];?></b></label>
      </div>
    </div>
    <div class="row">
       <div class="col-md-8">
         <label>Address: </label>
        <label ><b><?php echo $row['address'];?></b></label>
      </div>
       <div class="col-md-4">
         <label>State: </label>
        <label ><b><?php echo $row['phone'];?></b></label>
      </div>
    </div>
      <div class="row">
       <div class="col-md-4 ">
         <label>Pincode: </label>
        <label ><b><?php echo $row['pincode'];?></b></label>
      </div>
       <div class="col-md-8">
         <label>Amount of Donated Blood : </label>
        <label ><b><?php echo $row['blood volume'];?></b></label>
      </div>
    </div>

      
    
  </div>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
       <?php 
            }
            }else
          {
            echo '<div class="alert alert-danger"> No Record Founded: </div>';
          }

          ?>

  </tbody>
</table>
    </div>
 

 
        

  </div>

  <!-- Button trigger modal -->

<!-- Modal -->

   


       <!-- /.container-fluid -->
 
  
<?php 
include('footer.php');
include('scripts.php');
?>

