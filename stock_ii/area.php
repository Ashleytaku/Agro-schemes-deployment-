<?php 
require_once 'includes/header.php';
if(isset($_GET['i'])) {
	$productId = $_GET['i'];
	$sql1 = "SELECT * FROM areas where area_id = $productId";
	$result1 = $connect->query($sql1);
	$row1 = $result1->fetch_assoc();

	}

if($_SESSION['type'] == 'buyer'){
	header("refresh:2; url=dashboard.php");
}	

if(isset($_POST['editArea'])) {	

	$categoriesName    =     htmlentities(str_replace("'","&#x2019;",$_POST['categoriesName']));
	$areaSize          =     htmlentities(str_replace("'","&#x2019;",$_POST['areaSize'])); 
	$noOstands         =     htmlentities(str_replace("'","&#x2019;",$_POST['noOstands'])); 
	$noOlow            =     htmlentities(str_replace("'","&#x2019;",$_POST['noOlow'])); 
	$noOhigh           =     htmlentities(str_replace("'","&#x2019;",$_POST['noOhigh'])); 
	$noOmed            =     htmlentities(str_replace("'","&#x2019;",$_POST['noOmed'])); 
	$noOcomm           =     htmlentities(str_replace("'","&#x2019;",$_POST['noOcomm'])); 
	$noOrec            =     htmlentities(str_replace("'","&#x2019;",$_POST['noOrec'])); 
	$sizeOmed          =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOmed'])); 
	$sizeOlow          =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOlow']));  
	$sizeOhigh         =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOhigh']));   
	$sizeOcomm         =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOcomm']));  
	$sizeOrec          =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeOrec']));  
	$sizeFdev          =     htmlentities(str_replace("'","&#x2019;",$_POST['sizeFdev']));  
	$priceOmed         =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOmed'])); 
	$priceOlow         =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOlow'])); 
	$priceOhigh        =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOhigh'])); 
	$priceOcomm        =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOcomm'])); 
	$priceOverall      =     htmlentities(str_replace("'","&#x2019;",$_POST['priceOrec']));
	$decision          =     htmlentities(str_replace("'","&#x2019;",$_POST['decision'])); 
	$notes             =     htmlentities(str_replace("'","&#x2019;",$_POST['notes'])); 
	$areaID            =     $_POST['areaId'];
	$date              =     date("Y-m-d H:i:s");
   
	 $sql = "UPDATE areas SET council_decision = '$decision', notes = '$notes' WHERE area_id = $areaID";
				  if($connect->query($sql) === TRUE) {
					  $valid['messages'] = "Successfully updated the Area's details";	
				  } else {
					  $valid['messages'] = "Can not update the Area's details";
				  }

 
} // /if $_POST


?>
<div class="row">
	<div class="col-md-12">

	<ol class="breadcrumb" style="background-color: transparent;">
		  <li><a href="dashboard.php">Dashboard</a></li>/	
		  <li><?php echo $row1['area_name'];?> Details</li>
		</ol>

		<div class="panel panel-default text-dark">
			<div class="panel-body">

			<form class="form-horizontal" action="area.php?i=<?php echo $productId;?>" method="POST">
	      <div class="modal-header">
		  <h4 class="modal-title"><i class="fa fa-plus"></i> Edit Area</h4>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  
	      </div>
		  
		  <div class="messages">
							<?php if($valid) {
								foreach ($valid as $key => $value) {
									echo '<div class="alert alert-info" role="alert">
									<i class="fa fa-exclamation-sign"></i>
									'.$value.'</div>';										
									}
								} ?>
                        </div>
                        
	      <div class="modal-body">

		  <ul class="nav nav-tabs" id="myTab" role="tablist">
		  <li class="nav-item">
	<a class="nav-link<?php 
	if($_SESSION['type'] == 'council'){
		echo 'active';
	}
	?>" id="council-tab" data-toggle="tab" href="#council" role="tab" aria-controls="council" 
	aria-selected="false">Council's Response</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?php 
	if($_SESSION['type'] != 'council'){
		echo 'active';
	}
	?>"" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" 
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
<div class="tab-pane fade show <?php 
	if($_SESSION['type'] == 'council'){
		echo 'active';
	}
	?>" id="council" role="tabpanel" aria-labelledby="council-tab">
	<br>
	<?php
	if($_SESSION['type'] == 'council'  && $row1['council_decision'] == 'pending'){
	?>

	<input type="hidden" value="<?php echo $productId; ?>" name="areaId">
<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Decision : </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <select name='decision'>
		  <option><?php
					 if(isset($_GET['i'])){
						 echo $row1['council_decision'];
					 }  
					   ?></option>
		  <option value="accepted">Approve</option>
		  <option value="rejected">Reject</option>
		  </select>
		</div>
</div> <!-- /form-group-->

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Reason for decision : </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <textarea name='notes'></textarea>
		</div>
</div> <!-- /form-group-->

<?php
	}else{
		if($row1['council_decision'] == 'pending'){
?>
<h1 class="text-info">Decision Pending</h1>
<?php
		}else if($row1['council_decision'] == 'rejected'){
			?>
			<h1 class="text-danger">Rejected</h1>
			<p class="text-danger"><?php echo html_entity_decode($row1['notes'])?></p>
			<?php
		}else{
			?>
			<h1 class="text-success">Accepted</h1>
			<p class="text-success"><?php echo html_entity_decode($row1['notes'])?></p>
			<?php
		}
	}
