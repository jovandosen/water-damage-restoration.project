<?php

    $connection = new \mysqli('localhost', 'root', '', 'water_damage_restoration');

    if($connection->connect_error){
        die('Error while connecting: ' . $connection->connect_error);
    }

    $sql = "SELECT * FROM wp_contact_details";

    $details = $connection->query($sql);

?>
<div id="contact-details-list-title">
    <h1>Contact Details</h1>
</div>
<div id="contact-details-table-box">
    <?php if($details->num_rows > 0): ?>
        <table>
            <thead>
                <tr id="contact-table-header">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = mysqli_fetch_object($details)): ?>
                    <tr class="contact-table-rows" title="Click on table row to update contact details.">
                        <td><?php echo $row->name; ?></td>
                        <td><?php echo $row->email; ?></td>
                        <td><?php echo $row->phone; ?></td>
                        <td><?php echo $row->description; ?></td>
                        <td class="contact-actions-box">
                            <button class="delete-contact-data-button" id="<?php echo $row->id; ?>">
                                delete
                            </button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <h3>No Contact Details Found.</h3>    
    <?php endif; ?>
</div>
<div id="update-contact-details">
    <?php if($details->num_rows > 0): ?>
        <div id="update-contact-details-form-box">
            <div id="help-information">
                <h3>Click on table row to update contact details</h3>
            </div>
            <form action="#">
                <div id="update-contact-details-name-box">
                    <input type="text" name="conName" id="con-name" autocomplete="off" placeholder="Name...">
                </div>
                <div id="update-contact-details-email-box">
                    <input type="text" name="conEmail" id="con-email" autocomplete="off" placeholder="Email...">
                </div>
                <div id="update-contact-details-phone-box">
                    <input type="text" name="conPhone" id="con-phone" autocomplete="off" placeholder="Phone...">
                </div>
                <div id="update-contact-details-description-box">
                    <textarea name="conDescription" id="con-description" autocomplete="off" placeholder="Description..." rows="5"></textarea>
                </div>
                <div id="update-contact-details-button-box">
                    <button type="button" id="update-contact-btn">UPDATE</button>
                    <button type="button" id="clear-form-btn">CLEAR FORM</button>
                </div>
                <input type="hidden" name="conId" id="con-id">
            </form>
        </div>
    <?php endif; ?>    
</div>