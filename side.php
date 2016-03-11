<!DOCTYPE html>
<html lang="en">
<?php include('connection.php'); global $conn ?> 
<?php session_start(); ?>
<?php
function getUserName($id)
{
    global $conn;
    if ($stmt = $conn->prepare("SELECT fname, phone, email, gender, age, address, emergency, lname, user_photo  FROM `user` where id = ? ")) 
         {
            //echo "hi";
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $stmt->bind_result($fname, $phone, $email, $gender, $age, $address, $emergency, $lname, $user_photo);
                while ($stmt->fetch()) 
            {
            $rows[] = array('fname' => $fname, 'phone' => $phone, 'email' => $email, 'gender' => $gender, 'age' => $age, 'address' => $address, 'emergency' =>$emergency, 'lname' => $lname, 'user_photo' => $user_photo);
            //print_r($rows);
            }
            $stmt->close();
            return $rows;
           

}
    else 
        {
            printf("Error message: %s\n", $conn->error);
        }
}

?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> MyHealthPal </title>

    <!-- Bootstrap Core CSS -->
    <link href="dashboard/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="dashboard/css/simple-sidebar.css" rel="stylesheet"> 
        <link href="dashboard/css/otherstyles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                      <a href="#">
                      <font size="6">  MyHealthPal </font>
                    </a>
                </li>
                <br>
                <li class="user-name">
                      <a href="#">
                      <font size="5"> <?php
                    $name = getUserName($_SESSION['id']);
                    echo $name[0]['fname']." ".$name[0]['lname'];
                    ?>  </font>
                    </a>
                </li>
                <br>
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                 <li data-toggle="collapse" href="#collapse1" ><a>Medical Parameters</a> </li>
                    <div id="collapse1" class="panel-collapse collapse">
                        <ul calss="sidebar-nav" >
                            <li > <a href="display_bloodpressure.php">Blood Pressure </a></li>
                            <li ><a href="display_glucose.php" >Blood Glucose </a></li>
                            <li ><a href="display_weight.php" >Weight </a></li>
                            <li ><a href="display_height.php" >Height </a></li>
                            <li ><a href="display_heartrate.php" >Heart Rate </a></li>
                        </ul>
                    </div>
                <li>
                    <a href="display_treatment.php">Treatments</a>
                </li>
                
                 <li data-toggle="collapse" href="#collapse2" ><a>Ailments</a> </li>
                    <div id="collapse2" class="panel-collapse collapse">
                        <ul calss="sidebar-nav" >
                            <li > <a href="#">Fever </a></li>
                            <li ><a href="#" >Skin Condition </a></li>
                            <li ><a href="#" >Dengue </a></li>
                            <li ><a href="#" >Typhoid </a></li>
                            <li ><a href="#" >Chicken Gunya </a></li>
                            <li ><a href="#" >Diarrhea </a></li>
                            <li ><a href="#" >Malaria</a></li>
                         </ul>
                    </div>
               <li>
                    <a href="display_appointements.php">Appointments</a>
                </li>
                 <li>
                    <a href="display_prescription.php">Prescription</a>
                </li>
                <li>
                    <a href="display_documents.php">Documents</a>
                </li>
                 <li>
                    <a href="logout.php">Logout</a>
                </li>
                
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

    <!-- jQuery -->
    <script src="dashboard/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="dashboard/js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
