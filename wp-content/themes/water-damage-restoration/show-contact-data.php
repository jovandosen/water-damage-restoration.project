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
                    <tr class="contact-table-rows">
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