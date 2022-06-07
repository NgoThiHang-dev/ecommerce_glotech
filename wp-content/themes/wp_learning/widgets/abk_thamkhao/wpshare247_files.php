<?php
if( !class_exists('wpshare247_files') ):
	class wpshare247_files extends WP_Widget {
		function __construct() {
			parent::__construct(
				'wpshare247_files', esc_html_x('* [WP247] Document Files', 'widget name', 'wpshare247'),
				array(
					'classname' => 'wpshare247_files',
					'description' => esc_html__('Trường tệp đính kèm Document Files của Widget', 'wpshare247'),
					'customize_selective_refresh' => true
				)
			);
		}
		
		//Hiển thị nội dung Widget
		function widget($args, $instance) {
			$defaults = array('title'=>'', 'video_mp4' => '');
			
			$title = $instance['title'];
			$wpshare247_file_1 = $instance['wpshare247_file_1'];
			$id_attachment = attachment_url_to_postid($wpshare247_file_1);
			$filename = basename ( get_attached_file( $id_attachment ) );
			$size = size_format ( filesize( get_attached_file( $id_attachment ) ) );
			
			echo $args['before_widget'];
				?>
				<?php echo $args['before_title'] . $title . $args['after_title']; ?>
                <section class="fields-content">
                    <!-- Gallery Image -->
                    <div class="ws247-field">
                    	<a href="<?php echo $wpshare247_file_1;?>" download> Download File: <?php echo $filename;?> (<?php echo $size;?>)</a>
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
			
			if (!empty($new_instance['wpshare247_file_1'])) {
				$instance['wpshare247_file_1'] = ($new_instance['wpshare247_file_1']);
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
            
            <!-- File field -->
			<?php Ws247_M_WG::helper_documents_field('wpshare247_file_1', 'File đính kèm', $this, $instance); ?>
			
		<?php
		}
	}
endif;