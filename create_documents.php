<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php include('side.php'); ?>
<?php include('connection.php'); global $conn ?> 


<head>

    
</head>

<body>

    
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
                    <option value="prescription">Prescription </option>
                    <option value="medical Details">Medical Details </option>
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

                  $fields = array('name', 'doc_date', 'doc_time', 'type', 'hospital');

                   $error = false; //No errors yet
                  foreach($fields AS $fieldname) 
                    { //Loop trough each field
                      if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname]))
                        {
                           echo "<script type='text/javascript'>alert('field ".$fieldname." not entered , unsuccessfull entry');</script>";
                           //Display error with field
                           
                          $error = true; //Yup there are errors
                        }
                     }

            if(!$error)
            {
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

    $allowedExts = array("pdf", "doc" ,"jpeg", "jpg", "png", "docx", "PDF", "DOC", "JPEG", "JPG", "PNG", "DOCX");
    $temp = explode(".", $_FILES["file"]["name"]);
    $extension = end($temp);

     if (($_FILES["file"]["size"] < 1000000000000)
     && in_array($extension, $allowedExts)) 
        {
            if ($_FILES["file"]["error"] > 0) 
                {
                     echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                } 
            else 
                {
                 echo "Upload: " . $_FILES["file"]["name"] . "<br>";
                 //echo "Type: " . $_FILES["file"]["type"] . "<br>";
                 //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
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
