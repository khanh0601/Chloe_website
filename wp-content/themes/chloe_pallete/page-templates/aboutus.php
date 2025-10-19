<?php
/**
 * Template Name: Giới thiệu
 * Description:
 *
 * Tip:
 *
 * @package WordPress
 * @subpackage tbs
 * @since tbs 1.0
 */

global $disableFullpage;
$disableFullpage= true;

global $pageClass;
$pageClass= "with-section-striped";
//striped

get_header();



$pageID = get_queried_object_id();

?>

<?php
nmc_get_template_part( 'partials/section-banner', [
    'sectionId' => $pageID
] );

?>


<section class=" animatedParent animateOnce section-cover section-aboutus " data-anchor="<?= sanitize_title(__("Giới thiệu","tbs")) ?>" >

        <div class="section-content-wrapper div_zindex section-padding">
            <div class="container-d">
                <div class="section-content-inner">
                    <div class="row gutter-xxl align-items-center">
                        <div class="col-lg-4 order-lg-last">
                            <div class="section-image">
                                 <img src="<?= get_template_directory_uri() ?>/images/tmp/about/img-gioi-thieu.png" alt="TBS Group" class="img-fluid" />
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="section-content quote">
                                <p>TBS Group là một trong những Tập đoàn đầu tư quốc tế đa ngành uy tín tại Việt Nam và trong khu vực, hoạt động trong các lĩnh vực chính như: Sản xuất công nghiệp, Đầu tư & Phát triển Bất động sản, Logistics, Thương mại và Dịch vụ.</p>
                                <p>Thành lập vào năm 1989 từ một nhà xưởng nhỏ, TBS Group hiện nay là một trong những tập đoàn hàng đầu Việt Nam trong lĩnh vực sản xuất công nghiệp thời trang, đặc biệt là giày dép và túi xách. Với hơn 30 năm phát triển, TBS đã xây dựng được uy tín vững mạnh trên thị trường quốc tế, hợp tác với nhiều thương hiệu lớn như Decathlon, Skechers, Coach và Tory Burch.</p>
                                <p>TBS Group không chỉ chú trọng vào sản xuất mà còn đầu tư mạnh mẽ vào nghiên cứu và phát triển (R&D) với hệ thống các trung tâm R&D hiện đại, giúp nâng cao chất lượng sản phẩm và đáp ứng nhu cầu đa dạng của khách hàng. Chúng tôi cam kết phát triển bền vững thông qua việc áp dụng công nghệ tiên tiến, giảm thiểu tác động đến môi trường và tạo ra giá trị cho cộng đồng.</p>
                                <p>
                                Với đội ngũ nhân viên tài năng và nhiệt huyết, TBS Group hướng tới mục tiêu trở thành một trong những nhà sản xuất hàng đầu thế giới trong ngành công nghiệp thời trang, góp phần nâng cao vị thế của Việt Nam trên bản đồ thương mại quốc tế.
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


</section>

<section class=" animatedParent animateOnce section-cover section-vision section-2-column" data-anchor="<?= sanitize_title(__("Tầm nhìn","tbs")) ?>" >
        <div class="section-content-wrapper div_zindex section-padding ">
            <div class="container-d">
                <div class="row gutter-xxl align-items-center">
                    <div class="col-lg-7 d-none d-lg-block">
                        <div class="section-image ">
                             <img src="<?= get_template_directory_uri() ?>/images/tmp/about/tamnhin.jpg" alt="TBS Group" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <h2 class="section-title">Tầm nhìn</h2>
                        <div class="section-content">
                            <p>Bằng khát vọng, ý chí quyết tâm, cùng với tinh thần không ngừng đổi mới sáng tạo của một đội ngũ vững mạnh và tầm nhìn xa về chiến lược của nhà lãnh đạo, TBS Group đang nỗ lực để trở thành công ty đầu tư  đa ngành uy tín tại Việt Nam và trong khu vực, mang đẳng cấp quốc tế, thể hiện tầm vóc trí tuệ và niềm tự hào Việt Nam trên trên thế giới.</p>
                        </div>
                        <div class="section-image d-block d-lg-none">
                             <img src="<?= get_template_directory_uri() ?>/images/tmp/about/tamnhin.jpg" alt="TBS Group" class="img-fluid" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>

