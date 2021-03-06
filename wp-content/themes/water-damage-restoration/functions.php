<?php

function loadAssets()
{
    wp_enqueue_style( 'appcss', get_template_directory_uri() . '/assets/css/app.css', array(), '1.1', 'all');
    wp_enqueue_style( 'servicescss', get_template_directory_uri() . '/assets/css/services.css', array(), '1.1', 'all');
    wp_enqueue_style( 'aboutcss', get_template_directory_uri() . '/assets/css/about.css', array(), '1.1', 'all');
    wp_enqueue_style( 'emergencycss', get_template_directory_uri() . '/assets/css/emergency.css', array(), '1.1', 'all');
    wp_enqueue_style( 'helpinfocss', get_template_directory_uri() . '/assets/css/helpinfo.css', array(), '1.1', 'all');
    wp_enqueue_style( 'logodetailscss', get_template_directory_uri() . '/assets/css/logodetails.css', array(), '1.1', 'all');
    wp_enqueue_style( 'footercss', get_template_directory_uri() . '/assets/css/footer.css', array(), '1.1', 'all');
    wp_enqueue_script( 'appjs', get_template_directory_uri() . '/assets/js/app.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'carouseljs', get_template_directory_uri() . '/assets/js/carousel.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script( 'contactdatajs', get_template_directory_uri() . '/assets/js/contact-data.js', array ( 'jquery' ), 1.1, true);

    $nonceProtection = wp_create_nonce('protect_contact_data');

    wp_localize_script(
        'contactdatajs', 
        'contact_form_obj', 
        [
            'url' => admin_url('admin-ajax.php'),
            'nonce' => $nonceProtection
        ]
    );

    $sql = array('post_type' => 'carousel_details', 'posts_per_page' => 2);
    $query = new WP_Query($sql);

    $results = [];

    if($query->have_posts()){
        while($query->have_posts()){
            $query->the_post();
            $mainTitle = get_post_meta(get_the_ID(), 'carousel_details_box_id', true);
            $btnText = get_post_meta(get_the_ID(), 'help_info_box_id', true);
            $obj = new stdClass();
            $obj->titleOne = $mainTitle;
            $obj->titleTwo = get_the_title();
            $obj->description = get_the_content();
            $obj->img = get_the_post_thumbnail_url();
            $obj->buttonText = $btnText;
            $results[] = $obj;
        }
    }

    $templateDetails = array('carouselResults' => $results);
    wp_localize_script('carouseljs', 'themeData', $templateDetails);
}

add_action('wp_enqueue_scripts', 'loadAssets');

function homepageTitle($title)
{
    if(empty($title) && (is_home() || is_front_page())){
        $title = __('Home', 'water-damage-restoration');
    }
    return $title;
}

add_filter('wp_title', 'homepageTitle');

function themeSettings()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    $logoDefaultSettings = array(
        'height' => 50,
        'width' => 50,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array('site-title', 'site-description'),
    );

    add_theme_support('custom-logo', $logoDefaultSettings);
}

add_action('after_setup_theme', 'themeSettings');

function registerNavigationMenus()
{
    register_nav_menus(array(
        'navigation-menu' => __('Navigation Menu')
    ));
}

add_action('init', 'registerNavigationMenus');

function registerHomepageEditScreen()
{
    add_menu_page(
        __('Edit Homepage Data', 'water-damage-restoration'),
        __('Edit Homepage', 'water-damage-restoration'),
        'manage_options',
        'edit-homepage-data',
        'showHomepageEditContent'
    );
}

function showHomepageEditContent()
{
    include( get_template_directory() . '/edit-homepage.php' );
}

add_action('admin_menu', 'registerHomepageEditScreen');

function registerContactEditScreen()
{
    add_menu_page(
        __('Contact Form Details', 'water-damage-restoration'),
        __('View Contact Data', 'water-damage-restoration'),
        'manage_options',
        'view-contact-data',
        'showContactContent'
    );
}

function showContactContent()
{
    include( get_template_directory() . '/show-contact-data.php' );
}

add_action('admin_menu', 'registerContactEditScreen');

