<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap admin template">
	<meta name="author" content="">

	<title>News-detail | Doctor T</title>

	<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="../images/doctor-logo.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/bootstrap-extend.css">
	<link rel="stylesheet" href="assets/css/site.css">

	<!-- Plugins -->
	<link rel="stylesheet" href="vendor/animsition/animsition.css">
	<link rel="stylesheet" href="vendor/asscrollable/asScrollable.css">
	<link rel="stylesheet" href="vendor/switchery/switchery.css">
	<link rel="stylesheet" href="vendor/intro-js/introjs.css">
	<link rel="stylesheet" href="vendor/slidepanel/slidePanel.css">
	<link rel="stylesheet" href="vendor/flag-icon-css/flag-icon.css">
	<link rel="stylesheet" href="assets/css/v2.css">

	<link rel="stylesheet" href="vendor/bootstrap-table/bootstrap-table.css?v4.0.2">

	<!-- Fonts -->
	<link rel="stylesheet" href="assets/fonts/web-icons/web-icons.min.css">
	<link rel="stylesheet" href="assets/fonts/font-awesome/font-awesome.min.css">
	<link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Roboto:300,400,500,300italic'>

	<!--[if lt IE 9]>
	<script src="vendor/html5shiv/html5shiv.min.js"></script>
	<![endif]-->

	<!--[if lt IE 10]>
	<script src="vendor/media-match/media.match.min.js"></script>
	<script src="vendor/respond/respond.min.js"></script>
	<![endif]-->

	<!-- Scripts -->
	<script src="vendor/breakpoints/breakpoints.js"></script>
	<script>
		Breakpoints();
	</script>
</head>
<body class="animsition dashboard">

	<?php $current_file = basename(__FILE__); ?>
	<?php include 'header.php'; ?>
	<?php 
		$newsdetail_list = newsdetail_list(); 
	?>

	<!-- Page -->
	<div class="page">
		<div class="page-content container-fluid">

	      	<!-- Panel Other -->
	      	<div class="panel">
		        <div class="panel-heading">
		          	<h3 class="panel-title">News-detail</h3>
		        </div>
		        <div class="panel-body">
		          	<div class="row row-lg">
			            <div class="col-md-12">
			              	<!-- Example Toolbar -->
			              	<div class="example-wrap">			                  
			                  	<div class="bootstrap-table">
			                  		<div class="fixed-table-toolbar">
			                  			<div class="bs-bars pull-left">
			                  				<div class="btn-group hidden-sm-down" id="exampleToolbar" role="group">
							                    <button type="button" class="btn btn-success btn-outline btn-sm" onclick="window.location.href = 'newsdetail_add.php';">
							                      	<i class="icon wb-plus" aria-hidden="true"></i> Add News-detail
							                    </button>
			                  				</div>
			                  			</div>
			                  		</div>
			                  		<div class="" style="padding-bottom: 0px;">
			                  			<div class="fixed-table-body">
			                  				<table id="exampleTableToolbar" data-mobile-responsive="true" class="table table-hover" data-pagination="true" data-search="true" style="margin-top: 0px;">

			                  				<!-- <table id="exampleTablePagination" data-toggle="table" data-url="../assets/data/bootstrap_table_test.json" data-query-params="queryParams" data-mobile-responsive="true" data-height="400" data-pagination="true" data-icon-size="outline" data-search="true" class="table table-hover" style="margin-top: -36px;"> -->
			                    				<thead style="">
			                    					<tr>
			                    						<th style="" data-field="id" data-align="center" data-width="120px">
			                    							<div class="th-inner ">#</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="name">
			                    							<div class="th-inner ">Name</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
<<<<<<< HEAD
			                    						<th style="" data-field="newscoll" data-align="center" data-width="120px">
			                    							<div class="th-inner ">News Recommend</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="innovation" data-align="center" data-width="120px">
			                    							<div class="th-inner ">Essential Read</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
														<th style="" data-field="selected" data-align="center" data-width="120px">
			                    							<div class="th-inner ">Select Showfooter</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="" data-width="150px">
=======
			                    						<th style="" data-field="news recomment">
			                    							<div class="th-inner ">Recommend</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="">
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
			                    							<div class="th-inner ">Created</div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    						<th style="" data-field="edit" data-align="center" data-width="120px">
			                    							<div class="th-inner "></div>
			                    							<div class="fht-cell"></div>
			                    						</th>
			                    					</tr>
			                    				</thead>
			                    				<?php if(!empty($newsdetail_list)) : ?>
			                  					<tbody>
			                  						<?php 
													$i = 0;
													foreach($newsdetail_list as $newsdetail_detail) : 
													?>
			                  						<tr> 
			                  							<td class=""><?php echo $i+1; ?></td> 
			                  							<td style=""><?php echo $newsdetail_detail->name; ?></td>
			                  							<td style="">
