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
      <a class="navbar-brand" href="home.php"><b> on_the-go incident reporter </b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="official_login.php">Official Login</a></li>
        <li ><a href="Handlerlogin.php">Handler Login</a></li>
        <li class="active"><a href="HandlerHome.php">Handler Home</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
        <li><a href="Handler_logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
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
    
    <table>
		<thead>
			<tr>
				<th>Complaint ID</th>
				<th>Type of Crime</th>
				<th>Date of Crime</th>
				<th>Location</th>
				<th>Complaint Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
				if(isset($_POST['complaints'])) {
					$complaints = $_POST['complaints'];
					foreach($complaints as $complaint) {
						echo "<tr>";
						echo "<td>" . $complaint['complaint_id'] . "</td>";
						echo "<td>" . $complaint['type_of_crime'] . "</td>";
						echo "<td>" . $complaint['date_of_crime'] . "</td>";
						echo "<td>" . $complaint['location'] . "</td>";
						echo "<td>" . $complaint['complaint_status'] . "</td>";
						echo "</tr>";
					}
				}
			?>
		</tbody>
	</table>
    

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
        header("location:Handlerlogin.php");
    
    $conn=mysqli_connect("localhost","root","");
   
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  mysqli_select_db($conn,"on_the_go incident reporter");


  ?>

	<title>Handler Homepage</title>
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
</script>

 <script type="text/javascript" src="https://code.jquery.com/jquery-2.1.4.js"></script>
 <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>