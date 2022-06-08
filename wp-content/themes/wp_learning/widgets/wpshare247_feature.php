<?php
if (!class_exists('wpshare247_feature')) :
	class wpshare247_feature extends WP_Widget
	{
		function __construct()
		{
			parent::__construct(
				'wpshare247_feature',
				esc_html_x('* [WP247] Feature', 'widget name', 'wpshare247'),
				array(
					'classname' => 'wpshare247_feature',
					'description' => esc_html__('Hiển thị Feature', 'wpshare247'),
					'customize_selective_refresh' => true
				)
			);
		}

		//Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------
		function init_repeat_sortable_fields()
		{
			$arr_fields = array(
				'f_repeat_image' => array('type' => 'image', 'label' => 'Icon'),
				'f_repeat_title' => array('type' => 'text', 'label' => 'Tiêu đề'),
				'f_repeat_description' => array('type' => 'textarea', 'label' => 'Mô tả'),
			);
			return $arr_fields;
		}
		//End Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------

		//Hiển thị nội dung Widget
		function widget($args, $instance)
		{
			$defaults = array('title' => '', 'description' => '', 'img_right' => '', 'wle_repeat_sortable_data_1' => '',);
			$title = $instance['title'];
			$description = $instance['description'];
			$data_field = $instance['wle_repeat_sortable_data_1'];
			$arr_data = json_decode($data_field, true);
			$img_right = $instance['img_right'];


			echo $args['before_widget']; ?>
			<style>
				.feature-area:before {
					background-image: url(<?php echo $img_right ?>);
				}

				.feature-area:after {
					background-image: url(../images/feature-bg-2.png);
				}
			</style>

			<div class="feature-area pt-110pb-68" id="features">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<!-- Start section title -->
							<div class="section-title width-80" data-aos="fade-up">
								<h2><?php echo $title ?></h2>
								<p><?php echo $description ?></p>
							</div>
							<!-- End section title -->
							<div class="row">

								<?php
								if ($arr_data) {
									foreach ($arr_data as $k => $arr_item) {
										$f_repeat_image = $arr_item['f_repeat_image']['val'];
										$f_repeat_title = $arr_item['f_repeat_title']['val'];
										$f_repeat_description = $arr_item['f_repeat_description']['val'];
								?>
										<div class="col-md-6">
											<!-- Start single feature -->
											<div class="single-feature animation-1" data-aos="fade-right">
												<img src="<?php echo $f_repeat_image ?>" alt="Feature">
												<h2><?php echo $f_repeat_title ?></h2>
												<p><?php echo $f_repeat_description ?></p>
											</div>
											<!-- End single feature -->
										</div>
								<?php
									}
								}
								?>

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

			if (!empty($new_instance['wle_repeat_sortable_data_1'])) {
				$instance['wle_repeat_sortable_data_1'] = ($new_instance['wle_repeat_sortable_data_1']);
			}

			if (!empty($new_instance['img_right'])) {
				$instance['img_right'] = ($new_instance['img_right']);
			}


			return $instance;
		}


		//Khai báo các field của Widget
		function form($instance)
		{
			$defaults = array('title' => '', 'description' => '', 'img_right' => '', 'wle_repeat_sortable_data_1' => '',);
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

			<!-- Repeat field -->
			<?php
			$id_field = 'wle_repeat_sortable_data_1';
			wpshare247_repeat_sortable::register_field($id_field, esc_attr($this->get_field_name($id_field)), 'Block Icon', $instance, $this->init_repeat_sortable_fields());
			?>

			<!-- image -->
			<?php Ws247_M_WG::helper_image_field('img_right', 'Image Right', $this, $instance); ?>


<?php
		}
	}
endif;
