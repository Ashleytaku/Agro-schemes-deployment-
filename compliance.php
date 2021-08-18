<?php
include("header2.php");

if(isset($_GET['i'])){
    if($_GET['i'] == ''){
  
    }else{
  $merchant = $_GET['i'];
  $sql2 = "SELECT * FROM project_registry";
  $result2 = $connect->query($sql2);
  $row = $result2->fetch_assoc();
    }
  }
?>
 <div class="col-md-9 container" style="margin-top: 70px;">
    <div class="justify-content-right d-flex flex-column" 
    style="width:100%">
<div class="p-5 bg-white rounded shadow mx-auto" style="width: 100%;">

<section style="background-color: black;">
<div class="container-fluid p-0 text-center" style="height: 100px;">
<div class="text-center">
<br>
    <h1 class="text-light">All Farmers under projects
    </h1>
</div>
</div>
</section>
<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href="farmers.php"><button class="btn btn-primary me-md-2" type="button">View Farmers</button></a>
</div>
<br>
<table id="myTable" class="display responsive nowrap" style="width:90%">
        <thead>
            <tr>
                <th>Farmer Name</th>
                <th>Project</th>
                <th>Project status</th>
                <th>Compliance Rating</th>
                <!-- <th>Options</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['i'])){
            if($_GET['i'] == ''){
                $sql1 = "SELECT * FROM project_registry ORDER BY dateRegistered DESC ";
                $result = $connect->query($sql1);
            }else{
$sql1 = "SELECT * FROM project_registry ORDER BY dateRegistered DESC ";
$result = $connect->query($sql1);
            }
        }else{
            $sql1 = "SELECT * FROM project_registry ORDER BY dateRegistered DESC  ";
            $result = $connect->query($sql1);
        }
while($row = $result->fetch_assoc()){

    $project = $row['project_id'];
    $farmer  = $row['farmer_id'];
    $project = $row['project_id'];
    $sql2 = "SELECT * FROM users WHERE user_id = $farmer";
    $result2 = $connect->query($sql2);
    $row2 = $result2->fetch_assoc();

    $sql3 = "SELECT * FROM projects WHERE id = $project";
    $result3 = $connect->query($sql3);
    $row3 = $result3->fetch_assoc();
    //if($row["categories_id"] != $product || $row["categories_id2"] != $product ||
    //$row["categories_id3"] != $product){
//here goes the data
?>
            <tr>
                <td><?php echo $row2['first_name'].' '.$row2['last_name'];?></td>
                <td>
                <?php echo $row3['name'];?>
                </td>
                <td><?php echo $row['state'];?></td>
                <td><?php echo $row['compliance'];?>/5</td>
                <!-- <td><a href='userinfo.php?i=<?php echo $row['id'];?>'><button type="button" class="btn btn-outline-primary">Edit</button></a></td> -->
            </tr>
            <?php
}
               ?>
</table>
</div>
</div>

</div>

<script>
$(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
    
<?php
include("footer2.php");
?>
