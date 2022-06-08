<?php
if (!class_exists('wpshare247_technical')) :
    class wpshare247_technical extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(
                'wpshare247_technical',
                esc_html_x('* [WP247] Công nghệ', 'widget name', 'wpshare247'),
                array(
                    'classname' => 'wpshare247_technical',
                    'description' => esc_html__('Công nghệ', 'wpshare247'),
                    'customize_selective_refresh' => true
                )
            );
        }

        //Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------
        function init_repeat_sortable_fields()
        {
            $arr_fields = array(
                'f_repeat_image' => array('type' => 'image', 'label' => 'Hình công nghệ'),
                'f_repeat_title' => array('type' => 'text', 'label' => 'Tiêu đề'),
            );
            return $arr_fields;
        }
        //End Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------

        //Hiển thị nội dung Widget
        function widget($args, $instance)
        {
            $title = $instance['title'];
            $description = $instance['description'];
            $data_field = $instance['wle_repeat_sortable_data_1'];
            $arr_data = json_decode($data_field, true);
            $img_center = $instance['img_center'];


            echo $args['before_widget']; ?>

            <div class="techinical-area pt-110">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-7 col-lg-6">
                            <!-- Start section title -->
                            <div class="section-title white text-center" data-aos="fade-up">
                                <h2><?php echo $title; ?></h2>
                                <p><?php echo $description ?></p>
                            </div>
                            <!-- End section title -->
                        </div>
                    </div>
                    <div class="row">
                        <?php
                        if ($arr_data) {
                            foreach ($arr_data as $k => $arr_item) {
                                $f_repeat_image = $arr_item['f_repeat_image']['val'];
                                $f_repeat_title = $arr_item['f_repeat_title']['val'];
                        ?>
                                <div class="col-lg-3 col-sm-6">
                                    <!-- start single techinical -->
                                    <div class="single-techinical text-center" data-aos="fade-right">
                                        <img src="<?php echo $f_repeat_image ?>" alt="">
                                        <h4><?php echo $f_repeat_title ?></h4>
                                    </div>
                                    <!-- end single techinical -->
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                    <div class="row">
                        <div class="col">
                            <!-- start techinical bottom -->
                            <div class="technical-bottom" data-aos="zoom-in">
                                <img src="<?php echo $img_center ?>" alt="image center">
                            </div>
                            <!-- end techinical bottom -->
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

            if (!empty($new_instance['img_center'])) {
                $instance['img_center'] = ($new_instance['img_center']);
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

            <!-- image -->
            <?php Ws247_M_WG::helper_image_field('img_center', 'Image Center', $this, $instance); ?>


<?php
        }
    }
endif;
