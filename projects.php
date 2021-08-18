<?php
include("header2.php");

if(isset($_GET['i'])){
    if($_GET['i'] == ''){
  
    }else{
  $merchant = $_GET['i'];
  $sql2 = "SELECT * FROM regions WHERE id = $merchant";
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
    <h1 class="text-light"><?php 
    
if(isset($_GET['i'])){
    if($_GET['i'] == ''){ echo "All project";
    }else{
    echo $row["company"]."'s project";
    }
    }else{
        echo "All projects";
    }
    ?>
    </h1>
</div>
</div>
</section>
<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href="prodinfo.php"><button class="btn btn-primary me-md-2" type="button">Add project</button></a>
</div>
<br>
<table id="myTable" class="display responsive nowrap" style="width:90%">
        <thead>
            <tr>
                <th>Name</th>
                <th>Image</th>
                <th>Funded amount</th>
                <th>Description</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['i'])){
            if($_GET['i'] == ''){
                $sql1 = "SELECT * FROM projects ORDER BY datesaved ASC ";
                $result = $connect->query($sql1);
            }else{
$sql1 = "SELECT * FROM projects WHERE region = $merchant ORDER BY date ASC ";
$result = $connect->query($sql1);
            }
        }else{
            $sql1 = "SELECT * FROM projects ORDER BY datesaved ASC ";
            $result = $connect->query($sql1);
        }
while($row = $result->fetch_assoc()){
    //if($row["categories_id"] != $product || $row["categories_id2"] != $product ||
    //$row["categories_id3"] != $product){
//here goes the data
?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td>
                <img class="card-img-top" src="<?php echo $row['image'];?>"  style="width: 50px;height:50px" alt="Card image cap">
                </td>
                <td><?php echo $row['fundtotal'];?></td>
                <td><?php echo $row['description'];?></td>
                <td><a href='prodinfo.php?i=<?php echo $row['id'];?>'><button type="button" class="btn btn-outline-primary">Edit</button></a></td>
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
