<?php get_header(); ?>
    <?php get_template_part('carousel'); ?>
    <div id="contact-container">
        <div id="contact-form-container">
            <form>
                <div id="name-container">
                    <input type="text" name="name" id="name" placeholder="* Name" autocomplete="off">
                </div>
                <div id="email-container">
                    <input type="text" name="email" id="email" placeholder="* Email" autocomplete="off">    
                </div>
                <div id="phone-number-container">
                    <input type="text" name="phoneNumber" id="phone-number" placeholder="* Phone Number" autocomplete="off">
                </div>
                <div id="short-description-container">
                    <input type="text" name="shortDescription" id="short-description" placeholder="* Short Description" autocomplete="off">
                </div>
                <div id="contact-button-container">
                    <button type="button" id="contact-button">24/7 Emergency Services</button>
                </div>
            </form>
        </div>
    </div>
<?php get_footer(); ?>        