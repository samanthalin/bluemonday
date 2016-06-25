<?php
/**
 * The template for displaying all single posts.
 *
 * @package Awaken
 */

get_header(); ?>
<div class="row">
	<?php is_rtl() ? $rtl = 'awaken-rtl' : $rtl = ''; ?>
	<div class="col-xs-12 col-sm-12 col-md-8 <?php echo $rtl ?>">
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- post-bottom -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-4743554927662713"
		     data-ad-slot="7234690181"
		     data-ad-format="auto"></ins>
		<script>
		(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'single' ); ?>

			<?php endwhile; // end of the loop. ?>
			</main><!-- #main -->
			<div class="g-ytsubscribe" data-channelid="UCEYXEMHP5_oRqPuX8X8b5KA" data-layout="default" data-count="default" data-onytevent="onYtEvent"></div>		
			<div
			  class="fb-like"
			  data-share="true"
			  data-width="450"
			  data-show-faces="true">
			</div>
		</div><!-- #primary -->
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- post-bottom -->
		<ins class="adsbygoogle"
		     style="display:block"
		     data-ad-client="ca-pub-4743554927662713"
		     data-ad-slot="7234690181"
		     data-ad-format="auto"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/zh_TW/all.js#xfbml=1";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));

		document.write('<div class="fb-comments" data-href="'+document.location+'" data-num-posts="5" data-width="100%"></div>');
		</script>
		
		<div class="more-video"><h3>更多推薦影片</h3></div>
		<div class="row">
			<?php
				$cats = get_categories(); 
				foreach ($cats as $cat) {
					if($cat->name == 'banner')continue;
					$cat_id = $cat->term_id;
					query_posts("cat=$cat_id&posts_per_page=1");
					echo '<div class="col-md-4 " style=" height:180px;">';
					if (have_posts()) { 
						while (have_posts()){
							the_post();
							echo '<a href="'.get_permalink().'">'.'<img  src="'.wp_get_attachment_url(get_post_thumbnail_id()).'" alt="Post Pic" width="200" height="150" /><div>'.get_the_title().'</div></a>';
						}
					}
					echo '</div>';
				}
				wp_reset_query(); //very important
			?>
		</div>

	</div><!-- .bootstrap cols -->
	<div id="same-category-video" class="col-xs-12 col-sm-6 col-md-4">
		<div id="same-video-contain">
			<?php
				//global $post;
				$cat_ID = array();
				$banner_id = get_category('banner');
				$categories = get_the_category(); //get all categories for this post
				foreach($categories as $category) {
					if($category->name !=='banner') {
						array_push($cat_ID,$category->cat_ID);
					}
				}
				$args = array(
					'orderby' => 'date',
					'order' => 'DESC',
					'post_type' => 'post',
					'numberposts' => 8,
					'post__not_in' => array($post->ID),
					'category__in' => $cat_ID
				); // post__not_in will exclude the post we are displaying
			    $cat_posts = get_posts($args);
			    $out='';
			    foreach($cat_posts as $cat_post) {
			    	//if(in_category('banner',$cat_post))continue;
			        $out .=  '<a href="'.get_permalink($cat_post->ID).'">'.'<img style="height: 150px" src="'.wp_get_attachment_url( get_post_thumbnail_id($cat_post->ID) ).'" alt="Post Pic" width="200" height="200" />'.'<div>'.wptexturize($cat_post->post_title).'</div>'.'</a>';
			    }
			    //$out = '<ul class="cat_post">' . $out . '</ul>';
			    echo $out;
			?>
		</div>
		
		<div id="same-video-text">同系列影片</div>

	</div>

</div><!-- .row -->
<div class='cover' style="display: none;">
	<div class='pop-up' style="display: none;" >
		<i class="fa fa-times-circle pop-up-close" style='font-size:35px; float:right;'></i>
		<script type="text/javascript">
		    google_ad_client = "ca-pub-4743554927662713";
		    google_ad_slot = "1486620585";
		    google_ad_width = 400;
		    google_ad_height = 300;
		</script>
		<!-- popup20160202-2 -->
		<script type="text/javascript"
		src="//pagead2.googlesyndication.com/pagead/show_ads.js">
		</script>
	</div>
</div>

<?php get_footer(); ?>