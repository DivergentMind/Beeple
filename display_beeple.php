<?php require_once('load.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
        <title>HTML Form Tutorial - Display</title>
    </head>
    <body style="max-width: 900px;">
        <?php
        // Connect to database
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        // Select data
        $resource = $mysql->query("SELECT * FROM users");
        
        // Loop and fetch
        while($row = $resource->fetch_object()) {
        	$results[] = $row;
        }
        ?>
        
        <table>
            <thead>
                <tr>
                    <th>Hive ID</th>
                    <th>Date</th>
                    <th>Who Worked Hive</th>
                    <th>Location</th>
                    <th>Deeps</th>
                    <th>Mediums</th>
                    <th>Shallows</th>
                    
                    <th>Hive Temperament</th>
                    
                    <th>Saw Queen</th>
                    <th>Marked</th>
                    <th>Color</th>
                    <th>Rough Age of Queen</th>
                    
                    <th>Laying Pattern</th>
                    
                    <th>Eggs Seen</th>
                    <th>Comments:</th>
                    
                    <th>Population</th>
                    <th>Crowded</th>
                    
                    <th>Excesive Drone Cells</th>
                    <th>Comments:</th>
                    
                    <th>Queen Cells</th>
                    <th>Along frame bottom (swarm cells):#</th>
                    <th>Converted worker cell (supraceedure or emergency cells):#</th>
                    
                    <th>Food Stores-Honey</th>
                    <th>Food Stores-Pollen</th>
                    
                    <th>Hive Condition</th>
                    <th>Other:</th>
                    
                    <th>Mite Check</th>
                    <th>Sampling Method</th>
                    <th>Mite Count</th>
                    <th>Mite Treatment</th>
                    <th>Treatment Type</th>
                    <th>Other:</th>
                    <th>Remove/Tend Treatment</th>
                    <th>Other Problems:</th>
                    <th>Other Treatments:</th>
                    <th>Comments:</th>
                    
                    <th>Actions Taken</th>
                    <th>How many frames?</th>
                    <th>New Hive #</th>
                    <th>Other:</th>
                    
                    <th>Recommendations:</th>
                    <th>Other:</th>
                    <th>Comments:</th>
                    <th>Other:</th>
                    
                    <th>General Comments:</th>   
                    
                </tr>
            </thead>
<!--------------------- Much of the table is still left over from the tutorial sourcecode. I want to pin down lable names before continuing.

            <tbody>
                <?php foreach ( $results as $result ) : ?>
                    <tr>
                        <td><?php _e($result->name); ?></td>
                        <td><?php _e($result->email); ?></td>
                        <td><?php _e($result->frequency); ?></td>
                        <td><?php _e(implode(', ', unserialize($result->interests))); ?></td>
                        <td><?php _e($result->country); ?></td>
                        <td><?php _e($result->comment); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Frequency</th>
                    <th>Interests</th>
                    <th>Country</th>
                    <th>Message</th>
                </tr>
            </tfoot>
-->
        </table>
    </body>
</html>