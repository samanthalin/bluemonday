<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Awaken
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="fb:admins" content="574440258"/>
<meta property="fb:app_id" content="1512538749051246"/>
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<script src="<?php bloginfo('template_directory')?>/js/jquery-1.11.3.min.js"></script>
<script src="<?php bloginfo('template_directory')?>/js/jquery.bxslider.min.js"></script><!--for crousel-->
<link href="<?php bloginfo('template_directory')?>/css/jquery.bxslider.css" rel="stylesheet" />
<script src="https://apis.google.com/js/platform.js"></script>

<script>
  function onYtEvent(payload) {
    if (payload.eventType == 'subscribe') {
      // Add code to handle subscribe event.
    } else if (payload.eventType == 'unsubscribe') {
      // Add code to handle unsubscribe event.
    }
    if (window.console) { // for debugging only
      window.console.log('YT event: ', payload);
    }
  }
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1512538749051246',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'awaken' ); ?></a>
	<header id="masthead" class="site-header" role="banner" style="background-image: url(<?php echo get_template_directory_uri() . '/images/banner.jpg' ?>);">
		<div class="top-nav">
			<div class="container">
				<div class="row">
					<?php is_rtl() ? $rtl = 'awaken-rtl' : $rtl = ''; ?>
					<div class=" ">
						<nav id="top-navigation" class="top-navigation" role="navigation">
							<?php wp_nav_menu( array( 'theme_location' => 'top_navigation' ) ); ?>
						</nav><!-- #site-navigation -->	
						<a href="#" class="navbutton" id="top-nav-button"><?php _e( 'Blue Monday', 'awaken' ); ?></a>
						<div class="responsive-topnav"></div>			
					</div><!-- col-xs-12 col-sm-6 col-md-8 -->
					<div class="col-xs-12 col-sm-6 col-md-4">
						<?php awaken_socialmedia(); ?>
					</div><!-- col-xs-12 col-sm-6 col-md-4 -->
				</div><!-- row -->
				<div class="awaken-search-button-icon fa-2x"></div>
			</div>
		</div>

	<div class="site-branding">
		<div class="container">
			<div class="site-brand-container" >
				
				<?php  
					global $awaken_options;
					$logo = $awaken_options['logo-uploader']['url'];
					$title_option = $awaken_options['site-title-option'];

					if ( $title_option == 'logo-only' && isset($logo) ) { ?>
						<div class="site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logo ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-img"></a>
						</div>
					<?php } 

					if ( $title_option == 'text-logo' && isset($logo) ) { ?>
						<div class="site-logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logo ?>" alt="<?php bloginfo( 'name' ); ?>" class="logo-img"></a>
						</div>
						<div class="site-title-text">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
					<?php } 

					if ( !isset($title_option) || $title_option == 'text-only' ) { ?>
						<div class="site-title-text">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
						</div>
				<?php } ?>
			</div><!-- .site-brand-container -->
		</div>
	</div>

	<div class="container" id="fixed-top-bar">
		<div class="awaken-navigation-container">
			<nav id="site-navigation" class="main-navigation cl-effect-10" role="navigation">
				<a class="nav-title" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'main_navigation' ) ); ?>
			</nav><!-- #site-navigation -->
			<a href="#" class="navbutton" id="main-nav-button"><?php _e( 'Blue Monday', 'awaken' ); ?></a>
			<div class="responsive-mainnav"></div>
			<div class="awaken-search-button-icon fa-2x"></div>
			<div class="awaken-search-box-container">
				<div class="awaken-search-box">
					<form action="<?php echo esc_url( home_url( '/' ) ); ?>" id="awaken-search-form" method="get">
						<input type="text" value="" name="s" id="s" />
						<input type="submit" value="<?php _e( 'Search', 'awaken' ); ?>" />
					</form>
				</div><!-- th-search-box -->
			</div><!-- .th-search-box-container -->
		</div><!-- .awaken-navigation-container-->
	</div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container">
		<?php  if ( is_front_page() ):?>
			<div class="row" id="banner">
				<?php 
					$counter = 0;
					$category = new WP_Query(array('category_name' =>'banner'));
					while($category->have_posts()): $category->the_post();
						if($counter==4){
							break;
						}
						if($counter==0){
							echo '<div class="col-md-9" id="banner-left">';
							echo '<a href="';
							echo the_permalink();
							echo '">';
							echo '<p>';
							echo the_title();
							echo '</p>';
							the_post_thumbnail();
							echo '</a>';
							echo '</div>';
							echo '<div class="col-md-3" id="banner-right">';
						}
						else{ 
							echo '<div class="right-items">';
							echo '<a href="';
							echo the_permalink();
							echo '">';
							echo '<p>';
							echo the_title();
							echo '</p>';
							the_post_thumbnail();
							echo '</a>';
							echo '</div>';
						}
						
						$counter++;
				endwhile;
				wp_reset_postdata();
				echo '</div>';?>
			</div>
		<?php endif; ?>