function loadAdminAssets()
{
    wp_register_style('edit_contact_admin_css', get_template_directory_uri() . '/assets/css/edit-contact-admin.css', false, '1.0.0');
    wp_enqueue_style('edit_contact_admin_css');
    wp_enqueue_script('edit_contact_admin_js', get_template_directory_uri() . '/assets/js/edit-contact-admin.js', array ( 'jquery' ), 1.1, true);
    $contactNonce = wp_create_nonce('edit_contact_nonce');
    wp_localize_script(
        'edit_contact_admin_js', 
        'edit_contact_admin_js_obj', 
        [
            'url' => admin_url('admin-ajax.php'),
            'nonce' => $contactNonce
        ]
    );
    wp_register_style('edit_homepage_admin_css', get_template_directory_uri() . '/assets/css/edit-homepage-admin.css', false, '1.0.0');
    wp_enqueue_style('edit_homepage_admin_css');
    wp_enqueue_script('edit_homepage_admin_js', get_template_directory_uri() . '/assets/js/edit-homepage-admin.js', array ( 'jquery' ), 1.1, true);
    $nonce = wp_create_nonce('nonce_data');
    wp_localize_script(
        'edit_homepage_admin_js', 
        'edit_homepage_admin_js_obj', 
        [
            'url' => admin_url('admin-ajax.php'),
            'nonce' => $nonce
        ]
    );
}

add_action('admin_enqueue_scripts', 'loadAdminAssets');

function publishOurServicesDetails()
{
    check_ajax_referer('nonce_data');
    
    $ourServicesTitle = trim($_POST["ourServicesTitle"]);
    $ourServicesDescription = trim($_POST["ourServicesDescription"]);
    
    if(!empty($ourServicesTitle)){
        $titleResult = update_option('our_services_title', $ourServicesTitle);
    }

    if(!empty($ourServicesDescription)){
        $descriptionResult = update_option('our_services_description', $ourServicesDescription);
    }

    echo "published";

    die();
}

add_action('wp_ajax_publish_our_services_data', 'publishOurServicesDetails');

function publishAboutUsDetails()
{
    check_ajax_referer('nonce_data');

    $aboutUsTitle = trim($_POST["aboutUsTitle"]);

    if(!empty($aboutUsTitle)){
        $aboutUsResult = update_option('about_us_title', $aboutUsTitle);
    }

    echo "published";

    die();
}

add_action('wp_ajax_publish_about_us_data', 'publishAboutUsDetails');

function publishEmergencyDetails()
{
    check_ajax_referer('nonce_data');

    $emergencyTitle = trim($_POST["emergencyTitle"]);

    if(!empty($emergencyTitle)){
        $emergencyResult = update_option('emergency_title', $emergencyTitle);
    }

    echo "published";

    die();
}

add_action('wp_ajax_publish_emergency_data', 'publishEmergencyDetails');

function publishCopyRightDetails()
{
    check_ajax_referer('nonce_data');

    $copyRightText = trim($_POST["copyRightText"]);

    if(!empty($copyRightText)){
        $copyRightResult = update_option('copy_right_text', $copyRightText);
    }

    echo "published";

    die();
}

add_action('wp_ajax_publish_copy_right_data', 'publishCopyRightDetails');

function addContactFormData()
{
    check_ajax_referer('protect_contact_data');

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $phoneNumber = trim($_POST["phoneNumber"]);
    $shortDescription = trim($_POST["shortDescription"]);

    $nameError = '';
    $emailError = '';
    $phoneNumberError = '';
    $shortDescriptionError = '';
    $dataError = false;

    if(empty($name)){
        $nameError = 'Name Required.';
        $dataError = true;
    }

    if(empty($email)){
        $emailError = 'Email Required.';
        $dataError = true;
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailError = 'Invalid Email.';
        $dataError = true;
    }

    if(empty($phoneNumber)){
        $phoneNumberError = 'Phone Required.';
        $dataError = true;
    } else{
        $phoneValid = validatePhoneNumber($phoneNumber);
        if(!$phoneValid){
            $phoneNumberError = 'Invalid Phone.';
            $dataError = true;
        }
    }

    if(empty($shortDescription)){
        $shortDescriptionError = 'Description Required.';
        $dataError = true;
    }

    if($dataError === false){
        
        $connection = new \mysqli('localhost', 'root', '', 'water_damage_restoration');

        if($connection->connect_error){
            die('Error while connecting: ' . $connection->connect_error);
        }

        $contactSql = "INSERT INTO wp_contact_details(name, email, phone, description, created) VALUES(?, ?, ?, ?, ?)";

        $preparedSql = $connection->prepare($contactSql);

        $currentDateTime = date('Y-m-d H:i:s');

        $preparedSql->bind_param("sssss", $name, $email, $phoneNumber, $shortDescription, $currentDateTime);

        $contactResult = $preparedSql->execute();

        echo $contactResult;

    }

    die();
}

add_action('wp_ajax_contact_form_data', 'addContactFormData');

function validatePhoneNumber($phone)
{   
    return preg_match("/^(\d+-?)+\d+$/", $phone);
}

