<?php

class HelpInfoMetaBox
{
    public function __construct()
    {
        add_action('add_meta_boxes', array($this, 'addMetaBoxData'));
        add_action('save_post', array($this, 'saveHelpMetaBoxData'));
    }

    public function addMetaBoxData()
    {
        $screens = ['help_infos', 'footer_details', 'carousel_details'];
        foreach ($screens as $screen){
            add_meta_box(
                'help_info_box_id',
                'Help Info Button Text',
                array($this, 'addHelpMetaBoxHtml'),
                $screen
            );
        }
    }

    public function addHelpMetaBoxHtml($post)
    {
        $value = get_post_meta($post->ID, 'help_info_box_id', true);
        ?>
        <label for="button-text">Button Text</label>
        <div>
            <input type="text" name="helpInfoBtnText" id="help-info-btn" placeholder="Enter Button Text..." 
                value="<?php echo !empty($value) ? $value : ''; ?>" autocomplete="off">
        </div>
        <?php
    }

    public function saveHelpMetaBoxData($post_id)
    {
        if(array_key_exists('helpInfoBtnText', $_POST)){
            update_post_meta(
                $post_id,
                'help_info_box_id',
                $_POST['helpInfoBtnText']
            );
        }
    }
}

?>