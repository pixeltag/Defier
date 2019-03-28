<?php
/*************************************/
/********* Tabbed Widget  ************/
/*************************************/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
add_action('widgets_init', 'defier_tabs');

function defier_tabs()  {
	register_widget('Recent_tabs_widget');
    }
class Recent_tabs_widget extends WP_Widget {
	function __construct() {
		$widget_ops = array('classname' => 'recent_tabs', 'description' => 'Custom recent tabs.');
		$control_ops = array('id_base' => 'recent-posts-widget');
		parent::__construct('recent-posts-widget', 'Defier Widget - Tabs', $widget_ops, $control_ops);
	}
	function widget($args, $instance)
	{
		extract($args);
		$title = apply_filters('widget_title', "");
		
		$number = $instance['number'];
		$latest = $instance['latest'];
		$popular = $instance['popular'];
		$random = $instance['random'];
		$tags = $instance['tags'];
		$tags_count = $instance['tags_count'];

		$title_length = 70;
		
		echo $before_widget;

		if($title) {
			echo $before_title . $title . $after_title;
		}
		
		?>
		<ul class="defier-tabs-nav">
			<?php if($latest == "latest") : ?>
				<li class="col-md-3 col-sm-3 col-lg-3 col-xs-3"><a href="javascript:;" data-tab-href="recent"><?php echo __( 'Latest', 'defier-magazine-blog' ); ?></a></li>
			<?php endif ?>
			<?php if($popular == "popular") : ?>
				<li class="col-md-3 col-sm-3 col-lg-3 col-xs-3"><a href="javascript:;" data-tab-href="popular"><?php echo __( 'Popular', 'defier-magazine-blog' ); ?></a></li>
			<?php endif ?>
			<?php if($random == "random") : ?>
				<li class="col-md-3 col-sm-3 col-lg-3 col-xs-3"><a href="javascript:;" data-tab-href="random"><?php echo __( 'Random', 'defier-magazine-blog' ); ?></a></li>
			<?php endif ?>
			<?php if($tags == "tags") : ?>
				<li class="col-md-3 col-sm-3 col-lg-3 col-xs-3"><a href="javascript:;" data-tab-href="tags"><?php echo __( 'Tags', 'defier-magazine-blog' ); ?></a></li>
			<?php endif ?>
		</ul>

		<?php if($latest == "latest") : ?>
			<ul  class="recent-tab tab show_tab"> 
			
			<?php 
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => $number,
					'order' => 'DESC',
					'tax_query' => array(
					    array(
					      'taxonomy' => 'post_format',
					      'field' => 'slug',
					      'terms' => 'post-format-quote',
					      'operator' => 'NOT IN'
					    ),
					    array(
					      'taxonomy' => 'post_format',
					      'field' => 'slug',
					      'terms' => 'post-format-link',
					      'operator' => 'NOT IN'
					    )
					  )
				);

				$wp_query = new WP_Query($args);
				while ($wp_query->have_posts()) : $wp_query->the_post(); 
			?>


			<?php

				if (strlen(the_title('','',FALSE)) > $title_length) {
					$title_short = substr(the_title('','',FALSE), 0, $title_length);
					preg_match('/^(.*)\s/s', $title_short, $matches);
				if ($matches[1]) $title_short = $matches[1];
					$title_short = $title_short.'...';
				}
				else
				{
					$title_short = the_title('','',FALSE);
				}
			?>


				<li class="defier-posts-list firstBigItem">
					<div class="grid">
						<figure class="def-list-post">
							<figcaption>
<?php require get_template_directory() . '/inc/post-formats/parts/post-format-icon.php';  ?>
						
								<h5><i class="fa <?php echo $post_format_icon; ?>"></i><a title="<?php echo get_the_title(); ?>" href="<?php the_permalink() ?>"><?php echo $title_short ?></a></h5>
									<p>
                                    <div class="meta-label">
								                      <div class="time"><?php defier_get_time() ?></div>
                                                        <div class="view-counter"><?php  echo defier_PostViews( '', get_the_ID() ); ?></div>

