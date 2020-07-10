<?php
    $ourServicesTitle = get_option('our_services_title');
    $ourServicesDescription = get_option('our_services_description');
?>
<div id="our-services-box">
    <div id="our-services-title">
        <h1><?php echo !empty($ourServicesTitle) ? $ourServicesTitle : 'Default Title'; ?></h1>
    </div>
    <div id="our-services-description">
        <p><?php echo !empty($ourServicesDescription) ? $ourServicesDescription : 'Default Description'; ?></p>
    </div>
    <div id="our-services-data-box">
        <div id="water-damage">
            <div id="water-damage-img-box">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Water.png" alt="Water Damage">
            </div>
            <div id="water-damage-title-box">
                <h3>WATER Damage</h3>
            </div>
            <div id="water-damage-description-box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div id="water-damage-read-more-box">
                <button type="button" class="read-more-btn">
                    Read more
                    <span class="read-more-arrow">&#187;</span>
                </button>
            </div>
        </div>
        <div id="storm-damage">
            <div id="storm-damage-img-box">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Storm.png" alt="Storm Damage">
            </div>
            <div id="storm-damage-title-box">
                <h3>STORM Damage</h3>
            </div>
            <div id="storm-damage-description-box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div id="storm-damage-read-more-box">
                <button type="button" class="read-more-btn">
                    Read more
                    <span class="read-more-arrow">&#187;</span>
                </button>
            </div>
        </div>
        <div id="mold-remediation">
            <div id="mold-remediation-img-box">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/Mold.png" alt="Mold Remediation">
            </div>
            <div id="mold-remediation-title-box">
                <h3>MOLD Remediation</h3>
            </div>
            <div id="mold-remediation-description-box">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>
            <div id="mold-remediation-read-more-box">
                <button type="button" class="read-more-btn">
                    Read more
                    <span class="read-more-arrow">&#187;</span>
                </button>
            </div>
        </div>
    </div>
</div>