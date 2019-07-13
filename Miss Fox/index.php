<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>

		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >

		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

		<header>

				<p id="logo">
						<a href="<?php echo home_url(); ?>" rel="nofollow">
			      		<?php $missfox_logo_id = get_theme_mod( 'custom_logo' );
					      		$logo = wp_get_attachment_image_src( $missfox_logo_id , 'full' );
							      		if ( has_custom_logo() ) {
									  				echo '<img src="'. esc_url( $logo[0] ) .'">';
							      		} else {
									      		echo '<h2>'. esc_attr( get_bloginfo( 'name' ) ) .'</h2>';
			          } ?>
	          </a>
        </p>

        <p><?php bloginfo( 'description' ); ?></p>

    </header> <!-- header -->

    <div class="wrapper">

    		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        		<div <?php post_class( 'post'); ?>>

            		<?php if ( ! get_post_format() == 'aside' ) : ?>

    								<h1 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h1>

								<?php endif; ?>

				        <?php if ( has_post_thumbnail() ) : ?>

            				<a href="<?php the_permalink(); ?>" class="featured-image"> <?php the_post_thumbnail( 'post-image' ); ?> </a>

        		    <?php endif; ?>

					  		<div class="content">

            				<?php the_content(); ?>

            		</div> <!-- .content -->

    				    <?php if ( is_singular() ) wp_link_pages(); ?>

                <?php if ( get_post_type() == 'post' ) : ?>

										<div class="meta">

	            					<p><a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>

												<?php _e( 'in', 'missfox' ); ?> <?php the_category( ', ' ); ?>
												<?php the_tags( ' #', ' #', ' ' ); ?></p>

	                  		<?php if ( comments_open() ) : ?>

			                			<p><?php comments_popup_link( __('Add Comment', 'missfox'), __('1 Comment', 'missfox'), '% ' . __('Comments', 'missfox'), '', __('Comments off', 'missfox') ); ?></p>

											  <?php endif; ?>

	                      <?php if ( is_sticky() ) : ?>

			                			<p><?php _e( 'Sticky', 'missfox' ); ?></p>

	                      <?php endif ?>

	                      </p>

							      </div> <!-- .meta -->

                <?php endif; ?>

   					    <?php if ( is_singular() ) comments_template(); ?>

            </div> <!-- .post -->

        <?php endwhile; else : ?>

        		<div class="post">

            		<p><?php _e( 'Sorry, the page you requested cannot be found.', 'missfox' ); ?></p>

            </div> <!-- .post -->

        <?php endif; ?>

        <?php if ( ( ! is_singular() ) && ( $wp_query->post_count >= get_option( 'posts_per_page' ) ) ) : ?>

        		<div class="pagination">

            		<?php previous_posts_link( '&larr; ' . __( 'Newer posts', 'missfox' ) ); ?>
                <?php next_posts_link( __( 'Older posts', 'missfox') . ' &rarr;' ); ?>

            </div> <!-- .pagination -->

        <?php endif; ?>

				<footer>

        		<p>&copy; <?php echo date( 'Y' ); ?> <a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></p>

        </footer> <!-- footer -->

    </div> <!-- .wrapper -->

<?php wp_footer(); ?>

</body>

</html>
