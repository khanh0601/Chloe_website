<?php
//$int = (int) filter_var($str, FILTER_SANITIZE_NUMBER_INT);
$editorSettings = [];

// Adding Matrix field to existing "page" post type 
add_action('edit_form_after_title', function($post) use($editorSettings) {
    echo '<div class="typerocket-container">';    
    if($post->post_type == 'page' && basename(get_page_template())=="homepage.php") {
        remove_post_type_support( 'page', 'editor' );

        $form = tr_form();
        echo beginBox("Banner Chính",true);
            echo $form->repeater('banner')->setLabel("Banner chính")->setFields([
                    $form->image('image')->setLabel("Hình ảnh"),
                    $form->text('subtitle')->setLabel("Tiêu đề phụ"),
                    $form->text('title')->setLabel("Tiêu đề"),
                    $form->text('order')->setLabel("Order"),
                    $form->text('link')->setLabel("link"),
            ]);
        echo endBox();


        echo beginBox("Best seller",true);
            echo $form->text('seller_subtitle')->setLabel("Tiêu đề phụ");
            echo $form->text('seller_title')->setLabel("Tiêu đề");
        echo endBox();
        echo beginBox("About Cake",true);
            echo $form->text('about_subtitle')->setLabel("Tiêu đề phụ");
            echo $form->text('about_title')->setLabel("Tiêu đề");
            echo $form->editor('about_text_1')->setLabel("Mô tả 1");
            echo $form->image('about_image')->setLabel("Hình ảnh");
            echo $form->editor('about_text_2')->setLabel("Mô tả 2");
            echo $form->text('about_readmore')->setLabel("Text Read more");
            echo $form->text('about_link')->setLabel("link");
        echo endBox();

        echo beginBox("Trendding Cake",true);
            echo $form->text('trend_subtitle')->setLabel("Tiêu đề phụ");
            echo $form->text('trend_title')->setLabel("Tiêu đề");
        echo endBox();

        echo beginBox("Message Cake",true);
            echo $form->image('message_image')->setLabel("Hình ảnh");
            echo $form->text('message_des')->setLabel("Mô tả");
            echo $form->text('message_order')->setLabel("Text order");
            echo $form->text('message_link')->setLabel("link");
        echo endBox();


        echo beginBox("Review Cake",true);
            echo $form->text('review_subtitle')->setLabel("Tiêu đề phụ");
            echo $form->text('review_title')->setLabel("Tiêu đề");
            echo $form->text('review_amount')->setLabel("Số lượng review");
            echo $form->image('review_image')->setLabel("Hình ảnh");
            echo $form->repeater('review_items')->setLabel("review item")->setFields([
                $form->editor('des')->setLabel("Mô tả"),
                $form->text('author')->setLabel("Tên người đánh giá"),
            ]);
        echo endBox();

        echo beginBox("Form Cake",true);
            echo $form->text('form_subtitle')->setLabel("Tiêu đề phụ");
            echo $form->text('form_title')->setLabel("Tiêu đề");
        echo endBox();

        echo beginBox("Workshop Cake",true);
            echo $form->text('workshop_subtitle')->setLabel("Tiêu đề phụ");
            echo $form->text('workshop_title')->setLabel("Tiêu đề");
        echo endBox();

        echo beginBox("List Cake",true);
            echo $form->repeater('cake_item')->setLabel("Hình ảnh cake")->setFields([
                $form->image('image')->setLabel("Hình ảnh"),
                $form->text('link_instagram')->setLabel("Link Instagram"),
            ]);
        echo endBox();
    }

    else if($post->post_type == 'page' && basename(get_page_template())=="our_story.php") {
        remove_post_type_support( 'page', 'editor' );


        $form = tr_form();
        echo beginBox("Banner Chính",true);
            echo $form->repeater('banner')->setLabel("Banner chính")->setFields([
                    $form->image('image')->setLabel("Hình ảnh"),
                    $form->text('subtitle')->setLabel("Tiêu đề phụ"),
                    $form->text('title')->setLabel("Tiêu đề"),
                    $form->text('order')->setLabel("Order"),
                    $form->text('link')->setLabel("link"),
            ]);
        echo endBox();


        echo beginBox("About Cake",true);
            echo $form->text('about_subtitle')->setLabel("Tiêu đề phụ");
            echo $form->text('about_title')->setLabel("Tiêu đề");
            echo $form->editor('about_text_1')->setLabel("Mô tả 1");
            echo $form->image('about_image')->setLabel("Hình ảnh");
            echo $form->editor('about_text_2')->setLabel("Mô tả 2");
            echo $form->text('about_readmore')->setLabel("Text Read more");
            echo $form->text('about_link')->setLabel("link");
        echo endBox();

        echo beginBox("Choose Us",true);
            echo $form->text('choose_subtitle')->setLabel("Tiêu đề phụ");
            echo $form->text('choose_title')->setLabel("Tiêu đề");
            echo $form->image('choose_image')->setLabel("Hình ảnh");
            echo $form->repeater('choose_items')->setLabel("item")->setFields([
                    $form->text('num')->setLabel("Số thứ tự"),
                    $form->text('title')->setLabel("Tiêu đề"),
                    $form->text('des')->setLabel("Mô tả"),
                    $form->text('read_more')->setLabel("Read more"),
                    $form->text('link')->setLabel("link"),
            ]);
        echo endBox();

        echo beginBox("Message Cake",true);
            echo $form->image('message_image')->setLabel("Hình ảnh");
            echo $form->text('message_des')->setLabel("Mô tả");
            echo $form->text('message_order')->setLabel("Text order");
            echo $form->text('message_link')->setLabel("link");
        echo endBox();


        echo beginBox("Our Mission",true);
            echo $form->editor('mission_title')->setLabel("Tiêu đề");
            echo $form->editor('mission_des')->setLabel("Mô tả");
            echo $form->image('mission_image1')->setLabel("Hình ảnh 1");
            echo $form->image('mission_image2')->setLabel("Hình ảnh 2");
        echo endBox();


    }
    else if($post->post_type == 'page' && basename(get_page_template())=="workshop_detail.php") {
        remove_post_type_support( 'page', 'editor' );


        $form = tr_form();
        echo $form->editor('workshop_detail_des')->setLabel("Mô tả");
        echo endBox();


    }

    else if($post->post_type == 'page' && basename(get_page_template())=="custom_cake.php") {
        remove_post_type_support( 'page', 'editor' );

        $form = tr_form();
        echo beginBox("Banner Chính",true);
            echo $form->image('banner')->setLabel("Hình banner");
            echo $form->editor('title')->setLabel("Tiêu đề");
            echo $form->editor('des')->setLabel("Mô tả");
        echo endBox();



    }


    else if($post->post_type == 'page' && basename(get_page_template())=="thanks.php") {
        remove_post_type_support( 'page', 'editor' );

        $form = tr_form();
        echo beginBox("Banner Chính",true);
        echo $form->image('banner')->setLabel("Hình banner");
        echo $form->text('banner_title')->setLabel("Tiêu đề");
        echo $form->editor('banner_description')->setLabel("Nội dung");
        echo endBox();



    }


    else if($post->post_type == 'page'){
        $form = tr_form();
        echo beginBox("Banner Chính",true);
        echo $form->row(
            $form->image('banner_image')->setLabel("Banner"),
            $form->image('banner_image_mobile')->setLabel("Banner Mobile")
        );
        echo $form->row(
            $form->text('banner_title')->setLabel("Tiêu đề"),
            $form->textarea('banner_content')->setLabel("Nội dung")
        );
        echo endBox();
    }
    echo '</div>';
});