<<<<<<< HEAD
															<?php if ($newsdetail_detail->is_recommend == '1') : ?>
																<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="StChange(<?php echo $newsdetail_detail->id; ?>, 0)"><i class="icon wb-check" aria-hidden="true"></i></button>
															<?php else : ?>
																<button class="btn btn-sm btn-danger btn-icon btn-floating" type="button" onclick="StChange(<?php echo $newsdetail_detail->id; ?>, 1)"><i class="icon wb-close" aria-hidden="true"></i></button>
															<?php endif; ?>
														</td>
														<td style="">
															<?php if ($newsdetail_detail->is_innovation == '1') : ?>
																<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="InnoChange(<?php echo $newsdetail_detail->id; ?>, 0)"><i class="icon wb-check" aria-hidden="true"></i></button>
															<?php else : ?>
																<button class="btn btn-sm btn-danger btn-icon btn-floating" type="button" onclick="InnoChange(<?php echo $newsdetail_detail->id; ?>, 1)"><i class="icon wb-close" aria-hidden="true"></i></button>
															<?php endif; ?>
														</td>
														<td style="">
															<?php if ($newsdetail_detail->is_selected == '1') : ?>
																<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="showChange(<?php echo $newsdetail_detail->id; ?>, 0)"><i class="icon wb-check" aria-hidden="true"></i></button>
															<?php else : ?>
																<button class="btn btn-sm btn-danger btn-icon btn-floating" type="button" onclick="showChange(<?php echo $newsdetail_detail->id; ?>, 1)"><i class="icon wb-close" aria-hidden="true"></i></button>
															<?php endif; ?>
														</td>
