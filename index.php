<?php

    $backgroundImage = "img/sea.jpg";

    if(isset($_GET['keyword'])) {
        include 'api/pixabayAPI.php';
        $imageURLs = getImageURLs($_GET['keyword']);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Image Carousel</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" href="" type="text/css" />
        
        <style>
            @import url("css/styles.css");
            body{
                background-image: url(<?=$backgroundImage?>);
            }
        </style>
    </head>
    <body>
        <br/><br/>
        
        <?php
        
            if (!isset($imageURLs)){
                echo "<h2> Type a keyword to display a slideshow <br /> with a random image from Pixabay.com </h2>";
            } else {
                // Display Carousel Here
                for($i=0; $i<7; $i++){
                    echo "<img src= '" . $imgURLs[rand(0,count($imageURLs))] . "' width = '200' />";
                    
                }
            
        
        ?>
        
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- indicators Here -->
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <?php
                  for($i=0; $i<7; $i++){
                      echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                      echo ($i == 0) ? " class='active'": "";
                      echo "></li>";
                  }
              ?>
            </ol>
            
            <div class=carousel-inner role="listbox">
                
                <?php
                    for ($i=0; $i<7; $i++){
                        do {
                            $randomIndex = rand(0,count($imageURLs));
                        }
                        while (!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i==0)?"active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                        
                    }
                ?>
                </div>
            
            <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
        
        <?php
            }
        ?>
        
        <form>
            <input type="text" name="keyword" placeholder = "Keyword" method="post"/>
            <input type="Submit" value="Submit"/>
        </form>
        <!-- HTML form goes here! -->
        <br/><br/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>    
    </body>
</html>