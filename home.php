<?php
include('header2.php');
$sql2c = "SELECT count(*) FROM project_registry WHERE farmer_id = $member_id";
$result2c = $connect->query($sql2c);
$row2c = $result2c->fetch_row();
?>
    <div class="col-md-9 " style="margin-top: 70px;">
    <div class="justify-content-right d-flex flex-column" 
    style="width:100%">
<div class="p-5 bg-white rounded shadow mx-auto" style="width: 100%;">
    <!-- Bordered tabs-->
    <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
      <li class="nav-item flex-sm-fill">
        <a id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Programs</a>
      </li>
      <!-- <li class="nav-item flex-sm-fill">
        <a id="contact1-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Account activity</a>
      </li> -->
      <li class="nav-item flex-sm-fill">
        <a id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Profile</a>
      </li>
    </ul>
    <div id="myTab1Content" class="tab-content">


      <div id="home1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
      
<?php
if($_SESSION['type'] == 'govt'){
?>

      <div class="row row-cols-1 row-cols-md-3 g-4">
      <div class="col">
  <div class="card">
    <div class="text-center"  style="width:100%; height:200px;background-color:green">
    <br><br>
    <h1 class="text-light">Projects</h1>
    </div>
    <div class="card-body">
      <h4 class="card-title">Add a project</h4>
      <p>
      <a href="projects.php"><button type="button" class="btn btn-secondary">View Projects</button></a>
<a href="prodinfo.php"><button type="button" class="btn btn-success">Add</button></a></p>
      <p class="card-text"><small class="text-muted">Manage your projects</small></p>
    </div>
  </div>
      </div>
      <div class="col">
  <div class="card">
    <div class="text-center"  style="width:100%; height:200px;background-color:yellow">
    <br><br>
    <h1 class="text-dark">Regions</h1>
    </div>
    <div class="card-body">
      <h4 class="card-title">Add a region</h4>
      <p>
      <a href="regions.php"><button type="button" class="btn btn-secondary">View Region</button></a>
<a href="reginfo.php"><button type="button" class="btn btn-success">Add</button></a></p>
      <p class="card-text"><small class="text-muted">Manage the regions</small></p>
    </div>
  </div>
      </div>
      <div class="col">
  <div class="card">
    <div class="text-center" style="width:100%; height:200px;background-color:red">
    <br><br>
    <h1 class="text-light">Inputs</h1>
    </div>
    <div class="card-body">
      <h4 class="card-title">Add an input</h4>
      <p>
      <a href="input.php"><button type="button" class="btn btn-secondary">View Info</button></a>
      <a href="inputinfo.php"><button type="button" class="btn btn-success">Add</button></a></p>
      <p class="card-text"><small class="text-muted">Manage the inputs</small></p>
    </div>
  </div>
      </div>
      <div class="col">
  <div class="card">
    <div class="text-center"  style="width:100%; height:200px;background-color:black">
    <br><br>
    <h1 class="text-light">Conditions</h1>
    </div>
    <div class="card-body">
      <h4 class="card-title">Add an area's weather condition</h4>
      <p>
      <a href="conditions.php"><button type="button" class="btn btn-secondary">View conditions</button></a>
<a href="condinfo.php"><button type="button" class="btn btn-success">Add</button></a></p>
      <p class="card-text"><small class="text-muted">Manage the conditions</small></p>
    </div>
  </div>
      </div>
      <div class="col">
  <div class="card">
    <div class="text-center"  style="width:100%; height:200px;background-color:green">
    <br><br>
    <h1 class="text-light">Farmer Compliance</h1>
    </div>
    <div class="card-body">
      <h4 class="card-title">View </h4>
      <p>
      <a href="compliance.php"><button type="button" class="btn btn-secondary">View Projects</button></a>

      <p class="card-text"><small class="text-muted">Manage your projects</small></p>
    </div>
  </div>
      </div>
</div>
<?php
}else if($_SESSION['type'] == 'admin'){
  ?>
  
        <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
    <div class="card">
      <div class="text-center"  style="width:100%; height:200px;background-color:green">
      <br><br>
      <h1 class="text-light">Users</h1>
      </div>
      <div class="card-body">
        <h4 class="card-title">Manage users</h4>
        <a href="users.php"><button type="button" class="btn btn-secondary">View users</button></a>
        <p class="card-text"><small class="text-muted">Manage users</small></p>
      </div>
    </div>
        </div>
        <div class="col">
    <div class="card">
      <div class="text-center"  style="width:100%; height:200px;background-color:yellow">
      <br><br>
      <h1 class="text-dark">Farmers</h1>
      </div>
      <div class="card-body">
        <h4 class="card-title">Manage Farmers</h4>
        <p>
        <a href="farmers.php"><button type="button" class="btn btn-secondary">View Farmers</button></a></p>
        <p class="card-text"><small class="text-muted">Manage the farers</small></p>
      </div>
    </div>
        </div>

  </div>
  <?php
}else if($_SESSION['type'] == 'extension'  || $_SESSION['type'] == 'admin' || $_SESSION['type'] == 'govt'){


  
  $sql1b = "SELECT count(*) FROM regions where extension_officer = $member_id ORDER BY dateRegistered DESC ";
  $result1b = $connect->query($sql1b);
  $row1b = $result1b->fetch_row();

  if($row1b[0] > 0){
    $sql1 = "SELECT * FROM regions where extension_officer = $member_id ORDER BY dateRegistered DESC ";
    $result1 = $connect->query($sql1);
while($row1 = $result1->fetch_assoc()){
//if($row["categories_id"] != $product || $row["categories_id2"] != $product ||
//$row["categories_id3"] != $product){
//here goes the data
?>   
<div class="card" style="width: 250px;">
    <div class="text-center"  style="width:100%; height:200px;background-color:yellow"> 
    <br>   
<h4 class="card-title text-dark">Region name :<?php echo $row1['name'];?></h4>
    </div>
<div class="card-body" style="width: 100%;">
<p class="card-text">description : <?php echo $row1['description'];?></p>
<p class="card-text">Region code : <?php echo $row1['region_code'];?></p>
<p>
<a href="register.php?i=<?php echo $row1['id'];?>"><button type="button" class="btn btn-success">View region project applications</button></p></a>
<p class="card-text"><small class="text-muted">You are the Extension Officer of this region</small></p>
</div>
</div>
<?php
}
}else{
?>
<div class="card" style="width: 250px;">
<div class="card-body" style="width: 100%;">
<h4 class="card-title text-dark">There is no region under you at the moment</h4>
</div>
<?php
}
  }else{
?>


    <div class="row row-cols-1 row-cols-md-3 g-4">


    <?php
    
  if($row['region_id'] == ''){?>
  
  <div class="col">
  <div class="card text-center">
    <div class="card-body">
      <h4 class="card-title text-dark">You have not registered a farm yet!!</h4>
      <p class="card-text">Please press button to register.</p>
      <p>
<a href="farmreg.php"><button type="button" class="btn btn-success">Register</button></p></a>
      <p class="card-text"><small class="text-muted">You are elligible for registration</small></p>
    </div>
  </div>
  </div>
  <?php
  }else{


          $region = $row['region_id'];
          $sql1b = "SELECT count(*) FROM projects where region = $region ORDER BY datesaved ASC ";
          $result1b = $connect->query($sql1b);
          $row1b = $result1b->fetch_row();

          if($row1b[0] > 0){
            $sql1 = "SELECT * FROM projects where region = $region ORDER BY datesaved ASC ";
            $result1 = $connect->query($sql1);
while($row1 = $result1->fetch_assoc()){
    //if($row["categories_id"] != $product || $row["categories_id2"] != $product ||
    //$row["categories_id3"] != $product){
//here goes the data
$project = $row1['id'];
$sql2b = "SELECT * FROM project_registry WHERE project_id = $project";
$result2b = $connect->query($sql2b);
$row2b = $result2b->fetch_assoc();
?>   
  <div class="card" style="width: 250px;">
    <img class="card-img-top" style="width: 100%" src="<?php echo $row1['image'];?>" alt="Card image cap">
    <div class="card-body" style="width: 100%;">
      <h4 class="card-title text-dark">Project name :<?php echo $row1['name'];?></h4>
      <p class="card-text">description : <?php echo $row1['description'];?></p>
      <p>
      <?php
      if($row2c[0] == 0){
    ?>
<a href="project.php?i=<?php echo $row1['id'];?>&j=<?php echo $row1['id'];?>&k=<?php echo $row1['id'];?>"><button type="button" class="btn btn-success">Apply</button></p></a>
      <p class="card-text"><small class="text-muted">You are elligible for the project</small></p>
      <?php
      }else{
      ?>
      <a href="project.php?i=<?php echo $row1['id'];?>&j=<?php echo $row2b['id'];?>&k=<?php echo $row2b['farmer_id'];?>"><button type="button" class="btn btn-success">View</button></p></a>
<p class="card-text"><small class="text-muted">You have applied for this project</small></p>
      <?php
      }
      ?>
    </div>
  </div>
<?php
}
}else{
  ?>
<div class="card" style="width: 250px;">
    <div class="card-body" style="width: 100%;">
      <h4 class="card-title text-dark">No Projects in your region at the moment</h4>
  </div>
  <?php
}
}
  }
