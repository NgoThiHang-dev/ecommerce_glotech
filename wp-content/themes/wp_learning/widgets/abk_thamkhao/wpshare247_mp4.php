<?php
if( !class_exists('wpshare247_mp4') ):
	class wpshare247_mp4 extends WP_Widget {
		function __construct() {
			parent::__construct(
				'wpshare247_mp4', esc_html_x('* [WP247] Video Mp4', 'widget name', 'wpshare247'),
				array(
					'classname' => 'wpshare247_mp4',
					'description' => esc_html__('Trường Video Mp4 của Widget', 'wpshare247'),
					'customize_selective_refresh' => true
				)
			);
		}
		
		//Hiển thị nội dung Widget
		function widget($args, $instance) {
			$defaults = array('title'=>'', 'video_mp4' => '');
			
			$title = $instance['title'];
			$video_mp4 = $instance['video_mp4'];
			
			echo $args['before_widget'];
				?>
				<?php echo $args['before_title'] . $title . $args['after_title']; ?>
                <section class="fields-content">
                    <!-- Gallery Image -->
                    <div class="ws247-field">
                    	<video width="100%" class="myVideo" id="IDVideo3" autoplay loop muted playsinline="">
                            <source src="<?php echo $video_mp4; ?>" type="video/mp4">
                        </video>
                    </div>
                </section>
				<?php
			echo $args['after_widget'];
		}
		
		//Cập nhật dữ liệu các field của Widget
		function update($new_instance, $old_instance) {
			$instance = array();
			
			if (!empty($new_instance['title'])) {
				$instance['title'] = ($new_instance['title']);
			}
			
			if (!empty($new_instance['video_mp4'])) {
				$instance['video_mp4'] = ($new_instance['video_mp4']);
			}
			
			return $instance;
		}
		
		
		//Khai báo các field của Widget
		function form($instance) {
			$defaults = array('title'=>'', 'my_img_url' => '');
			$instance = wp_parse_args($instance, $defaults); ?>
            
            <!-- text field -->
            <p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Text', 'wpshare247'); ?></label>
				<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
			</p>
            
            <!-- Video field -->
			<?php Ws247_M_WG::helper_video_field('video_mp4', 'Video MP4', $this, $instance); ?>
			
		<?php
		}
	}
endif;