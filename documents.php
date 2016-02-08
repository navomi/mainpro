<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php include('connection.php'); global $conn ?> 


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
                            <li ><a href="progglu.php" >Blood Glucose </a></li>
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
           <div class="container">
    <form action="" method="POST" enctype="multipart/form-data">
    <br><br>
    <fieldset>
                <legend > <h2>Documents</h2></legend>

                <div>
                <label style="margin-left:10px;" >Name Of The File </label>
                <br>
                    <input type="text" name="name" style="margin-left:10px;"> 
                </div>
<br>
                <div>
                <label style="margin-left:10px;" >Hospital Name </label>
                <br>
                    <input type="text" name="hospital" style="margin-left:10px;"> 
                </div>
<br>
                <div>
                <label style="margin-left:10px;" >Date</label>
                <br>
                    <input type="date" name="doc_date" style="margin-left:10px;" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;" >Time</label>
                <br>
                    <input type="time" name="doc_time" style="margin-left:10px;" />
                </div>
<br>
                <div>
                <label style="margin-left:10px;">Select The Document To Be Uploaded</label>
                <input type="file" name="file" id="file" size="80"style="margin-left:10px;">
                </div>
<br>
                <div>
                <label style="margin-left:10px;">Document Type</label>
                <select name ="type" style="margin-left:10px;">
                    <option value="xray">X-ray </option>
                    <option value="mg">Prescription </option>
                    <option value="mg">Medical Details </option>
                </select>
                </div>
<br>

                <input type="submit" style="margin-left:10px;" name="submit" value="submit" class="btn btn-default"/>
                </div>

    </fieldset>
    </form>
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
    <?php

            if(isset($_POST['submit']))
                {
                  $name = $_POST['name'];   
                  $hospital = $_POST['hospital'];
                  $type = $_POST['type'];
                  $doc_date = $_POST['doc_date'];   
                  $doc_time = $_POST['doc_time'];         
                  $file = $_FILES["file"]["name"];
                  


            
                  if($stmt =$conn->prepare("INSERT INTO documents(id, name, upload, doc_date, doc_time, type, hospital) values(?,?,?,?,?,?,?)"))
                   {
                    $stmt->bind_param('issssss', $_SESSION['id'], $name, $file, $doc_date, $doc_time, $type, $hospital );
                    $result = $stmt->execute();
                    $stmt->close();
                echo $result;
                  }
                  else
                  {
                   echo "error with insertion ";
                  }  

                }
           
               
        ?>

        <?php 
        if($result)
        {
          $message = "Succesfull";
                echo "<script type='text/javascript'>alert('$message');</script>";

        }
        ?>


        <?php

    $allowedExts = array("pdf", "doc" ,"jpeg", "jpg", "png", "docx". "PDF","DOC","JPEG", "JPG", "PNG","DOCX");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

     if ((($_FILES["file"]["type"] == "application/pdf")
        || ($_FILES["file"]["type"] == "application/doc")
     || ($_FILES["file"]["type"] == "image/jpeg")
     || ($_FILES["file"]["type"] == "image/jpg")
     || ($_FILES["file"]["type"] == "image/pjpeg")
     || ($_FILES["file"]["type"] == "image/x-png")
     || ($_FILES["file"]["type"] == "image/png")
     || ($_FILES["file"]["type"] == "application/docx"))
     && ($_FILES["file"]["size"] < 1000000000000)
     && in_array($extension, $allowedExts)) 
        {
            if ($_FILES["file"]["error"] > 0) 
                {
                     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } 
            else 
                {
                 echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                 echo "Type: " . $_FILES["file"]["type"] . "<br>";
                 echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                 echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br>";


                if (file_exists("img/" . $_FILES["file"]["name"])) 
                    {
                        echo $_FILES["file"]["name"] . " already exists. ";
                    } 
                else 
                    {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                       "img/" . $file);
                        echo "Stored in: " . "img/" . $_FILES["file"]["name"];
                    }
                }
       }    
     else 
       {
             echo "Invalid file";
       }

    echo "";

               
     // here pre tag will come in double quotes.
    //print_r($_POST);  // show post data
    //print_r($_FILES);  // show files data
    die; // die to stop execution. 

?>


</body>

</html>
