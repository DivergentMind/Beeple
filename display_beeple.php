<?php require_once('load_beeple.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="style.css">
        <title>Beeple</title>
    </head>
    <body>
        <?php
        // Connect to database
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        
        // Select data
        $resource = $mysql->query("SELECT * FROM beeple_table");
        
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
                    <th>Worker</th>
                    <th>Location</th>
                    <th>Deeps</th>
                    <th>Mediums</th>
                    <th>Shallows</th>
                    
                    <th>Hive Temperament</th>
                    
                    <th>Saw Queen</th>
                    <th>Queen Marked</th>
                    <th>Mark Color</th>
                    <th>Age</th>
                    
                    <th>Laying Pattern</th>
                    
                    <th>Eggs Seen</th>
                    <th>Comments:</th>
                    
                    <th>Population</th>
                    <th>Crowded</th>
                    
                    <th>Excesive Drone Cells</th>
                    <th>Comments:</th>
                    
                    <th>Queen Cells</th>
                    <th>Swarm Cells</th>
                    <th>Supraceedure Cells</th>
                    
                    <th>Honey Stores</th>
                    <th>Pollen Stores</th>
                    
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
                    <th>Comments:</th>
                    <th>Other Treatments:</th>
                    <th>Comments:</th>
                    
                    <th>Hive Death</th>
                    <th>Suspected Cause:</th>
                                        
                    <th>Actions Taken</th>
                    <th>Comb Removed</th>
                    <th>Honey Harvested</th>
                    <th>New Hive Number</th>
                    <th>Merged Hive Number</th>
                    <th>Other:</th>
                    
                    <th>Recommendations:</th>
                    <th>Other:</th>
                    <th>Comments:</th>
                                        
                    <th>General Comments:</th>                      
                </tr>
            </thead>

            <tbody>
                <?php foreach ( $results as $result ) : ?>
                    <tr>
                        <td><?php _e($result->HiveID); ?></td>
                        <td><?php _e($result->Date); ?></td>
                        <td><?php _e($result->Worker); ?></td>
                        <td><?php _e($result->Loc); ?></td>
                        <td><?php _e($result->NumOfDeeps); ?></td>
                        <td><?php _e($result->NumOfMediums); ?></td>
                        <td><?php _e($result->NumOfShallows); ?></td>
                        <td><?php _e($result->Temperament); ?></td>
                        <td><?php _e($result->QueenSeen); ?></td>
                        <td><?php _e($result->QueenMarked); ?></td>
                        <td><?php _e($result->QueenColor); ?></td>
                        <td><?php _e($result->QueenAge); ?></td>
                        <td><?php _e($result->LayingPattern); ?></td>
                        <td><?php _e($result->EggsSeen); ?></td>
                        <td><?php _e($result->EggComments); ?></td>
                        <td><?php _e($result->Population); ?></td>
                        <td><?php _e($result->Crowded); ?></td>
                        <td><?php _e($result->ExcesiveDrone); ?></td>
                        <td><?php _e($result->DroneComments); ?></td>
                        <td><?php _e($result->QueenCells); ?></td>
                        <td><?php _e($result->SwarmCellNum); ?></td>
                        <td><?php _e($result->SupraCellNum); ?></td>
                        <td><?php _e($result->HoneyStores); ?></td>
                        <td><?php _e($result->PollenStores); ?></td>
                        
                        <td><?php if ( ! empty ( $result->HiveCdns )){
                                    _e(implode(', ', unserialize($result->HiveCdns)));
}
                                else {
                                    _e('');                            
}?></td> 
                    
                        <td><?php _e($result->HiveCdnOtherText); ?></td>
                        <td><?php _e($result->MiteCheck); ?></td>
                        <td><?php _e($result->SamplingMethod); ?></td>
                        <td><?php _e($result->MiteCount); ?></td>
                        <td><?php _e($result->MiteTreat); ?></td>
                        <td><?php _e($result->MiteTreatType); ?></td>
                        <td><?php _e($result->MiteTreatOtherText); ?></td>
                        <td><?php _e($result->TreatRemoveDate); ?></td>
                        
                        <td><?php if ( ! empty ( $result->OtherProbs )){
                                    _e(implode(', ', unserialize($result->OtherProbs)));
}
                                else {
                                    _e('');                            
}?></td> 
                        
                        
                        
                        <td><?php _e($result->OtherProbOtherText); ?></td>
                        <td><?php _e($result->OtherProbTreat); ?></td>
                        <td><?php _e($result->OtherProbComments); ?></td>
                        <td><?php _e($result->Dead); ?></td>
                        <td><?php _e($result->DeadComments); ?></td>
                        
                        <td><?php if ( ! empty ( $result->Actions )){
                                    _e(implode(', ', unserialize($result->Actions)));
}
                                else {
                                    _e('');                            
}?></td>
                        
                        
                        <td><?php _e($result->ActionsRemoveCombNumber); ?></td>             
                        <td><?php _e($result->ActionsHoneyHarvNumber); ?></td>
                        
                        <td><?php _e($result->ActionsNewHiveNum); ?></td>
                        <td><?php _e($result->ActionsMergedHiveNum); ?></td>
                        <td><?php _e($result->ActionsOtherText); ?></td>
                        
                        <td><?php if ( ! empty ( $result->Recs )){
                                    _e(implode(', ', unserialize($result->Recs)));
}
                                else {
                                    _e('');                            
}?></td>
                       
                        
                        <td><?php _e($result->RecReplaceEquipText); ?></td>
                        <td><?php _e($result->RecOtherText); ?></td>
                        <td><?php _e($result->RecComments); ?></td>
                        <td><?php _e($result->GenComments); ?></td>   
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>Hive ID</th>
                    <th>Date</th>
                    <th>Worker</th>
                    <th>Location</th>
                    <th>Deeps</th>
                    <th>Mediums</th>
                    <th>Shallows</th>
                    
                    <th>Hive Temperament</th>
                    
                    <th>Saw Queen</th>
                    <th>Queen Marked</th>
                    <th>Mark Color</th>
                    <th>Age</th>
                    
                    <th>Laying Pattern</th>
                    
                    <th>Eggs Seen</th>
                    <th>Comments:</th>
                    
                    <th>Population</th>
                    <th>Crowded</th>
                    
                    <th>Excesive Drone Cells</th>
                    <th>Comments:</th>
                    
                    <th>Queen Cells</th>
                    <th>Swarm Cells</th>
                    <th>Supraceedure Cells</th>
                    
                    <th>Honey Stores</th>
                    <th>Pollen Stores</th>
                    
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
                    <th>Comments:</th>
                    <th>Other Treatments:</th>
                    <th>Comments:</th>
                    
                    <th>Hive Death</th>
                    <th>Suspected Cause:</th>
                                        
                    <th>Actions Taken</th>
                    <th>Comb Removed</th>
                    <th>Honey Harvested</th>
                    <th>New Hive Number</th>
                    <th>Merged Hive Number</th>
                    <th>Other:</th>
                    
                    <th>Recommendations:</th>
                    <th>Other:</th>
                    <th>Comments:</th>
                                        
                    <th>General Comments:</th>  
                </tr>
            </tfoot>
        </table>
    </body>
</html>