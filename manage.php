<?php
include("header.php");
?>
<section style="background-color: black;">
<div class="container-fluid p-0 text-center" style="height: 100px;">
<div class="text-center">
    <h1 class="text-light">Merchant management</h1>
</div>
</div>
</section>
<br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
  <a href="merchants.php"><button class="btn btn-primary me-md-2" type="button">Add Merchant</button></a>
</div>
<br>
<table id="example" class="display responsive nowrap" style="width:90%">
        <thead>
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Company/User name</th>
                <th>email</th>
                <th>phone</th>
                <th>Address</th>
                <th>Options</th>
                <th>products</th>
            </tr>
        </thead>
        <tbody>
        <?php
$sql1 = "SELECT * FROM merchants ORDER BY dateRegistered ASC";
$result = $connect->query($sql1);
while($row = $result->fetch_assoc()){
    //if($row["categories_id"] != $product || $row["categories_id2"] != $product ||
    //$row["categories_id3"] != $product){
//here goes the data
?>
            <tr>
                <td><?php echo $row['firstname'];?></td>
                <td><?php echo $row['lastname'];?></td>
                <td><?php echo $row['company'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['address'].' '.$row['city'];?></td>
                <td><a href='merchants.php?i=<?php echo $row['id'];?>'>
                <button type="button" class="btn btn-outline-primary">Edit</button></a></td>
                <td><a href='products.php?i=<?php echo $row['id'];?>'>
                <button type="button" class="btn btn-outline-primary">view</button></a></td>
            </tr>
            <?php
}
               ?>
        </tbody>
</table>


<script></script>
    
<?php
include("footer.php");
?>
