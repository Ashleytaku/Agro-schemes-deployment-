<?php
include("header2.php");



if(isset($_GET['i'])){
  if($_GET['i'] == ''){

  }else{
$merchant = $_GET['i'];
$sql2 = "SELECT * FROM conditions WHERE id = $merchant";
$result2 = $connect->query($sql2);
$row = $result2->fetch_assoc();
  }
}

if(isset($_POST['merchant'])){

    $first    = $_POST['first'];
    $code     = $_POST['condition'];
    $description    = $_POST['description'];
    $date     = date("Y-m-d H:i:s");

    $sql3 = "SELECT count(*) FROM conditions WHERE name = '$first'";
    $result3 = $connect->query($sql3);
    $row3 = $result3->fetch_row();


if($row3[0] == 0){
    $sql = "INSERT INTO conditions(name, score	, description,  status, dateRegistered)
           VALUES('$first', '$code', '$description',  '1', '$date')";

if($connect->query($sql) === TRUE){

  $sql3 = "SELECT * FROM conditions WHERE name = '$first'";
$result3 = $connect->query($sql3);
$row3 = $result3->fetch_assoc();
$id = $row3['id'];
  $valid['messages'] = "You have successfully added a region into the system.
  <a href'condinfo.php?i=$id'>refresh</a>";
  // header("refresh: 3;  url=condinfo.php?i=$id");	
}else{
  $valid['messages'] = "An error has occured while adding a region into the system.$sql";
}
}else{
  $valid['messages'] = "The code you have submitted is already in use";	
}

}


if(isset($_POST['edit'])){

  $first    = $_POST['first'];
  $id       = $_POST['id'];
  $code     = $_POST['condition'];
  $description    = $_POST['description'];
  $date     = date("Y-m-d H:i:s");
  $date     = date("Y-m-d H:i:s");



  $sql = "UPDATE conditions SET name = '$first', score = '$code', description = '$description' WHERE id = $id";

if($connect->query($sql) === TRUE){

$valid['messages'] = "You have successfully edited a merchant in the system.";
header("refresh: 2;  url=condinfo.php?i=".$id."");

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
    <h1 class="text-light">Add Conditions</h1>
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
<form class="row g-3" action="condinfo.php?i=<?php echo $merchant?>" method="POST">
<div class="col-6">
    <label for="inputAddress2" class="form-label">Name</label>
    <input type="text"  class="form-control" name="first" required value="<?php echo $row['name'];?>" id="inputAddress2" placeholder="Name">
  </div> 
  <div class="col-6">
    <label for="inputAddress2" class="form-label">condition score out of 10</label>
    <select name="condition" class="form-control">
    <option value="<?php echo $row['score'] ?>"><?php echo $row['score'] ?></option>
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    </select>
  </div>
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
  <button type="submit" name="merchant" class="btn btn-primary">Add Condition</button>
    <?php
  }else{
    ?>
     <input type="hidden" value="<?php echo $row['id'];?>" name="id" >
        <button type="submit" name="edit" class="btn btn-primary">Edit Condition</button>
    <?php
  }
}else{
  ?>
   <button type="submit" name="merchant" class="btn btn-primary">Add Condition</button>
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