add_action('edit_form_after_editor', function($post) use($editorSettings) {
    echo '<div class="typerocket-container">';
    if($post->post_type == 'page' && basename(get_page_template())=="pdppolicy.php") {

    }
    echo '</div>';
});



/*
$floor = tr_post_type('floor','Tầng')->setSlug('tang')->setIcon('Book');
$args = $floor->getArguments();
$args = array_merge( $args, array(
  'supports'  =>  array('title','thumbnail'),
  'publicly_queryable'  => false
  )
);

$floor->setArguments( $args );
$floorDetails = tr_meta_box('floor_detail')->setLabel("Chi tiết");
$floorDetails->setCallback(function(){
    $form = tr_form();

    echo $form->row(
        $form->text('subdivision_title')->setLabel("Tiêu đề"),
        $form->image('subdivision_bg')->setLabel("Hình nền")
    );
    echo $form->repeater('prod_items')->setLabel("Sản phẩm")->setFields([
            $form->row(
                $form->text('title')->setLabel("Tên sản phẩm"),
                $form->search('prod')->setPostType('prod')->setLabel("Chọn Sản phẩm"),
                $form->text('position')->setLabel("Vị trí trên hình (Top,Left)")
            ),
            $form->textarea('coordinates')->setLabel("Tọa độ")
    ]);
    echo $form->repeater('legend')->setLabel("Ghi chú")->setFields([
        $form->row(
            $form->text('title')->setLabel("Tên sản phẩm"),
            $form->color('color')->setLabel("Mã màu")
        )
    ]);



});
$floor->apply($floorDetails);

$floorcate = tr_taxonomy('floorcate', 'Tháp');
$floorcate->setSlug('thap');
$floorcate->setHierarchical();

$floorcate->setMainForm(function() {
    $form = tr_form();
    echo $form->image('map')->setLabel("Hình vị trí");
});


$args = $floorcate->getArguments();
$args = array_merge( $args, array( 'show_admin_column' => true ) );
$floorcate->setArguments( $args );
$floor->apply($floorcate);



$prod = tr_post_type('prod','Sản phẩm')->setSlug('san-pham')->setIcon('Book');
$args = $prod->getArguments();
$args = array_merge( $args, array(
  'supports'  =>  array('title','thumbnail'),
  'publicly_queryable'  => false
  )
);

$prod->setArguments( $args );
$prodDetails = tr_meta_box('prod_detail')->setLabel("Chi tiết");
$prodDetails->setCallback(function(){
    $form = tr_form();
    echo $form->row(
        $form->text('bed')->setLabel("Phòng ngủ"),
        $form->text('bath')->setLabel("Phòng tắm"),
        $form->text('acreage_1')->setLabel("Diện tích tim tưởng"),
        $form->text('acreage_2')->setLabel("Diện tích thông thủy")

    );
    echo $form->row(
        $form->text('link_360')->setLabel("Link 360")
        //$form->image('map')->setLabel("Hình vị trí"),

    );

    echo $form->repeater('image_items')->setLabel("Hình ảnh mặt bằng")->setFields([
        $form->row(
            $form->text('title')->setLabel("Tiêu đề"),
            $form->image('image')->setLabel("Hình")
        )
    ]);

    echo $form->repeater('other_items')->setLabel("Hình ảnh Phối cảnh")->setFields([
        $form->row(
            $form->text('title')->setLabel("Tiêu đề"),
            $form->image('image')->setLabel("Hình")
        )
    ]);

});
$prod->apply($prodDetails);

*/



