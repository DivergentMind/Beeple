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
    <nav>
        <div class="nav-menu">
            <?php include 'includes/nav-menu.php';?>
        </div>
    </nav>
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
                    <label><input type="radio" name="Temperament" value="Calm">Calm</label>
                    <label><input type="radio" name="Temperament" value="Nervous" >Nervous</label>
                    <label><input type="radio" name="Temperament" value="Aggressive">Aggressive</label>
                    <label><input type="radio, hidden" name="Temperament" value="NA" checked hidden></label>
                </div>
                <hr />
                    
                <h4>Queen and Brood</h4>

                <div>
                    <h5>Saw Queen</h5> 
                    <label><input type="radio" name="QueenSeen" value="No" checked>No</label>
                    <label><input type="radio" name="QueenSeen" value="Yes">Yes</label>
            
                </div>

                <div>
                    <h5>Brood</h5>
                    <label><input type="radio" name="LayingPattern" value="Beaut">Beautiful (Solid &amp; Uniform)</label>
                    <label><input type="radio" name="LayingPattern" value="Medio">Mediocre (Little spotty)</label>
                    <label><input type="radio" name="LayingPattern" value="Poor">Poor (Spotty)</label>  
                    <label><input type="radio, hidden" name="LayingPattern" value="NA" checked hidden></label><br>
                    <label>How Many Brood Frames:<input type="number" name="NumbBroodFrames" min="0"></label> 
               
                    
                    <h6></h6>
                    <label>Eggs Seen:<input type="radio" name="EggsSeen" value="Yes">Yes</label>
                    <label><input type="radio" name="EggsSeen" value="No" checked>No</label><br>
                    <label>Comments:<input type="text" name="EggComments"></label>                    
                </div>
                    
                <hr />   
                <h4>Hive Condition</h4>

                <div>
                    <h5>Population</h5>
                    <label>Seams of Bees:<input type="number" name="Population" min="0" ></label><br> 
                    <label>Crowded?<input type="radio" name="Crowded" value="Yes">Yes</label>
                    <label><input type="radio" name="Crowded" value="No" checked>No</label>                    
                </div>

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
                
                <hr />
                <h4>Disease/Pests/Death</h4>
                <div class="hideToggle">                        
                    <h5 class="accordion">Verroa Mites</h5>
                      <div class="hidden">  
                        <label>Mite Check:<input type="radio" name="MiteCheck" value="No" checked>No</label>
                        <label><input type="radio" name="MiteCheck" value="Yes">Yes</label><br>                    
                        <label><input type="radio" name="SamplingMethod" value="Sugar" checked>Sugar Roll</label>                 
                        <label><input type="radio" name="SamplingMethod" value="Alcohol">Alcohol Wash</label>
                        <label><input type="radio" name="SamplingMethod" value="NA" checked>N/A<br></label>
                        <label>How many mites in the sample?<input type="number" name="MiteCount" min="0" value="null"></label>
                        <div>
                            <button type="button" id="MiteTreatBtn">Recommend Mite Treatment</button>    
                        </div>                      
                    </div> 
                </div>
                    
                <div id="MiteModal" class="modal">
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
                    
                <div class="hideToggle">
                    <h5 class="accordion">Other Problems</h5>
                    <div class="hidden">
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
                    </div>
                </div>
                    
                <div class="hideToggle">
                    <h5 class="accordion">Dead Hive</h5><!-- this is a good spot for a colapsable form -->
                    <div class="hidden">                        
                        <label><input type="radio" name="Dead" value="No" checked>No</label>
                        <label><input type="radio" name="Dead" value="Yes">Yes</label><br>   
                        <label>Suspected Cause:<input type="text" name="DeadComments"></label>   
                    </div>
                </div>
                    
                <div>                
                    <label>General Comments:<input type="text" name="GenComments"></label><br>
                    <button type="submit">Submit</button>
                </div>
                </form>
            </div>
        </div>   
<script type='text/javascript' src='js/modal.js'></script>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var hidden = this.nextElementSibling;
    if (hidden.style.maxHeight){
      hidden.style.maxHeight = null;
    } else {
      hidden.style.maxHeight = hidden.scrollHeight + "px";
    } 
  });
}
</script>
    
</body>