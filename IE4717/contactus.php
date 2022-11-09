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
            $enqType=$_POST['Enquiry'];
            $Desc=$_POST['Desc'];
            $date = date('y-m-d');

            $sql = "INSERT INTO enquiries VALUES
                ('NULL', '".$username."','".$contactNo."','".$email."','".$enqType."', '".$date."', '".$Desc."')";

            echo "Enquires sent, we will contact you shortly";
            $db -> query($sql) ;
            
            $db->close();
        ?>
    </body>
</html>