<?php
if (!class_exists('wp_video')) :
    class wp_video extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(
                'wp_video',
                esc_html_x('* [WP] Video', 'widget name', 'wp'),
                array(
                    'classname' => 'wp_video',
                    'description' => esc_html__('Video', 'wp'),
                    'customize_selective_refresh' => true
                )
            );
        }


        //Hiển thị nội dung Widget
        function widget($args, $instance)
        {
            $defaults = array('title' => '', 'description' => '', 'link_video' => '');
            $title = $instance['title'];
            $description = $instance['description'];
            $bg_video = get_theme_file_uri('/assets/images/video.svg');
            $link_video = $instance['link_video'];
            $img_video = $instance['img_video'];

            echo $args['before_widget']; ?>

            <div id="video" class="video-area" style="background-image: url(<?php echo $bg_video; ?>);" data-aos="fade-up">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7 col-lg-8">
                            <!-- start section tilte -->
                            <div class="section-title white text-center">
                                <h2><?php echo $title; ?></h2>
                                <p><?php echo $description; ?></p>
                            </div>
                            <!-- start section tilte -->
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <!-- start video -->
                            <div class="video">
                                <img src="<?php echo $img_video; ?>" alt="">
                                <a class="venobox vbox-item" data-gall="gall-video" data-autoplay="true" data-vbtype="video" href="<?php echo $link_video; ?>">
                                    <i class="icofont-play-alt-2"></i>
                                </a>
                            </div>
                            <!-- end video -->
                        </div>
                    </div>
                </div>
            </div>

        <?php
            echo $args['after_widget'];
        }

        //Cập nhật dữ liệu các field của Widget
        function update($new_instance, $old_instance)
        {
            $instance = array();

            if (!empty($new_instance['title'])) {
                $instance['title'] = ($new_instance['title']);
            }

            if (!empty($new_instance['description'])) {
                $instance['description'] = ($new_instance['description']);
            }

            if (!empty($new_instance['link_video'])) {
                $instance['link_video'] = ($new_instance['link_video']);
            }

            if (!empty($new_instance['img_video'])) {
                $instance['img_video'] = ($new_instance['img_video']);
            }


            return $instance;
        }


        //Khai báo các field của Widget
        function form($instance)
        {
            $defaults = array('title' => '', 'description' => '', 'link_video' => '', 'img_video' => '');
            $instance = wp_parse_args($instance, $defaults); ?>

            <!-- text field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Tiêu đề', 'wpshare247'); ?></label>
                <input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
            </p>

            <!-- textarea field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php esc_html_e('Mô tả', 'wpshare247'); ?></label>
                <textarea name="<?php echo esc_attr($this->get_field_name('description')); ?>" id="<?php echo esc_attr($this->get_field_id('description')); ?>" class="widefat"><?php echo esc_attr($instance['description']); ?></textarea>
            </p>

            <!-- text field -->
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('link_video')); ?>"><?php esc_html_e('Link video', 'wpshare247'); ?></label>
                <input class="widefat" type="text" value="<?php echo esc_attr($instance['link_video']); ?>" name="<?php echo esc_attr($this->get_field_name('link_video')); ?>" id="<?php echo esc_attr($this->get_field_id('link_video')); ?>" />
            </p>

            <!-- image -->
            <?php Ws247_M_WG::helper_image_field('img_video', 'Image Video', $this, $instance); ?>


<?php
        }
    }
endif;
