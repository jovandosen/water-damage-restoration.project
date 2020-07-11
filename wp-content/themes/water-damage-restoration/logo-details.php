<?php
    $sql = array('post_type' => 'logo_details', 'posts_per_page' => 4);
    $query = new WP_Query($sql);

    $results = [];

    if($query->have_posts()){
        while($query->have_posts()){
            $query->the_post();
            $obj = new stdClass();
            $obj->title = get_the_title();
            $obj->image = get_the_post_thumbnail_url();
            $results[] = $obj;
        }
    }

?>
<div id="main-logo-box">
    <div id="main-logo-content">
        <div id="iicrc-box">
            <img src="<?php echo $results[0]->image; ?>" alt="<?php echo $results[0]->title; ?>">
        </div>
        <div id="bbb-box">
            <img src="<?php echo $results[1]->image; ?>" alt="<?php echo $results[1]->title; ?>">
        </div>
        <div id="eaa-box">
            <img src="<?php echo $results[2]->image; ?>" alt="<?php echo $results[2]->title; ?>">
        </div>
        <div id="icra-box">
            <img src="<?php echo $results[3]->image; ?>" alt="<?php echo $results[3]->title; ?>">
        </div>
    </div>
</div>