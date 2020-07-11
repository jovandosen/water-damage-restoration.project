<?php
    $sql = array('post_type' => 'about_us', 'posts_per_page' => 3);
    $query = new WP_Query($sql);

    $results = [];

    if($query->have_posts()){
        while($query->have_posts()){
            $query->the_post();
            $obj = new stdClass();
            $obj->title = get_the_title();
            $obj->content = get_the_content();
            $obj->image = get_the_post_thumbnail_url();
            $results[] = $obj;
        }
    }

    $aboutUsTitle = get_option('about_us_title');

?>
<div id="about-us-box">
    <div id="about-us-title-box">
        <h1><?php echo !empty($aboutUsTitle) ? $aboutUsTitle : 'Default Title'; ?></h1>
    </div>
    <div id="about-us-data">
        <div id="professionals-box">
            <div id="professionals-image-box">
                <img src="<?php echo $results[0]->image; ?>" alt="<?php echo $results[0]->title; ?>">
            </div>
            <div id="professionals-details">
                <div id="professionals-details-title">
                    <h3><?php echo $results[0]->title; ?></h3>
                </div>
                <div id="professionals-details-description">
                    <p><?php echo $results[0]->content; ?></p>
                </div>
            </div>
        </div>
        <div id="trusted-box">
            <div id="trusted-image-box">
                <img src="<?php echo $results[1]->image; ?>" alt="<?php echo $results[1]->title; ?>">
            </div>
            <div id="trusted-details">
                <div id="trusted-details-title">
                    <h3><?php echo $results[1]->title; ?></h3>
                </div>
                <div id="trusted-details-description">
                    <p><?php echo $results[1]->content; ?></p>
                </div>
            </div>
        </div>
        <div id="our-equipment-box">
            <div id="our-equipment-image-box">
                <img src="<?php echo $results[2]->image; ?>" alt="<?php echo $results[2]->title; ?>">
            </div>
            <div id="our-equipment-details">
                <div id="our-equipment-details-title">
                    <h3><?php echo $results[2]->title; ?></h3>
                </div>
                <div id="our-equipment-details-description">
                    <p><?php echo $results[2]->content; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>