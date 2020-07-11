            <?php
                $sql = array('post_type' => 'footer_details', 'posts_per_page' => 3);
                $query = new WP_Query($sql);

                $results = [];

                if($query->have_posts()){
                    while($query->have_posts()){
                        $query->the_post();
                        $btnText = get_post_meta(get_the_ID(), 'help_info_box_id', true);
                        $obj = new stdClass();
                        $obj->title = get_the_title();
                        $obj->content = get_the_content();
                        $obj->image = get_the_post_thumbnail_url();
                        $obj->buttonText = $btnText;
                        $results[] = $obj;
                    }
                }

            ?>
            <div id="footer-content" 
                style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/images/BG.png);">
                <div id="footer-details">
                    <div id="footer-about-us">
                        <div id="footer-about-us-image-box">
                            <img src="<?php echo $results[0]->image; ?>" alt="<?php echo $results[0]->title; ?>">
                        </div>
                        <div id="footer-about-us-data">
                            <div id="footer-about-us-title-box">
                                <h3><?php echo $results[0]->title; ?></h3>
                            </div>
                            <div id="footer-about-us-description">
                                <p><?php echo $results[0]->content; ?></p>
                            </div>
                        </div>
                    </div>
                    <div id="footer-our-services">
                        <div id="footer-our-services-image-box">
                            <img src="<?php echo $results[1]->image; ?>" alt="<?php echo $results[1]->title; ?>">
                        </div>
                        <div id="footer-our-services-data">
                            <div id="footer-our-services-title-box">
                                <h3><?php echo $results[1]->title; ?></h3>
                            </div>
                            <div id="footer-our-services-description">
                                <?php echo $results[1]->content; ?>
                            </div>
                        </div>
                    </div>
                    <div id="footer-emergency-services">
                        <div id="footer-emergency-services-image-box">
                            <img src="<?php echo $results[2]->image; ?>" alt="<?php echo $results[2]->title; ?>">
                        </div>
                        <div id="footer-emergency-services-data">
                            <div id="footer-emergency-services-title-box">
                                <h3><?php echo $results[2]->title; ?></h3>
                            </div>
                            <div id="footer-emergency-services-description">
                                <p>
                                    <?php echo $results[2]->content; ?>
                                </p>
                                <button type="button" id="request-online-help-btn-two">
                                    <?php echo $results[2]->buttonText; ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="social-media-content">
                    <div id="social-media-icons-box">
                        <div class="circle-data">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.png" alt="Facebook">
                        </div>
                        <div class="circle-data">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/twitter.png" alt="Twitter">
                        </div>
                        <div class="circle-data">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.png" alt="Instagram">
                        </div>
                    </div>
                    <div id="copy-right-box">
                        <p id="copy-right-text-one">&copy;2020 - </p>
                        <p id="copy-right-text-two">Water Restoration</p>
                    </div>
                </div>
            </div>
        <?php wp_footer(); ?>
    </body>
</html>