<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FYP project</title>
        <link rel="stylesheet" href="http://localhost:8000/IE4717/IE4717_MiniProject/IE4717/styles/SeatSelection.css">
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

        $QTY = $_POST["Qty"];
        $locationAndTime = $_POST["TimeSlotRadio"];
        $movieName = $_POST["movieName"];

        $query_get = "SELECT price FROM movies WHERE movieName= '".$movieName."'";
        $query_result  = mysqli_query($db, $query_get);
        $ticketPrice  = mysqli_fetch_array($query_result);
        $totalPrice = floatval($ticketPrice[0]) * intval($QTY);
        
        $query_get = "SELECT image_PathLocation FROM movies WHERE movieName= '".$movieName."'";
        $query_result  = mysqli_query($db, $query_get);
        $img_path  = mysqli_fetch_array($query_result);
        
        $query_get = "SELECT seatID FROM seatings WHERE movieName= '".$movieName."'AND locationAndTime ='".$locationAndTime."' ";
        $query_result  = mysqli_query($db, $query_get);
        $takenSeats  = array();
        foreach ($query_result as $result_value) {
            array_push($takenSeats, $result_value["seatID"]);
        }

        ?>
        <header>
            <nav>
                <h1 class="nav-heading">JKL Cinema</h1>
                <div class="nav-links">
                    <a href="Homepage.html" class="selected">Home</a>
                    <a href="cinemalocation.html" > Cinema Location</a>
                    <a href="shoppingCart.php"> Cart</a>
                    <a href="checkbooking.html" > Check Booking</a>
                    <a href="contactus.html" > Contact us</a>
                </div>
            </nav>
        </header>
        <main class="shows-container">
            <div class="show-content">
                <div class="show-left-panel">
                    <h1 class="movie-title">
                        <?php echo $movieName; ?>
                    </h1>
                    <h2>Seat Selection:</h2>
                    <br>
                    <div class="screen"></div>
                    <br><br>
                    <div id="Qty" style="display: none;">
                        <?php echo $QTY; ?>
                    </div>
                    <div id="locationAndTime" style="display: none;">
                        <?php echo $locationAndTime; ?>
                    </div>
                    <!-- SEAT LAYOUT -->
                    <div id="layout"></div>
 
                    <!-- LEGEND -->
                    <div id="legend">
                        <div class="seat"></div> <div class="txt">Available</div>
                        <div class="seat taken"></div> <div class="txt">Taken</div>
                        <div class="seat selected"></div> <div class="txt">Your Chosen Seats</div>
                    </div>
                    <br>
                    <div class="priceContainer" style="margin-left: 95px; font-size: 150%;">
                        <b>
                            <div class="child-element" style="float: left">Total Price: $</div>
                                <div id="totalPrice" class="child-element" style="float: left">
                                    <?php echo $totalPrice; ?>
                                </div>
                        </b>        
                    </div>
                    <br>
                    <!-- SAVE SELECTION -->
                    <button id="save" onclick="reserve.save()">Add to Cart</button>
                </div>
                <div class="show-right-content">
                    <?php echo '<img src="' .$img_path[0]. '" alt>'; ?>
                </div>
            </div>
        </main>
    </body>
    <script>
        var reserve = {
            // INIT
            init : () => {
                // GET LAYOUT WRAPPER
                let layout = document.getElementById("layout");
            
                // GENERATE SEATS
                for (let i=65; i<=69; i++) { 
                    for (let j=1; j<=8; j++) {
                        let seat = document.createElement("div");
                        seat.innerHTML = String.fromCharCode(i) + j;
                        seat.className = "seat";
                   
                        seat.onclick = () => { reserve.toggle(seat); };
                        layout.appendChild(seat);
                    }
                }
                
                
                // TAKEN SEATS
                let all = document.querySelectorAll("#layout .seat");

                var takenSeatsArr = <?php echo json_encode($takenSeats); ?>

                for (var x = 0; x < takenSeatsArr.length; x++) {
                    for(var y = 0; y < all.length; y ++){
                        if(takenSeatsArr[x] === all[y].innerText){
                            all[y].classList.add("taken");
                            all[y].onclick = "";
                        }
                    } 
                }      
            },
            
            //CHOOSE THIS SEAT
            toggle : (seat) => {
                let count = document.getElementById("Qty").textContent;
                count = Number(count);
                //GET SELECTED SEATS
                let selected = document.querySelectorAll("#layout .selected");
                selected = selected.length;                
                if(selected < count || seat.classList == "seat selected"){
                    seat.classList.toggle("selected");
                }
            },
            
            //SAVE BOOKING TO SHOPPING CART
            save : () => {
                //GET SELECTED SEATS
                let selected = document.querySelectorAll("#layout .selected");
                
                let count = document.getElementById("Qty").textContent;
                count = Number(count);
                //ERROR!
                if (selected.length < count) { alert(count + " Seats must be selected"); }
            
                //SELECTED SEATS
                else {
                //GET SELECTED SEAT NUMBERS
                alert("Item added to cart.\n Click ok to proceed to homepage.");
                let seats = [];
                for (let s of selected) { seats.push(s.innerHTML); }
                
                //POST to AddToCart.php
                let data = new FormData();
                let totalPrice = document.getElementById("totalPrice").textContent;
                totalPrice - parseFloat(totalPrice);
                let locationAndTime = document.getElementById("locationAndTime").textContent;
                locationAndTime = locationAndTime.trim();  
                let movieName = <?php echo json_encode($movieName); ?>;
                //get today's date
                var today= new Date();
                // Get year, month, and day part from the date
                var yyyy = today.toLocaleString("default", { year: "numeric" });
                var mm = today.toLocaleString("default", { month: "2-digit" });
                var dd = today.toLocaleString("default", { day: "2-digit" });

                // Generate yyyy-mm-dd date string
                var formattedDate = yyyy + "-" + mm + "-" + dd;

                data.append("seats", JSON.stringify(seats));
                data.append("addToCartDate", formattedDate);
                data.append("showDate", "2022-11-20");
                data.append("ticketQty", count);
                data.append("totalPrice", totalPrice);
                data.append("locationAndTime", locationAndTime);
                data.append("movieName", movieName);
                fetch("AddToCart.php", {
                    method: "POST",
                    body : data
                })
                .then(res => res.text())
                .then((res) => { console.log(res); });
                location.href = "http://localhost:8000/IE4717/IE4717_MiniProject/IE4717/Homepage.html";
                }
                
            }
        };
 
        window.addEventListener("DOMContentLoaded", reserve.init);
    </script>
</html>