function addSideContactFormData()
{
    check_ajax_referer('protect_contact_data');

    $contactName = trim($_POST["contactName"]);
    $contactEmail = trim($_POST["contactEmail"]);
    $contactPhoneNumber = trim($_POST["contactPhoneNumber"]);
    $contactDescription = trim($_POST["contactDescription"]);

    $contactNameError = '';
    $contactEmailError = '';
    $contactPhoneNumberError = '';
    $contactDescriptionError = '';
    $contactDataError = false;

    if(empty($contactName)){
        $contactNameError = 'Name Required.';
        $contactDataError = true;
    }

    if(empty($contactEmail)){
        $contactEmailError = 'Email Required.';
        $contactDataError = true;
    } elseif(!filter_var($contactEmail, FILTER_VALIDATE_EMAIL)){
        $contactEmailError = 'Invalid Email.';
        $contactDataError = true;
    }

    if(empty($contactPhoneNumber)){
        $contactPhoneNumberError = 'Phone Required.';
        $contactDataError = true;
    } else{
        $phoneNumberValid = validatePhoneNumber($contactPhoneNumber);
        if(!$phoneNumberValid){
            $contactPhoneNumberError = 'Invalid Phone.';
            $contactDataError = true;
        }
    }

    if(empty($contactDescription)){
        $contactDescriptionError = 'Description Required.';
        $contactDataError = true;
    }

    if($contactDataError === false){

        $connection = new \mysqli('localhost', 'root', '', 'water_damage_restoration');

        if($connection->connect_error){
            die('Error while connecting: ' . $connection->connect_error);
        }

        $contactSql = "INSERT INTO wp_contact_details(name, email, phone, description, created) VALUES(?, ?, ?, ?, ?)";

        $preparedSql = $connection->prepare($contactSql);

        $currentDateTime = date('Y-m-d H:i:s');

        $preparedSql->bind_param("sssss", $contactName, $contactEmail, $contactPhoneNumber, $contactDescription, $currentDateTime);

        $contactResult = $preparedSql->execute();

        echo $contactResult;

    }

    die();
}

add_action('wp_ajax_side_contact_form_data', 'addSideContactFormData');

function deleteContactDetails()
{
    check_ajax_referer('edit_contact_nonce');

    $id = (int) $_POST["contactDetailsId"];

    $connection = new \mysqli('localhost', 'root', '', 'water_damage_restoration');

    if($connection->connect_error){
        die('Error while connecting: ' . $connection->connect_error);
    }

    $sql = "DELETE FROM wp_contact_details WHERE id=?";

    $deleteData = $connection->prepare($sql);

    $deleteData->bind_param("i", $id);

    $deleteResult = $deleteData->execute();

    if($deleteResult){
        echo "deleted";
    } else {
        echo "not deleted";
    }

    die();
}

add_action('wp_ajax_delete_contact_details', 'deleteContactDetails');

function updateContactDetails()
{
    check_ajax_referer('edit_contact_nonce');

    $conName = trim($_POST["conName"]);
    $conEmail = trim($_POST["conEmail"]);
    $conPhone = trim($_POST["conPhone"]);
    $conDescription = trim($_POST["conDescription"]);
    $conId = (int) $_POST["conId"];

    $conNameError = '';
    $conEmailError = '';
    $conPhoneError = '';
    $conDescriptionError = '';
    $conError = false;

    if(empty($conName)){
        $conNameError = 'Name Required.';
        $conError = true;
    }

    if(empty($conEmail)){
        $conEmailError = 'Email Required.';
        $conError = true;
    } elseif(!filter_var($conEmail, FILTER_VALIDATE_EMAIL)){
        $conEmailError = 'Invalid Email.';
        $conError = true;
    }

    if(empty($conPhone)){
        $conPhoneError = 'Phone Required.';
        $conError = true;
    } else{
        $conPhoneNumberValid = validatePhoneNumber($conPhone);
        if(!$conPhoneNumberValid){
            $conPhoneError = 'Invalid Phone.';
            $conError = true;
        }
    }

    if(empty($conDescription)){
        $conDescriptionError = 'Description Required.';
        $conError = true;
    }

    if($conError === false){

        $connection = new \mysqli('localhost', 'root', '', 'water_damage_restoration');

        if($connection->connect_error){
            die('Error while connecting: ' . $connection->connect_error);
        }

        $updateSql = "UPDATE wp_contact_details SET name=?, email=?, phone=?, description=? WHERE id=?";

        $updateData = $connection->prepare($updateSql);

        $updateData->bind_param("ssssi", $conName, $conEmail, $conPhone, $conDescription, $conId);

        $updateResult = $updateData->execute();

        if($updateResult){
            echo "updated";
        } else {
            echo "not updated";
        }

    }

    die();
}

add_action('wp_ajax_update_contact_details', 'updateContactDetails');

?>