<section class=" animatedParent animateOnce section-cover section-mision section-2-column" data-anchor="<?= sanitize_title(__("Sứ mệnh","tbs")) ?>" >
        <div class="section-content-wrapper div_zindex section-padding ">
            <div class="container-d">
                <div class="row gutter-xxl align-items-center">
                    <div class="col-lg-7 d-none d-lg-block order-lg-last">
                        <div class="section-image ">
                             <img src="<?= get_template_directory_uri() ?>/images/tmp/about/sumenh.jpg" alt="TBS Group" class="img-fluid" />
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <h2 class="section-title">Tầm nhìn</h2>
                        <div class="section-content">
                            <p>Bằng khát vọng, ý chí quyết tâm, cùng với tinh thần không ngừng đổi mới sáng tạo của một đội ngũ vững mạnh và tầm nhìn xa về chiến lược của nhà lãnh đạo, TBS Group đang nỗ lực để trở thành công ty đầu tư  đa ngành uy tín tại Việt Nam và trong khu vực, mang đẳng cấp quốc tế, thể hiện tầm vóc trí tuệ và niềm tự hào Việt Nam trên trên thế giới.</p>
                        </div>
                        <div class="section-image d-block d-lg-none">
                             <img src="<?= get_template_directory_uri() ?>/images/tmp/about/sumenh.jpg" alt="TBS Group" class="img-fluid" />
                        </div>
                    </div>

                </div>
            </div>
        </div>
</section>

<section class=" animatedParent animateOnce section-cover section-value " data-anchor="<?= sanitize_title(__("Giá trị cốt lõi","tbs")) ?>" >
        <div class="section-content-wrapper div_zindex section-padding">
            <div class="container-d">
                <h2 class="section-title text-center">
                    Giá trị cốt lõi
                    <small class="d-block sm">Lòng trong -  Chân bền - Mắt sáng</small>
                </h2>
                <div class="section-slide text-center" >
                    <div class="swiper swiper-default value-slide  value-items" >
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" >
                                <div class="item" >
                                    <div class="item-thumb ">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/about/tam.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h3 class="title lg">Lòng trong</h3>
                                        <div class="description">Luôn trung thực, chân thành trong mọi mối quan hệ và công việc</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="item" >
                                    <div class="item-thumb ">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/about/mat.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h3 class="title lg">Mắt sáng</h3>
                                        <div class="description">Luôn đổi mới, sáng tạo trong công việc, từ đó tạo ra giá trị cho tập đoàn và cộng đồng.</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="item" >
                                    <div class="item-thumb ">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/about/chan.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h3 class="title lg">Chân bền</h3>
                                        <div class="description">Kiên định, bền bỉ và quyết tâm vượt qua mọi thách thức khó khăn, hướng tới mục tiêu</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="pt-4 pt-lg-5 section-title sm text-center mb-0 color-2">
                            Ba phẩm chất này không chỉ định hình văn hóa doanh nghiệp của TBS Group mà còn góp phần tạo dựng uy tín và vị thế của tập đoàn trong ngành công nghiệp.
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>

<section class=" animatedParent animateOnce section-cover section-history " data-anchor="<?= sanitize_title(__("Giá trị cốt lõi","tbs")) ?>" >
        <div class="section-content-wrapper div_zindex section-padding ">
            <div class="container-d">
                <h2 class="section-title text-center">
                    Lịch sử hình thành
                </h2>
                <div class="section-content text-center">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <p>TBS Group được thành lập năm 1989 bởi 3 người đồng đội xuất ngũ là ông Nguyễn Đức Thuấn, Cao Thanh Bích và Nguyễn Thanh Sơn. Xuất phát từ một xưởng may nhỏ ở Bình Dương, sau hơn 30 năm phát triển, TBS Group đã trở thành một trong những tập đoàn hàng đầu Việt Nam trong lĩnh vực sản xuất công nghiệp thời trang.</p>
                        </div>
                    </div>
                </div>
                <div class="section-items">
                    <h3 class="section-subtitle text-center">Các cột mốc quan trọng</h3>

                    <div class="timeline">
                      <ol>
                        <li>
                          <div class="item">
                            <time>1989 <span>Khởi nghiệp</span></time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Khởi nghiệp với Vườn ươm giống Bạch Đàn</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>

                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li>
                          <div class="item">
                            <time>1992</time>
                            <div class="item-body">
                                <div class="item-thumb fit-ratio">
                                    <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ls-1.png" alt="TBS Group" class="img-flui" />
                                </div>
                                <div class="title">Xây nhà máy đầu tiên tại Bình Dương</div>
                            </div>
                          </div>
                        </li>
                        <li></li>
                      </ol>
                    </div>



                </div>



            </div>
        </div>
         <div class="section-image">
            <img src="<?= get_template_directory_uri() ?>/images/tmp/about/bg-history.png" alt="TBS Group" class="img-fluid w-100" />
        </div>
