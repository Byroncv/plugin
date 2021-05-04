


 <div id='calendar'><p>:B</p></div>
<script>
	<?php $i= 0;?>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth', events:[
          <?php
          foreach ($calendars as $valor) : ?>
          	
         {
          	title:'<?php echo $calendars[$i]->post_title?>',
         	start:'<?php echo $calendars[$i]->post_content?>',
         	// start:'2021-04-12 17:07:02',
          	
          	color: 'blue'
          }
          <?php $i++;?>,
          <?php endforeach; ?>
         
         ]
        });
        calendar.render();
      });
      	 <?php 
   
     ?>
   
    </script>
   
 