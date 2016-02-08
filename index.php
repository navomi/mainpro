<!DOCTYPE html>
<html lang="en">

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
                <li>
                    <a href="dashboard.php">Dashboard</a>
                </li>
                 <li data-toggle="collapse" href="#collapse1" ><a>Medical Parameters</a> </li>
                    <div id="collapse1" class="panel-collapse collapse">
                        <ul calss="sidebar-nav" >
                            <li > <a href="progpre.php">Blood Pressure </a></li>
                            <li ><a href="proglu.php" >Blood Glucose </a></li>
                            <li ><a href="progwei.php" >Weight </a></li>
                            <li ><a href="proghei.php" >Height </a></li>
                            <li ><a href="proghea.php" >Heart Rate </a></li>
                        </ul>
                    </div>
                <li>
                    <a href="treatments.php">Treatments</a>
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
                    <a href="appointements.php">Appointments</a>
                </li>
                 <li>
                    <a href="prescription.php">Prescription</a>
                </li>
                <li>
                    <a href="documents.php">Documents</a>
                </li>
                 <li>
                    <a href="logout.php">Logout</a>
                </li>
                
                
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Your Overall Progress Details</h1>
                       <!-- <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>-->
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

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
