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
		  <li class="active">Your Areas</li>
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




					





<script src="custom/js/areas.js"></script>

<?php require_once 'includes/footer.php'; ?>