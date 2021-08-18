<?php
include("header2.php");

if(isset($_GET['i'])){
    if($_GET['i'] == ''){
  
    }else{
  $merchant = $_GET['i'];
  $sql2 = "SELECT * FROM users WHERE id = $merchant";
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
    if($_GET['i'] == ''){ echo "All users";
    }else{
    echo $row["company"]."'s users";
    }
    }else{
        echo "All users";
    }
    ?>
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
                <th>Name</th>
                <th>email</th>
                <th>type</th>
                <th>status</th>
                <!-- <th>Options</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['i'])){
            if($_GET['i'] == ''){
                $sql1 = "SELECT * FROM users ORDER BY joined_date ASC ";
                $result = $connect->query($sql1);
            }else{
$sql1 = "SELECT * FROM users WHERE user_id = $merchant ORDER BY date ASC ";
$result = $connect->query($sql1);
            }
        }else{
            $sql1 = "SELECT * FROM users ORDER BY joined_date ASC ";
            $result = $connect->query($sql1);
        }
while($row = $result->fetch_assoc()){
    //if($row["categories_id"] != $product || $row["categories_id2"] != $product ||
    //$row["categories_id3"] != $product){
//here goes the data
?>
            <tr>
                <td><?php echo $row['first_name'].' '.$row['last_name'];?></td>
                <td>
                <?php echo $row['email'];?>
                </td>
                <td><?php echo $row['type'];?></td>
                <td><?php echo $row['status'];?></td>
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
