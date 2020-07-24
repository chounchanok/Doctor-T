<!DOCTYPE html>
<html class="no-js css-menubar" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="bootstrap admin template">
	<meta name="author" content="">

	<title>Product Add | General S </title>

	<link rel="apple-touch-icon" href="assets/images/apple-touch-icon.png">
	<link rel="shortcut icon" href="../assets/images/logo.png">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="assets/css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="vendor/summernote/summernote-bs4.css">
	<link rel="stylesheet" href="assets/css/bootstrap-extend.css">
	<link rel="stylesheet" href="assets/css/site.css">

	<link rel="stylesheet" href="assets/css/bootstrap-datepicker.css">


	<!-- Plugins -->
	<link rel="stylesheet" href="vendor/animsition/animsition.css">
	<link rel="stylesheet" href="vendor/asscrollable/asScrollable.css">
	<link rel="stylesheet" href="vendor/switchery/switchery.css">
	<link rel="stylesheet" href="vendor/intro-js/introjs.css">
	<link rel="stylesheet" href="vendor/slidepanel/slidePanel.css">
	<link rel="stylesheet" href="vendor/flag-icon-css/flag-icon.css">
	<link rel="stylesheet" href="assets/css/v2.css">
	<!-- Upload -->
	<link href="vendor/upload/css/jquery.fileuploader.css" media="all" rel="stylesheet">
	<link rel="stylesheet" href="vendor/dropify/dropify.css">

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
	if(!empty($_POST))
	{	
		if(product_add())
		{
			echo '<script>
			     alert("เพิ่มข้อมูลสำเร็จ");
			     window.location.href = "product.php"
			      </script>';
			exit;
		}
	}
	?>

	<!-- Page -->
	<div class="page">
		<div class="page-content container-fluid">
			<div class="row" data-plugin="matchHeight" data-by-row="true">
				<div class="col-xxl-12 col-lg-12">		
					<!-- Panel Static Labels -->
		          	<div class="panel">
			            <div class="panel-heading">
			              <h3 class="panel-title">Product Add</h3>
			            </div>
			            <div class="panel-body container-fluid">
			              	<form id="productAdd" name="productAdd" class="form-horizontal" method="post" enctype="multipart/form-data">
				                <div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name</label>
				                  	<input type="text" class="form-control" id="name" name="name" placeholder="Product" required>
				                </div>
				                <div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="short_desc">Short Description</label>
				                  	<input type="text" class="form-control" id="short_desc" name="short_desc" placeholder="short description">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description" name="description"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="categories">Categories</label>
									<?php $categories_list = categories_list(); ?>
									<select class="form-control" name="categories">
									<?php foreach ($categories_list as $categories_detail) : ?>
										<option value="<?php echo $categories_detail->categories_id; ?>"><?php echo $categories_detail->categories_name; ?></option>
									<?php endforeach ?>
									</select>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="sub_cate">Sub Categories</label>
				                  	<input type="text" class="form-control" id="sub_cate" name="sub_cate" placeholder="Sub Categories">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF</label>
				                  	<input type="text" class="form-control" id="link_pdf" name="link_pdf" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg" name="covImg" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>
								
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 2</label>
				                  	<input type="text" class="form-control" id="name2" name="name2" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 2</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description2" name="description2"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 2</label>
				                  	<input type="text" class="form-control" id="link_pdf2" name="link_pdf2" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg2" name="covImg2" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 3</label>
				                  	<input type="text" class="form-control" id="name3" name="name3" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 3</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description3" name="description3"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 3</label>
				                  	<input type="text" class="form-control" id="link_pdf3" name="link_pdf3" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg3" name="covImg3" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 4</label>
				                  	<input type="text" class="form-control" id="name4" name="name4" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 4</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description4" name="description4"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 4</label>
				                  	<input type="text" class="form-control" id="link_pdf4" name="link_pdf4" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg4" name="covImg4" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 5</label>
				                  	<input type="text" class="form-control" id="name5" name="name5" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 5</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description5" name="description5"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 5</label>
				                  	<input type="text" class="form-control" id="link_pdf5" name="link_pdf5" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg5" name="covImg5" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 6</label>
				                  	<input type="text" class="form-control" id="name6" name="name6" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 2</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description6" name="description6"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 6</label>
				                  	<input type="text" class="form-control" id="link_pdf6" name="link_pdf6" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg6" name="covImg6" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 7</label>
				                  	<input type="text" class="form-control" id="name7" name="name7" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 7</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description7" name="description7"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 7</label>
				                  	<input type="text" class="form-control" id="link_pdf7" name="link_pdf7" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg7" name="covImg7" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 8</label>
				                  	<input type="text" class="form-control" id="name8" name="name8" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 8</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description8" name="description8"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 8</label>
				                  	<input type="text" class="form-control" id="link_pdf8" name="link_pdf8" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg8" name="covImg8" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 9</label>
				                  	<input type="text" class="form-control" id="name9" name="name9" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 9</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description9" name="description9"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 9</label>
				                  	<input type="text" class="form-control" id="link_pdf9" name="link_pdf9" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg9" name="covImg9" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="title">Name 10</label>
				                  	<input type="text" class="form-control" id="name10" name="name10" placeholder="Product">
				                </div>
								<div class="form-group form-material" data-plugin="formMaterial">
									<label class="form-control-label" for="detail">Description 10</label>
									<textarea class="form-control summernote" rows="4" placeholder="Detail" id="description10" name="description10"></textarea>
								</div>
								<div class="form-group form-material" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="link_pdf">Link PDF 10</label>
				                  	<input type="text" class="form-control" id="link_pdf10" name="link_pdf10" placeholder="Link PDF">
				                </div>
								<div class="form-group form-material form-material-file" data-plugin="formMaterial">
				                  	<label class="form-control-label" for="image">Images Cover</label>
			                      	<input type="file" id="covImg10" name="covImg10" data-plugin="dropify" data-default-file="" data-allowed-file-extensions="png jpg"/>
									<p class="help-block"><i>Image size: 1400x600px</i></p>
				                </div>

				                <div class="text-right">
						            <button type="submit" class="btn btn-animate btn-animate-side btn-success">
						              	<span><i class="icon wb-check" aria-hidden="true"></i> Save</span>
						            </button>
						            <button type="button" class="btn btn-animate btn-animate-side btn-default btn-outline" onclick="window.location.href = 'product.php';">
						              	<span><i class="icon wb-close" aria-hidden="true"></i> Close</span>
						            </button>
          						</div>
			              	</form>
			            </div>
		          	</div>
		          	<!-- End Panel Static Labels -->			
				</div>
			</div>
		</div>
	</div>
	<!-- End Page -->
	
	<?php include 'footer.php'; ?>
	
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
	<script type="text/javascript" src="vendor/summernote/summernote-bs4.js"></script>
	<script src="vendor/switchery/switchery.js"></script>
	<script src="vendor/intro-js/intro.js"></script>
	<script src="vendor/screenfull/screenfull.js"></script>
	<script src="vendor/slidepanel/jquery-slidePanel.js"></script>
	<script src="vendor/skycons/skycons.js"></script>
	<script src="vendor/aspieprogress/jquery-asPieProgress.min.js"></script>
	<script src="vendor/matchheight/jquery.matchHeight-min.js"></script>

	<!-- Custom Theme Scripts -->
	<script src="js/custom.js"></script>
	<script type="text/javascript" src="plugin/moment-2.10.2/moment.min.js"></script>
	<script type="text/javascript" src="plugin/bootstrap-datetimepicker-4.17.37/bootstrap-datetimepicker.min.js"></script>

	<script type="text/javascript">var uploadUrl = 'upload.php';</script>
	<script type="text/javascript">
	$(document).ready(function() {
  		$('#description').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	$(document).ready(function() {
  		$('#description2').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	$(document).ready(function() {
  		$('#description3').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	$(document).ready(function() {
  		$('#description4').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	$(document).ready(function() {
  		$('#description5').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	$(document).ready(function() {
  		$('#description6').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	$(document).ready(function() {
  		$('#description7').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	$(document).ready(function() {
  		$('#description8').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	$(document).ready(function() {
  		$('#description9').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});
	
	$(document).ready(function() {
  		$('#description10').summernote({ 
  			height				: 150
			,callbacks: {
		        onImageUpload: function(files) {
		            url = $(this).data('upload'); //path is defined as data attribute for  textarea
		            sendFile(files[0], url, $(this));
		        }
		        ,onMediaDelete : function($target, editor, $editable) {
	          		deleteFile($target[0].src); // img 

	         		// remove element in editor 
	         		$target.remove();
	    		}
		    }
		    
  		});
	});

	function sendFile(file, url, $editor)
	{
		data = new FormData();
		data.append("file", file);

		$.ajax({
			data		: data
			,type		: 'post'
			,dataType	: 'json'
			,xhr		: function(){
				var myXhr = $.ajaxSettings.xhr();
				
				if(myXhr.upload)
					myXhr.upload.addEventListener('progress', progressHandlingFunction, false);
				
				return myXhr;
			}
			,url		: uploadUrl + '?action=upload_image&path=product'
			,cache		: false
			,contentType: false
			,processData: false
			,success	: function(dataPresponse){
				
				if(dataPresponse.success == '1')
				{
					$editor.summernote('insertImage', dataPresponse.image_url);
				}
				else
				{
					alert(dataPresponse.message);
				}
			}
		});
	}

	function progressHandlingFunction(e)
	{
		if(e.lengthComputable)
		{
			$('progress').attr({value:e.loaded, max:e.total});
			
			// reset progress on complete
			if (e.loaded == e.total) {
				$('progress').attr('value','0.0');
			}
		}
	}

	function deleteFile(fileUrl)
	{
		data = new FormData();
		data.append("file_url", fileUrl);

		$.ajax({
			data		: data
			,type		: 'post'
			,url		: uploadUrl + '?action=delete_image&path=product'
			,cache		: false
			,contentType: false
			,processData: false
			,success	: function(url){
				console.log(url);
			}
		});
	}
	</script>

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
	<!-- Upload -->
	<script src="vendor/upload/js/jquery.fileuploader.js" type="text/javascript"></script>
	<script src="vendor/upload/js/custom.js" type="text/javascript"></script>
	<script src="vendor/dropify/dropify.min.js"></script>

	<script type="text/javascript" src="assets/js/bootstrap-datepicker.js"></script>
</body>
</html>
