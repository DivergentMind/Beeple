<?php
// Create nonce
if ( ! function_exists( 'create_nonce' ) ) {
    function create_nonce($action, $time) {
        $str = sprintf('%s_%s_%s', $action, $time, NONCE_SALT);
        $nonce = hash('sha512', $str);
        
        return $nonce;
    }
}

// Verify nonce
if ( ! function_exists( 'verify_nonce' ) ) {
    function verify_nonce($nonce, $action, $time) {
        $check = create_nonce($action, $time);
        
        if ( $nonce == $check ) {
            return true;
        }
        
        return false;
    }
}

// Status messages
if ( ! function_exists( 'do_messages' ) ) {
    function do_messages($insert=NULL) {
        if ( is_null( $insert ) ) {
            return;   
        }
        
        $message = '<div>';
        
        if ( $insert == true ) {
            $message .= '<p>Right, off you go...</p>';
        } else {
            $message .= '<p>You have been flung from the bridge.</p>';
        }
        $message .= '</div>';
        
        
        return $message;
    }
}

// Process form data
if ( ! function_exists( 'process' ) ) {
    function process($post) {
        // Check nonce
        $verify = verify_nonce($post['nonce'], $post['form_action'], $post['timestamp']);
        
        if ( false === $verify ) {
            return false;
        }
        
        
        // Filter input
        $args = array(
            'HiveID' => 'FILTER_SANITIZE_STRING',
            'Date' => 'FILTER_SANITIZE_STRING',
            'Worker' => 'FILTER_SANITIZE_STRING',
            'Loc' => 'FILTER_SANITIZE_STRING',
            'NumOfDeeps' => 'FILTER_SANITIZE_NUMBER_INT',
            'NumOfMediums' => 'FILTER_SANITIZE_NUMBER_INT',
            'NumOfShallows' => 'FILTER_SANITIZE_NUMBER_INT',
            'Temperament' => 'FILTER_SANITIZE_STRING',
            'QueenSeen' => 'FILTER_SANITIZE_STRING',
            'QueenMarked' => 'FILTER_SANITIZE_STRING',
            'QueenColor' => 'FILTER_SANITIZE_STRING',
            'QueenAge' => 'FILTER_SANITIZE_NUMBER_INT',
            'LayingPattern' => 'FILTER_SANITIZE_STRING',
            'EggsSeen' => 'FILTER_SANITIZE_STRING',
            'EggComments' => 'FILTER_SANITIZE_STRING',
            'Population' => 'FILTER_SANITIZE_STRING',
            'Crowded' => 'FILTER_SANITIZE_STRING',
            'ExcesiveDrone' => 'FILTER_SANITIZE_STRING',
            'DroneComments' => 'FILTER_SANITIZE_STRING',
            'QueenCells' => 'FILTER_SANITIZE_STRING',
            'SwarmCellNum' => 'FILTER_SANITIZE_NUMBER_INT',
            'SupraCellNum' => 'FILTER_SANITIZE_NUMBER_INT',
            'HoneyStores' => 'FILTER_SANITIZE_STRING',
            'PollenStores' => 'FILTER_SANITIZE_STRING',
            'HiveCdnOtherText' => 'FILTER_SANITIZE_STRING',
            'MiteCheck' => 'FILTER_SANITIZE_STRING',
            'SamplingMethod' => 'FILTER_SANITIZE_STRING',
            'MiteCount' => 'FILTER_SANITIZE_NUMBER_INT',
            'MiteTreat' => 'FILTER_SANITIZE_STRING',
            'MiteTreatType' => 'FILTER_SANITIZE_STRING',
            'MiteTreatOtherText' => 'FILTER_SANITIZE_STRING',
            'TreatRemoveDate' => 'FILTER_SANITIZE_STRING',
            'OtherProbOtherText' => 'FILTER_SANITIZE_STRING',
            'OtherProbTreat' => 'FILTER_SANITIZE_STRING',
            'OtherProbComments' => 'FILTER_SANITIZE_STRING',
            'Dead' => 'FILTER_SANITIZE_STRING',
            'DeadComments' => 'FILTER_SANITIZE_STRING',
            'ActionsRemoveCombNumber' => 'FILTER_SANITIZE_NUMBER_INT',
            'ActionsHoneyHarvNumber' => 'FILTER_SANITIZE_FLOAT',
            'ActionsNewHiveNum' => 'FILTER_SANITIZE_STRING',
            'ActionsMergedHiveNum' => 'FILTER_SANITIZE_STRING',
            'ActionsOtherText' => 'FILTER_SANITIZE_STRING',
            'RecReplaceEquipText' => 'FILTER_SANITIZE_STRING',
            'RecOtherText' => 'FILTER_SANITIZE_STRING',
            'RecComments' => 'FILTER_SANITIZE_STRING',
            'GenComments' => 'FILTER_SANITIZE_STRING'
        );
        
        $filter_post = filter_var_array($post, $args);
        
        
        // Filter checkboxes 
        if ( ! empty ( $post['HiveCdns'] ) ) {
            foreach ( array_keys( $post['HiveCdns'] ) as $HiveCdn ) {
                $HiveCdns[] = filter_var($HiveCdn, FILTER_SANITIZE_STRING);
            }
            
            $filter_HiveCdns = serialize($HiveCdns); 
        } else {
            $filter_HiveCdns = '';
        }
        
        if ( ! empty ( $post['OtherProbs'] ) ) {
            foreach ( array_keys( $post['OtherProbs'] ) as $OtherProb ) {
                $OtherProbs[] = filter_var($OtherProb, FILTER_SANITIZE_STRING);
            }
            
            $filter_OtherProbs = serialize($OtherProbs); 
        } else {
            $filter_OtherProbs = '';
        }
        if ( ! empty ( $post['Actions'] ) ) {
            foreach ( array_keys( $post['Actions'] ) as $Action ) {
                $Actions[] = filter_var($Action, FILTER_SANITIZE_STRING);
            }
            
            $filter_Actions = serialize($Actions); 
        } else {
            $filter_Actions = '';
        }
        if ( ! empty ( $post['Recs'] ) ) {
            foreach ( array_keys( $post['Recs'] ) as $Rec ) {
                $Recs[] = filter_var($Rec, FILTER_SANITIZE_STRING);
            }
            
            $filter_Recs = serialize($Recs); 
        } else {
            $filter_Recs = '';
        }
        
        // Send to database
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        $stmt = $mysql->prepare("
            INSERT INTO beeple_table (HiveID,Date,Worker,Loc,NumOfDeeps,NumOfMediums,NumOfShallows,Temperament,QueenSeen,QueenMarked,QueenColor,QueenAge,LayingPattern,EggsSeen,EggComments,Population,Crowded,ExcesiveDrone,DroneComments,QueenCells,SwarmCellNum,SupraCellNum,HoneyStores,PollenStores,HiveCdns,HiveCdnOtherText,MiteCheck,SamplingMethod,MiteCount,MiteTreat,MiteTreatType,MiteTreatOtherText,TreatRemoveDate,OtherProbs,OtherProbOtherText,OtherProbTreat,OtherProbComments,Dead,DeadComments,Actions,ActionsRemoveCombNumber,ActionsHoneyHarvNumber,ActionsNewHiveNum,ActionsMergedHiveNum,ActionsOtherText,Recs,RecReplaceEquipText,RecOtherText,RecComments,GenComments) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ");
        
        $stmt->bind_param("ssssiiissssissssssssiissssssisssssssssssidssssssss", 
            $filter_post['HiveID'], $filter_post['Date'], $filter_post['Worker'], 
            $filter_post['Loc'], $filter_post['NumOfDeeps'], $filter_post['NumOfMediums'], $filter_post['NumOfShallows'], $filter_post['Temperament'], $filter_post['QueenSeen'], $filter_post['QueenMarked'], $filter_post['QueenColor'], $filter_post['QueenAge'], $filter_post['LayingPattern'], $filter_post['EggsSeen'], $filter_post['EggComments'], $filter_post['Population'], $filter_post['Crowded'], $filter_post['ExcesiveDrone'], $filter_post['DroneComments'], $filter_post['QueenCells'], $filter_post['SwarmCellNum'], $filter_post['SupraCellNum'], $filter_post['HoneyStores'], $filter_post['PollenStores'], $filter_HiveCdns, $filter_post['HiveCdnOtherText'], $filter_post['MiteCheck'], $filter_post['SamplingMethod'], $filter_post['MiteCount'], $filter_post['MiteTreat'], $filter_post['MiteTreatType'], $filter_post['MiteTreatOtherText'], $filter_post['TreatRemoveDate'], $filter_OtherProbs, $filter_post['OtherProbOtherText'], $filter_post['OtherProbTreat'], $filter_post['OtherProbComments'], $filter_post['Dead'], $filter_post['DeadComments'], $filter_Actions, $filter_post['ActionsRemoveCombNumber'], $filter_post['ActionsHoneyHarvNumber'], $filter_post['ActionsNewHiveNum'], $filter_post['ActionsMergedHiveNum'], $filter_post['ActionsOtherText'],$filter_Recs, $filter_post['RecReplaceEquipText'], $filter_post['RecOtherText'], $filter_post['RecComments'], $filter_post['GenComments']
        );
        
        $insert = $stmt->execute();
        
        // Close connections
        $stmt->close();
        $mysql->close();
        
        return $insert;
    }
}
/* I don't know what this is...
if ( ! function_exists( '_e' ) ) {
    function _e($string) {
        echo htmlentities($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}
*/