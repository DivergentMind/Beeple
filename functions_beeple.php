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
            
        );
        
        $filter_post = filter_var_array($post, $args);
        
        /* This is how to do checkboxes.
        // Filter checkboxes
        if ( ! empty ( $post['interests'] ) ) {
            foreach ( array_keys( $post['interests'] ) as $interest ) {
                $interests[] = filter_var($interest, FILTER_SANITIZE_STRING);
            }
            
            $filter_interests = serialize($interests); 
        } else {
            $filter_interests = '';
        }
        */
        // Send to database
        $mysql = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
        
        $stmt = $mysql->prepare("
            INSERT INTO beeple_table (HiveID,Date,Worker,Loc,NumOfDeeps,NumOfMediums,NumOfShallows,Temperament,QueenSeen,QueenMarked,QueenColor,QueenAge,LayingPattern,EggsSeen,EggComments,Population,Crowded,ExcesiveDrone,DroneComments,QueenCells,SwarmCellNum,SupraCellNum,HoneyStores,PollenStores) 
            VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)
        ");
        
        $stmt->bind_param("ssssiiissssissssssssiiss", 
            $filter_post['HiveID'], $filter_post['Date'], $filter_post['Worker'], 
            $filter_post['Loc'], $filter_post['NumOfDeeps'], $filter_post['NumOfMediums'], $filter_post['NumOfShallows'], $filter_post['Temperament'], $filter_post['QueenSeen'], $filter_post['QueenMarked'], $filter_post['QueenColor'], $filter_post['QueenAge'], $filter_post['LayingPattern'], $filter_post['EggsSeen'], $filter_post['EggComments'], $filter_post['Population'], $filter_post['Crowded'], $filter_post['ExcesiveDrone'], $filter_post['DroneComments'], $filter_post['QueenCells'], $filter_post['SwarmCellNum'], $filter_post['SupraCellNum'], $filter_post['HoneyStores'], $filter_post['PollenStores']
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