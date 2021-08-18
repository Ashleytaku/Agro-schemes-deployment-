<?php
include("header2.php");
?>
 <div class="col-md-9 container" style="margin-top: 70px;">
    <div class="justify-content-right d-flex flex-column" 
    style="width:100%">
<div class="p-5 bg-white rounded shadow mx-auto" style="width: 100%;">

<section style="background-color: black;">
<div class="container-fluid p-0 text-center" style="height: 100px;">
<div class="text-center">
<br>
    <h1 class="text-light">Region's Project applications</h1>
</div>
</div>
</section>
<br>
<br>
<table id="myTable" class="display responsive nowrap" style="width:90%">
        <thead>
            <tr>
                <th>Farmer</th>
                <th>Project</th>
                <th>Options</th>
            </tr>
        </thead>
        <tbody>
        <?php
        if(isset($_GET['i'])){
            $region = $_GET['i'];
            if($_GET['i'] == ''){
                $sql1 = "SELECT * FROM project_registry ORDER BY dateRegistered ASC  ";
                $result = $connect->query($sql1);
            }else{
$sql1 = "SELECT * FROM project_registry WHERE region_id = $region ORDER BY dateRegistered ASC ";
$result = $connect->query($sql1);
            }
        }else{
            $sql1 = "SELECT * FROM project_registry ORDER BY dateRegistered ASC ";
            $result = $connect->query($sql1);
        }
while($row = $result->fetch_assoc()){
    //if($row["categories_id"] != $product || $row["categories_id2"] != $product ||
    //$row["categories_id3"] != $product){
//here goes the data
$user_id = $row['farmer_id'];
$project = $row['project_id'];
            $sql2 = "SELECT * FROM users WHERE user_id = $user_id";
            $result2 = $connect->query($sql2);
            $row2 = $result2->fetch_assoc();
            $sql3 = "SELECT * FROM projects WHERE id =  $project";
            $result3 = $connect->query($sql3);
            $row3 = $result3->fetch_assoc();

?>
            <tr>
                <td><?php echo $row2['first_name'].' '.$row2['last_name'];?></td>
                <td><?php echo $row3['name'];?></td>
                <td><a href='project.php?i=<?php echo $row['project_id'];?>&j=<?php echo $row['id'];?>&k=<?php echo $row['farmer_id'];?>'><button type="button" class="btn btn-outline-primary">View</button></a></td>
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
