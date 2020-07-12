<?php

class CarouselDetailsMetaBox
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'addCarouselMetaBoxData'));
        add_action('save_post', array($this, 'saveCarouselMetaBoxData'));
    }

    public function addCarouselMetaBoxData()
    {
        $screens = ['carousel_details'];
        foreach ($screens as $screen){
            add_meta_box(
                'carousel_details_box_id',
                'Main Title Content',
                array($this, 'addCarouselMetaBoxHtml'),
                $screen
            );
        }
    }

    public function addCarouselMetaBoxHtml($post)
    {
        $value = get_post_meta($post->ID, 'carousel_details_box_id', true);
        ?>
        <label for="main-title-text">Main Title Text</label>
        <div>
            <input type="text" name="mainTitleText" id="main-title-text" placeholder="Enter Title Text..." 
                value="<?php echo !empty($value) ? $value : ''; ?>" autocomplete="off">
        </div>
        <?php
    }

    public function saveCarouselMetaBoxData($post_id)
    {
        if(array_key_exists('mainTitleText', $_POST)){
            update_post_meta(
                $post_id,
                'carousel_details_box_id',
                $_POST['mainTitleText']
            );
        }
    }
}

?>