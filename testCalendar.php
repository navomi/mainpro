<!DOCTYPE HTML>
<html>
<head>
	<link rel='stylesheet' href='assets/css/fullcalendar.css' />
	<script src='assets/lib/jquery.min.js'></script>
	<script src='assets/lib/moment.min.js'></script>
	<script src='assets/js/fullcalendar.js'></script>
</head>
<body>
	<div id="calendar"></div>
	<script>
	  $('#calendar').fullCalendar({
			defaultDate: '2016-01-12',
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
				{
					title: 'All Day Event',
					start: '2016-01-01'
					
				},
				{
					title: 'Long Event',
					start: '2016-01-07',
					end: '2016-01-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-01-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2016-01-16T16:00:00'
				},
				{
					title: 'Conference',
					start: '2016-01-11',
					end: '2016-01-13'
				},
				{
					title: 'Meeting',
					start: '2016-01-12T10:30:00',
					end: '2016-01-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2016-01-12T12:00:00'
				},
				{
					title: 'Meeting',
					start: '2016-01-12T14:30:00'
				},
				{
					title: 'Happy Hour',
					start: '2016-01-12T17:30:00'
				},
				{
					title: 'Dinner',
					start: '2016-01-12T20:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2016-01-13T07:00:00'
				},
				{
					title: 'Click for Google',
					url: 'http://google.com/',
					start: '2016-01-28'
				}
			]
		});
	</script>
	<?php
// Connect to MySQL
function getdatedetails($id) 
                            {
                               global $conn;
                               if ($stmt = $conn->prepare("SELECT app_date, reason FROM `appointment` where id = ? ")) 
                                     {
                                     	
                                        $stmt->bind_param("i", $id);
                                        $stmt->execute();
                                        $stmt->bind_result($app_date, $reason);
                                        while ($stmt->fetch()) 
                                        {
                                        $rows[] = array('app_date' => $app_date, 'reason' => $reason);
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
</body>
</html>