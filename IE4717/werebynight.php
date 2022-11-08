<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FYP project</title>
        <link rel="stylesheet" href="http://localhost:8000/IE4717/IE4717_MiniProject/IE4717/styles/blackAdam.css">
    </head>
    <body>
        <?php
        $servername = "localhost";
        $username = "f32ee";
        $password = "f32ee";
        $dbname = "JKLC";

        @ $db = new mysqli($servername, $username, $password, $dbname);
        if (mysqli_connect_error()) {
            echo "Error: Could not connect to database.  Please try again later.";
            exit;
        }

        $query_get = "SELECT image_PathLocation FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $img_path  = mysqli_fetch_array($query_result);

        $query_get = "SELECT video_PathLocation FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $vid_path  = mysqli_fetch_array($query_result);

        $query_get = "SELECT synopsis FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $synopsis  = mysqli_fetch_array($query_result);

        $query_get = "SELECT director FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $director  = mysqli_fetch_array($query_result);
        
        $query_get = "SELECT genre FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $genre  = mysqli_fetch_array($query_result);

        $query_get = "SELECT price FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $price  = mysqli_fetch_array($query_result);
        
        $query_get = "SELECT movieDate FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $movieDate  = mysqli_fetch_array($query_result);

        $query_get = "SELECT movieLanguage FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $movieLanguage  = mysqli_fetch_array($query_result);

        $query_get = "SELECT duration FROM movies WHERE movieName= 'Werewolf by Night'";
        $query_result  = mysqli_query($db, $query_get);
        $duration  = mysqli_fetch_array($query_result);

        //TIMESLOTS FOR CAUSEWAY PT
        $CW_PT_TSS = array();
        $query_get = "SELECT timeSlotStart FROM timeSlots WHERE movieName= 'Werewolf by Night' AND locationName='CauseWay Point'";
        $query_result  = mysqli_query($db, $query_get);
        foreach ($query_result as $result_value) {
            array_push($CW_PT_TSS, $result_value["timeSlotStart"]);
        }
        $CW_PT_TSE = array();
        $query_get = "SELECT timeSlotEnd FROM timeSlots WHERE movieName= 'Werewolf by Night' AND locationName='CauseWay Point'";
        $query_result  = mysqli_query($db, $query_get);
        foreach ($query_result as $result_value) {
            array_push($CW_PT_TSE, $result_value["timeSlotEnd"]);
        }

        //TIMESLOTS FOR ORCHARD CINELEISURE
        $Orchard_TSS = array();
        $query_get = "SELECT timeSlotStart FROM timeSlots WHERE movieName= 'Werewolf by Night' AND locationName='Orchard Cineleisure'";
        $query_result  = mysqli_query($db, $query_get);
        foreach ($query_result as $result_value) {
            array_push($Orchard_TSS, $result_value["timeSlotStart"]);
        }
        $Orchard_TSE = array();
        $query_get = "SELECT timeSlotEnd FROM timeSlots WHERE movieName= 'Werewolf by Night' AND locationName='Orchard Cineleisure'";
        $query_result  = mysqli_query($db, $query_get);
        foreach ($query_result as $result_value) {
            array_push($Orchard_TSE, $result_value["timeSlotEnd"]);
        }

        //TIMESLOTS FOR JEM
        $JEM_TSS = array();
        $query_get = "SELECT timeSlotStart FROM timeSlots WHERE movieName= 'Werewolf by Night' AND locationName='JEM'";
        $query_result  = mysqli_query($db, $query_get);
        foreach ($query_result as $result_value) {
            array_push($JEM_TSS, $result_value["timeSlotStart"]);
        }
        $JEM_TSE = array();
        $query_get = "SELECT timeSlotEnd FROM timeSlots WHERE movieName= 'Werewolf by Night' AND locationName='JEM'";
        $query_result  = mysqli_query($db, $query_get);
        foreach ($query_result as $result_value) {
            array_push($JEM_TSE, $result_value["timeSlotEnd"]);
        }

        //TIMESLOTS FOR WESTMALL
        $WestMall_TSS = array();
        $query_get = "SELECT timeSlotStart FROM timeSlots WHERE movieName= 'Werewolf by Night' AND locationName='WestMall'";
        $query_result  = mysqli_query($db, $query_get);
        foreach ($query_result as $result_value) {
            array_push($WestMall_TSS, $result_value["timeSlotStart"]);
        }
        $WestMall_TSE = array();
        $query_get = "SELECT timeSlotEnd FROM timeSlots WHERE movieName= 'Werewolf by Night' AND locationName='WestMall'";
        $query_result  = mysqli_query($db, $query_get);
        foreach ($query_result as $result_value) {
            array_push($WestMall_TSE, $result_value["timeSlotEnd"]);
        }

        $db->close();
        ?>
        <header>
            <nav>
                <h1 class="nav-heading">JKL Cinema</h1>
                <div class="nav-links">
                    <a href="Homepage.html" class="selected">Home</a>
                    <a href="cinemalocation.html" > Cinema Location</a>
                    <a href="shoppingCart.php"> Cart</a>
                    <a href="CheckingBooking.php" > Check Booking</a>
                    <a href="contactus.html" > Contact us</a>
                </div>
            </nav>
        </header>
        <main class="shows-container">
            <div class="show-content">
                <div class="show-left-panel">
                    <h1 class="movie-title">
                        Werewolf by Night
                    </h1>
                    <div class="show-details">
                        <h2 class="show-details-heading">Show Details</h2>
                        <div class="show-details-info">
                            <p class="director"> <?php echo $director[0]; ?></p>
                            <p class="Release date"> Released: <?php echo $movieDate[0]; ?></p>
                            <p class="Genre">Genre: <?php echo $genre[0]; ?></p>
                            <p class="Duration"> Duration: <?php echo $duration[0]; ?> Minutes</p>
                            <p class="Language"> Language: <?php echo $movieLanguage[0]; ?></p>
                        </div>
                        <video width="640" height="480" controls>
                            <?php echo '<source src="' .$vid_path[0]. '" type="video/mp4">'; ?>
                        </video>
                    </div>
                    <div class="Synopsis">
                        <h2 class="Synopsis-heading">Synopsis</h2>
                        <p class="Synopsis-text"><?php echo $synopsis[0]; ?></p>
                    </div><br>
                    <b>PRICE: $<?php echo $price[0]; ?> </b>
                    <br><br>
                    <form action="seating.php" method="POST" onsubmit="">
                        <h2>Locations:</h2>
                        
                        <button type="button" class="collapsible">CauseWay Point</button>
                        <div class="content">
                            <br>
                            <b>Sunday 20-11-2022</b><br>
                            <input type="radio" name="TimeSlotRadio" id="slot1" value="<?php echo 'CauseWay Point: ', $CW_PT_TSS[0], '~', $CW_PT_TSE[0]; ?>">
                            <label for="slot1"><?php echo $CW_PT_TSS[0], '~', $CW_PT_TSE[0]; ?></label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" name="TimeSlotRadio" id="slot2" value="<?php echo 'CauseWay Point: ', $CW_PT_TSS[1], '~', $CW_PT_TSE[1]; ?>">
                            <label for="slot2"><?php echo $CW_PT_TSS[1], '~', $CW_PT_TSE[1]; ?></label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" name="TimeSlotRadio" id="slot3" value="<?php echo 'CauseWay Point: ', $CW_PT_TSS[2], '~', $CW_PT_TSE[2]; ?>">
                            <label for="slot3"><?php echo $CW_PT_TSS[2], '~', $CW_PT_TSE[2]; ?></label>
                            <br><br>
                        </div>
                        <button type="button" class="collapsible">Orchard Cineleisure</button>
                        <div class="content">
                            <br>
                            <b>Sunday 20-11-2022</b><br>
                            <input type="radio" name="TimeSlotRadio" id="slot4" value="<?php echo 'Orchard Cineleisure: ', $Orchard_TSS[0], '~', $Orchard_TSE[0]; ?>">
                            <label for="slot4"><?php echo $Orchard_TSS[0], '~', $Orchard_TSE[0]; ?></label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" name="TimeSlotRadio" id="slot5" value="<?php echo 'Orchard Cineleisure: ', $Orchard_TSS[1], '~', $Orchard_TSE[1]; ?>">
                            <label for="slot5"><?php echo $Orchard_TSS[1], '~', $Orchard_TSE[1]; ?></label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" name="TimeSlotRadio" id="slot6" value="<?php echo 'Orchard Cineleisure: ', $Orchard_TSS[2], '~', $Orchard_TSE[2]; ?>">
                            <label for="slot6"><?php echo $Orchard_TSS[2], '~', $Orchard_TSE[2]; ?></label>
                            <br><br>
                        </div>
                        <button type="button" class="collapsible">JEM</button>
                        <div class="content">
                            <br>
                            <b>Sunday 20-11-2022</b><br>
                            <input type="radio" name="TimeSlotRadio" id="slot7" value="<?php echo 'JEM: ', $JEM_TSS[0], '~', $JEM_TSE[0]; ?>">
                            <label for="slot7"><?php echo $JEM_TSS[0], '~', $JEM_TSE[0]; ?></label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" name="TimeSlotRadio" id="slot8" value="<?php echo 'JEM: ', $JEM_TSS[1], '~', $JEM_TSE[1]; ?>">
                            <label for="slot8"><?php echo $JEM_TSS[1], '~', $JEM_TSE[1]; ?></label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" name="TimeSlotRadio" id="slot9" value="<?php echo 'JEM: ', $JEM_TSS[2], '~', $JEM_TSE[2]; ?>">
                            <label for="slot9"><?php echo $JEM_TSS[2], '~', $JEM_TSE[2]; ?></label>
                            <br><br>
                        </div>
                        <button type="button" class="collapsible">WestMall</button>
                        <div class="content">
                            <br>
                            <b>Sunday 20-11-2022</b><br>
                            <input type="radio" name="TimeSlotRadio" id="slot10" value="<?php echo 'WestMall: ', $WestMall_TSS[0], '~', $WestMall_TSE[0]; ?>">
                            <label for="slot10"><?php echo $WestMall_TSS[0], '~', $WestMall_TSE[0]; ?></label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" name="TimeSlotRadio" id="slot11" value="<?php echo 'WestMall: ', $WestMall_TSS[1], '~', $WestMall_TSE[1]; ?>">
                            <label for="slot11"><?php echo $WestMall_TSE[1], '~', $WestMall_TSE[1]; ?></label> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                            <input type="radio" name="TimeSlotRadio" id="slot12" value="<?php echo 'WestMall: ', $WestMall_TSS[2], '~', $WestMall_TSE[2]; ?>">
                            <label for="slot12"><?php echo $WestMall_TSS[2], '~', $WestMall_TSE[2]; ?></label>
                            <br><br>
                        </div>
                        <br><br>
                        <div class="quantity">
                            <label for="Qty">Number of Tickets: </label>
                            <input type="number" id="Qty" name="Qty" maxlength="2" value="0" min="0" oninput= "this.value = Math.abs(this.value)">
                        </div><br><br>
                        <div style="display: none;"><input type="text" name = "movieName" id = "movieName" value = "Werewolf by Night"></div>
                        
                        <input type="submit" value="Buy Tickets" class="buyTickets" href="#" class="shows-buy-ticket">
                    </form>
                </div>
                
                <div class="show-right-content">
                    <?php echo '<img src="' .$img_path[0]. '" alt>'; ?>
                </div>
            </div>
        </main>
    </body>
    <script>
        var coll = document.getElementsByClassName("collapsible");
        var i;

        for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.maxHeight){
            content.style.maxHeight = null;
            } else {
            content.style.maxHeight = content.scrollHeight + "px";
            }
        });
        }
    </script>
</html>