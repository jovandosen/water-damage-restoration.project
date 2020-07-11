<?php

class OurServicesMetaBox
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'addMetaBox'));
        add_action('save_post', array($this, 'saveMetaBoxData'));
    }

    public function addMetaBox()
    {
        $screens = ['our_services'];
        foreach ($screens as $screen){
            add_meta_box(
                'box_id',
                'Our Services Button Text',
                array($this, 'addMetaBoxHtml'),
                $screen
            );
        }
    }

    public function addMetaBoxHtml($post)
    {
        $value = get_post_meta($post->ID, 'box_id', true);
        ?>
        <label for="button-text">Button Text</label>
        <div>
            <input type="text" name="buttonText" id="button-text" placeholder="Enter Button Text..." 
                value="<?php echo !empty($value) ? $value : ''; ?>" autocomplete="off">
        </div>
        <?php
    }

    public function saveMetaBoxData($post_id)
    {
        if(array_key_exists('buttonText', $_POST)){
            update_post_meta(
                $post_id,
                'box_id',
                $_POST['buttonText']
            );
        }
    }
}

?>