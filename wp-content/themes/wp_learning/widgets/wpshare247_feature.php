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

		//Hiển thị nội dung Widget
		function widget($args, $instance)
		{
			$defaults = array('title' => '', 'my_img_url' => '');

			echo $args['before_widget']; ?>
			<div class="feature-area pt-110pb-68" id="features">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<!-- Start section title -->
							<div class="section-title width-80" data-aos="fade-up">
								<h2>Our Smart Watch Excellent of Features</h2>
								<p>Delay rapid joy share allow age manor six. Went why far saw many knew. Exquisite excellent son gentleman acuteness her.</p>
							</div>
							<!-- End section title -->
							<div class="row">
								<div class="col-md-6">
									<!-- Start single feature -->
									<div class="single-feature animation-1" data-aos="fade-right">
										<img src="img/feature/feature-1.png" alt="Feature">
										<h2>High Quality</h2>
										<p>Led all cottage met enabled attempt through talking delight. Dare he feet my tell busy.</p>
									</div>
									<!-- End single feature -->
								</div>
								<div class="col-md-6">
									<!-- Start single feature -->
									<div class="single-feature" data-aos="fade-left">
										<img src="img/feature/feature-2.png" alt="Feature">
										<h2>Awesome Desogm</h2>
										<p>Led all cottage met enabled attempt through talking delight. Dare he feet my tell busy.</p>
									</div>
									<!-- End single feature -->
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<!-- Start single feature -->
									<div class="single-feature" data-aos="fade-up">
										<img src="img/feature/feature-3.png" alt="Feature">
										<h2>Latest Technology</h2>
										<p>Led all cottage met enabled attempt through talking delight. Dare he feet my tell busy.</p>
									</div>
									<!-- End single feature -->
								</div>
								<div class="col-md-6">
									<!-- Start single feature -->
									<div class="single-feature" data-aos="fade-down">
										<img src="img/feature/feature-4-1.png" alt="Feature">
										<h2>User Friendly</h2>
										<p>Led all cottage met enabled attempt through talking delight. Dare he feet my tell busy.</p>
									</div>
									<!-- End single feature -->
								</div>
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

			if (!empty($new_instance['my_img_url'])) {
				$instance['my_img_url'] = ($new_instance['my_img_url']);
			}

			return $instance;
		}


		//Khai báo các field của Widget
		function form($instance)
		{
			$defaults = array('title' => '', 'my_img_url' => '');
			$instance = wp_parse_args($instance, $defaults); ?>

			<!-- text field -->
			<p>
				<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Text', 'wpshare247'); ?></label>
				<input class="widefat" type="text" value="<?php echo esc_attr($instance['title']); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" />
			</p>

			<!-- Image field -->
			<?php Ws247_M_WG::helper_image_field('my_img_url', 'Image', $this, $instance); ?>

<?php
		}
	}
endif;
