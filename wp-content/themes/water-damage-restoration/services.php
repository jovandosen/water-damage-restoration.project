<?php
    $ourServicesTitle = get_option('our_services_title');
    $ourServicesDescription = get_option('our_services_description');

    $sql = array('post_type' => 'our_services', 'posts_per_page' => 3);
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

?>
<div id="our-services-box">
    <div id="our-services-title">
        <h1><?php echo !empty($ourServicesTitle) ? $ourServicesTitle : 'Default Title'; ?></h1>
    </div>
    <div id="our-services-description">
        <p><?php echo !empty($ourServicesDescription) ? $ourServicesDescription : 'Default Description'; ?></p>
    </div>
    <div id="our-services-data-box">
        <div id="water-damage">
            <div id="water-damage-img-box">
                <img src="<?php echo $results[0]->image; ?>" alt="<?php echo $results[0]->title; ?>">
            </div>
            <div id="water-damage-title-box">
                <h3><?php echo $results[0]->title; ?></h3>
            </div>
            <div id="water-damage-description-box">
                <p><?php echo $results[0]->content; ?></p>
            </div>
            <div id="water-damage-read-more-box">
                <button type="button" class="read-more-btn">
                    Read more
                    <span class="read-more-arrow">&#187;</span>
                </button>
            </div>
        </div>
        <div id="storm-damage">
            <div id="storm-damage-img-box">
                <img src="<?php echo $results[1]->image; ?>" alt="<?php echo $results[1]->title; ?>">
            </div>
            <div id="storm-damage-title-box">
                <h3><?php echo $results[1]->title; ?></h3>
            </div>
            <div id="storm-damage-description-box">
                <p><?php echo $results[1]->content; ?></p>
            </div>
            <div id="storm-damage-read-more-box">
                <button type="button" class="read-more-btn">
                    Read more
                    <span class="read-more-arrow">&#187;</span>
                </button>
            </div>
        </div>
        <div id="mold-remediation">
            <div id="mold-remediation-img-box">
                <img src="<?php echo $results[2]->image; ?>" alt="<?php echo $results[2]->title; ?>">
            </div>
            <div id="mold-remediation-title-box">
                <h3><?php echo $results[2]->title; ?></h3>
            </div>
            <div id="mold-remediation-description-box">
                <p><?php echo $results[2]->content; ?></p>
            </div>
            <div id="mold-remediation-read-more-box">
                <button type="button" class="read-more-btn">
                    Read more
                    <span class="read-more-arrow">&#187;</span>
                </button>
            </div>
        </div>
    </div>
</div>