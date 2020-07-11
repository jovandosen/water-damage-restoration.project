<?php
    $emergencyTitle = get_option('emergency_title');

    $sql = array('post_type' => 'emergencies', 'posts_per_page' => 2);
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
<div id="emergency-box">
    <div id="emergency-title-box">
        <h1><?php echo !empty($emergencyTitle) ? $emergencyTitle : 'Default Title'; ?></h1>
    </div>
    <div id="emergency-details-box">
        <div id="emergency-do-box">
            <div id="do-title">
                <img src="<?php echo $results[0]->image; ?>" alt="<?php echo $results[0]->title; ?>">
                <h3><?php echo $results[0]->title; ?></h3>
            </div>
            <div id="do-list">
                <?php echo $results[0]->content; ?>
            </div>
        </div>
        <div id="emergency-dont-box">
            <div id="dont-title">
                <img src="<?php echo $results[1]->image; ?>" alt="<?php echo $results[1]->title; ?>">
                <h3><?php echo $results[1]->title; ?></h3>
            </div>
            <div id="dont-list">
                <?php echo $results[1]->content; ?>
            </div>
        </div>
    </div>
</div>