<?php include('connection.php');  ?> 
<?php session_start(); ?>
<?php
// Connect to MySQL
function getdatedetails($id) 
                            {
                               global $conn;
                               if ($stmt = $conn->prepare("SELECT para_date, reading FROM `tracking_para` where id = ? and para_id = 4 ORDER BY para_date ASC")) 
                                     {
                                     	
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($para_date, $reading);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('para_date' => $para_date, 'reading' => $reading);
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
<?php 
 $datedetails = getdatedetails($_SESSION['id']);

print json_encode($datedetails);
// $prefix = '';
// echo "[\n";
// foreach($datedetails as $row) {
//   echo $prefix . " {\n";
//   echo '  "Date": "' . $row['para_date'] . '",' . "\n";
//   echo '  "reading": ' . $row['reading'] . ',' . "\n";
  
//   echo " }";
//   $prefix = ",\n";
// }
// echo "\n]";

// Close the connection
?>