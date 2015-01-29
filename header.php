<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>
		
		<meta http-equiv="Content-type" content="text/html;charset=<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" >
																		
		<title><?php wp_title('|', true, 'right'); ?></title>
		 
		<?php wp_head(); ?>

	</head>
	
	<body <?php body_class(); ?>>
        <div class="top-nav-fixed">
            <h1 class="blog-title">
                <a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo esc_attr( get_bloginfo( 'title' ) ); ?> &mdash; <?php echo esc_attr( get_bloginfo( 'description' ) ); ?>" rel="home"><?php echo esc_attr( get_bloginfo( 'title' ) ); ?></a>
            </h1>
            <ul class="main-menu clearfix">
                <?php if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu( array(
                        'container' => '',
                        'items_wrap' => '%3$s',
                        'theme_location' => 'primary'
                        )
                    );
                } else {
                    wp_list_pages( array(
                        'container' => '',
                        'title_li' => ''
                    ));
                }
                ?>
            </ul>

            <a class="nav-toggle hidden" title="<?php _e('Click to view the navigation','rams') ?>" href="#">
                <div class="bars">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="clear"></div>
                </div>
                <p>
                    <span class="menu"><?php _e('Menu','rams') ?></span>
                    <span class="close"><?php _e('Close','rams') ?></span>
                </p>
            </a>

        </div>

        <ul class="mobile-menu bg-dark hidden">

            <?php if ( has_nav_menu( 'primary' ) ) {
                wp_nav_menu( array(

                    'container' => '',
                    'items_wrap' => '%3$s',
                    'theme_location' => 'primary'

                    )
                );
            } else {
                wp_list_pages( array(
                    'container' => '',
                    'title_li' => ''
                ));
            }
            ?>

        </ul>


        <div class="sidebar bg-mint">
		
			<div class="sidebar-inner">
                <?php if ( is_active_sidebar( 'sidebar-left' ) ) : ?>
                    <div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
                        <?php dynamic_sidebar( 'sidebar-left' ); ?>
                    </div><!-- #primary-sidebar -->
                <?php endif; ?>
				 <div class="clear"></div>
			
			</div> <!-- /sidebar-inner -->
							
		</div> <!-- /sidebar -->


		<div class="wrapper" id="wrapper">
		
			<div class="section-inner wrapper-inner">