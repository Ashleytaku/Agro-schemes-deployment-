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
		  <li class="active">Area</li>
		</ol>

		<div class="panel panel-default">
			<div class="panel-body">

				<div class="remove-messages"></div>

				<div class="div-action pull pull-right" style="padding-bottom:20px;">
					<button class="btn btn-raised btn-dark button1" data-toggle="modal" id="addCategoriesModalBtn" data-target="#addCategoriesModal"> <i class="fa fa-plus-sign"></i> Add Area </button>
				</div> <!-- /div-action -->				
				
				<table class="table table responsive display nowrap" id="manageCategoriesTable" width="100%">
					<thead>
						<tr>	
						    <th>Area sitemap</th>						
							<th>Area Name</th>
							<th>Status</th>
							<th style="width:15%;">Options</th>
						</tr>
					</thead>
				</table>
				<!-- /table -->

			</div> <!-- /panel-body -->
		</div> <!-- /panel -->		
	</div> <!-- /col-md-12 -->
</div> <!-- /row -->


<!-- add categories -->
<div class="modal fade" id="addCategoriesModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">



    	<form class="form-horizontal" action="php_action/createCategories.php?shop=<?php echo $dbname;?>" method="POST">
	      <div class="modal-header">
		  <h4 class="modal-title"><i class="fa fa-plus"></i> Add Area</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  
	      </div>
	      <div class="modal-body">

		  <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" 
	aria-selected="true">Area Detail</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
	 aria-selected="false">Stands</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" 
	aria-selected="false">Sizes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="price-tab" data-toggle="tab" href="#price" role="tab" aria-controls="price" 
	aria-selected="false">Prices</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
  <input type="hidden" name="user" value="<?php echo $user_id;?>">
  <div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Area Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required placeholder="Area Name" name="categoriesName"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->	  
			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Owner First name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required placeholder="in square meters" name="first"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label"> Owner Last name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required placeholder="in square meters" name="last"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">National ID : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required placeholder="in square meters" name="nationalID"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Area Size: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required placeholder="in square meters" name="areaSize"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
</div>


  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No of stands: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" required placeholder="No." name="noOstands"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of Low density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="No." name="noOlow"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of High density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control"  placeholder="No." name="noOhigh"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of Medium density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="No." name="noOmed"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of  Commercial: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="No." name="noOcomm"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of  Recreational: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="No." name="noOrec"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
			</div>


  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  
  <div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size Of Low density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOlow"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size Of High density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOhigh"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size Of Medium density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOmed"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size  of Commecial: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOcomm"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size of Recreational: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOrec"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size left for Development: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeFdev"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
  </div>


  <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Price of Low: </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" placeholder="0.00" name="priceOlow"  autocomplete="on">
		</div>
</div> <!-- /form-group-->

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Price of High: </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" placeholder="0.00" name="priceOhigh"  autocomplete="on">
		</div>
</div> <!-- /form-group-->

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Price of Medium: </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" placeholder="0.00" name="priceOmed"  autocomplete="on">
		</div>
</div> <!-- /form-group-->

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Price of Commercial: </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" placeholder="0.00" name="priceOcomm"  autocomplete="on">
		</div>
</div> <!-- /form-group-->
</div>
</div>


	      	<div id="add-categories-messages"></div>

	      	

 	        	         	        
	      </div> <!-- /modal-body -->
	      
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button>
	        
	        <button type="submit" name="submitArea" class="btn btn-raised btn-primary" id="createCategoriesBtn" data-loading-text="Loading..."  autocomplete="on"> <i class="fa fa-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	      
     	</form> <!-- /.form -->	     
    </div> <!-- /modal-content -->    
  </div> <!-- /modal-dailog -->
</div> 
<!-- /add categories -->


					





<script src="custom/js/categories.js"></script>

<script src="custom/js/product2.js"></script>

<?php require_once 'includes/footer.php'; ?>