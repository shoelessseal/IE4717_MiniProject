<!DOCTYPE html>
<html lang="en">
    <body>
        <?php
            $servername = "localhost";
			$username = "f32ee";
			$password = "f32ee";
            $dbname = "JKLC";

            @ $db = new mysqli($servername, $username, $password, $dbname);
			if (mysqli_connect_errno()) {
				 echo "Error: Could not connect to database.  Please try again later.";
				 exit;
			}
            $username=$_POST['username'];
            $contactNo=$_POST['ContactNo'];
        ?>
    </body>
</html>