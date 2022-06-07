<?php
if (!class_exists('wpshare247_header_hero')) :
	class wpshare247_header_hero extends WP_Widget
	{
		function __construct()
		{
			parent::__construct(
				'wpshare247_header_hero',
				esc_html_x('* [WP247] Header hero', 'widget name', 'wpshare247'),
				array(
					'classname' => 'wpshare247_header_hero',
					'description' => esc_html__('Hiển thị header hero', 'wpshare247'),
					'customize_selective_refresh' => true
				)
			);
		}

		//Hiển thị nội dung Widget
		function widget($args, $instance)
		{
			$defaults = array('title' => '', 'my_img_url' => '');

			$background_url = $instance['background_url'];
			$title = $instance['title'];
			$description = $instance['description'];
			$price = $instance['price'];
			$number = $instance['number'];
			$text_percent = $instance['text_percent'];
			$text_off_on = $instance['text_off_on'];
			$under_percent = $instance['under_percent'];
			$text_button = $instance['text_button'];
			$link_button = $instance['link_button'];
			$img_right_url = $instance['img_right_url'];

			echo $args['before_widget']; ?>
			<style>
				.hero-area.style-1:before {
					background-image: url(<?php echo $img_right_url ?>);
				}
			</style>
			<div class="hero-area style-1" style="background-image:url(<?php echo $background_url; ?>)">
				<div class="hero-content-wrap">
					<div class="container">
						<div class="row">
							<div class="col-md-6">
								<!-- Start hero content -->
								<div class="hero-content">
									<h1><?php echo $title; ?></h1>
									<p><?php echo $description; ?></p>
									<a href="<?php echo $link_button; ?>" class="buttonfx angleindouble color-1 mb-2"><i class="icofont-shopping-cart"></i><?php echo $text_button; ?></a>
									<a href="cart.html" class="starting"><?php echo $price; ?></a>
								</div>
								<!-- End hero content -->
							</div>
							<div class="col-md-6">
								<!-- Start hero right -->
								<div class="hero-right">
									<!-- start hero discount -->
									<div class="hero-discount">
										<h1><?php echo $number; ?><sup><?php echo $text_percent; ?></sup><span><?php echo $text_off_on; ?></span></h1>
										<p><?php echo $under_percent; ?></p>
									</div>
									<!-- end hero discount -->
								</div>
								<!-- End hero right -->
							</div>
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

			if (!empty($new_instance['price'])) {
				$instance['price'] = ($new_instance['price']);
			}

			if (!empty($new_instance['number'])) {
				$instance['number'] = ($new_instance['number']);
			}

			if (!empty($new_instance['text_percent'])) {
				$instance['text_percent'] = ($new_instance['text_percent']);
			}

			if (!empty($new_instance['text_off_on'])) {
				$instance['text_off_on'] = ($new_instance['text_off_on']);
			}

			if (!empty($new_instance['under_percent'])) {
				$instance['under_percent'] = ($new_instance['under_percent']);
			}

			if (!empty($new_instance['text_button'])) {
				$instance['text_button'] = ($new_instance['text_button']);
			}

			if (!empty($new_instance['link_button'])) {
				$instance['link_button'] = ($new_instance['link_button']);
			}

			if (!empty($new_instance['background_url'])) {
				$instance['background_url'] = ($new_instance['background_url']);
			}

			if (!empty($new_instance['img_right_url'])) {
				$instance['img_right_url'] = ($new_instance['img_right_url']);
			}

			return $instance;
		}


		//Khai báo các field của Widget
		function form($instance)
		{
			$defaults = array('title' => '', 'description' => '', 'price' => '', 'number' => '', 'text_percent' => '', 'under_percent' => '', 'text_button' => '', 'link_button' => '', 'background_url' => '', 'text_off_on' => '', 'img_right_url' => '');
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
				<label for="<?php echo esc_attr($this->get_field_id('price')); ?>"><?php esc_html_e('Giá', 'wpshare247'); ?></label>
				<input class="widefat" type="text" value="<?php echo esc_attr($instance['price']); ?>" name="<?php echo esc_attr($this->get_field_name('price')); ?>" id="<?php echo esc_attr($this->get_field_id('price')); ?>" />
			</p>

			<!-- text field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Số', 'wpshare247'); ?></label>
				<input class="widefat" type="number" value="<?php echo esc_attr($instance['number']); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" id="<?php echo esc_attr($this->get_field_id('number')); ?>" />
			</p>

			<!-- text field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('text_percent')); ?>"><?php esc_html_e('Chữ phần trăm', 'wpshare247'); ?></label>
				<input class="widefat" type="text" value="<?php echo esc_attr($instance['text_percent']); ?>" name="<?php echo esc_attr($this->get_field_name('text_percent')); ?>" id="<?php echo esc_attr($this->get_field_id('text_percent')); ?>" />
			</p>

			<!-- text field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('text_off_on')); ?>"><?php esc_html_e('Chữ OFF ON', 'wpshare247'); ?></label>
				<input class="widefat" type="text" value="<?php echo esc_attr($instance['text_off_on']); ?>" name="<?php echo esc_attr($this->get_field_name('text_off_on')); ?>" id="<?php echo esc_attr($this->get_field_id('text_off_on')); ?>" />
			</p>

			<!-- text field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('under_percent')); ?>"><?php esc_html_e('Chữ dưới phần trăm', 'wpshare247'); ?></label>
				<input class="widefat" type="text" value="<?php echo esc_attr($instance['under_percent']); ?>" name="<?php echo esc_attr($this->get_field_name('under_percent')); ?>" id="<?php echo esc_attr($this->get_field_id('under_percent')); ?>" />
			</p>

			<!-- text field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('text_button')); ?>"><?php esc_html_e('Tiêu đề button', 'wpshare247'); ?></label>
				<input class="widefat" type="text" value="<?php echo esc_attr($instance['text_button']); ?>" name="<?php echo esc_attr($this->get_field_name('text_button')); ?>" id="<?php echo esc_attr($this->get_field_id('text_button')); ?>" />
			</p>

			<!-- text field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('link_button')); ?>"><?php esc_html_e('Links button', 'wpshare247'); ?></label>
				<input class="widefat" type="text" value="<?php echo esc_attr($instance['link_button']); ?>" name="<?php echo esc_attr($this->get_field_name('link_button')); ?>" id="<?php echo esc_attr($this->get_field_id('link_button')); ?>" />
			</p>

			<?php Ws247_M_WG::helper_image_field('img_right_url', 'Image Ware Right', $this, $instance); ?>
			<?php Ws247_M_WG::helper_image_field('background_url', 'Background Image', $this, $instance); ?>

<?php
		}
	}
endif;
