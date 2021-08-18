<?php
include("header2.php");



if(isset($_GET['i'])){
  if($_GET['i'] == ''){

  }else{
$merchant = $_GET['i'];
$sql2 = "SELECT * FROM inputs WHERE id = $merchant";
$result2 = $connect->query($sql2);
$row = $result2->fetch_assoc();
  }
}

if(isset($_POST['merchant'])){

    $first    = $_POST['first'];
    $quantity     = $_POST['quantity'];
    $oquantity     = $_POST['oquantity'];
    $rpms     = $_POST['rpms'];
    $unit     = $_POST['unit'];
    $code     = $_POST['code'];
    $ounit     = $_POST['ounit'];
    $project  = $_POST['project'];
    $description  = htmlentities(str_replace("'","&#x2019;",$_POST['description']));
    $date     = date("Y-m-d H:i:s");

    $sql3 = "SELECT count(*) FROM inputs WHERE code = '$code'";
    $result3 = $connect->query($sql3);
    $row3 = $result3->fetch_row();


if($row3[0] == 0){
    $sql = "INSERT INTO inputs(name, project_id, quantity, unit, ypms, rpms, description,
      status, expected_unit, code, date)
           VALUES('$first', '$project', '$quantity', '$unit', '$oquantity','$rpms', '$description', 1, '$ounit', 
           '$code', '$date')";

if($connect->query($sql) === TRUE){

  $sql3 = "SELECT * FROM inputs WHERE code = '$code'";
$result3 = $connect->query($sql3);
$row3 = $result3->fetch_assoc();
$id = $row3['id'];
  $valid['messages'] = "You have successfully added an input into the system.";
  // header("refresh: 3;  url=inputinfo.php?i=$id");	
}else{
  $valid['messages'] = "An error has occured while adding an input into the system.$sql";
}
}else{
  $valid['messages'] = "The code you have submitted is already in use";	
}

}


if(isset($_POST['edit'])){

    $first    = $_POST['first'];
    $quantity     = $_POST['quantity'];
    $oquantity     = $_POST['oquantity'];
    $rpms     = $_POST['rpms'];
    $unit     = $_POST['unit'];
    $code     = $_POST['code'];
    $ounit     = $_POST['ounit'];
    $project  = $_POST['project'];
    $description  = htmlentities(str_replace("'","&#x2019;",$_POST['description']));
    $date     = date("Y-m-d H:i:s");



  $sql = "UPDATE inputs SET name = '$first', quantity = '$quantity', unit = '$unit', rpms = '$rpms', 
  ypms = '$oquantity', expected_unit = '$ounit' WHERE id = $merchant";

if($connect->query($sql) === TRUE){

$valid['messages'] = "You have successfully edited a merchant in the system.<a href='inputinfo.php?i=$merchant'>refresh</a>";
// header("refresh: 6;  url=merchants.php?i=$merchant");

}else{
$valid['messages'] = "An error has occured while saving your edits.$sql";
}

}

?>

<div class="col-md-9 container" style="margin-top: 70px;">
    <div class="justify-content-right d-flex flex-column" 
    style="width:100%">
<div class="p-5 bg-white rounded shadow mx-auto" style="width: 100%;">

<section style="background-color: black;">
<div class="container-fluid p-0 text-center" style="height: 200px;">
<br><br>
<div class="text-center">
    <h1 class="text-light">Add Input</h1>
</div>
<div class="messages">
							<?php if($valid) {
								foreach ($valid as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="glyphicon glyphicon-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
                        </div>
</div>
</section>
<section style="background-color: white;">
<div class="container-fluid p-0 text-center" style="width: 95%;">
<form class="row g-3" action="inputinfo.php?i=<?php echo $merchant?>" method="POST">
<div class="col-6">
    <label for="inputAddress2" class="form-label">Name</label>
    <input type="text"  class="form-control" name="first" required value="<?php echo $row['name'];?>" id="inputAddress2" placeholder="Name">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Input code</label>
    <input type="text"  class="form-control" name="code" required value="<?php echo $row['code'];?>" id="inputAddress2" placeholder="code">
  </div>  
  <div class="col-6">
    <label for="inputAddress2" class="form-label">Quantity for 1 unit</label>
    <input type="text"  class="form-control" name="quantity"required value="<?php echo $row['quantity'];?>" id="inputAddress2" placeholder="quantity">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">unit</label>
    <input type="text"  class="form-control" name="unit"required value="<?php echo $row['unit'];?>" id="inputAddress2" placeholder="unit e.g kgs, tractor">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">RPMS</label>
    <input type="text"  class="form-control" name="rpms" required value="<?php echo $row['rpms'];?>" id="inputAddress2" placeholder="quantity">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">YPMS</label>
    <input type="text"  class="form-control" name="oquantity"required value="<?php echo $row['ypms'];?>" id="inputAddress2" placeholder="quantity">
  </div>
  <div class="col-6">
    <label for="inputAddress2" class="form-label">YPMS unit</label>
    <input type="text"  class="form-control" name="ounit"required value="<?php echo $row['expected_unit'];?>" id="inputAddress2" placeholder="unit e.g kgs, assistance for at least n years">
  </div>
  <?php
  if(isset($_GET['i'])){
  
  ?>
  <div class="col-6">
  <br>
  <label for="inputAddress2" class="form-label">Project</label>

<select name="project" class="form-control" required>
<?php if(($_GET['i']) != ''){
  $project = $row['project_id'];
  $sql5 = "SELECT * FROM projects WHERE status = 1 AND id = $project";
$result5 = $connect->query($sql5);
while($row5 = $result5->fetch_assoc()){
?>
<option value="<?php echo $row5['id'] ?>"><?php echo $row5['name'] ?></option>
<?php
}
}else{
    $project = $row['project_id'];
  $sql5 = "SELECT * FROM projects WHERE status = 1";
$result5 = $connect->query($sql5);
while($row5 = $result5->fetch_assoc()){
?>
<option value="<?php echo $row5['id'] ?>"><?php echo $row5['name'] ?></option>
<?php
}
}
    ?>
    </select>
  </div>
  <?php
  
}else{

  ?>
<div class="col-6">
  <br>
    <label for="inputAddress2" class="form-label">Projects</label>

    <select name="project" class="form-control" required>
    <option>select</option>
    <?php
  $sql4 = "SELECT * FROM projects where status = 1";
  $result4 = $connect->query($sql4);
  While($row4 = $result4->fetch_assoc()){
  ?>
  
  <option value="<?php echo $row4['id'] ?>"><?php echo $row4['name'] ?></option>
    <?php
    }
    ?>
    </select>
  </div>
  <?php
  }
  ?>
  <div class="col-12">
    <label for="inputAddress" class="form-label">Description</label>
    <textarea name="description" class="form-control"><?php echo $row['description'] ?></textarea>
  </div>

  <div class="col-12">
  <br>
  <?php
  if(isset($_GET['i'])){
    if($_GET['i'] == ""){
  ?>
  <button type="submit" name="merchant" class="btn btn-primary">Add Inputs</button>
    <?php
  }else{
    ?>
     <input type="hidden" value="<?php echo $row['id'];?>" name="id" >
        <button type="submit" name="edit" class="btn btn-primary">Edit Inputs</button>
    <?php
  }
}else{
  ?>
   <button type="submit" name="merchant" class="btn btn-primary">Add Inputs</button>
  <?php
}
?>
  </div>
</form>
</div>
</section>
</div>
    </div>
</div>
<?php
include("footer2.php");
?>