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
        <script type="text/javascript" src="js/jquery.js"></script>
        <!-- FONT –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
        <!-- CSS –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="stylesheet" href="style.css">    
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

                <div class="row">
                    <div class="u-full-width">
                        <label>Hive ID: <input type="text" name="HiveID"></label>
                        <label>Date: <input type="date" name="Date"></label>
                        <!-- Date input not supported in all browsers, consider using a polyphill. Also look up what 'polyfill' means-->
                        <label>Who Worked Hive: <input type="text" name="Worker"></label>        
                        <label>Location: <input type="text" name="Loc"></label> <br>
                    </div>
                    <h5>Hive Size:</h5>
                    <label>Deeps:<input type="number" name="NumOfDeeps" min="0"></label>        
                    <label>Mediums:<input type="number" name="NumOfMediums" min="0"></label>                    
                    <label>Shallows:<input type="number" name="NumOfShallows" min="0"></label>
                </div>
                <div>
                    <h5>Hive Temperament</h5>
                    <label><input type="radio" name="Temperament" value="Calm" checked>Calm</label>
                    <label><input type="radio" name="Temperament" value="Nervous" >Nervous</label>
                    <label><input type="radio" name="Temperament" value="Aggressive">Aggressive</label>
                    <label><input type="radio, hidden" name="Temperament" value="NA" checked hidden></label>
                </div>

                <div>
                    <h5>Saw Queen</h5> <!-- this is a good spot for a colapsable form -->
                    <label><input type="radio" name="QueenSeen" value="No" checked>No</label>
                    <label><input type="radio" name="QueenSeen" value="Yes">Yes</label>
            <!--    <p>Marked?</p>
                    <label><input type="radio" name="QueenMarked" value="Unknown" checked>Unknown</label>
                    <label><input type="radio" name="QueenMarked" value="No" >No</label>
                    <label><input type="radio" name="QueenMarked" value="Yes">Yes</label>
                    <label>Color:<input type="text" name="QueenColor"></label>                    
                    <label>Age of Queen: <input type="number" step="0.1" name="QueenAge" min="0" placeholder="Years"></label>
-->
                </div>

                <div>
                    <h5>Brood</h5>
                    <label><input type="radio" name="LayingPattern" value="Beaut">Beautiful (Solid &amp; Uniform)</label>
                    <label><input type="radio" name="LayingPattern" value="Medio">Mediocre (Little spotty)</label>
                    <label><input type="radio" name="LayingPattern" value="Poor">Poor (Spotty)</label>  
                    <label><input type="radio, hidden" name="LayingPattern" value="NA" checked hidden></label><br>
                    <label>How Many Brood Frames:<input type="number" name="NumbBroodFrames" min="0"></label> <!-- This needs to be connected to database -->
               
                    
                    <h6></h6>
                    <label>Eggs Seen:<input type="radio" name="EggsSeen" value="Yes">Yes</label>
                    <label><input type="radio" name="EggsSeen" value="No" checked>No</label><br>
                    <label>Comments:<input type="text" name="EggComments"></label>
                    <hr />
                </div>

                <div>
                    <h5>Population</h5>
                    <!--
                    <label><input type="radio" name="Population" value="Stro">Strong</label>
                    <label><input type="radio" name="Population" value="Mod">Moderate</label>
                    <label><input type="radio" name="Population" value="Weak">Weak<br></label>
                    <label><input type="radio" name="Population" value="NA" checked hidden></label>
                    -->
                    <label>Seams of Bees:<input type="number" name="Population" min="0" ></label><!-- This needs to be properly connected to database --> 
                    <label>Crowded?<input type="radio" name="Crowded" value="Yes">Yes</label>
                    <label><input type="radio" name="Crowded" value="No" checked>No</label>                    
                </div>
<!--
                <div>
                    <h4>Excessive Drone Cells</h4>
                    <label><input type="radio" name="ExcesiveDrone" value="No" checked>No</label>
                    <label><input type="radio" name="ExcesiveDrone" value="Yes">Yes</label><br>                    
                    <label>Comments:<input type="text" name="DroneComments"></label>
                </div>