                                    </div>
                                    </p>
							</figcaption>
							<?php
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'widget-thumb' );
							$url = $thumb['0']; 
							?>
							<img title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>" class="wp-post-image" src="<?php echo esc_url($url); ?>">
						</figure>								
						</div>
					</li>		
			<?php endwhile; ?>
			</ul>
		<?php endif ?>

		<?php if($popular == "popular") : ?>
			<ul class="popular-tab tab">
				<?php 

				$pop_args = array(
					'posts_per_page' => $number, 
					'meta_key' => 'wpb_post_views_count', 
					'orderby' => 'meta_value_num',
					'order' => 'DESC',
					'tax_query' => array(
					    array(
					      'taxonomy' => 'post_format',
					      'field' => 'slug',
					      'terms' => 'post-format-quote',
					      'operator' => 'NOT IN'
					    ),
					    array(
					      'taxonomy' => 'post_format',
					      'field' => 'slug',
					      'terms' => 'post-format-link',
					      'operator' => 'NOT IN'
					    )
					  )
				);

				$popular_post = new WP_Query( $pop_args );

					while ( $popular_post->have_posts() ) : $popular_post->the_post();
				?>

					<?php

						if (strlen(the_title('','',FALSE)) > $title_length) {
							$title_short = substr(the_title('','',FALSE), 0, $title_length);
							preg_match('/^(.*)\s/s', $title_short, $matches);
						if ($matches[1]) $title_short = $matches[1];
							$title_short = $title_short.'...';
						}
						else
						{
							$title_short = the_title('','',FALSE);
						}
					?>
				<li class="defier-posts-list firstBigItem">
					<div class="grid">
						<figure class="def-list-post">
							<figcaption>
					<?php require get_template_directory() . '/inc/post-formats/parts/post-format-icon.php';  ?>
								<h5><i class="fa <?php echo $post_format_icon; ?>"></i><a title="<?php echo get_the_title(); ?>" href="<?php the_permalink() ?>"><?php echo $title_short ?></a></h5>
									<p>
                                    <div class="meta-label">
								                     <div class="time"><?php defier_get_time() ?></div>
                                                    <div class="view-counter"><?php  echo defier_PostViews( '', get_the_ID() ); ?></div>
                                    </div>
                                    </p>
							</figcaption>
							<?php
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'widget-thumb' );
							$url = $thumb['0']; 
							?>
							<img title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>" class="wp-post-image" src="<?php echo esc_url($url); ?>">
						</figure>								
						</div>
					</li>					
				<?php
					endwhile;
				?>
			</ul>
		<?php endif ?>

		<?php if($random == "random") : ?>

			<ul class="random-tab tab">
				<?php 

				$random_args = array(
					'posts_per_page' => $number, 
					'orderby' => 'rand'   
				);

				$random_post = new WP_Query( $random_args );

					while ( $random_post->have_posts() ) : $random_post->the_post();
				?>

					<?php

						if (strlen(the_title('','',FALSE)) > $title_length) {
							$title_short = substr(the_title('','',FALSE), 0, $title_length);
							preg_match('/^(.*)\s/s', $title_short, $matches);
						if ($matches[1]) $title_short = $matches[1];
							$title_short = $title_short.'...';
						}
						else
						{
							$title_short = the_title('','',FALSE);
						}
					?>
			
					<li class="defier-posts-list firstBigItem">
					<div class="grid">
						<figure class="def-list-post">
							<figcaption>
					                  <?php require get_template_directory() . '/inc/post-formats/parts/post-format-icon.php';  ?>
								<h5><i class="fa <?php echo $post_format_icon; ?>"></i><a title="<?php echo get_the_title(); ?>" href="<?php the_permalink() ?>"><?php echo $title_short ?></a></h5>
                                    <div class="meta-label">
								                      <div class="time"><?php defier_get_time() ?></div>
                                                        <div class="view-counter"><?php  echo defier_PostViews( '', get_the_ID() ); ?></div>
                                    </div>
							</figcaption>
							<?php
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(get_the_ID()), 'widget-thumb' );
							$url = $thumb['0']; 
							?>
							<img title="<?php echo get_the_title(); ?>" alt="<?php echo get_the_title(); ?>" class="wp-post-image" src="<?php echo esc_url($url); ?>">
						</figure>								
						</div>
					</li>				
				<?php
					endwhile;
				?>
			</ul>
		<?php endif ?>

		<?php if($tags == "tags") : ?>
			<ul class="tags-tab tab">
			<div class="tagcloud">
				<?php 
					$tag_args = array(
						'smallest'=>10.5,
						'largest'=>16,
						'number'=>$tags_count,
						'orderby'=>'count'  
					);
					
					wp_tag_cloud($tag_args); 
				?>
				</div>
			</ul>
		<?php endif ?>

		<?php echo $after_widget;
	}
	
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['number'] = $new_instance['number'];
		$instance['latest'] = $new_instance['latest'];
		$instance['popular'] = $new_instance['popular'];
		$instance['random'] = $new_instance['random'];
		$instance['tags'] = $new_instance['tags'];
		$instance['tags_count'] = $new_instance['tags_count'];
		
		return $instance;
	}

	function form($instance)
	{
		$defaults = array('latest'=>'latest', 'popular'=>'popular', 'random'=>'random', 'tags'=>'tags', 'number' => 5, 'tags_count'=>20 );
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('number'); ?>">Number of items:</label>
			<input style="width:40px;" id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo esc_attr($instance['number']); ?>" />
		</p>
		<h4>
			Showing Tabs
		</h4>
		<p>
			<label for="<?php echo $this->get_field_id('latest'); ?>">Latest</label>
			<input 	type="checkbox" id="<?php echo $this->get_field_id('latest'); ?>" name="<?php echo $this->get_field_name('latest'); ?>" <?php if ($instance['latest'] == "latest" ) echo 'checked'; ?>	value="latest" >
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('popular'); ?>">Popular</label>
			<input 	type="checkbox" id="<?php echo $this->get_field_id('popular'); ?>" name="<?php echo $this->get_field_name('popular'); ?>" <?php if ($instance['popular'] == "popular" ) echo 'checked'; ?>	value="popular" >
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('random'); ?>">Random</label>
			<input 	type="checkbox" id="<?php echo $this->get_field_id('random'); ?>" name="<?php echo $this->get_field_name('random'); ?>" <?php if ($instance['random'] == "random" ) echo 'checked'; ?>	value="random" >
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tags'); ?>">Tags</label>
			<input 	type="checkbox" id="<?php echo $this->get_field_id('tags'); ?>" name="<?php echo $this->get_field_name('tags'); ?>" <?php if ($instance['tags'] == "tags" ) echo 'checked'; ?>	value="tags" >
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('tags'); ?>">Number of tags</label>
			<input style="width:40px;" id="<?php echo $this->get_field_id('tags_count'); ?>" name="<?php echo $this->get_field_name('tags_count'); ?>" value="<?php echo esc_attr($instance['tags_count']); ?>" />
		</p>
	<?php
	}
}

?>