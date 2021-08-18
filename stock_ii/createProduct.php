<?php 
require_once 'includes/header.php';
if(isset($_GET['edit'])) {
	$productId = $_GET['edit'];
	$sql1 = "SELECT * FROM product where product_id = $productId";
	$result1 = $connect->query($sql1);
	$row1 = $result1->fetch_assoc();

	}

	

if(isset($_POST['createProductBtn'])) {	

	$productName  	= $_POST['productName'];
	$productOwner     = $_POST['owner'];
	$productCode  	= $_POST['code'];
	// $productImage 	= $_POST['productImage'];
	$quantity 		= $_POST['quantity'];
	$rate 			= $_POST['rate'];
	$rating 			= 2.5;
	$description 		= $_POST['description'];
	// $specifications 	= $_POST['spec'];
	$offer 			= $_POST['offer'];
	$brandName 		= $_POST['brandName'];
  //   $category         = $_POST['category'];
	$categoryName 	= $_POST['categoryName1'];
	$productStatus 	= $_POST['productStatus'];
   
	  $type = explode('.', $_FILES['productImage']['name']);
	  $type = $type[count($type)-1];		
	  $url = 'assests/images/stock/'.uniqid(rand()).'.'.$type;
	  if(in_array($type, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
		  if(is_uploaded_file($_FILES['productImage']['tmp_name'])) {			
			  if(move_uploaded_file($_FILES['productImage']['tmp_name'], $url)) {
  
	// 			  $type1 = explode('.', $_FILES['productImage1']['name']);
	//   $type1 = $type1[count($type1)-1];		
	//   $url1 = 'assests/images/stock/'.uniqid(rand()).'.'.$type1;
	//   if(in_array($type1, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	// 	  if(is_uploaded_file($_FILES['productImage1']['tmp_name'])) {			
	// 		  if(move_uploaded_file($_FILES['productImage1']['tmp_name'], $url1)) {
  
	// 			  $type2 = explode('.', $_FILES['productImage2']['name']);
	//   $type2 = $type2[count($type2)-1];		
	//   $url2 = 'assests/images/stock/'.uniqid(rand()).'.'.$type2;
	//   if(in_array($type2, array('gif', 'jpg', 'jpeg', 'png', 'JPG', 'GIF', 'JPEG', 'PNG'))) {
	// 	  if(is_uploaded_file($_FILES['productImage2']['tmp_name'])) {			
	// 		  if(move_uploaded_file($_FILES['productImage2']['tmp_name'], $url2)) {
				  
				  $sql = "INSERT INTO product (product_name,  code, product_image,  offer, description, brand_id,  categories_id, quantity,  rate, rating, active, status) 
				  VALUES ('$productName',  '$productCode', '$url',  '$offer', '$description', '$brandName',  '$categoryName',  '$quantity', '$rate', '$rating', '$productStatus', 1)";
  
				  if($connect->query($sql) === TRUE) {
					  $valid['messages'] = "Successfully Added";	
				  } else {
					  $valid['messages'] = "Error while adding the members";
				  }
  
			  }	else {
				  return false;
			  }	// /else	
		  } // if
	  } // if in_array 	
	  
//   }	else {
// 	  return false;
//   }	// /else	
//   } // if
//   } // if in_array
  
//   }	else {
// 	  return false;
//   }	// /else	
//   } // if
//   } // if in_array

	// $connect->close();

 
} // /if $_POST


?>
<div class="row">
	<div class="col-md-12">

	<ol class="breadcrumb" style="background-color: transparent;">
		  <li><a href="../index.php?shop=<?php echo $dbname;?>">Home</a></li>/	
		  <li><a href="product.php?shop=<?php echo $dbname;?>">Stand specifications</a></li>/		  
		  <li class="active">Create Stand specifications</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-body">
			<?php
		 if(isset($_GET['edit'])) { 
		  ?>
<form class="form-horizontal" action="php_action/editProduct.php?shop=<?php echo $dbname;?>" method="POST" enctype="multipart/form-data">
<input type='hidden' name="productId" value="<?php echo $row1['product_id']; ?>">
<?php
		 }else{
?>
<form class="form-horizontal" action="createProduct.php?shop=<?php echo $dbname;?>" method="POST" enctype="multipart/form-data">

  <div class="modal-header">
	<h4 class="title"><i class="fa fa-plus"></i> Add Stand specifications</h4>
  </div>

  <div class="mx-auto" >

			<div class="messages">
							<?php if($valid) {
								foreach ($valid as $key => $value) {
									echo '<div class="alert alert-warning" role="alert">
									<i class="fa fa-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
			</div>
			

			<div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label text-light">Stand Image: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
			</div> 
			<!-- /form-group-->	     
			
			<!-- <div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label text-light">2nd Product Image: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8"> -->
					    <!-- the avatar markup -->
							<!-- <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage1" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
			</div>  -->
			<!-- /form-group-->	   

			<!-- <div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label text-light">3rd Product Image: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8"> -->
					    <!-- the avatar markup -->
							<!-- <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage2" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
			</div>  -->
			<!-- /form-group-->	   
			<?php
		 }
?>
	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label text-light">Stand Number Range: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
					  <input type="text" class="form-control" value="<?php
					 if(isset($_GET['edit'])){
						 echo $row1['product_name'];
					 }
					  ?>" id="productName" placeholder="0001-1000" name="productName" autocomplete="off" required>
				    </div>
	        </div> <!-- /form-group-->	   

			<div class="form-group">
	        	<label for="code" class="col-sm-3 control-label text-light">Stand code: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" value="<?php
					 if(isset($_GET['edit'])){
						 echo $row1['code'];
					 }
					  ?>" id="code" placeholder="code" name="code" required autocomplete="off">
				    </div>
	        </div> <!-- /form-group--> 

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label text-light">Quantity: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" value="<?php if(isset($_GET['edit'])){
						 echo $row1['quantity'];
					 }else{
					 echo '10';
					 }?>" name="quantity" autocomplete="off"  required>
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label text-light">Stand Price: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
				      <input type="text" value="<?php
					 if(isset($_GET['edit'])){
						 echo $row1['rate'];
					 }
					  ?>" class="form-control" id="rate" placeholder="00.00" name="rate" autocomplete="off">
				    </div>
			</div> <!-- /form-group-->	     	        
			
			<div class="form-group">
	        	<label for="description" class="col-sm-3 control-label text-light">Building Cost Breakdown: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
						<Textarea id="description" placeholder="description" name="description" autocomplete="off" required>
						<?php
					 if(isset($_GET['edit'])){
						 echo $row1['description'];
					 }
					  ?>
						</Textarea>
				    </div>
			</div> <!-- /form-group-->	    
			
			<div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label text-light">Offer: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="categoryName" placeholder="Product Name" name="offer" required>
				    <?php
					 if(isset($_GET['edit'])){
						 ?><option value='<?php echo $row1['offer'];?>'><?php if($row1['offer'] == 1){
								echo "On Promotion";
							}else{
								echo "Normal";
							}?></option> 
							<option value='2'>Normal</option>
						    <option value='1'>On Promotion</option>
							<?php
					 }else{
						?>
						<option value=''>Select</option>
						<option value='2'>Normal</option>
						<option value='1'>On Promotion</option>
						<option value='3'>Featured</option>
						<?php
					   }  
						?>
				      </select>
				    </div>
			</div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label text-light">Stand Class: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName" name="brandName" required>
				      <?php
					 if(isset($_GET['edit'])){
						 echo $row1['brand_id'];
					 }
					  ?>"><?php
					  if(isset($_GET['edit'])){
						$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_id = {$row1['brand_id']} AND  brand_status = 1 AND brand_active = 1";
						$result = $connect->query($sql);

						while($row = $result->fetch_array()) {
							echo "<option value='".$row[0]."'>".$row[1]."</option>";
						} // while
					  }else{
					   ?><option value=''>Select</option><?php
					  }  
					   ?>
				      	<?php 
				      	$sql = "SELECT brand_id, brand_name, brand_active, brand_status FROM brands WHERE brand_status = 1 AND brand_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

	        <div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label text-light">Area: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
				      <select required type="text" class="form-control" id="categoryName" placeholder="Product Name" name="categoryName1" >
					  <?php
					 if(isset($_GET['edit'])){
						 echo $row1['categories_id'];
					 }
					  ?>"><?php
					  if(isset($_GET['edit'])){
						$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_id = {$row1['categories_id']} AND  categories_status = 1 AND categories_active = 1";
						$result = $connect->query($sql);

						while($row = $result->fetch_array()) {
							echo "<option value='".$row[0]."'>".$row[1]."</option>";
						} // while
					  }else{
					   ?><option value=''>Select</option><?php
					  }  
					   ?>
				      	<?php 
				      	$sql = "SELECT categories_id, categories_name,categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
			</div> <!-- /form-group-->		
			
			<!--  -->

	        <div class="form-group">
	        	<label for="productStatus" class="col-sm-3 control-label text-light">Status: </label>
	        	<label class="col-sm-1 control-label text-light">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="productStatus" name="productStatus" required>
				      <?php
					 if(isset($_GET['edit'])){
						echo "<option value='".$row1['active']."'>"; if($row1['active'] == 1){ echo "Available"; }else{ echo "Not Availale"; } echo"</option>";
					 }else{
						echo "<option value=''>SELECT</option>";
					 }
					  ?>
				      	<option value="1">Available</option>
				      	<option value="2">Not Available</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
		  <?php
		 if(isset($_GET['edit'])) { 
		  ?>
		   <button type="submit" class="btn btn-raised btn-primary" name="editProductBtn"  autocomplete="off"> <i class="fa fa-ok-sign"></i> Edit</button>
		 <?php }else{
			  
			  ?>
			  
			  <button type="submit" class="btn btn-raised btn-primary" name="createProductBtn"  autocomplete="off"> <i class="fa fa-ok-sign"></i> Save</button>
			 <?php
		 }
			?>
     	</form> <!-- /.form -->	     
		 <?php
		 if(isset($_GET['edit'])) { 
		  ?>

		 <div class="card-deck text-center"  style="width: 100%;">

<div class="card text-center"  style="width: 100%;">
<img class="card-img-top mx-auto"  src="<?php echo $row1['product_image']; ?>"  style="max-width:300px;" alt="Card image cap">
<div class="card-body">
<form class="form-horizontal text-center" id="submitProductForm" action="editProductImage.php?shop=<?php echo $dbname;?>" method="POST" enctype="multipart/form-data">
  <h4 class="card-title">Image 1 (image should be not more than 250kb or it will report null.)</h4>
  <input type="hidden" name="productId" value="<?php echo $productId; ?>">
   <input type="file" class="form-control" id="editProductImage" placeholder="image 4" name="editProductImage" class="file-loading" style="width:auto;"/ required>
   <button type='submit' name="header" class="btn btn-primary">Update image</button>
</div>
  </form>
</div>
<!-- 
<div class="card"  style="width: 100%;"">
<img class="card-img-top" src="<?php echo $row1['product_image1']; ?>"  style="width: 100%;"height:25rem;" alt="Card image cap">
<div class="card-body">
<form class="form-horizontal" id="submitProductForm" action="editProductImage2.php?shop=<?php echo $dbname;?>" method="POST" enctype="multipart/form-data">
  <h4 class="card-title">Image 2(image should be not more than 250kb or it will report null.)</h4>
  <input type="hidden" name="productId" value="<?php echo $productId; ?>">
   <input type="file" class="form-control" id="editProductImage" placeholder="image4 name" name="editProductImage2" class="file-loading" style="width:auto;"/ required>
  <button type='submit' name="img1" class="btn btn-primary">Update image</button>
  </form>
</div>
</div>

  </div>
<br>
  <div class="card-deck"  style="width: 100%;">
<div class="card"  style="width: 100%;"">
<img class="card-img-top" src="<?php echo $row1['product_image2']; ?>"  style="width: 100%;"height:25rem;" alt="Card image cap">
<div class="card-body">
<form class="form-horizontal" id="submitProductForm" action="editProductImage3.php?shop=<?php echo $dbname;?>" method="POST" enctype="multipart/form-data">
  <h4 class="card-title">Image 3(image should be not more than 250kb or it will report null.)</h4>
  <input type="hidden" name="productId" value="<?php echo $productId; ?>">
   <input type="file" class="form-control" id="editProductImage" placeholder="image4 name" name="editProductImage3" class="file-loading" style="width:auto;"/ required>
  <button type='submit' name="img2" class="btn btn-primary">Update image</button>
  </form>
</div>
</div>

  </div> -->
<?php
		 }
		 ?>

		   </div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
	<br><br><br><br><br><br>
</div> <!-- /row -->

<br><br><br><br><br><br>
<script>
	$('.text-jqte').jqte();
</script>
<?php require_once 'includes/footer.php';?>