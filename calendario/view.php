

<div id="background"></div>
 <div id="background2"></div>
 <div id='calendar' class="card1"><div id="prueba"></div></div>
<script>
	<?php $i= 0;?>
      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth', eventClick: function(info) {
            var mostrar = document.createElement("p");
            if (title="<?php echo $calendars[$i]->post_title?>") {
            
            mostrar.innerHTML ='Detalle: '+info.event.title+" "+ info.event.extendedProps.Detalle;
            hola=document.getElementById("calendar").appendChild(mostrar);
            }
        if (mostrar.length=1) {
          // select the target element
              const e = document.querySelector("p:nth-last-child(2n)");

          // remove the list item
              e.parentElement.removeChild(e);
        }
    
          },
        events:[

          <?php
          foreach ($calendars as $valor) : ?>
         
         {<?php if ($calendars[$i]->post_status !== "auto-draft") { ?>
          title:'<?php echo $calendars[$i]->post_title?>',
         	start:'<?php echo $calendars[$i]->post_date?>',
          color: 'blue',
          extendedProps:{
                Detalle: '<?php echo  $calendars[$i]->post_content?>'
             }
           <?php } ?>
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
  
 <!--    -->