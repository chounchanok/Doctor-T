<?php 
require_once 'init.php';
require_once 'auth.php';
?>
<nav class="site-navbar navbar navbar-default navbar-fixed-top navbar-mega" role="navigation">

	<div class="navbar-header">
		<button type="button" class="navbar-toggler hamburger hamburger-close navbar-toggler-left hided"
			data-toggle="menubar">
			<span class="sr-only">Toggle navigation</span>
			<span class="hamburger-bar"></span>
		</button>
		<button type="button" class="navbar-toggler collapsed" data-target="#site-navbar-collapse"
			data-toggle="collapse">
			<i class="icon wb-more-horizontal" aria-hidden="true"></i>
		</button>
		<div class="navbar-brand navbar-brand-center site-gridmenu-toggle" data-toggle="gridmenu">
			<span class="navbar-brand-text hidden-xs-down"> DOCTOR T </span>
		</div>
	</div>

	<div class="navbar-container container-fluid">
		<!-- Navbar Collapse -->
		<div class="collapse navbar-collapse navbar-collapse-toolbar" id="site-navbar-collapse">
			<!-- Navbar Toolbar -->
			<ul class="nav navbar-toolbar">
				<li class="nav-item hidden-float" id="toggleMenubar">
					<a class="nav-link" data-toggle="menubar" href="#" role="button">
						<i class="icon hamburger hamburger-arrow-left">
							<span class="sr-only">Toggle menubar</span>
							<span class="hamburger-bar"></span>
						</i>
					</a>
				</li>
				<li class="nav-item hidden-sm-down" id="toggleFullscreen">
					<a class="nav-link icon icon-fullscreen" data-toggle="fullscreen" href="#" role="button">
						<span class="sr-only">Toggle fullscreen</span>
					</a>
				</li>
			</ul>
			<!-- End Navbar Toolbar -->

			<!-- Navbar Toolbar Right -->
			<ul class="nav navbar-toolbar navbar-right navbar-toolbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link navbar-avatar" data-toggle="dropdown" href="#" aria-expanded="false"
						data-animation="scale-up" role="button">
						<span class="avatar avatar-online">
							<img src="assets/images/user.jpg" alt="...">
							<i></i>
						</span>
					</a>
					<div class="dropdown-menu" role="menu">
						<a class="dropdown-item" href="logout.php" role="menuitem"><i class="icon wb-power"
								aria-hidden="true"></i> Logout</a>
					</div>
				</li>
			</ul>
			<!-- End Navbar Toolbar Right -->
		</div>
		<!-- End Navbar Collapse -->
	</div>
</nav>



