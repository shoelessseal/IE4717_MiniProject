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

        $query_get = "SELECT movieName, locationAndTime, showDate, Seats, ticketQty, totalPrice from shoppingCart";
        $query_result  = mysqli_query($db, $query_get);

        $db->close();
        ?>
        <header>
            <nav>
                <h1 class="nav-heading">JKL Cinema</h1>
                <div class="nav-links">
                    <a href="Homepage.html" class="selected">Home</a>
                    <a href="cinemalocation.html" > Cinema Location</a>
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
                        <?php
                            while($row = $query_result->fetch_assoc()){
                                echo "<tr>
                                <td>".$row["movieName"]."</td>
                                <td>".$row["locationAndTime"]."</td>
                                <td>".$row["showDate"]."</td>
                                <td>".$row["Seats"]."</td>
                                <td>".$row["ticketQty"]."</td>
                                <td>".$row["totalPrice"]."</td>
                                <td><input class='deleteBtn' type='button' value='Delete' onclick='deleteRow(this)'></td>
                            </tr>";
                            }
                        ?>
                    </table>
                    <br>
                    <label for="name" style="margin-left: 10px">*Name: </label>
                    <input id="name" type="text" name="name" required placeholder="Enter your name here"/>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <label for="">*Email: </label>
                    <input id="email" type="email" name="email" placeholder="Enter your Email-ID here" required/>
                    <br>
                    <input class="procceedToPaymentBtn" type="button" value="Proceed to Payment" onclick="test()">
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
                alert("Only letters are allowed for your name");
                return false;
            } 
                else {
                alert("Item Added to Cart");
                let data = new FormData();
                data.append("email", email);
                data.append("name", name);

                fetch("email.php", {
                    method: "POST",
                    body : data
                })
                .then(res => res.text())
                .then((res) => { console.log(res); });
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