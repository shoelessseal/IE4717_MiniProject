<!DOCTYPE html>
<html lang="en">
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
            $username=$_POST['username'];
            $contactNo=$_POST['ContactNo'];
            $email=$_POST['Email'];
            $enquiry=$_POST['Enquiry'];
            $Desc=$_POST['Desc'];
            
            $sql = "INSERT INTO enquiry(`username`, `Contact No`, `Email`, `Enquiry`, `Descrp`) 
            VALUES ('$username','$contactNo','$email','$enquiry','$Desc')";

            echo $sql;
            $db -> query($sql) ;
            
        ?>
    </body>
</html>