<div class="site-menubar">
	<div class="site-menubar-body">
		<div>
			<div>
				<ul class="site-menu" data-plugin="menu">
					

					<li
						class="site-menu-item has-sub <?php echo ( in_array($current_file, array('banner.php', 'banner_add.php', 'banner_edit.php','reviews.php', 'reviews_add.php', 'reviews_edit.php') ) ) ? 'active open' : ''; ?>">
						<a href="javascript:void(0)">
							<i class="site-menu-icon icon fa-home" aria-hidden="true"></i>
							<span class="site-menu-title">Home Page</span>
							<span class="site-menu-arrow"></span>
						</a>
						<ul class="site-menu-sub">

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('banner.php', 'banner_add.php', 'banner_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="banner.php">
									<i class="site-menu-icon icon fa fa-picture-o" aria-hidden="true"></i>
									<span class="site-menu-title">Slide Home</span>
								</a>
							</li>

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('reviews.php', 'reviews_add.php', 'reviews_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="reviews.php">
									<i class="site-menu-icon icon fa-video-camera" aria-hidden="true"></i>
									<span class="site-menu-title">Video Home Page</span>
								</a>
							</li>


						</ul>
					</li>


<<<<<<< HEAD

					<li
						class="site-menu-item <?php echo ( in_array($current_file, array('news_detail.php', 'newsdetail_add.php', 'news_detail_edit.php') ) ) ? 'active' : ''; ?>">
						<a class="animsition-link" href="news_detail.php">
							<i class="site-menu-icon icon fa fa-newspaper-o" aria-hidden="true"></i>
							<span class="site-menu-title">Update News</span>
						</a>
					</li>



					<li
						class="site-menu-item <?php echo ( in_array($current_file, array('review_detail.php', 'review_detail_add.php', 'review_detail_edit.php') ) ) ? 'active' : ''; ?>">
						<a class="animsition-link" href="review_detail.php">
							<i class="site-menu-icon icon fa fa-pencil-square-o" aria-hidden="true"></i>
							<span class="site-menu-title">Review Detail</span>
						</a>
					</li>


					<li
						class="site-menu-item has-sub <?php echo ( in_array($current_file, array('categories.php', 'categories_add.php', 'categories_edit.php','banner_before_after.php', 'banner_before_after_add.php', 'banner_before_after_edit.php','before_after.php', 'before_after_add.php', 'before_after_edit.php') ) ) ? 'active open' : ''; ?>">
						<a href="javascript:void(0)">
							<i class="site-menu-icon icon fa-user-md" aria-hidden="true"></i>
							<span class="site-menu-title">Before After Page</span>
=======
					<!-- khim -->
					<!-- <li
						class="site-menu-item has-sub <?php echo ( in_array($current_file, array('banner.php', 'banner_add.php', 'banner_edit.php','reviews.php', 'reviews_add.php', 'reviews_edit.php') ) ) ? 'active' : ''; ?>">
						<a href="javascript:void(0)">
							<i class="site-menu-icon icon fa-home" aria-hidden="true"></i>
							<span class="site-menu-title">Home Page</span>
							<span class="site-menu-arrow"></span>
						</a>
						<ul class="site-menu-sub">

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('banner.php', 'banner_add.php', 'banner_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="banner.php">
									<i class="site-menu-icon icon fa fa-picture-o" aria-hidden="true"></i>
									<span class="site-menu-title">Slide Banner Home</span>
								</a>
							</li>

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('reviews.php', 'reviews_add.php', 'reviews_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="reviews.php">
									<i class="site-menu-icon icon fa fa-picture-o" aria-hidden="true"></i>
									<span class="site-menu-title">Video Slide Home</span>
								</a>
							</li>

						</ul>
					</li> -->
					<!-- khim -->



					<!-- khim Home page -->
					<li
						class="site-menu-item has-sub <?php echo ( in_array($current_file, array('banner_before_after.php', 'banner_before_after_add.php', 'banner_before_after_edit.php','before_after.php', 'before_after_add.php', 'before_after_edit.php','categories.php', 'categories_add.php', 'categories_edit.php') ) ) ? 'active open' : ''; ?>">
						<a href="javascript:void(0)">
							<i class="site-menu-icon icon fa-home" aria-hidden="true"></i>
							<span class="site-menu-title">Home Page</span>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
							<span class="site-menu-arrow"></span>
						</a>
						<ul class="site-menu-sub">

							<li
<<<<<<< HEAD
								class="site-menu-item <?php echo ( in_array($current_file, array('categories.php', 'categories_add.php', 'categories_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="categories.php">
									<i class="site-menu-icon icon fa-sitemap" aria-hidden="true"></i>
									<span class="site-menu-title">Categories</span>
								</a>
							</li>
							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('banner_before_after.php', 'banner_before_after_add.php', 'banner_before_after_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="banner_before_after.php">
									<i class="site-menu-icon icon fa fa-picture-o" aria-hidden="true"></i>
									<span class="site-menu-title">Banner Page Before After</span>
								</a>
							</li>
							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('before_after.php', 'before_after_add.php', 'before_after_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="before_after.php">
									<i class="site-menu-icon icon fa fa-pie-chart" aria-hidden="true"></i>
									<span class="site-menu-title">Before After</span>
								</a>
							</li>

						</ul>
					</li>





					<li
						class="site-menu-item <?php echo ( in_array($current_file, array('promotion.php', 'promotion_add.php', 'promotion_edit.php') ) ) ? 'active' : ''; ?>">
						<a class="animsition-link" href="promotion.php">
							<i class="site-menu-icon icon fa-bullhorn" aria-hidden="true"></i>
							<span class="site-menu-title">Promotion</span>
=======
								class="site-menu-item  <?php echo ( in_array($current_file, array('banner.php', 'banner_add.php', 'banner_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="banner.php">
									<i class="site-menu-icon icon fa fa-picture-o" aria-hidden="true"></i>
									<span class="site-menu-title">Slide Banner Home</span>
								</a>
							</li>

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('reviews.php', 'reviews_add.php', 'reviews_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="reviews.php">
									<i class="site-menu-icon icon fa fa-picture-o" aria-hidden="true"></i>
									<span class="site-menu-title">Video Slide Home</span>
								</a>
							</li>
							
							
						</ul>
					</li>
					<!-- khim Home Page-->



					<!-- khim -->
					<li
						class="site-menu-item has-sub <?php echo ( in_array($current_file, array('banner_before_after.php', 'banner_before_after_add.php', 'banner_before_after_edit.php','before_after.php', 'before_after_add.php', 'before_after_edit.php','categories.php', 'categories_add.php', 'categories_edit.php') ) ) ? 'active open' : ''; ?>">
						<a href="javascript:void(0)">
							<i class="site-menu-icon icon fa fa-pie-chart" aria-hidden="true"></i>
							<span class="site-menu-title">before After</span>
							<span class="site-menu-arrow"></span>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
						</a>
						<ul class="site-menu-sub">

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('banner_before_after.php', 'banner_before_after_add.php', 'banner_before_after_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="banner_before_after.php">
									<i class="site-menu-icon icon fa fa-picture-o" aria-hidden="true"></i>
									<span class="site-menu-title">Banner Before After</span>
								</a>
							</li>

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('before_after.php', 'before_after_add.php', 'before_after_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="before_after.php">
									<i class="site-menu-icon icon fa fa-pie-chart" aria-hidden="true"></i>
									<span class="site-menu-title">Before After</span>
								</a>
							</li>
							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('categories.php', 'categories_add.php', 'categories_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="categories.php">
									<i class="site-menu-icon icon fa-sitemap" aria-hidden="true"></i>
									<span class="site-menu-title">Categories</span>
								</a>
							</li>
						</ul>
					</li>
<<<<<<< HEAD



					<li
						class="site-menu-item <?php echo ( in_array($current_file, array('celeb.php', 'celeb_add.php', 'celeb_edit.php') ) ) ? 'active' : ''; ?>">
						<a class="animsition-link" href="celeb.php">
							<i class="site-menu-icon icon fa fa-group" aria-hidden="true"></i>
							<span class="site-menu-title">Celebrities</span>
=======
					<!-- khim -->


					<!-- khim -->
					<li class="site-menu-item has-sub <?php echo ( in_array($current_file, array('review_detail.php', 'review_detail_add.php', 'review_detail_edit.php') ) ) ? 'active' : ''; ?>">
						<a href="javascript:void(0)">
							<i class="site-menu-icon icon fa fa-pencil-square-o" aria-hidden="true"></i>
							<span class="site-menu-title">Review Success Story</span>
							<span class="site-menu-arrow"></span>
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0
						</a>
						<ul class="site-menu-sub">

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('review_detail.php', 'review_detail_add.php', 'review_detail_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="review_detail.php">
									<i class="site-menu-icon icon fa fa-pencil-square-o" aria-hidden="true"></i>
									<span class="site-menu-title">Review Detail</span>
								</a>
							</li>
						</ul>
					</li>
<<<<<<< HEAD

					<li
						class="site-menu-item <?php echo ( in_array($current_file, array('price.php','price_edit.php') ) ) ? 'active' : ''; ?>">
						<a class="animsition-link" href="price.php">
							<i class="site-menu-icon icon fa fa-money" aria-hidden="true"></i>
							<span class="site-menu-title">Price</span>
						</a>
					</li>
=======
					<!-- khim -->

					<!-- khim -->
					<li class="site-menu-item has-sub <?php echo ( in_array($current_file, array('news_detail.php', 'service_add.php', 'service_edit.php') ) ) ? 'active' : ''; ?>">
						<a href="javascript:void(0)">
							<i class="site-menu-icon icon fa fa-pencil-square-o" aria-hidden="true"></i>
							<span class="site-menu-title">News</span>
							<span class="site-menu-arrow"></span>
						</a>
						<ul class="site-menu-sub">

							<li
								class="site-menu-item <?php echo ( in_array($current_file, array('news_detail.php', 'service_add.php', 'service_edit.php') ) ) ? 'active' : ''; ?>">
								<a class="animsition-link" href="news_detail.php">
									<i class="site-menu-icon icon fa fa-newspaper-o" aria-hidden="true"></i>
									<span class="site-menu-title">Update News</span>
								</a>
							</li>
						</ul>
					</li>
					<!-- khim -->
>>>>>>> 861605f35ecee4ac9580d22d220a1a966c2160e0

				</ul>
			</div>
		</div>
	</div>
	<div class="site-menubar-footer">
		<a href="javascript: void(0);" class="fold-show" data-placement="top" data-toggle="tooltip"
			data-original-title="Settings">
			<span class="icon wb-settings" aria-hidden="true"></span>
		</a>
		<a href="javascript: void(0);" data-placement="top" data-toggle="tooltip" data-original-title="Lock">
			<span class="icon wb-eye-close" aria-hidden="true"></span>
		</a>
		<a href="logout.php" data-placement="top" data-toggle="tooltip" data-original-title="Logout">
			<span class="icon wb-power" aria-hidden="true"></span>
		</a>
	</div>
</div>