?>
</div>

  <div class="tab-pane fade show <?php 
	if($_SESSION['type'] != 'council'){
		echo 'active';
	}
	?>"" id="home" role="tabpanel" aria-labelledby="home-tab">
  <div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Area Name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required placeholder="Area Name"
					   name="categoriesName"  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['area_name'];
					 }  
					   ?>" autocomplete="on">
				    </div>
			</div> <!-- /form-group-->	  
			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Owner name: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['Name'];
					 }  
					   ?>" 
					  placeholder="in square meters" name="areaSize"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">National ID : </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['nationalId'];
					 }  
					   ?>" 
					   placeholder="in square meters" name="areaSize"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Area Size: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" id="categoriesName" required readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['areaSize'];
					 }  
					   ?>" 
					  placeholder="in square meters" name="areaSize"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
</div>


  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  <div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No of stands: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" required placeholder="No." name="noOstands" 
					  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['n_of_stands'];
					 }  
					   ?>"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of Low density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="No." name="noOlow" 
					  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['n_of_low'];
					 }  
					   ?>" autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of High density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control"  placeholder="No." name="noOhigh" 
					  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['n_of_high'];
					 }  
					   ?>" autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of Medium density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="No." name="noOmed"  
					  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['n_of_med'];
					 }  
					   ?>" autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of  Commercial: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="No." name="noOcomm" 
					  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['n_of_commercial'];
					 }  
					   ?>" autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">No. Of  Recreational: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="No." name="noOrec" readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['n_of_recreational'];
					 }  
					   ?>" autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
			</div>


  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
  
  <div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size Of Low density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOlow" 
					  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['s_for_low'];
					 }  
					   ?>"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size Of High density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters"  name="sizeOhigh" 
					  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['s_for_high'];
					 }  
					   ?>" autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size Of Medium density: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOmed" readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['s_for_med'];
					 }  
					   ?>"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size  of Commecial: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOcomm" readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['s_for_commercial'];
					 }  
					   ?>"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size of Recreational: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeOrec" readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['s_for_recreational'];
					 }  
					   ?>" autocomplete="on">
				    </div>
			</div> <!-- /form-group-->

			<div class="form-group">
	        	<label for="categoriesName" class="col-sm-4 control-label">Size left for Development: </label>
	        	<label class="col-sm-1 control-label">: </label>
				    <div class="col-sm-7">
				      <input type="text" class="form-control" placeholder="in square meters" name="sizeFdev" 
					  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['s_for_dev'];
					 }  
					   ?>"  autocomplete="on">
				    </div>
			</div> <!-- /form-group-->
  </div>


  <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Price of Low: </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" placeholder="0.00" name="priceOlow" 
		  readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['price_for_low'];
					 }  
					   ?>" autocomplete="on">
		</div>
</div> <!-- /form-group-->

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Price of High: </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" placeholder="0.00" name="priceOhigh" readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['price_for_high'];
					 }  
					   ?>"  autocomplete="on">
		</div>
</div> <!-- /form-group-->

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Price of Medium: </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" placeholder="0.00" name="priceOmed" readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['price_for_med'];
					 }  
					   ?>"  autocomplete="on">
		</div>
</div> <!-- /form-group-->

<div class="form-group">
	<label for="categoriesName" class="col-sm-4 control-label">Price of Commercial: </label>
	<label class="col-sm-1 control-label">: </label>
		<div class="col-sm-7">
		  <input type="text" class="form-control" placeholder="0.00" name="priceOcomm" readonly value="<?php
					 if(isset($_GET['i'])){
						 echo $row1['price_for_commercial'];
					 }  
					   ?>" autocomplete="on">
		</div>
</div> <!-- /form-group-->


</div>
</div>


	      	

 	        	         	        
	      </div> <!-- /modal-body -->
		  <?php
		 if(isset($_GET['i'])) {
		  ?>
	      <div class="modal-footer">
	        <!-- <button type="button" class="btn btn-default" data-dismiss="modal"> <i class="fa fa-remove-sign"></i> Close</button> -->
	        
	        <button type="submit" name="editArea" class="btn btn-raised btn-primary" id="createCategoriesBtn" data-loading-text="Loading..."  autocomplete="on"> <i class="fa fa-ok-sign"></i> Save Changes</button>
	      </div> <!-- /modal-footer -->	
		  <?php
		 } 
		  ?>      
     	</form> <!-- /.form -->	    

</div>


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