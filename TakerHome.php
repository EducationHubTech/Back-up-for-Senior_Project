<!DOCTYPE html>
<html>
<head>
<style>
table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #000;
}

th{
  background-color: black; 
  color: white;
}

tr:hover {
    background-color: #f5f5f5;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

.space {
    margin-bottom: 16px;
}
.button-col {
    width: 25%;
}

.button-col button {
    display: block;
    margin: 0 auto;
    width: 80%;
}

table tr.hidden-row {
  display: none;
}
</style>
</head>
<body style="background-color: #dfdfdf">
	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b> on_the_go incident reporter </b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">Official Login</a></li>
        <li ><a href="Takerlogin.php">Taker Login</a></li>
        <li class="active"><a href="TakerHome.php">Taker Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
        <li><a href="Taker_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>

    <form style="margin-top: 7%; margin-left: 40%;" method="post">
      <input type="text" name="cid" style="width: 250px; height: 30px; background-color:white;" placeholder="&nbsp Complaint Id" id="ciid" onfocusout="f1()" required>
        <div>
      <input class="btn btn-primary" type="submit" value="Search" name="s2" style="margin-top: 10px; margin-left: 11%;"> </br> </br>
        </div>
    </form>
    
    
    

    <div style="position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 30px;
   background-color: rgba(0,0,0,0.8);
   color: white;
   text-align: center;">
  <h4 style="color: white;">&copy <b> on_the_go incident reporter | All Right Reserved</b></h4>
</div>



<?php
    session_start();
    if(!isset($_SESSION['x']))
        header("location:Takerlogin.php");
    
    $conn=mysqli_connect("localhost","root","");
   
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  mysqli_select_db($conn,"on_the_go incident reporter");
  // Fetch all the complaints from the database
  $sql = "SELECT id_no,c_id, type_crime, d_o_c,repo_time_and_date,location,description, inc_status, p_id FROM complaint";
  $result = mysqli_query($conn, $sql);
  
  // Check if there are any complaints in the database
  if (mysqli_num_rows($result) > 0) {
      // Start the table and output the header row
      echo "<table>";
      echo "<tr>
      <th>Registration ID</th>
      <th>Complaint ID</th>
      <th>Type of Crime</th>
      <th>Date of Crime</th>
      <th>Reported Time and Date </th>
      <th>Location</th>
      <th>Descripition</th>
      <th>Complaint Status</th>
      <th>Police ID</th></tr>";
  
      // Loop through the result set and output each row as a table row
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr class='complaint-row' id='complaint-".$row["c_id"]."'>
            <td>" . $row["id_no"] . "</td>
            <td>" . $row["c_id"] . "</td>
            <td>" . $row["type_crime"] . "</td>
            <td>" . $row["d_o_c"] . "</td>
            <td>" . $row["repo_time_and_date"] . "</td>
            <td>" . $row["location"] . "</td>
            <td>" . $row["description"] . "</td>
            <td>" . $row["inc_status"] . "</td>
            <td>" . $row["p_id"] . "</td>
            <td>
                <div class='btn-group' role='group'>
                    <form method='post'>
                        <input type='hidden' name='c_id' value='" . $row["c_id"] . "'>
                        <input type='hidden' name='id_no' value='" . $row["id_no"] . "'>
                        <input type='hidden' name='type_crime' value='" . $row["type_crime"] . "'>
                        <input type='hidden' name='d_o_c' value='" . $row["d_o_c"] . "'>
                        <input type='hidden' name='repo_time_and_date' value='" . $row["repo_time_and_date"] . "'>
                        <input type='hidden' name='location' value='" . $row["location"] . "'>
                        <input type='hidden' name='description' value='" . $row["description"] . "'>
                        <input type='hidden' name='inc_status' value='" . $row["inc_status"] . "'>
                        <input type='hidden' name='p_id' value='" . $row["p_id"] . "'>
                        <button type='button' name='pass_to_handler' class='btn btn-primary' onclick='hideRow(".$row["c_id"].")'>Pass to Handler</button>
                    </form>
                    <button type='button' class='btn btn-danger' onclick='rejectComplaint(" . $row["c_id"] . ")'>Reject Complaint</button>
                </div>
            </td>
        </tr>";
    }
      // End the table
      echo "</table>";
  } else {
      // If there are no complaints in the database, output a message
      echo "No complaints found.";
  }

// check if the pass to handler button was clicked
if(isset($_POST['pass_to_handler'])) {

    // retrieve the data from the row
    $c_id = $_POST['c_id'];
    $id_no = $_POST['id_no'];
    $type_crime = $_POST['type_crime'];
    $d_o_c = $_POST['d_o_c'];
    $repo_time_and_date = $_POST['repo_time_and_date'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $inc_status = $_POST['inc_status'];
    $p_id = $_POST['p_id'];

    // insert the data into the p_handler table
    $sql = "INSERT INTO p_handler (c_id, id_no, type_crime, d_o_c, repo_time_and_date, location, description, inc_status, p_id)
    VALUES ('$c_id', '$id_no', '$type_crime', '$d_o_c', '$repo_time_and_date', '$location', '$description', '$inc_status', '$p_id')";
    
    if ($conn->query($sql) === TRUE) {
        // remove the row from the table
        // add your code to remove the row here
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


  mysqli_close($conn);
  ?>
	<title>Taker Homepage</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
	
    <script>
     function f1()
        {
          var sta2=document.getElementById("ciid").value;
          var x2=sta2.indexOf(' ');
     if(sta2!="" && x2>=0)
     {
        document.getElementById("ciid").value="";
        alert("Blank Field not Allowed");
      }      
       
}
function hideRow(complaintId) {
  // get the table row that contains the button
  var row = document.getElementById("complaint-"+complaintId);
  // add the 'hidden-row' class to the row
  row.classList.add('hidden-row');
}
</script>




 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>