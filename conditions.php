<?php
include("header2.php");
?>
 <div class="col-md-9 container" style="margin-top: 70px;">
    <div class="justify-content-right d-flex flex-column" 
    style="width:100%">
<div class="p-5 bg-white rounded shadow mx-auto" style="width: 100%;">

<section style="background-color: black;">
<div class="container-fluid p-0 text-center" style="height: 200px;">
<div class="text-center">
<br><br>
    <h1 class="text-light">Weather conditions management</h1>
</div>
</div>
</section>
<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href="condinfo.php"><button class="btn btn-primary me-md-2" type="button">Add condition</button></a>
</div>
<br>
<table id="myTable" class="display responsive nowrap" style="width:90%">
        <thead>
            <tr>
                <th>name</th>
                <th>condition score</th>
                <th>options</th>
            </tr>
        </thead>
        <tbody>
        <?php
$sql1 = "SELECT * FROM conditions ORDER BY id DESC";
$result = $connect->query($sql1);
while($row = $result->fetch_assoc()){
    //if($row["categories_id"] != $product ||| $row["categories_id2"] != $product ||
    //$row["categories_id3"] != $product){
//here goes the data
?>
            <tr>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['score'];?></td>
                <td><a href='condinfo.php?i=<?php echo $row['id'];?>'>
                <button type="button" class="btn btn-outline-primary">View/Edit</button></a></td>
            </tr>
            <?php
}
               ?>
        </tbody>
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
