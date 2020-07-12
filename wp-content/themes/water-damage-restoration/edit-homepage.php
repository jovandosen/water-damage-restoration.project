<?php
    $ourServicesTitle = get_option('our_services_title');
    $ourServicesDescription = get_option('our_services_description');
    $aboutUsTitle = get_option('about_us_title');
    $emergencyTitle = get_option('emergency_title');
    $copyRightText = get_option('copy_right_text');
?>
<div id="edit-homepage-data-container">
    <div id="edit-homepage-our-services">
        <div id="edit-homepage-our-services-title-box">
            <h1>Our Services</h1>
        </div>
        <div id="our-services-form-box">
            <form action="#" id="our-services-form">
                <div id="our-services-title-label-box">
                    <label for="our-services-title"><font color="red">*</font>Our Services Title</label>
                </div>
                <div id="our-services-title-box">
                    <input type="text" name="ourServicesTitle" id="our-services-title" placeholder="Enter Our Services Title..." autocomplete="off" value="<?php echo !empty($ourServicesTitle) ? $ourServicesTitle : ''; ?>">
                </div>
                <div id="our-services-description-label-box">
                    <label for="our-services-description"><font color="red">*</font>Our Services Description</label>
                </div>
                <div id="our-services-description-box">
                    <textarea name="ourServicesDescription" id="our-services-description" placeholder="Enter Our Services Description..." autocomplete="off" rows="5"><?php echo !empty($ourServicesDescription) ? $ourServicesDescription : ''; ?></textarea>
                </div>
                <div id="our-services-button-box">
                    <button type="button" id="publish-our-services-data">PUBLISH</button>
                </div>
            </form>
        </div>
    </div>
    <div id="edit-homepage-about-us">
        <div id="edit-homepage-about-us-title-box">
            <h1>About Us</h1>
        </div>
        <div id="about-us-form-box">
            <form action="#">
                <div id="about-us-title-label-box">
                    <label><font color="red">*</font>About Us Title</label>
                </div>
                <div id="about-us-title-box">
                    <input type="text" name="aboutUsTitle" id="about-us-title" placeholder="Enter About Us Title..." autocomplete="off" value="<?php echo !empty($aboutUsTitle) ? $aboutUsTitle : ''; ?>">
                </div>
                <div id="about-us-button-box">
                    <button type="button" id="publish-about-us-data">PUBLISH</button>
                </div>
            </form>
        </div>
    </div>
    <div id="edit-homepage-emergency">
        <div id="edit-homepage-emergency-title-box">
            <h1>In Case of Emergency</h1>
        </div>
        <div id="emergency-form-box">
            <form action="#">
                <div id="emergency-title-label-box">
                    <label for="emergency"><font color="red">*</font>In Case of Emergency Title</label>
                </div>
                <div id="emergency-title-box">
                    <input type="text" name="emergency" id="emergency" placeholder="Enter Emergency Title..." autocomplete="off" value="<?php echo !empty($emergencyTitle) ? $emergencyTitle : ''; ?>">
                </div>
                <div id="emergency-button-box">
                    <button type="button" id="publish-emergency-data">PUBLISH</button>
                </div>
            </form>
        </div>
    </div>
    <div id="edit-homepage-copy-right-text">
        <div id="edit-homepage-copy-right-title-box">
            <h1>Copy Right Content</h1>
        </div>
        <div id="copy-right-form-box">
            <form action="#">
                <div id="copy-right-title-label-box">
                    <label for="copy-right-text"><font color="red">*</font>Copy Right Text</label>
                </div>
                <div id="copy-right-box">
                    <input type="text" name="copyRightText" id="copy-right-text" placeholder="Enter Copy Right Text..." autocomplete="off" value="<?php echo !empty($copyRightText) ? $copyRightText : ''; ?>">
                </div>
                <div id="copy-right-button-box">
                    <button type="button" id="publish-copy-right-data">PUBLISH</button>
                </div>
            </form>
        </div>
    </div>
</div>