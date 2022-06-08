<?php
if (!class_exists('wp_reviewsandtestimonials')) :
    class wp_reviewsandtestimonials extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(
                'wp_reviewsandtestimonials',
                esc_html_x('* [WP] Reviews and Testimonials', 'widget name', 'wp'),
                array(
                    'classname' => 'wp_reviewsandtestimonials',
                    'description' => esc_html__('Our Client Reviews and Testimonials', 'wp'),
                    'customize_selective_refresh' => true
                )
            );
        }

        //Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------
        function init_repeat_sortable_fields()
        {
            $arr_fields = array(
                'f_repeat_image' => array('type' => 'image', 'label' => 'Hình avt'),
                'f_repeat_description' => array('type' => 'textarea', 'label' => 'Mô tả person'),
                'f_repeat_start' => array(
                    'type' => 'select',
                    'label' => 'Số sao',
                    'options' => array('1' => ' 1 sao', '2' => '2 sao', '3' => '3 sao', '4' => '4 sao', '5' => '5 sao')
                ),
                'f_repeat_title' => array('type' => 'text', 'label' => 'Tên tác giả'),
                'f_repeat_date' => array('type' => 'text', 'label' => 'Ngày'),
            );
            return $arr_fields;
        }
        //End Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------

        //Hiển thị nội dung Widget
        function widget($args, $instance)
        {
            $defaults = array('title' => '', 'description' => '', 'data_field' => '');
            $title = $instance['title'];
            $description = $instance['description'];
            $data_field = $instance['wle_repeat_sortable_data_1'];
            $arr_data = json_decode($data_field, true);


            echo $args['before_widget']; ?>

            <div id="review" class="testimonial-area pt-240 pb-140" data-aos="fade-up">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <!-- Start section title -->
                            <div class="section-title text-center">
                                <h2><?php echo $title; ?></h2>
                                <p><?php echo $description; ?></p>
                            </div>
                            <!-- End section title -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="testimonial-wrap">
                                <?php
                                if ($arr_data) {
                                    foreach ($arr_data as $k => $arr_item) {
                                        $f_repeat_image = $arr_item['f_repeat_image']['val'];
                                        $f_repeat_description = $arr_item['f_repeat_description']['val'];
                                        $f_repeat_start = $arr_item['f_repeat_start']['val'];
                                        $f_repeat_title = $arr_item['f_repeat_title']['val'];
                                        $f_repeat_date = $arr_item['f_repeat_title']['val'];
                                ?>
                                        <div class="single-testimonial text-center">
                                            <div class="testi-img">
                                                <img src="<?php echo $f_repeat_image; ?>" alt="">
                                            </div>
                                            <div class="testi-content">
                                                <i class="icofont-quote-left"></i>
                                                <p><?php echo $f_repeat_description; ?></p>
                                                <ul>
                                                    <?php
                                                    for ($i = 1; $i <= $f_repeat_start; $i++) {
                                                    ?>
                                                        <li><i class="icofont-star"></i></li>
                                                    <?php
                                                    }

                                                    ?>
                                                </ul>
                                                <h5><?php echo $f_repeat_title; ?></h5>
                                                <h6><?php echo $f_repeat_date; ?></h6>
                                            </div>
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


            return $instance;
        }


        //Khai báo các field của Widget
        function form($instance)
        {
            $defaults = array('title' => '', 'description' => '', 'wle_repeat_sortable_data_1' => '', 'img_center' => '');
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
            wpshare247_repeat_sortable::register_field($id_field, esc_attr($this->get_field_name($id_field)), 'Công nghệ', $instance, $this->init_repeat_sortable_fields());
            ?>


<?php
        }
    }
endif;
