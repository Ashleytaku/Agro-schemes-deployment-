<?php require_once 'php_action/db_connect.php' ?>
<?php require_once 'includes/header.php'; ?>
<?php require 'php_action/core.php';?>

<?php 
$user_id = $_SESSION['userId'];
?>


<div class="row">
	<div class="col-md-12">

		<ol class="breadcrumb" style="background-color: transparent;">
		  <li><a href="dashboard.php?shop=<?php echo $dbname;?>">Home</a></li>/	  
		  <li class="active">Stand specifications</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
<a href="createProduct.php?shop=<?php echo $dbname;?>"><button class="btn btn-dark  btn-raised button1" > <i class="fa fa-plus-sign"></i> Add Stand specifications </button></a>
				</div> <!-- /div-action -->				
				
				<table class="table responsive display nowrap" id="manageProductTable" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th style="width:10%;">Photo</th>							
							<th>Stand Name</th>
							<th>Price</th>							
							<th>Quantity</th>
							<th data-priority="1">Brand</th>
							<th data-priority="2">Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add product -->
<div class="modal fade" id="addProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">

    	<form class="form-horizontal" id="submitProductForm" action="php_action/createProduct.php?shop=<?php echo $dbname;?>" method="POST" enctype="multipart/form-data">
	      <div class="modal-header">
		  <h4 class="modal-title"><i class="fa fa-plus"></i> Add Stand Specifications</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	      </div>

	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div id="add-product-messages"></div>

					<input type="text" name="owner" value="<?php echo $user_id; ?>">

	      	<div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label">Stand Image: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					    <!-- the avatar markup -->
							<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage" placeholder="Product Name" name="productImage" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
					</div> <!-- /form-group-->	  
					
					<!-- <div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label">Product Image: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8"> -->
					    <!-- the avatar markup -->
							<!-- <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage2" placeholder="Product Name" name="productImage1" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
					</div>  -->
					<!-- /form-group-->	
					
					<!-- <div class="form-group">
	        	<label for="productImage" class="col-sm-3 control-label">Product Image :</label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8"> -->
					    <!-- the avatar markup -->
							<!-- <div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
					    <div class="kv-avatar center-block">					        
					        <input type="file" class="form-control" id="productImage3" placeholder="Product Name" name="productImage2" class="file-loading" style="width:auto;"/>
					    </div>
				      
				    </div>
			</div>  -->
			<!-- /form-group-->	

	        <div class="form-group">
	        	<label for="productName" class="col-sm-3 control-label">Stand Number Range: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productName" placeholder="Product Name" name="productName" autocomplete="off">
				    </div>
					</div> <!-- /form-group-->	
					
					<div class="form-group">
	        	<label for="productCode" class="col-sm-3 control-label">Stand Code: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="productCode" placeholder="Product code" name="productCode" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="quantity" class="col-sm-3 control-label">Quantity: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="quantity" placeholder="Quantity" name="quantity" autocomplete="off">
				    </div>
	        </div> <!-- /form-group-->	        	 

	        <div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Stand Price: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Price" name="rate" autocomplete="off">
				    </div>
					</div> <!-- /form-group-->

					<div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Building Cost: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <input type="text" class="form-control" id="rate" placeholder="Price"  autocomplete="off">
				    </div>
					</div> <!-- /form-group-->

					<div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Stand Description: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<textarea class="form-control"id="description" name="description" autocomplete="off" required rows="3">product description</textarea>
				    </div>
					</div> <!-- /form-group-->		

					<div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Building Cost Breakdown: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<textarea class="form-control"id="spec" name="spec" autocomplete="off" width="100%" required rows="3"><div class="card" style="width: 20rem;">
  <div class="card-header">
   Featured
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio : </li>
    <li class="list-group-item">Dapibus ac facilisis in : </li>
    <li class="list-group-item">Vestibulum at eros : </li>
  </ul>
