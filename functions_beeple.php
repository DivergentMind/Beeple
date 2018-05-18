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
            'HiveID'            => 'FILTER_SANITIZE_STRING',
            'Date'              => 'FILTER_SANITIZE_STRING',
            'Worker'            => 'FILTER_SANITIZE_STRING',
            'Loc'               => 'FILTER_SANITIZE_STRING',
            'NumOfDeeps'        => 'FILTER_SANITIZE_NUMBER_INT',
            'NumOfMediums'      => 'FILTER_SANITIZE_NUMBER_INT',
            'NumOfShallows'     => 'FILTER_SANITIZE_NUMBER_INT',
            'Temperament'       => 'FILTER_SANITIZE_STRING',
            'QueenSeen'         => 'FILTER_SANITIZE_STRING',
            'LayingPattern'     => 'FILTER_SANITIZE_STRING',
            'NumbBroodFrames'   => 'FILTER_SANITIZE_NUMBER_INT',
            'EggsSeen'          => 'FILTER_SANITIZE_STRING',
            'EggComments'       => 'FILTER_SANITIZE_STRING',
            'Population'        => 'FILTER_SANITIZE_NUMBER_INT',
            'Crowded'           => 'FILTER_SANITIZE_STRING',
            
            'HoneyStores'       => 'FILTER_SANITIZE_STRING',
            'PollenStores'      => 'FILTER_SANITIZE_STRING',
          
            'MiteCheck'         => 'FILTER_SANITIZE_STRING',
            'SamplingMethod'    => 'FILTER_SANITIZE_STRING',
            'MiteCount'         => 'FILTER_SANITIZE_NUMBER_INT',
            'MiteTreat'         => 'FILTER_SANITIZE_STRING',
            'MiteTreatType'     => 'FILTER_SANITIZE_STRING',
            'MiteTreatOtherText'=> 'FILTER_SANITIZE_STRING',
            'TreatRemoveDate'   => 'FILTER_SANITIZE_STRING',
            'OtherProbOtherText'=> 'FILTER_SANITIZE_STRING',
            'OtherProbTreat'    => 'FILTER_SANITIZE_STRING',
            'OtherProbComments' => 'FILTER_SANITIZE_STRING',
            'Dead'              => 'FILTER_SANITIZE_STRING',
            'DeadComments'      => 'FILTER_SANITIZE_STRING',
           
            'GenComments'       => 'FILTER_SANITIZE_STRING'
        );
        
        $filter_post = filter_var_array($post, $args);
        
        // Filter checkboxes 
        
        
        if ( ! empty ( $post['OtherProbs'] ) ) {
            foreach ( array_keys( $post['OtherProbs'] ) as $OtherProb ) {
                $OtherProbs[] = filter_var($OtherProb, FILTER_SANITIZE_STRING);
            }
            
            $filter_OtherProbs = serialize($OtherProbs); 
        } else {
            $filter_OtherProbs = '';
        }
        

        
        // Send to database
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        $stmt = $mysql->prepare("
            INSERT INTO beeple_table (HiveID,Date,Worker,Loc,NumOfDeeps,NumOfMediums,NumOfShallows,Temperament,QueenSeen,LayingPattern,NumbBroodFrames,EggsSeen,EggComments,Population,Crowded,HoneyStores,PollenStores,MiteCheck,SamplingMethod,MiteCount,MiteTreat,MiteTreatType,MiteTreatOtherText,TreatRemoveDate,OtherProbs,OtherProbOtherText,OtherProbTreat,OtherProbComments,Dead,DeadComments,GenComments) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ");
        
        $stmt->bind_param("ssssiiissssssisssssisssssssssss", 
            $filter_post['HiveID'], $filter_post['Date'], $filter_post['Worker'], 
            $filter_post['Loc'], $filter_post['NumOfDeeps'], $filter_post['NumOfMediums'], $filter_post['NumOfShallows'], $filter_post['Temperament'], $filter_post['QueenSeen'], $filter_post['LayingPattern'], $filter_post['NumbBroodFrames'], $filter_post['EggsSeen'], $filter_post['EggComments'], $filter_post['Population'], $filter_post['Crowded'], $filter_post['HoneyStores'], $filter_post['PollenStores'], $filter_post['MiteCheck'], $filter_post['SamplingMethod'], $filter_post['MiteCount'], $filter_post['MiteTreat'], $filter_post['MiteTreatType'], $filter_post['MiteTreatOtherText'], $filter_post['TreatRemoveDate'], $filter_OtherProbs, $filter_post['OtherProbOtherText'], $filter_post['OtherProbTreat'], $filter_post['OtherProbComments'], $filter_post['Dead'], $filter_post['DeadComments'], $filter_post['GenComments']
        );
        
        $insert = $stmt->execute();
        
        // Close connections
        $stmt->close();
        $mysql->close();
        
        return $insert;
    }
}

if ( ! function_exists( '_e' ) ) {
    function _e($string) {
        echo htmlentities($string, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}