$register = tr_post_type('register','Liên hệ')->setSlug('dang-ky-slug')->setIcon('Book');  
$args = $register->getArguments();
$args = array_merge( $args, array( 
  'supports'  =>  array('title'),
  'publicly_queryable'  => false
  )
);

$register->setArguments( $args );
$registerDetails = tr_meta_box('register_detail')->setLabel("Chi tiết");
$registerDetails->setCallback(function(){
    $form = tr_form();
    echo $form->text('mobile')->setLabel("Số điện thoại");
    echo $form->text('email')->setLabel("Email");
    //echo $form->text('address')->setLabel("Địa chỉ");
    echo $form->text('interest')->setLabel("Quan tâm");
    echo $form->text('device')->setLabel("Thiết Bị");
    echo $form->text('source')->setLabel("Nguồn");
    echo $form->text('user_agent')->setLabel("User Agent");
    echo $form->textarea('content')->setLabel("Nội dung");

});
$register->apply($registerDetails);

$register->addColumn('mobile', true, 'Số điện thoại', function($value) {
    echo $value;
}, 'text');
$register->addColumn('email', true, 'Email', function($value) {
    echo $value;
}, 'text');
/*$register->addColumn('address', true, 'Địa chỉ', function($value) {
    echo $value;
}, 'text');
*/
$register->addColumn('interest', true, 'Sản phẩm quan tâm', function($value) {
    echo $value;
}, 'text');

$register->addColumn('content', true, 'Nội dung', function($value) {
    echo $value;
}, 'text');
$register->addColumn('device', true, 'Thiết bị', function($value) {
    echo $value;
}, 'text');
$register->addColumn('source', true, 'Nguồn', function($value) {
    echo $value;
}, 'text');