=======
			                  								<?php if ($newsdetail_detail->is_recommend == '1') : ?>
			                  									<button class="btn btn-sm btn-success btn-icon btn-floating" type="button" onclick="StChange(<?php echo $newsdetail_detail->id; ?>, 0)"><i class="icon wb-check" aria-hidden="true"></i></button>
			                  								<?php else : ?>
			                  									<button class="btn btn-sm btn-danger btn-icon btn-floating" type="button" onclick="StChange(<?php echo $newsdetail_detail->id; ?>, 1)"><i class="icon wb-close" aria-hidden="true"></i></button>
			                  								<?php endif; ?>
			                  							</td> 
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
			                  							<td style=""><?php echo date("d/m/Y H:i:s", strtotime( $newsdetail_detail->create_date ) ); ?></td>
			                  							<td>
			                  								<button type="button" class="btn btn-round btn-warning btn-sm" onclick="window.location.href = 'news_detail_edit.php?id=<?php echo $newsdetail_detail->id; ?>';"><i class="icon wb-pencil" aria-hidden="true"></i></button>
			                  								<button type="button" class="btn btn-round btn-danger btn-sm" onclick="delS(<?php echo $newsdetail_detail->id; ?>)"><i class="icon wb-close" aria-hidden="true"></i></button>
			                  							</td> 
			                  						</tr>
			                  						<?php
			                  							$i++;
			                  						endforeach; 
			                  						?>
			                  					</tbody>
			                  					<?php endif; /* if(!empty($service_list)) : */ ?>
			                  				</table>
			                  			</div>
			                  			<div class="fixed-table-pagination" style="display: none;"></div>
			                  		</div>
				                  	<div class="clearfix"></div>
				                </div>
			              	</div>
			              	<!-- End Example Toolbar -->
			            </div>	         
		          	</div>
		        </div>
	      </div>
	      <!-- End Panel Other -->
    </div>
	</div>
	<!-- End Page -->
	
	<?php include 'footer.php'; ?>

	<div class="modal fade bs-example-modal-sm" id="modalChange" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะหรือไม่ ?</h4>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="service_id" name="service_id">
					<input type="hidden" id="sStatus" name="sStatus">
					<button type="button" class="btn btn-success" onclick="changeSt()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-sm" id="modalChangeinno" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะหรือไม่ ?</h4>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="inno_id" name="inno_id">
					<input type="hidden" id="inStatus" name="inStatus">
					<button type="button" class="btn btn-success" onclick="changeInno()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-sm" id="modalChangesele" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Change</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการเปลี่ยนสถานะหรือไม่ ?</h4>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="sele_id" name="sele_id">
					<input type="hidden" id="slStatus" name="slStatus">
					<button type="button" class="btn btn-success" onclick="changeSele()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade bs-example-modal-sm" id="modaldelete" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
					<h4 class="modal-title" id="myModalLabel2">Delete</h4>
				</div>
				<div class="modal-body">
					<h4>คุณต้องการลบสิ่งนี้หรือไม่ ?</h4>
				</div>
				<div class="modal-footer">
					<input type="hidden" id="news_id" name="news_id">
					<button type="button" class="btn btn-success" onclick="deleteService()"><i class="fa fa-check"></i> Confirm</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!-- /modals -->
	
	<!-- Core-->
	<script src="vendor/babel-external-helpers/babel-external-helpers.js"></script>
	<script src="vendor/jquery/jquery.js"></script>
	<script src="vendor/popper-js/umd/popper.min.js"></script>
	<script src="vendor/bootstrap/bootstrap.js"></script>
	<script src="vendor/animsition/animsition.js"></script>
	<script src="vendor/mousewheel/jquery.mousewheel.js"></script>
	<script src="vendor/asscrollbar/jquery-asScrollbar.js"></script>
	<script src="vendor/asscrollable/jquery-asScrollable.js"></script>
	<script src="vendor/ashoverscroll/jquery-asHoverScroll.js"></script>

	<!-- Plugins -->
	<script src="vendor/switchery/switchery.js"></script>
	<script src="vendor/intro-js/intro.js"></script>
	<script src="vendor/screenfull/screenfull.js"></script>
	<script src="vendor/slidepanel/jquery-slidePanel.js"></script>
	<script src="vendor/skycons/skycons.js"></script>
	<script src="vendor/aspieprogress/jquery-asPieProgress.min.js"></script>
	<script src="vendor/matchheight/jquery.matchHeight-min.js"></script>

	<script src="vendor/bootstrap-table/bootstrap-table.js?v4.0.2"></script>
	<script src="vendor/bootstrap-table/extensions/mobile/bootstrap-table-mobile.min.js?v4.0.2"></script>

	<!-- Scripts -->
	<script src="assets/js/Component.js"></script>
	<script src="assets/js/Plugin.js"></script>
	<script src="assets/js/Base.js"></script>
	<script src="assets/js/Config.js"></script>

	<script src="assets/js/Section/Menubar.js"></script>
	<script src="assets/js/Section/GridMenu.js"></script>
	<script src="assets/js/Section/Sidebar.js"></script>
	<script src="assets/js/Section/PageAside.js"></script>
	<script src="assets/js/Plugin/menu.js"></script>

	<script src="assets/js/config/colors.js"></script>
	<script src="assets/js/config/tour.js"></script>

	<!-- Page -->
	<script src="assets/js/Site.js"></script>
	<script src="assets/js/Plugin/asscrollable.js"></script>
	<script src="assets/js/Plugin/slidepanel.js"></script>
	<script src="assets/js/Plugin/switchery.js"></script>
	<script src="assets/js/Plugin/matchheight.js"></script>

	<script src="assets/js/v1.js"></script>

	<script src="assets/js/tables/bootstrap.js?v4.0.2"></script>

	<script type="text/javascript">

	function StChange(sid, status)
    {
    	$('#service_id').val(sid);
    	$('#sStatus').val(status)
    	$('#modalChange').modal('show');
    }

	function InnoChange(ids, status)
    {
    	$('#inno_id').val(ids);
    	$('#inStatus').val(status)
    	$('#modalChangeinno').modal('show');
    }

	function showChange(seid, status)
    {
    	$('#sele_id').val(seid);
    	$('#slStatus').val(status)
    	$('#modalChangesele').modal('show');
    }

    function changeSt()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: 'funcQuery.php',
		  	data 	: {sid:$('#service_id').val(), st:$('#sStatus').val(), action:'changeStse'},
		  	success: function(data) {
		        	if (data == 'true') {
		        		location.reload();
		        	} else {
		        		console.log(data);
		        	}        	
		        }
		});
	}

	function changeInno()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: 'funcQuery.php',
		  	data 	: {ids:$('#inno_id').val(), inno:$('#inStatus').val(), action:'changeInno'},
		  	success: function(data) {
		        	if (data == 'true') {
		        		location.reload();
		        	} else {
		        		console.log(data);
		        	}        	
		        }
		});
	}

	function changeSele()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: 'funcQuery.php',
		  	data 	: {seid:$('#sele_id').val(), st:$('#slStatus').val(), action:'changeSele'},
		  	success: function(data) {
		        	if (data == 'true') {
		        		location.reload();
		        	} else {
		        		console.log(data);
		        	}        	
		        }
		});
	}

	function delS(news_id)
    {
    	$('#news_id').val(news_id);
    	$('#modaldelete').modal('show');
    }

     function deleteService()
    {
   		$.ajax({
		  	type 	: 'POST',
		  	url 	: 'funcQuery.php',
		  	data 	: {news_id:$('#news_id').val(), action:'delnew'},
		  	success: function(data) {
		        	if (data == 'true') {
		        		location.reload();
		        	} else {
		        		console.log(data);
		        	}        	
		        }
		});
	}

	</script>
</body>
</html>