</section>

<section class=" animatedParent animateOnce section-cover section-brand-story " data-anchor="<?= sanitize_title(__("Câu chuyện thương hiệu","tbs")) ?>" >
        <div class="section-content-wrapper div_zindex section-padding pb-0">
            <div class="container-d">
                <h2 class="section-title text-center">
                    Câu chuyện thương hiệu
                    <small class="d-block sm color-2">Thế giới làm được, ắt ta sẽ làm được.</small>
                </h2>
            </div>
            <div class="section-items brand-story-items" >
                    <div class="item section-padding pt-0">
                        <div class="item-body">
                            <p>Với lòng tin vào tài trí và khả năng của người Việt Nam, hơn ba mươi năm qua, tôi và đồng đội đã gầy dựng, phát triển TBS Group và chứng minh tiềm năng của ngành công nghiệp nước nhà trên thương trường quốc tế</p>
                            <p>Tôi được sinh ra trong một gia đình làm nghề giáo ở Thái Bình. Ngày bé, nhìn thấy cảnh đất nước và quê hương gặp nhiều khó khăn vất vả, trong tôi luôn có một khao khát có thể làm gì đó giúp cho quê hương, đất nước mình trở nên giàu mạnh, sánh vai với các cường quốc năm châu.
                            Đến tuổi trưởng thành, vẫn mang trong mình những ý chí và khát vọng ngày bé, sau thời gian rèn luyện trong quân đội, tôi lại miệt mài đèn sách để chuẩn bị hành trang cho mình sau này gây dựng và giúp đỡ cho nền kinh tế nước nhà.</p>
                            <p>Ngày xuất ngũ, tôi cùng anh Bích, anh Sơn và đồng đội của mình bắt đầu “tấn công” vào mặt trận kinh tế với suy nghĩ và kế hoạch táo bạo là thành lập và phát triển công ty da giày, và “đứa con” ấy sau này đã trở thành một trong những công ty sản xuất lớn nhất Việt Nam, mang tầm quốc tế.</p>
                            <p>Tháng 9 năm 1992, nhà máy sản xuất mang tên Thái Bình Shoes đầu tiên được cấp phép hoạt động, chúng tôi vui mừng vì ước mơ của những nhà sáng lập như chúng tôi đang dần được hiện thực hoá. Với kinh nghiệm dày dạn, ý chí kiên định được tôi luyện trong môi trường quân đội đã tạo ra bước đệm vững chắc cho chúng tôi khi bắt tay vào xây dựng tập đoàn Thái Bình Shoes. Cùng đồng đội, đồng nghiệp, chúng tôi từng bước đưa TBS Group tiến gần hơn tới hoài bão đưa nền công nghiệp Việt Nam vươn xa trên trường quốc tế.</p>
                        </div>
                        <div class="item-thumb">
                            <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ccth-1.png" alt="TBS Group" class="img-fluid w-100" />
                            <div class="title font-2">“Ông Nguyễn Đức Thuấn – Chủ tịch HĐQT TBS Group”</div>
                        </div>
                    </div>
                    <div class="item section-padding pt-0">
                        <div class="item-body">
                            <p>Mang theo lý tưởng của một doanh nghiệp yêu nước, chúng tôi đã dẫn dắt TBS Group đi lên vững chãi như hình ảnh cây tre quen thuộc của đất nước Việt Nam. Với sức sống mãnh liệt, luôn phát triển vững vàng và mạnh mẽ của cây tre nơi làng quê, được thổi hồn vào chính biểu tượng thương hiệu của công ty. Cây tre xanh mang hình ảnh đại diện cho niềm tự hào dân tộc vô bờ bến của tôi nói riêng và cả những thành viên đầy nhiệt huyết trong TBS Group nói chung.</p>
                            <p>Sau hơn 30 năm nỗ lực hoạt động, TBS Group đã thực hiện được nhiệm vụ tạo việc làm cho nhiều người có cuộc sống ổn định. Chúng tôi xem nguồn nhân lực là một niềm tự hào và hãnh diện của công ty, như một nguồn tài sản quý giá, là vũ khí lợi hại cho sự phát triển của doanh nghiệp nói riêng và cả ngành công nghiệp Việt Nam nói chung. Chúng tôi mong muốn khuyến khích và hỗ trợ đào tạo để khẳng định trí tuệ Việt trên trường quốc tế.</p>
                            <p>Bắt đầu từ một nhà máy nhỏ tại Bình Dương với vỏn vẹn một xưởng may, một xưởng gò, cho đến nay, đến nay TBS Group đã khẳng định vị thế một doanh nghiệp sản xuất tầm cỡ với những đối tác lớn như Skechers, Decathon, Wolverine trong ngành giày hay Coach, Lancaster, Tory Burch trong ngành túi xách, và Damco, APL, DHL, hay Geodis trong lĩnh vực logistics. Đây không chỉ là thành công của một cá nhân, một doanh nghiệp, mà là thành công cho ngành công nghiệp nước nhà.</p>
                            <p>Trên con đường phát triển lâu dài, với sự đồng hành và nhiệt huyết của một tập thể đoàn kết, TBS Group mạnh mẽ đi lên với ”lòng Trong, chân Bền, mắt Sáng” làm nền tảng, để liên tục mang lại mỏ vàng cho khách hàng, đồng thời giúp các ngành công nghiệp Việt Nam vươn lên tầm quốc tế. Hãy cùng chúng tôi chung sức, chung lòng, chung chí hướng xây dựng tương lai!</p>
                        </div>
                        <div class="item-thumb">
                            <img src="<?= get_template_directory_uri() ?>/images/tmp/about/ccth-2.png" alt="TBS Group" class="img-fluid w-100" />
                        </div>
                    </div>
                </div>
        </div>
