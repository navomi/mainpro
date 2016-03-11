<?php include('connection.php');  ?> 
<?php session_start(); ?>
<?php

function getupdate($doc_id) {
    global $conn;
    $_download= print_r($_POST['download']);
if ($stmt = $conn->prepare("SELECT  upload FROM `documents` where doc_id = ?")) 
                                     {
                                        echo "hi";
                                        $stmt->bind_param("i", $doc_id);
                                        $stmt->execute();
                                        $stmt->bind_result( $upload);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('upload' => $upload);
                                        }
                                        $stmt->close();
                                        return $rows;
                                        echo $upload;
}
                            }
                            ?>
<?php

$filename = $upload; // of course find the exact filename....        
header('Pragma: public');
header('Expires: 0');
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Cache-Control: private', false); // required for certain browsers 
header('Content-Type: application/pdf');

header('Content-Disposition: attachment; filename="'. basename($filename) . '";');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($filename));

readfile($filename);

exit;
?> 