<?php
if (!class_exists('wpshare247_notification')) :
    class wpshare247_notification extends WP_Widget
    {
        function __construct()
        {
            parent::__construct(
                'wpshare247_notification',
                esc_html_x('* [WP247] Thông báo', 'widget name', 'wpshare247'),
                array(
                    'classname' => 'wpshare247_notification',
                    'description' => esc_html__('Hiển thị thông báo', 'wpshare247'),
                    'customize_selective_refresh' => true
                )
            );
        }

        //Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------
        function init_repeat_sortable_fields()
        {
            $arr_fields = array(
                'f_repeat_image' => array('type' => 'image', 'label' => 'Hình thông báo'),
                //images
                'f_repeat_img_position' => array(
                    'type' => 'select',
                    'label' => 'Vị trí ảnh',
                    'options' => array('left' => 'Trái', 'right' => 'Phải')
                ),
                'f_repeat_title' => array('type' => 'text', 'label' => 'Tiêu đề'),
                'f_repeat_description1' => array('type' => 'textarea', 'label' => 'Mô tả chính'),
                'f_repeat_description2' => array('type' => 'textarea', 'label' => 'Mô tả phụ'),

                //button
                'f_repeat_button_title' => array('type' => 'text', 'label' => 'Tiêu đề button'),
                'f_repeat_nutton_link' => array('type' => 'text', 'label' => 'Link sản phẩm'),


            );
            return $arr_fields;
        }
        //End Chỉ cần khai báo các field tại đây và không cần làm gì thêm----------------------------------------

        //Hiển thị nội dung Widget
        function widget($args, $instance)
        {
            $defaults = array('wle_repeat_sortable_data_1' => '', 'f_repeat_img_position' => '');
            $data_field = $instance['wle_repeat_sortable_data_1'];
            $arr_data = json_decode($data_field, true);

            $bg_notification = get_theme_file_uri('/assets/images/notification-bg.svg');




            echo $args['before_widget']; ?>

            <!-- Start Notification Area -->
            <div class="notification-area pt-120pb-115" style="background-image: url(<?php echo $bg_notification; ?>);">
                <div class="container">

                    <?php
                    if ($arr_data) {
                        foreach ($arr_data as $k => $arr_item) {
                            $f_repeat_image = $arr_item['f_repeat_image']['val'];
                            $f_repeat_title = $arr_item['f_repeat_title']['val'];
                            $f_repeat_description1 = $arr_item['f_repeat_description1']['val'];
                            $f_repeat_description2 = $arr_item['f_repeat_description2']['val'];
                            $f_repeat_button_title = $arr_item['f_repeat_button_title']['val'];
                            $f_repeat_nutton_link = $arr_item['f_repeat_nutton_link']['val'];
                            $f_repeat_img_position = $arr_item['f_repeat_img_position']['val'];
                    ?>
                            <div class="row mb-60">
                                <?php
                                if ($f_repeat_img_position == 'right') {
                                ?>
                                    <div class="col-md-6">
                                        <div class="notification-content" data-aos="fade-up">
                                            <h2><?php echo $f_repeat_title; ?></h2>
                                            <p><?php echo $f_repeat_description1; ?></p>
                                            <?php echo '<ul><li>' . str_replace("\n", '</li><li><i class="icofont-check"></i>', trim($f_repeat_description2)) . '</ul></li>'; ?>
                                            <a href="<?php echo $f_repeat_nutton_link; ?>" class="buttonfx angleindouble color-2"><i class="icofont-shopping-cart"></i> <?php echo $f_repeat_button_title; ?></a>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="notification-img">
                                            <img src="<?php echo $f_repeat_image; ?>" alt="notification">
                                        </div>
                                    </div>

                                <?php
                                } else {
                                ?>
                                    <div class="col-md-6">
                                        <div class="notification-img">
                                            <img src="<?php echo $f_repeat_image; ?>" alt="notification">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="notification-content" data-aos="fade-up">
                                            <h2><?php echo $f_repeat_title; ?></h2>
                                            <p><?php echo $f_repeat_description1; ?></p>
                                            <?php echo '<ul><li>' . str_replace("\n", '</li><li><i class="icofont-check"></i>', trim($f_repeat_description2)) . '</ul></li>'; ?>
                                            <a href="<?php echo $f_repeat_nutton_link; ?>" class="buttonfx angleindouble color-2"><i class="icofont-shopping-cart"></i> <?php echo $f_repeat_button_title; ?></a>
                                        </div>
                                    </div>


                                <?php
                                }
                                ?>


                            </div>
                    <?php
                        }
                    }
                    ?>

                </div>
            </div>
            <!-- End Notification Area -->

        <?php
            echo $args['after_widget'];
        }

        //Cập nhật dữ liệu các field của Widget
        function update($new_instance, $old_instance)
        {
            $instance = array();





            if (!empty($new_instance['wle_repeat_sortable_data_1'])) {
                $instance['wle_repeat_sortable_data_1'] = ($new_instance['wle_repeat_sortable_data_1']);
            }

            if (!empty($new_instance['img_notification'])) {
                $instance['img_notification'] = ($new_instance['img_notification']);
            }

            return $instance;
        }


        //Khai báo các field của Widget
        function form($instance)
        {
            $defaults = array('wle_repeat_sortable_data_1' => '',);
            $instance = wp_parse_args($instance, $defaults); ?>

            <!-- Repeat field -->
            <?php
            $id_field = 'wle_repeat_sortable_data_1';
            wpshare247_repeat_sortable::register_field($id_field, esc_attr($this->get_field_name($id_field)), 'SP Thông báo', $instance, $this->init_repeat_sortable_fields());
            ?>



<?php
        }
    }
endif;