</div></textarea>
				    </div>
					</div> <!-- /form-group-->
					
					
					<div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Offers: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="offer" name="offer">
								<option value="">SELECT</option>
								<option value="2">Normal</option>
								<option value="1">Promotion</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

	        <div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Brand Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="brandName" name="brandName">
				      	<option value="">SELECT</option>
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
			
			<!-- <div class="form-group">
	        	<label for="category" class="col-sm-3 control-label">Main Category: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="category" name="category">
						<option value="1">main</option>
				      </select>
				    </div>
			</div>  -->
			<!-- /form-group-->  

	        <div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label">Category Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="categoryName" placeholder="Product Name" name="categoryName" >
				      	<option value="">SELECT</option>
				      	<?php 
				      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->		

					<div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label">2nd Category Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="categoryName2" placeholder="Product Name" name="categoryName2" >
				      	<option value="">SELECT</option>
				      	<?php 
				      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	

					<div class="form-group">
	        	<label for="categoryName" class="col-sm-3 control-label">3rd Category Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select type="text" class="form-control" id="categoryName3" placeholder="Product Name" name="categoryName3" >
				      	<option value="">SELECT</option>
				      	<?php 
				      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
								$result = $connect->query($sql);

								while($row = $result->fetch_array()) {
									echo "<option value='".$row[0]."'>".$row[1]."</option>";
								} // while
								
				      	?>
				      </select>
				    </div>
	        </div> <!-- /form-group-->				        	         	       

	        <div class="form-group">
	        	<label for="productStatus" class="col-sm-3 control-label">Status: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="productStatus" name="productStatus">
				      	<option value="">SELECT</option>
				      	<option value="1">Available</option>
				      	<option value="2">Not Available</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
	        
	        <button type="submit" class="btn btn-primary" id="createProductBtn" data-loading-text="Loading..." autocomplete="off"> <i class="fa fa-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


