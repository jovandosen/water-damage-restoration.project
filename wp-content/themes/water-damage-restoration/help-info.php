<?php
    $sql = array('post_type' => 'help_infos', 'posts_per_page' => 2);
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
<div id="help-info-box">
    <div id="help-info-content-box">
        <div id="message-box">
            <p>
                <img src="<?php echo $results[0]->image; ?>" alt="<?php echo $results[0]->title; ?>">
                <strong><?php echo $results[0]->content; ?></strong>
            </p>
        </div>
        <div id="phone-number-help-box">
            <p>
                <img src="<?php echo $results[1]->image; ?>" alt="<?php echo $results[1]->title; ?>">
                <strong><?php echo $results[1]->title; ?></strong>
            </p>
            <button type="button" id="request-online-help-btn"><?php echo $results[1]->buttonText; ?></button>
        </div>
    </div>
</div>