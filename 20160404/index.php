<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Awaken
 */

get_header(); ?>
<div id="container">
	<div id="content" role="main">
	<h1>Hot News</h1>
	<div class="bxslider" >
		<?php
			$args = array( 'numberposts' => '2' );
			$recent_posts = wp_get_recent_posts( $args );
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				<!-- create our link now that the post is setup -->
				<?php 
				    //if(in_category('banner'))continue;
					echo '<li>';
					get_template_part( 'content', get_post_format() ); 
					//get_the_category();
					echo '</li>'
				?>
			<?php endwhile; 
			endif; // done our wordpress loop. Will start again for each category ?>
		?>
	</div>


	<?php
	// get all the categories from the database
	$cats = get_categories(); 
		// loop through the categries
		foreach ($cats as $cat) {
			
			// setup the cateogory ID
			if($cat->name == 'banner')continue;
			$cat_id= $cat->term_id;
			// Make a header for the cateogry
			echo '<h1><a href="'.get_category_link($cat_id).'">'.$cat->name."</a></h1>";
			echo '<div class="bxslider">';
			// create a custom wordpress query
			query_posts("cat=$cat_id&posts_per_page=100");
			// start the wordpress loop!
			if (have_posts()) : while (have_posts()) : the_post(); ?>
				<!-- create our link now that the post is setup -->
				<?php
					
					echo '<li>';
					get_template_part( 'content', get_post_format() ); 
					//get_the_category();
					echo '</li>'
				?>
			<?php endwhile; 
			endif; // done our wordpress loop. Will start again for each category ?>
		<?php 
			echo '</div>';
		} // done the foreach statement ?>

	</div><!-- #content -->
</div><!-- #container -->
</div><!-- .row -->
<?php get_footer(); ?>
