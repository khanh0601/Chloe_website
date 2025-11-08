<?php
/**
 * Template Name: Custormer cake
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage chloe_pallete
 * @since chloe_pallete 1.0
 */

get_header();
wp_enqueue_style( 'custom_cake-css', get_template_directory_uri() . '/css/custom_cake.css');
wp_enqueue_script( 'custom_cake-js', get_template_directory_uri() . '/js/custom_cake.js');

?>
<section class="customcake_content">
    <div class="kl_container">
        <div class="customcake_content_inner">
            <div class="customcake_content_img img_full">
                <img src="<?php echo get_template_directory_uri(); ?>/images/custom_cake.webp" alt="">
            </div>
            <div class="customcake_content_info">
                <div class="customcake_content_info_subtitle block_title txt_subtitle">
                    CUSTOM CAKES
                </div>
                <div class="customcake_content_info_title txt_title">Delicious cakes are waiting for you order now!</div>
                <div class="home_contact_form"> 
                    <div class="home_contact_form_name">
                    <input type="text" name="name" placeholder="Name *" required />
                    </div>
                    <div class="home_contact_form_info">
                    <input
                        type="email"
                        name="email"
                        placeholder="Email Address *"
                        required
                    />
                    <input type="tel" name="phone" placeholder="Phone *" required />
                    </div>
                    <div class="home_contact_form_info">
                    <input type="text" name="date" placeholder="Date Needed *" required>
                    <input type="text" name="time" placeholder="Time Needed *" required>
                    </div>
                    <div class="home_contact_form_info">
                    <input
                        type="number"
                        name="servings"
                        placeholder="Number of Servings *"
                        required
                    />
                    <div class="home_contact_form_info_select">
                        <select name="flavor" required>
                        <option value="">Cake Flavour + Filling *</option>
                        <option value="vanilla">Vanilla</option>
                        <option value="chocolate">Chocolate</option>
                        <option value="strawberry">Strawberry</option>
                        </select>
                        <div class="home_contact_form_info_img">
                        <img src="/asset/img/icon_arrow_down.svg" alt="">
                        </div>
                    </div>
                    </div>
                    <div class="home_contact_form_design">
                    <textarea
                    name="design"
                    placeholder="Cake Design *"
                    rows="2"
                    required
                    ></textarea>
                    </div>
                    <div class="home_contact_form_upload">
                    <label for="file-upload" class="upload-label">
                        <div class="home_contact_form_upload_img">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_image.svg" alt="">
                        </div>
                        <span class="txt_14">UPLOAD A FILE</span>
                        <div class="home_contact_form_upload_icon">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/icon_uploat.svg" alt="">
                        </div>
                        <input
                        type="file"
                        id="file-upload"
                        name="file"
                        accept=".png,.jpg,.gif"
                        hidden
                        />
                    </label>
                    <p class="upload-info txt_14">PNG, JPG, GIF up to 5MB</p>
                    </div>
                    <button type="submit" class="home_hero_des_link txt_uppercase">
                    <div class="home_hero_des_link_txt color_white txt_16">submit</div>
                    <div class="home_hero_des_link_icon img_full">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-right-white.svg" alt="" />
                    </div>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<?php get_footer(); ?>