</section>

<section class=" animatedParent animateOnce fp-auto-height-responsive fp-noscroll section-cover section-awards section-awards-detail" data-anchor="<?= sanitize_title(__("Giải thưởng","tbs")) ?>" data-title="<?= __("Giải thưởng","tbs") ?>">
    <div class="section-content-wrapper  div_zindex">
        <div class="container-d">
            <div class="section-content-inner section-padding text-center">
                <h2 class="section-title">Giải thưởng</h2>
                <div class="section-content">Những nỗ lực của TBSGroup trong những năm qua đã được các cơ quan, tổ chức ghi nhận bằng nhiều giải thưởng danh giá uy tín trong và ngoài nước</div>
                <div class="section-slide mt-4 mt-lg-5" >
                    <div class="swiper swiper-default awards-slide-2 awards-items " >
                        <div class="swiper-wrapper">
                            <div class="swiper-slide" >
                                <div class="item">
                                    <div class="item-thumb">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-1.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="item">
                                    <div class="item-thumb">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-2.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="item">
                                    <div class="item-thumb">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-3.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="item">
                                    <div class="item-thumb">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-4.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="item">
                                    <div class="item-thumb">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-5.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide" >
                                <div class="item">
                                    <div class="item-thumb">
                                        <img src="<?= get_template_directory_uri() ?>/images/tmp/gt/gt-6.png" alt="TBS Group" class="img-fluid" />
                                    </div>
                                    <div class="item-body">
                                        <h4 class="title md">TOP THƯƠNG HIỆU MẠNH VIỆT 2024</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slide-control ">
                        <div class="swiper-pagination mt-4"></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<?php get_footer(); ?>
