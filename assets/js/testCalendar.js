<script>

 $(document).ready(function() {
  var date = new Date();
  var d = date.getDate(); //Get dates from database
  var m = date.getMonth();
  var y = date.getFullYear();

  var calendar = $('#calendar').fullCalendar(
  {
     editable: false,
     start: '2016-03-03',
     title: 'Test Event',
  });
  
 });

</script>