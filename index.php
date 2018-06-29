<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Beeple</title> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- FONT –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
        <!-- CSS –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>
    <div class="container">
        <nav>
            <div class="nav-menu">
                <?php include 'includes/nav-menu.php';?>
            </div>
        </nav>
        <div class="wrapper content">
            <div>
              <iframe src="https://www.meteoblue.com/en/weather/widget/daily?geoloc=detect&days=7&tempunit=FAHRENHEIT&windunit=MILE_PER_HOUR&precipunit=INCH&coloured=monochrome&pictoicon=0&pictoicon=1&maxtemperature=0&maxtemperature=1&mintemperature=0&mintemperature=1&windspeed=0&windspeed=1&windgust=0&winddirection=0&uv=0&humidity=0&precipitation=0&precipitation=1&precipitationprobability=0&spot=0&pressure=0&layout=light"  frameborder="0" scrolling="NO" allowtransparency="true" sandbox="allow-same-origin allow-scripts allow-popups allow-popups-to-escape-sandbox" style="width: 378px;height: 268px"></iframe>
                <div><!-- DO NOT REMOVE THIS LINK -->
                    <a href="https://www.meteoblue.com/en/weather/forecast/week?utm_source=weather_widget&utm_medium=linkus&utm_content=daily&utm_campaign=Weather%2BWidget" target="_blank">meteoblue</a>
                </div>
            </div>
            <div class="wrapper">
                <div class="feed">
                    <div class="recommend">
                        <h5>Recommendations</h5>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>       
                    </div>
                    <div class="actions">
                        <h5>Actions Taken</h5>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>   
                    </div>                    
                    <div class="patterns">
                        <h5>Patterns Detected</h5>
                        <ul>
                            <li></li>
                            <li></li>
                            <li></li>
                        </ul>    
                    </div>                              
                </div>                
            </div>            
            </div>
        </div>
    </body>