-->
 <!--               <div>
                    <h4>Queen Cells</h4><!-- this is a good spot for a colapsable form --><!--
                    <label><input type="radio" name="QueenCells" value="No" checked>No</label>
                    <label><input type="radio" name="QueenCells" value="Yes">Yes:</label><br>    
                    <label>Along frame bottom (swarm cells):#<input type="number" name="SwarmCellNum" min="0"></label><br>
                    <label>Converted worker cell (supraceedure or emergency cells):#<input type="number" name="SupraCellNum" min="0"></label>
                </div>
        -->        
                <div>
                    <h5>Food Stores</h5>
                    <label>Honey:<input type="radio" name="HoneyStores" value="Plenty">Plenty</label>                    
                    <label><input type="radio" name="HoneyStores" value="Fine">Fine</label>                    
                    <label><input type="radio" name="HoneyStores" value="Sparse">Sparse</label>
                    <label><input type="radio, hidden" name="HoneyStores" value="NA" checked hidden></label><br>
                    <label>Pollen:<input type="radio" name="PollenStores" value="Plenty">Plenty</label>                    
                    <label><input type="radio" name="PollenStores" value="Fine">Fine</label>                    
                    <label><input type="radio" name="PollenStores" value="Sparse">Sparse</label>
                    <label><input type="radio, hidden" name="PollenStores" value="NA" checked hidden></label>
                </div>
                
     <!--       <div> 
                    <h4>Hive Condition</h4>
                    <label><input type="checkbox" name="HiveCdns[Norm]" value="1">Normal</label>
                    <label><input type="checkbox" name="HiveCdns[BraceComb]" value="1">Brace Comb</label>
                    <label><input type="checkbox" name="HiveCdns[ExProp]" value="1">Excessive Propolis</label>
                    <label><input type="checkbox" name="HiveCdns[Stink]" value="1">Foul odor</label>
                    <label><input type="checkbox" name="HiveCdns[Damage]" value="1">Equip. Damage</label>
                    <label><input type="checkbox" name="HiveCdns[Other]" value="1">Other:</label><input type="text" name="HiveCdnOtherText">
                </div>-->

                <div>
                    <h5>Disease/Pests/Death</h5>                    
                    <h5>Verroa mites</h5><!-- this is a good spot for a colapsable form -->
                    <label>Mite Check:<input type="radio" name="MiteCheck" value="No" checked>No</label>
                    <label><input type="radio" name="MiteCheck" value="Yes">Yes</label><br>                    
                    <label><input type="radio" name="SamplingMethod" value="Sugar" checked>Sugar Roll</label>                 
                    <label><input type="radio" name="SamplingMethod" value="Alcohol">Alcohol Wash</label>
                    <label><input type="radio" name="SamplingMethod" value="NA" checked>N/A<br></label>
                    <label>How many mites in the sample?<input type="number" name="MiteCount" min="0" value="null"></label><br>
                    <button type="button" id="MiteTreatBtn">Recommend Mite Treatment</button>
                    
                    <div id="MiteModal"class="modal">
                        <div class="MiteTreat">
                            <span class="close">&times;</span>
                            <label>Mite Treatment:<input type="radio" name="MiteTreat" value="No" checked>No</label><!-- this is a good spot for a colapsable form -->
                            <label><input type="radio" name="MiteTreat" value="Yes">Yes</label><br>
                            <label><input type="radio" name="MiteTreatType" value="NA" checked hidden></label> 
                            <label><input type="radio" name="MiteTreatType" value="MiteTreatOils">Essential Oils</label>                    
                            <label><input type="radio" name="MiteTreatType" value="MiteTreatApivar">Apivar</label>                    
                            <label><input type="radio" name="MiteTreatType" value="MiteTreatApistan">Apistan or Checkmate+</label>                    
                            <label><input type="radio" name="MiteTreatType" value="MiteTreatFAcid">Formic Acid</label>                    
                            <label><input type="radio" name="MiteTreatType" value="MiteTreatOxAcid">Oxalic Acid</label>                    
                            <label><input type="radio" name="MiteTreatType" value="MiteTreatHops">Hop Guard</label>                    
                            <label><input type="radio" name="MiteTreatType" value="MiteTreatOther">Other:</label><input type="text" name="MiteTreatOtherText"><br>               
                            <label>When do treatments need to be tended/removed?:<input type="date" name="TreatRemoveDate"></label>
                            <input type="hidden" name="MiteTreatType" value="NA" checked><!--Hide--> 
                        </div>
                    </div>
                    
                    
                    <h5>Other Problems</h5>
                    <label><input type="checkbox" name="OtherProbs[ChalkBrood]" value="1">Chalk Brood</label>
                    <label><input type="checkbox" name="OtherProbs[Nos]" value="1">Nosema</label>
                    <label><input type="checkbox" name="OtherProbs[EFB]" value="1">E. Foulbrood</label>
                    <label><input type="checkbox" name="OtherProbs[AFB]" value="1">A. Foulbrood</label>
                    <label><input type="checkbox" name="OtherProbs[Beetle]" value="1">Hive Beetle</label>
                    <!-- Add wax moth -->
                    <label><input type="checkbox" name="OtherProbs[Other]" value="1">Other:<input type="text" name="OtherProbOtherText"></label><br>
                    <input type="hidden" name="OtherProbs[NA]" value="0">
                    <label>Treatments:<input type="text" name="OtherProbTreat"></label><br>                    
                    <label>Comments:<input type="text" name="OtherProbComments"></label>
                    
                    <h5>Dead Hive</h5><!-- this is a good spot for a colapsable form -->
                    <label><input type="radio" name="Dead" value="No" checked>No</label>
                    <label><input type="radio" name="Dead" value="Yes">Yes</label><br>   
                    <label>Suspected Cause:<input type="text" name="DeadComments"></label>                
                </div>           

          <!--  <div>
                    <h4>Actions Taken</h4>                    
                    <label><input type="checkbox" name="Actions[FedSugar]" value="1">Fed Hive (Suryp)</label>                    
                    <label><input type="checkbox" name="Actions[FedPollen]" value="1">Fed Hive (Pollen Patty)</label>
                    <label><input type="checkbox" name="Actions[Excluder]" value="1">Added Excluder</label>
                    <label><input type="checkbox" name="Actions[Requeen]" value="1">Requeened</label>
                    <label><input type="checkbox" name="Actions[SwapBox]" value="1">Swapped Brood Boxes</label>
                    <label><input type="checkbox" name="Actions[RemoveComb]" value="1">Removed Old Comb:</label>
                    <label>How many frames?<input type="number" name="ActionsRemoveCombNumber" min="0"></label>
                    <label><input type="checkbox" name="Actions[HoneyHarvest]" value="1">Honey Harvested:</label>
                    <label>How many Pounds?<input type="number" step="0.01" min="0" name="ActionsHoneyHarvNumber"></label>
                    <label><input type="checkbox" name="Actions[AddBox]" value="1">Added Box</label>
                    <label><input type="checkbox" name="Actions[Split]" value="1">Split Hive:</label>
                    <label>New Hive #<input type="text" name="ActionsNewHiveNum"></label>
                    <label><input type="checkbox" name="Actions[Merge]" value="1">Merged Hive:</label>
                    <label>Merged Hive #<input type="text" name="ActionsMergedHiveNum"></label>
                    <label><input type="checkbox" name="Recs[ReplaceEquip]" value="1">Replaced Equipment</label>
                    <label><input type="checkbox" name="Actions[Other]" value="1">Other:</label><input type="text" name="ActionsOtherText">                    
                </div>-->
                    
        <!--    <div>
                    <h4>Recommendations:</h4>
                    <label><input type="checkbox" name="Recs[FedSugar]" value="1">Feed Hive (Suryp)</label>                    
                    <label><input type="checkbox" name="Recs[FedPollen]" value="1">Feed Hive (Pollen Patty)</label>
                    <label><input type="checkbox" name="Recs[Excluder]" value="1">Add Excluder</label>
                    <label><input type="checkbox" name="Recs[AddBox]" value="1">Add Box</label>
                    <label><input type="checkbox" name="Recs[Split]" value="1">Split</label>
                    <label><input type="checkbox" name="Recs[Merge]" value="1">Merge Hive:</label>
                    <label><input type="checkbox" name="Recs[ReplaceQueen]" value="1">Replace Queen</label>
                    <label><input type="checkbox" name="Recs[SwarmWatch]" value="1">Swarming Imminent - Needs Monitoring</label>
                    <label><input type="checkbox" name="Recs[ReplaceEquip]" value="1">Replace Equipment:<input type="text" name="RecReplaceEquipText"></label>                   
                    <label><input type="checkbox" name="Recs[HoneyHarvest]" value="1">Honey Harvest:</label>
                    <label><input type="checkbox" name="Recs[Other]" value="1">Other:</label><input type="text" name="RecOtherText"><br>                    
                    <label>Comments:<input type="text" name="RecComments"></label>
                </div>-->

                <div>                
                    <label>General Comments:<input type="text" name="GenComments"></label><br>
                    <button type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>   
<script type='text/javascript' src='js/modal.js'></script>
</body>