<?php 
require_once('load_beeple.php');

// Nonce
$timestamp = time();
$form_action = 'submit_form';
$nonce = create_nonce($form_action, $timestamp);

if ( ! empty( $_POST ) ) {echo('line 9 '); print_r($_POST); 
    $insert = process($_POST);      
}
?>

<!DOCTYPE html>
<head>
    <title>Beeple</title> 
    <link rel="stylesheet" type="text/css" href="style.css"> 
    
      <meta charset="utf-8">
  <title>Your page title here :)</title>
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- FONT –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/skeleton.css">

    
</head>

<body>
    <?php 
            if ( isset( $insert ) ) { 
                echo do_messages($insert);
            }
        ?>
    <div>
        <h1>Hive Inspection Sheet</h1>
        <div>
            <form action="" method="post">
                    <input type="hidden" name="timestamp" value="<?php echo $timestamp; ?>">
                    <input type="hidden" name="form_action" value="<?php echo $form_action; ?>">
                    <input type="hidden" name="nonce" value="<?php echo $nonce; ?>">

                <div>
                    <label>Hive ID: <input type="text" name="HiveID"></label>
                    <label>Date: <input type="date" name="Date"></label> <!-- Date input not supported in all browsers, conside using a polyphill. Also look up what 'polyfill' means-->
                    <label>Who Worked Hive: <input type="text" name="Worker"></label>        
                    <label>Location: <input type="text" name="Loc"></label> <br>
                    <p>Hive Size:</p>
                    <label>Deeps:<input type="number" name="NumOfDeeps"></label>        
                    <label>Mediums:<input type="number" name="NumOfMediums"></label>                    
                    <label>Shallows:<input type="number" name="NumOfShallows"></label>
                </div>
                <div>
                    <h4>Hive Temperament</h4>
                    <label><input type="radio" name="Temperament" value="Calm" checked>Calm</label>
                    <label><input type="radio" name="Temperament" value="Nervous" >Nervous</label>
                    <label><input type="radio" name="Temperament" value="Aggressive">Aggressive</label>
                </div>

                <div>
                    <h4>Saw Queen</h4> <!-- this is a good spot for a colapsable form -->
                    <label><input type="radio" name="QueenSeen" value="No" checked>No</label>
                    <label><input type="radio" name="QueenSeen" value="Yes">Yes</label>
                    <p>Marked?</p>
                    <label><input type="radio" name="QueenMarked" value="No" checked>No</label>
                    <label><input type="radio" name="QueenMarked" value="Yes">Yes</label>
                    <label>Color:<input type="text" name="QueenColor"></label>                    
                    <label>Rough Age of Queen: <input type="number" name="QueenAge">Years</label>
                </div>

                <div>
                    <h4>Laying Pattern</h4>
                    <label><input type="radio" name="LayingPattern" value="Beaut">Beautiful (Solid &amp; Uniform)</label>
                    <label><input type="radio" name="LayingPattern" value="Medio">Mediocre (Little spotty)</label>
                    <label><input type="radio" name="LayingPattern" value="Poor">Poor (Spotty)</label>  
                    <label><input type="radio" name="LayingPattern" value="NA" checked>NA</label>
                </div>

                <div>
                    <h4>Eggs Seen</h4>                    
                    <label><input type="radio" name="EggsSeen" value="No" checked>No</label>
                    <label><input type="radio" name="EggsSeen" value="Yes">Yes</label><br>
                    <label>Comments:<input type="text" name="EggComments"></label>
                </div>

                <div>
                    <h4>Population</h4>
                    <label><input type="radio" name="Population" value="Stro">Strong</label>
                    <label><input type="radio" name="Population" value="Mod" checked>Moderate</label>
                    <label><input type="radio" name="Population" value="Weak">Weak<br></label>                    
                    <label>Crowded?<input type="radio" name="Crowded" value="Yes">Yes</label>
                    <label><input type="radio" name="Crowded" value="No" checked>No</label>                    
                </div>

                <div>
                    <h4>Excesive Drone Cells</h4>
                    <label><input type="radio" name="ExcesiveDrone" value="No" checked>No</label>
                    <label><input type="radio" name="ExcesiveDrone" value="Yes">Yes </label><br>                    
                    <label>Comments:<input type="text" name="DroneComments"></label>
                </div>

                <div>
                    <h4>Queen Cells</h4><!-- this is a good spot for a colapsable form -->
                    <label><input type="radio" name="QueenCells" value="No" checked>No</label>
                    <label><input type="radio" name="QueenCells" value="Yes">Yes:</label><br>    
                    <label>Along frame bottom (swarm cells):#<input type="number" name="SwarmCellNum"></label><br>
                    <label>Converted worker cell (supraceedure or emergency cells):#<input type="number" name="SupraCellNum"></label>
                </div>
                
                <div>
                    <h4>Food Stores</h4>
                    <label>Honey:<input type="radio" name="HoneyStores" value="Plenty">Plenty</label>                    
                    <label><input type="radio" name="HoneyStores" value="Fine" checked>Fine</label>                    
                    <label><input type="radio" name="HoneyStores" value="Sparse">Sparse</label><br>                    
                    <label>Pollen:<input type="radio" name="PollenStores" value="Plenty">Plenty</label>                    
                    <label><input type="radio" name="PollenStores" value="Fine" checked>Fine</label>                    
                    <label><input type="radio" name="PollenStores" value="Sparse">Sparse</label>
                </div>
                
                <div>
                    <h4>Hive Condition</h4><!-- We might have to re-do checkboxes -->
                    <label><input type="checkbox" name="HiveCdn" value="HiveCdnNorm">Normal</label>
                    <label><input type="checkbox" name="HiveCdn" value="HiveCdnBraceComb">Brace Comb</label>
                    <label><input type="checkbox" name="HiveCdn" value="HiveCdnExProp">Excessive Propolis</label>
                    <label><input type="checkbox" name="HiveCdn" value="HiveCdnStink">Foul odor</label>
                    <label><input type="checkbox" name="HiveCdn" value="HiveCdnDamage">Equip. Damage</label>
                    <label><input type="checkbox" name="HiveCdn" value="HiveCdnOther">Other:</label><input type="text" name="HiveCdnOtherText">
                </div>

                <div>
                    <h4>Disease/Pests</h4>                    
                    <h5>Verroa mites</h5><!-- this is a good spot for a colapsable form -->
                    <label>Mite Check:<input type="radio" name="MiteCheck" value="No" checked>No</label>
                    <label><input type="radio" name="MiteCheck" value="Yes">Yes</label><br>                    
                    <label><input type="radio" name="SamplingMethod" value="Sugar" checked>Sugar Roll</label>                    
                    <label><input type="radio" name="SamplingMethod" value="Alcohol">Alcohol Wash</label>
                    <label><input type="radio" name="SamplingMethod" value="NA" checked>NA<br></label>
                    <label>How many mites in the sample?<input type="number" name="MiteCount"></label><br> 
                    
                    <!-- We might have to re-do checkboxes -->
                    <!-- Do we REALLY want mite treatment as checkboxes? Noone does more then one treatment at a time. Maybe they would be better as radio buttons -->
                    
                    <label>Mite Treatment:<input type="radio" name="MiteTreat" value="No" checked>No</label><!-- this is a good spot for a colapsable form -->
                    <label><input type="radio" name="MiteTreat" value="Yes">Yes</label><br>
                    <label><input type="checkbox" name="MiteTreatType" value="MiteTreatOils">Essential Oils</label>     
                    <label><input type="checkbox" name="MiteTreatType" value="MiteTreatApivar">Apivar</label>
                    <label><input type="checkbox" name="MiteTreatType" value="MiteTreatApistan">Apistan or Checkmate+</label>
                    <label><input type="checkbox" name="MiteTreatType" value="MiteTreatFAcid">Formic Acid</label>
                    <label><input type="checkbox" name="MiteTreatType" value="MiteTreatOxAcid">Oxalic Acid</label>
                    <label><input type="checkbox" name="MiteTreatType" value="MiteTreatHops">Hop Guard</label>
                    <label><input type="checkbox" name="MiteTreatType" value="MiteTreatOther">Other:</label>
                    <input type="text" name="MiteTreatOtherText"><br>                    
                    <label>When do treatments need to be tended/removed?:<input type="date" name="TreatRemoveDate"></label>                    
                    
                    <!-- We might have to re-do checkboxes -->
                    <h5>Other Problems/Treaments</h5>
                    <label><input type="checkbox" name="OtherProb" value="OtherProbCB">Chalk Brood</label>
                    <label><input type="checkbox" name="OtherProb" value="OtherProbNos">Nosema</label>
                    <label><input type="checkbox" name="OtherProb" value="OtherProbEFB">E. Foulbrood</label>
                    <label><input type="checkbox" name="OtherProb" value="OtherProbAFB">A. Foulbrood</label>
                    <label><input type="checkbox" name="OtherProb" value="OtherProbBeetle">Hive Beetle</label>
                    <label><input type="checkbox" name="OtherProb" value="OtherProbOther">Other:</label>
                    <input type="text" name="OtherProbOtherText"><br>                   
                    <label>Treatments:<input type="text" name="OtherProbTreat"></label><br>                    
                    <label>Comments:<input type="text" name="OtherProbComments"></label>
                </div>           
                    <!-- We might have to re-do checkboxes -->
                <div>
                    <h4>Actions Taken</h4>                    
                    <label><input type="checkbox" name="Actions" value="ActionsNothing">Nothing</label>
                    <label><input type="checkbox" name="Actions" value="ActionsFedSugar">Fed hive (suryp)</label>
                    <label><input type="checkbox" name="Actions" value="ActionsFedPollen">Fed hive (pollen patty)</label>
                    <label><input type="checkbox" name="Actions" value="ActionsExcluder">Added Excluder</label>
                    <label><input type="checkbox" name="Actions" value="ActionsRequeen">Requeened</label>
                    <label><input type="checkbox" name="Actions" value="ActionsSwapBox">Swapped brood boxes</label>
                    <label><input type="checkbox" name="Actions" value="ActionsRemoveComb">Removed Old Comb:</label>
                    <label>How many frames?<input type="number" name="ActionsRemoveCombNumber"></label>
                    <label><input type="checkbox" name="Actions" value="ActionsAddSupers">Added super(s)</label>
                    <label><input type="checkbox" name="Actions" value="ActionsSplit">Split hive:</label>
                    <label>New Hive #<input type="text" name="ActionsNewHiveNum"></label>
                    <label><input type="checkbox" name="Actions" value="ActionsOther">Other:</label>
                    <input type="text" name="ActionsOtherText">
                </div>
                    <!-- We might have to re-do checkboxes -->
                <div>
                    <h4>Recommendations:</h4>
                    <label><input type="checkbox" name="Rec" value="RecAddSup">Add Supers</label>
                    <label><input type="checkbox" name="Rec" value="RecSplit">Split</label>
                    <label><input type="checkbox" name="Rec" value="RecReplaceQueeen">Replace Queen</label>
                    <label><input type="checkbox" name="Rec" value="RecSwarmWatch">Swarming Imminent - Needs Monitoring</label>
                    <label><input type="checkbox" name="Rec" value="RecReplaceEquip">Replace Equipment:</label>
                    <input type="text" name="RecReplaceEquipText">
                    <label><input type="checkbox" name="Rec" value="RecOther">Other:</label>
                    <input type="text" name="RecOtherText"><br>
                    <label>Comments:<input type="text" name="RecComments"></label>
                </div>

                <div>                
                    <label>General Comments:<input type="text" name="GenComments"></label><br>
                    <button>Submit</button>
                </div>
            </form>
        </div>
    </div>    
</body>
