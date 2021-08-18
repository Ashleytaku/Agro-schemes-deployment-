<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php
$categoriesId = $_GET['i'];
$sql = "SELECT * FROM categories WHERE categories_id = $categoriesId";
$result = $connect->query($sql);
$row = $result->fetch_assoc();
$picture = $row['categories_image'];

?>

<div class="jumbotron">
<?php
if($picture == ""){
?>
  <h1 class="display-3">Upload the category photo</h1>
  <?php
}else{
?>
<img src="custom/<?php echo $picture; ?>" style="max-width:200px; max-height:200px;">
<?php
}
?>
     <form action="php_action/editProductImage2.php?shop=<?php echo $dbname;?>" method="post" enctype="multipart/form-data">
                                            Select Documment to upload (PDF/Image):
                                            <p><input type="file" name="editProductImage" multiple ></p> 
                                            <input type="hidden" name="categoriesId" value="<?php echo $categoriesId; ?>">
                                            <input type="submit" class="btn btn-primary btn-lg" name="fileUpload" value="Upload all files">
                                        </form>
 
</div>
<a href="categories.php?shop=<?php echo $dbname;?>">go back</a>

<?php require_once 'includes/footer.php'; ?>