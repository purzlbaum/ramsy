<?php

class cs_bootstrap_social_media_widget extends WP_Widget {

    function cs_bootstrap_social_media_widget() {
        $widget_ops = array('description' => 'Verlinken Sie Ihre Social Media Profile' , 'cs-bootstrap');

        parent::WP_Widget(false, __('Social Media Links Widget', 'cs-bootstrap'),$widget_ops);
    }

    function widget($args, $instance) {
        extract( $args );
        $title = $instance['title'];
        $facebook = $instance['facebook'];
        $twitter = $instance['twitter'];
        $instagram = $instance['instagram'];
        $googleplus = $instance['googleplus'];
        $flickr = $instance['flickr'];
        $newsletter = $instance['newsletter'];
        $github = $instance['github'];
        $youtube = $instance['youtube'];
        $vimeo = $instance['vimeo'];
        $pinterest = $instance['pinterest'];
        $linkedin = $instance['linkedin'];
        $xing = $instance['xing'];
        $rss = $instance['rss'];
        $rsscomments = $instance['rsscomments'];
        $target = $instance['target'];


        echo $before_widget; ?>
        <?php if($title != '')
            echo '<h3 class="widget-title">'.$title.'</h3>'; ?>

        <ul class="social-accounts clearfix">
            <?php

            if($facebook != '' && $target != ''){
                echo '<li><a href="'.$facebook.'"title="Facebook Account" target="_blank"><i class="fa fa-facebook"></i></a></li>';
            } elseif($facebook != '') {
                echo '<li><a href="'.$facebook.'" title="Facebook Account"><i class="fa fa-facebook"></i></a></li>';
            }

            if($twitter != '' && $target != ''){
                echo '<li><a href="'.$twitter.'"title="Twitter Account" target="_blank"><i class="fa fa-twitter"></i></a></li>';
            } elseif($twitter != '') {
                echo '<li><a href="'.$twitter.'" title="Twitter Account"><i class="fa fa-twitter"></i></a></li>';
            }

            if($googleplus != '' && $target != ''){
                echo '<li><a href="'.$googleplus.'" title="Google+ Account" target="_blank"><i class="fa fa-googleplus"></i></a></li>';
            } elseif($googleplus != '') {
                echo '<li><a href="'.$googleplus.'" title="Google+ Account"><i class="fa fa-google-plus"></i></a></li>';
            }

            if($linkedin != '' && $target != ''){
                echo '<li><a href="'.$linkedin.'" title="LinkedIn Profil" target="_blank"><i class="fa fa-linkedin"></i></a></li>';
            } elseif($linkedin != '') {
                echo '<li><a href="'.$linkedin.'" title="LinkedIn Profil"><i class="fa fa-linkedin"></i></a></li>';
            }

            if($xing != '' && $target != ''){
                echo '<li><a href="'.$xing.'" title="xing Profil" target="_blank"><i class="fa fa-xing"></i></a></li>';
            } elseif($xing != '') {
                echo '<li><a href="'.$xing.'" title="xing Profil"><i class="fa fa-xing"></i></a></li>';
            }

            if($instagram != '' && $target != ''){
                echo '<li><a href="'.$instagram.'" title="RSS Feed" target="_blank"><i class="fa fa-instagram"></i></a></li>';
            } elseif($instagram != '') {
                echo '<li><a href="'.$instagram.'" title="RSS Feed"><i class="fa fa-instagram"></i></a></li>';
            }

            if($rss != '' && $target != ''){
                echo '<li><a href="'.$rss.'" title="RSS Feed" target="_blank"><i class="fa fa-rss"></i></a></li>';
            } elseif($rss != '') {
                echo '<li><a href="'.$rss.'" title="RSS Feed"><i class="fa fa-rss"></i></a></li>';
            }

            ?>
        </ul><!-- end .sociallinks -->
        <div class="clearfix"></div>
        <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    function form($instance) {
        $title = esc_attr($instance['title']);
        $twitter = esc_attr($instance['twitter']);
        $facebook = esc_attr($instance['facebook']);
        $googleplus = esc_attr($instance['googleplus']);
        $linkedin = esc_attr($instance['linkedin']);
        $xing = esc_attr($instance['xing']);
        $instagram = esc_attr($instance['instagram']);
        $rss = esc_attr($instance['rss']);
        $target = esc_attr($instance['target']);

        ?>

        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Titel:','cs-bootstrap'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('facebook'); ?>"><?php _e('Facebook URL:','cs-bootstrap'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('facebook'); ?>" value="<?php echo $facebook; ?>" class="widefat" id="<?php echo $this->get_field_id('facebook'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('twitter'); ?>"><?php _e('Twitter URL:','cs-bootstrap'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('twitter'); ?>" value="<?php echo $twitter; ?>" class="widefat" id="<?php echo $this->get_field_id('twitter'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('googleplus'); ?>"><?php _e('Google+ URL:','cs-bootstrap'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('googleplus'); ?>" value="<?php echo $googleplus; ?>" class="widefat" id="<?php echo $this->get_field_id('googleplus'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('linkedin'); ?>"><?php _e('Linkedin URL:','cs-bootstrap'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('linkedin'); ?>" value="<?php echo $linkedin; ?>" class="widefat" id="<?php echo $this->get_field_id('linkedin'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('xing'); ?>"><?php _e('xing URL:','cs-bootstrap'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('xing'); ?>" value="<?php echo $xing; ?>" class="widefat" id="<?php echo $this->get_field_id('xing'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('instagram'); ?>"><?php _e('Instagram URL:','cs-bootstrap'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('instagram'); ?>" value="<?php echo $instagram; ?>" class="widefat" id="<?php echo $this->get_field_id('instagram'); ?>" />
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('rss'); ?>"><?php _e('RSS-Feed URL:','cs-bootstrap'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('rss'); ?>" value="<?php echo $rss; ?>" class="widefat" id="<?php echo $this->get_field_id('rss'); ?>" />
        </p>

        <p>
            <input class="checkbox" type="checkbox" <?php checked( $instance['target'], true ); ?> id="<?php echo $this->get_field_id('target'); ?>" name="<?php echo $this->get_field_name('target'); ?>" <?php checked( $target, 'on' ); ?>> <?php _e('Alle Links in einem neuen Fenster öffnen.', 'cs-bootstrap'); ?></input>
        </p>

    <?php
    }
}

register_widget('cs_bootstrap_social_media_widget');