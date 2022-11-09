<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>FYP project</title>
        <link rel="stylesheet" href="http://localhost:8000/IE4717/IE4717_MiniProject/IE4717/styles/shoppingCart.css">
    </head>
    <body>
        <header>
            <nav>
                <h1 class="nav-heading">JKL Cinema</h1>
                <div class="nav-links">
                    <a href="Homepage.html" >Home</a>
                    <a href="cinemalocation.html" > Cinema Location</a>
                    <a href="" class="selected"> Cart</a>
                    <a href="CheckingBooking.php" > Check Booking</a>
                    <a href="contactus.html" > Contact us</a>
                </div>
            </nav>
        </header>
        <main class="shows-container">
            <div class="show-content">
                <div class="show-left-panel">
                    <h2>Check Out</h2>
                    <br>
                    <table id="cartTable" style="margin-left: 10px" >
                        <thead>
                            <tr>
                                <th>Movie Name</th>
                                <th>Location And Time</th>
                                <th>Show Date</th>
                                <th>Seats</th>
                                <th>Number of Tickets</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                session_start();
                                if(isset($_SESSION["seats"])){
                                    $seats = $_SESSION["seats"];
                                }
                                else{
                                    $seats = array();
                                }
                                if(isset($_SESSION["addToCartDate"])){
                                    $addToCartDate = $_SESSION["addToCartDate"];
                                }
                                else{
                                    $addToCartDate = array();
                                }
                                if(isset($_SESSION["showDate"])){
                                    $showDate = $_SESSION["showDate"];
                                }
                                else{
                                    $showDate = array();
                                }
                                if(isset($_SESSION["totalPrice"])){
                                    $totalPrice = $_SESSION["totalPrice"];
                                }
                                else{
                                    $totalPrice = array();
                                }
                                if(isset($_SESSION["locationAndTime"])){
                                    $locationAndTime = $_SESSION["locationAndTime"];
                                }
                                else{
                                    $locationAndTime = array();
                                }
                                if(isset($_SESSION["movieName"])){
                                    $movieName = $_SESSION["movieName"];
                                }
                                else{
                                    $movieName = array();
                                }
                                if(isset($_SESSION["ticketQty"])){
                                    $ticketQty = $_SESSION["ticketQty"];
                                }
                                else{
                                    $ticketQty = array();
                                }

                                $seats = str_replace("\"", "", $seats);
                                $seats = str_replace("[", "", $seats);
                                $seats = str_replace("]", "", $seats);
                                $seats = str_replace(",", ", ", $seats);

                                for($i = 0; $i <count($movieName); $i++){
                                    echo "<tr>
                                    <td>".$movieName[$i]."</td>
                                    <td>".$locationAndTime[$i]."</td>
                                    <td>".$showDate[$i]."</td>
                                    <td>".$seats[$i]."</td>
                                    <td>".$ticketQty[$i]."</td>
                                    <td>".$totalPrice[$i]."</td>
                                    <td><input class='deleteBtn' type='button' value='Delete' onclick='deleteRow(this)'></td>
                                </tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                    <br>
                    <label for="name" style="margin-left: 10px">*Name: </label>
                    <input id="name" type="text" name="name" required placeholder="Enter your name here"/>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label for="">*Email: </label>
                    <input id="email" type="email" name="email" placeholder="Enter your Email-ID here" required/>
                    <br><br>
                    <input class="procceedToPaymentBtn" type="button" value="Proceed to Payment" onclick="test()" style="margin-left: 600px;">
                </div>
            </div>
        </main>
    </body>
    <script>
        function test() {
            var name = document.getElementById("name").value;
            var email = document.getElementById("email").value;
            if (
                !email.match(/^[\w.-]+@[\w]/)
            ) {
                alert("Email format wrong.");
                return false;
            } else if (!name.match(/^[A-Za-z\s]+$/)) {
                alert("Only letters are allowed for your name.");
                return false;
            } else if(document.querySelectorAll('#cartTable tbody tr').length <= 0){
                alert("Shopping Cart is empty.");
            }  else {
                alert("Purchase completed.\nA confirmation email has been sent.\nClick ok to proceed to homepage.");
                let data = new FormData();
                data.append("email", email);
                data.append("name", name);

                fetch("email.php", {
                    method: "POST",
                    body : data
                })
                .then(res => res.text())
                .then((res) => { console.log(res); });
                //location.href = "http://localhost:8000/IE4717/IE4717_MiniProject/IE4717/Homepage.html";
                return true;
            }
        }

        function deleteRow(r){
            var i = r.parentNode.parentNode.rowIndex;
            console.log(i)
            document.getElementById("cartTable").deleteRow(i);

            let data = new FormData();
            data.append("rowNum", i);

            fetch("deleteRow.php", {
                    method: "POST",
                    body : data
                })
                .then(res => res.text())
                .then((res) => { console.log(res); });
        }
    </script>
</html>