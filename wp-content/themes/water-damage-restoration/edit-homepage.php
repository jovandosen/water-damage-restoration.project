<?php
    $ourServicesTitle = get_option('our_services_title');
    $ourServicesDescription = get_option('our_services_description');
?>
<div id="edit-homepage-data-container">
    <div id="edit-homepage-our-services">
        <div id="edit-homepage-our-services-title-box">
            <h1>Our Services</h1>
        </div>
        <div id="our-services-form-box">
            <form action="#" id="our-services-form">
                <div id="our-services-title-label-box">
                    <label for="our-services-title">Our Services Title</label>
                </div>
                <div id="our-services-title-box">
                    <input type="text" name="ourServicesTitle" id="our-services-title" placeholder="Enter Our Services Title..." autocomplete="off" value="<?php echo !empty($ourServicesTitle) ? $ourServicesTitle : ''; ?>">
                </div>
                <div id="our-services-description-label-box">
                    <label for="our-services-description">Our Services Description</label>
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
</div>