?>

</div>
      </div>

      <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">

<div class="card" style="width: 20rem;">
  <img class="card-img-top" src="assets/img/mob.jpg" alt="Card image cap">
  <div class="card-body">
    <h4 class="card-title"><?php echo $row['username'];?></h4>
    <p class="card-text">Number of Government programs enrolled under : #</p>
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><?php echo $row['first_name'].' '.$row['last_name'];?></li>
    <li class="list-group-item"><?php echo $row['username'];?></li>
    <li class="list-group-item"><?php echo $row['Address'];?></li>
    <li class="list-group-item"><?php echo $row['Phone'];?></li>
    <li class="list-group-item"><?php echo $row['email'];?></li>
  </ul>
  <div class="card-body">
    <a href="#" class="card-link"><?php echo $row['username'];?></a>
  </div>
</div>
      </div>


      <div id="contact1" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
      <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action active">
    Your Account Activity (click to view information)
  </a>
  <a data-toggle="modal" data-target="#exampleModal" class="list-group-item list-group-item-action">$12 000 deposited to Agribank for (Program name) at (time:date)</a>
  <a data-toggle="modal" data-target="#exampleModal" class="list-group-item list-group-item-action">$14 000 deposited to Agribank for (Program name) at (time:date)</a>
  <a data-toggle="modal" data-target="#exampleModal" class="list-group-item list-group-item-action">$12 000 withdrawn to Agribank for (Program name) at (time:date)</a>
</div>
      </div>
    </div>
    <!-- End bordered tabs -->
  </div>
</div>

</div>
<?php
include('footer2.php');
?>