<!-- edit categories brand -->
<div class="modal fade" id="editProductModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
    	    	
	      <div class="modal-header">
		  <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Product</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	       
	      </div>
	      <div class="modal-body" style="max-height:450px; overflow:auto;">

	      	<div class="div-loading">
	      		<i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
						<span class="sr-only">Loading...</span>
	      	</div>

	      	<div class="div-result">

				  <!-- Nav tabs -->
				  <ul class="nav nav-tabs" role="tablist">
				    <li role="presentation" class="active"><a href="#photo" aria-controls="home" role="tab" data-toggle="tab">Photo</a></li>
					<li role="presentation" class=""><a href="#photoA" aria-controls="home" role="tab" data-toggle="tab">Photo</a></li>
					<li role="presentation" class=""><a href="#photoB" aria-controls="home" role="tab" data-toggle="tab">Photo</a></li>
				    <li role="presentation"><a href="#productInfo" aria-controls="profile" role="tab" data-toggle="tab">Product Info</a></li>    
				  </ul>

				  <!-- Tab panes -->
				  <div class="tab-content">

				  	
				    <div role="tabpanel" class="tab-pane active" id="photo">
				    	<form action="php_action/editProductImage.php?shop=<?php echo $dbname;?>" method="POST" id="updateProductImageForm" class="form-horizontal" enctype="multipart/form-data">

				    	<br />
				    	<div id="edit-productPhoto-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Product Image: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">							    				   
						      <img src="" id="getProductImage" class="thumbnail" style="width:250px; height:250px;" />
						    </div>
			        </div> <!-- /form-group-->	     	           	       
				    	
			      	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Select Photo: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
							    <!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
							    <div class="kv-avatar center-block">					        
							        <input type="file" class="form-control" id="editProductImage" placeholder="Product Name" name="editProductImage" class="file-loading" style="width:auto;"/>
							    </div>
						      
						    </div>
							</div> <!-- /form-group-->	

							<div class="modal-footer editProductPhotoFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
				        
				        <!-- <button type="submit" class="btn btn-success" id="editProductImageBtn" data-loading-text="Loading..."> <i class="fa fa-ok-sign"></i> Save Changes</button> -->
				      </div>
				      <!-- /modal-footer -->
				      </form>
				      <!-- /form -->
				    </div>
				    <!-- product image -->


							  <div role="tabpanel" class="tab-pane" id="photoA">
				    	<form action="php_action/editProductImage2.php?shop=<?php echo $dbname;?>" method="POST" id="updateProductImageForm2" class="form-horizontal" enctype="multipart/form-data"> 
							
						<br />
				    	<div id="edit-productPhoto-messages"></div>

							<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Product Image: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">							    				   
						      <img src="" id="getProductImage2" class="thumbnail" style="width:250px; height:250px;" />
						    </div>
			        </div> <!-- /form-group-->	     	           	       
				    	
			      	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Select Photo: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
							    <!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
							    <div class="kv-avatar center-block">					        
							        <input type="file" class="form-control" id="editProductImage2" placeholder="Product Name" name="editProductImage2" class="file-loading" style="width:auto;"/>
							    </div>
						      
						    </div>
							</div> <!-- /form-group-->

							<div class="modal-footer editProductPhotoFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
				        
				        <!-- <button type="submit" class="btn btn-success" id="editProductImageBtn" data-loading-text="Loading..."> <i class="fa fa-ok-sign"></i> Save Changes</button> -->
				      </div>
				      <!-- /modal-footer -->
				      </form>
				      <!-- /form -->
				    </div>
				    <!-- product image -->


							  <div role="tabpanel" class="tab-pane" id="photoB">
				    	<form action="php_action/editProductImage3.php?shop=<?php echo $dbname;?>" method="POST" id="updateProductImageForm3" class="form-horizontal" enctype="multipart/form-data">	 
							
						<br />
				    	<div id="edit-productPhoto-messages"></div>
						
							<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Product Image: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">							    				   
						      <img src="" id="getProductImage3" class="thumbnail" style="width:250px; height:250px;" />
						    </div>
			        </div> <!-- /form-group-->	     	           	       
				    	
			      	<div class="form-group">
			        	<label for="editProductImage" class="col-sm-3 control-label">Select Photo: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
							    <!-- the avatar markup -->
									<div id="kv-avatar-errors-1" class="center-block" style="display:none;"></div>							
							    <div class="kv-avatar center-block">					        
							        <input type="file" class="form-control" id="editProductImage3" placeholder="Product Name" name="editProductImage3" class="file-loading" style="width:auto;"/>
							    </div>
						      
						    </div>
			        </div> <!-- /form-group-->	 

			        <div class="modal-footer editProductPhotoFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
				        
				        <!-- <button type="submit" class="btn btn-success" id="editProductImageBtn" data-loading-text="Loading..."> <i class="fa fa-ok-sign"></i> Save Changes</button> -->
				      </div>
				      <!-- /modal-footer -->
				      </form>
				      <!-- /form -->
				    </div>
				    <!-- product image -->
				    <div role="tabpanel" class="tab-pane" id="productInfo">
				    	<form class="form-horizontal" id="editProductForm" action="php_action/editProduct.php?shop=<?php echo $dbname;?>" method="POST">				    
				    	<br />

				    	<div id="edit-product-messages"></div>

				    	<div class="form-group">
			        	<label for="editProductName" class="col-sm-3 control-label">Product Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editProductName" placeholder="Product Name" name="editProductName" autocomplete="off">
						    </div>
							</div> <!-- /form-group-->	    
							
							<div class="form-group">
			        	<label for="editProductcode" class="col-sm-3 control-label">Product Code: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editProductCode" placeholder="Product code" name="editProductCode" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	 

			        <div class="form-group">
			        	<label for="editQuantity" class="col-sm-3 control-label">Quantity: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editQuantity" placeholder="Quantity" name="editQuantity" autocomplete="off">
						    </div>
			        </div> <!-- /form-group-->	        	 

			        <div class="form-group">
			        	<label for="editRate" class="col-sm-3 control-label">Price: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <input type="text" class="form-control" id="editRate" placeholder="Rate" name="editRate" autocomplete="off">
						    </div>
							</div> <!-- /form-group-->	

							<div class="form-group">
			        	<label for="editDescription" class="col-sm-3 control-label">Description: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
								<textarea class="form-control" id="editDescription" placeholder="Rate" name="editDescription" autocomplete="off" required rows="3"></textarea>
						    </div>
							</div> <!-- /form-group--> 

							<div class="form-group">
	        	<label for="rate" class="col-sm-3 control-label">Specifications: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
						<textarea class="form-control" id="editSpec" name="editSpec" autocomplete="off" required rows="3"></textarea>
				    </div>
					</div> <!-- /form-group-->
							
							<div class="form-group">
	        	<label for="brandName" class="col-sm-3 control-label">Offers: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
				      <select class="form-control" id="editOffer" name="editOffer">
								<option value="">SELECT</option>
								<option value="2">Normal</option>
								<option value="1">Promotion</option>
				      </select>
				    </div>
	        </div> <!-- /form-group-->

			        <div class="form-group">
			        	<label for="editBrandName" class="col-sm-3 control-label">Brand Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editBrandName" name="editBrandName">
						      	<option value="">SELECT</option>
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
					
					<!-- <div class="form-group">
	        	<label for="category" class="col-sm-3 control-label">Category: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-8">
					<input type="text"  class="form-control" id="editCategory"  placeholder="main" name="editCategory" autocomplete="off">
				    </div>
	        </div> /form-group -->

			        <div class="form-group">
			        	<label for="editCategoryName" class="col-sm-3 control-label">Category Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select type="text" class="form-control" id="editCategoryName" name="editCategoryName" >
						      	<option value="">SELECT</option>
						      	<?php 
						      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	

							<div class="form-group">
			        	<label for="editCategoryName" class="col-sm-3 control-label">2nd Category Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select type="text" class="form-control" id="editCategoryName2" name="editCategoryName2" >
						      	<option value="">SELECT</option>
						      	<?php 
						      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	

							<div class="form-group">
			        	<label for="editCategoryName" class="col-sm-3 control-label">3rd Category Name: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select type="text" class="form-control" id="editCategoryName3" name="editCategoryName3" >
						      	<option value="">SELECT</option>
						      	<?php 
						      	$sql = "SELECT categories_id, categories_name, categories_active, categories_status FROM categories WHERE categories_status = 1 AND categories_active = 1";
										$result = $connect->query($sql);

										while($row = $result->fetch_array()) {
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										} // while
										
						      	?>
						      </select>
						    </div>
			        </div> <!-- /form-group-->					        	         	       

			        <div class="form-group">
			        	<label for="editProductStatus" class="col-sm-3 control-label">Status: </label>
			        	<label class="col-sm-1 control-label">: </label>
						    <div class="col-sm-8">
						      <select class="form-control" id="editProductStatus" name="editProductStatus">
						      	<option value="">SELECT</option>
						      	<option value="1">Available</option>
						      	<option value="2">Not Available</option>
						      </select>
						    </div>
			        </div> <!-- /form-group-->	         	        

			        <div class="modal-footer editProductFooter">
				        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
				        
				        <button type="submit" class="btn btn-success" id="editProductBtn" data-loading-text="Loading..."> <i class="fa fa-ok-sign"></i> Save Changes</button>
				      </div> <!-- /modal-footer -->				     
			        </form> <!-- /.form -->				     	
				    </div>    
				    <!-- /product info -->
				  </div>

				</div>
	      	
	      </div> <!-- /modal-body -->
	      	      
     	
    </div>
    <!-- /modal-content -->
  </div>
  <!-- /modal-dailog -->
</div>
<!-- /categories brand -->

<!-- categories brand -->
<div class="modal fade" tabindex="-1" role="dialog" id="removeProductModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-trash"></i> Remove Product</h4>
      </div>
      <div class="modal-body">

      	<div class="removeProductMessages"></div>

        <p>Do you really want to remove ?</p>
      </div>
      <div class="modal-footer removeProductFooter">
        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
        <button type="button" class="btn btn-primary" id="removeProductBtn" data-loading-text="Loading..."> <i class="fa fa-ok-sign"></i> Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /categories brand -->
<!-- <script>
$(document).ready(function() {
    $('#manageProductTable').dataTable({
		"responsive": true,
		"columnDefs": [
		            { responsivePriority: 1, targets: 0 },
		            { responsivePriority: 2, targets: 4 }
		        ]
    } );
} );
</script> -->

<script src="custom/js/product.js"></script>


<?php require_once 'includes/footer.php'; ?>