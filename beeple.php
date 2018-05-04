<?php 
require_once('load_beeple.php');

// Nonce
$timestamp = time();
$form_action = 'submit_form';
$nonce = create_nonce($form_action, $timestamp);

if ( ! empty( $_POST ) ) {//print_r($_POST); 
    $insert = process($_POST);      
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Beeple</title> 
        <meta charset="utf-8">
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
                    <label>Date: <input type="date" name="Date"></label>
                    <!-- Date input not supported in all browsers, consider using a polyphill. Also look up what 'polyfill' means-->
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
                    <label><input type="radio" name="Temperament" value="NA">N/A</label><!--Hide-->
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
                    <label><input type="radio" name="LayingPattern" value="NA" checked>N/A</label><!--Hide-->
                </div>

                <div>
                    <h4>Eggs Seen</h4>
                    <label><input type="radio" name="EggsSeen" value="Yes">Yes</label>
                    <label><input type="radio" name="EggsSeen" value="No" checked>No</label><br>
                    <label>Comments:<input type="text" name="EggComments"></label>
                </div>

                <div>
                    <h4>Population</h4>
                    <label><input type="radio" name="Population" value="Stro">Strong</label>
                    <label><input type="radio" name="Population" value="Mod" checked>Moderate</label>
                    <label><input type="radio" name="Population" value="Weak">Weak<br></label>
                    <label><input type="radio" name="Population" value="NA" checked>N/A</label><!--Hide-->
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
                    <label><input type="radio" name="HoneyStores" value="Fine">Fine</label>                    
                    <label><input type="radio" name="HoneyStores" value="Sparse">Sparse</label>
                    <label><input type="radio" name="HoneyStores" value="NA" checked>N/A</label><br><!--Hide-->
                    <label>Pollen:<input type="radio" name="PollenStores" value="Plenty">Plenty</label>                    
                    <label><input type="radio" name="PollenStores" value="Fine" checked>Fine</label>                    
                    <label><input type="radio" name="PollenStores" value="Sparse">Sparse</label>
                    <label><input type="radio" name="PollenStores" value="NA" checked>N/A</label><!--Hide-->
                </div>
                
                <div>
                    <h4>Hive Condition</h4>
                    <label><input type="checkbox" name="HiveCdns[Norm]" value="1">Normal</label>
                    <label><input type="checkbox" name="HiveCdns[BraceComb]" value="1">Brace Comb</label>
                    <label><input type="checkbox" name="HiveCdns[ExProp]" value="1">Excessive Propolis</label>
                    <label><input type="checkbox" name="HiveCdns[Stink]" value="1">Foul odor</label>
                    <label><input type="checkbox" name="HiveCdns[Damage]" value="1">Equip. Damage</label>
                    <label><input type="checkbox" name="HiveCdns[Other]" value="1">Other:</label><input type="text" name="HiveCdnOtherText">
                </div>

                <div>
                    <h4>Disease/Pests</h4>                    
                    <h5>Verroa mites</h5><!-- this is a good spot for a colapsable form -->
                    <label>Mite Check:<input type="radio" name="MiteCheck" value="No" checked>No</label>
                    <label><input type="radio" name="MiteCheck" value="Yes">Yes</label><br>                    
                    <label><input type="radio" name="SamplingMethod" value="Sugar" checked>Sugar Roll</label>                    
                    <label><input type="radio" name="SamplingMethod" value="Alcohol">Alcohol Wash</label>
                    <label><input type="radio" name="SamplingMethod" value="NA" checked>N/A<br></label>
                    <label>How many mites in the sample?<input type="number" name="MiteCount"></label><br> 
                    
                    
                    <label>Mite Treatment:<input type="radio" name="MiteTreat" value="No" checked>No</label><!-- this is a good spot for a colapsable form -->
                    <label><input type="radio" name="MiteTreat" value="Yes">Yes</label><br>
                    <label><input type="radio" name="MiteTreatType" value="NA" checked>N/A</label><!--hide--> 
                    <label><input type="radio" name="MiteTreatType" value="MiteTreatOils">Essential Oils</label>                    
                    <label><input type="radio" name="MiteTreatType" value="MiteTreatApivar">Apivar</label>                    
                    <label><input type="radio" name="MiteTreatType" value="MiteTreatApistan">Apistan or Checkmate+</label>                    
                    <label><input type="radio" name="MiteTreatType" value="MiteTreatFAcid">Formic Acid</label>                    
                    <label><input type="radio" name="MiteTreatType" value="MiteTreatOxAcid">Oxalic Acid</label>                    
                    <label><input type="radio" name="MiteTreatType" value="MiteTreatHops">Hop Guard</label>                    
                    <label><input type="radio" name="MiteTreatType" value="MiteTreatOther">Other:</label><input type="text" name="MiteTreatOtherText"><br>               
                    <label>When do treatments need to be tended/removed?:<input type="date" name="TreatRemoveDate"></label>                    
                    
                    <h5>Other Problems/Treaments</h5>
                    <label><input type="checkbox" name="OtherProbs[ChalkBrood]" value="1">Chalk Brood</label>
                    <label><input type="checkbox" name="OtherProbs[Nos]" value="1">Nosema</label>
                    <label><input type="checkbox" name="OtherProbs[EFB]" value="1">E. Foulbrood</label>
                    <label><input type="checkbox" name="OtherProbs[AFB]" value="1">A. Foulbrood</label>
                    <label><input type="checkbox" name="OtherProbs[Beetle]" value="1">Hive Beetle</label>
                    <label><input type="checkbox" name="OtherProbs[Other]" value="1">Other:<input type="text" name="OtherProbOtherText"></label><br>                   
                    <label>Treatments:<input type="text" name="OtherProbTreat"></label><br>                    
                    <label>Comments:<input type="text" name="OtherProbComments"></label>
                    
                    <h5>Dead Hive</h5><!-- this is a good spot for a colapsable form -->
                    <label><input type="radio" name="Dead" value="No" checked>No</label>
                    <label><input type="radio" name="Dead" value="Yes">Yes</label><br>   
                    <label>Suspected Cause:<input type="text" name="DeadComments"></label>                
                </div>           
                    
                <div>
                    <h4>Actions Taken</h4>                    
                    <label><input type="checkbox" name="Actions[Nothing]" value="1">Nothing</label>
                    <label><input type="checkbox" name="Actions[FedSugar]" value="1">Fed hive (suryp)</label>                    
                    <label><input type="checkbox" name="Actions[FedPollen]" value="1">Fed hive (pollen patty)</label>
                    <label><input type="checkbox" name="Actions[Excluder]" value="1">Added Excluder</label>
                    <label><input type="checkbox" name="Actions[Requeen]" value="1">Requeened</label>
                    <label><input type="checkbox" name="Actions[SwapBox]" value="1">Swapped brood boxes</label>
                    <label><input type="checkbox" name="Actions[RemoveComb]" value="1">Removed Old Comb:</label>
                    <label>How many frames?<input type="number" name="ActionsRemoveCombNumber"></label>
                    <label><input type="checkbox" name="Actions[HoneyHarvest]" value="1">Honey Harvested:</label>
                    <label>How many LBS?<input type="number" step="0.01" min="0" name="ActionsHoneyHarvNumber"></label>
                    <label><input type="checkbox" name="Actions[AddSuppers]" value="1">Added super(s)</label>
                    <label><input type="checkbox" name="Actions[Split]" value="1">Split hive:</label>
                    <label>New Hive #<input type="text" name="ActionsNewHiveNum"></label>
                    <label><input type="checkbox" name="Actions[Merge]" value="1">Merge hive:</label>
                    <label>Merged Hive #<input type="text" name="ActionsMergedHiveNum"></label>
                    <label><input type="checkbox" name="Actions[Other]" value="1">Other:</label><input type="text" name="ActionsOtherText">
                </div>
                    
                <div>
                    <h4>Recommendations:</h4>
                    <label><input type="checkbox" name="Recs[AddSup]" value="RecAddSup">Add Supers</label>
                    <label><input type="checkbox" name="Recs[Split]" value="RecSplit">Split</label>
                    <label><input type="checkbox" name="Recs[ReplaceQueen]" value="RecReplaceQueeen">Replace Queen</label>
                    <label><input type="checkbox" name="Recs[SwarmWatch]" value="RecSwarmWatch">Swarming Imminent - Needs Monitoring</label>
                    <label><input type="checkbox" name="Recs[ReplaceEquip]" value="RecReplaceEquip">Replace Equipment:<input type="text" name="RecReplaceEquipText"></label>                    
                    <label><input type="checkbox" name="Recs[Other]" value="RecOther"> Other:</label><input type="text" name="RecOtherText"><br>                    
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