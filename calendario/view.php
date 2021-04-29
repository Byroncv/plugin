

<div class="container mt-4">
	<div class="form-group text-right">
		<button class="btn btn-success" data-toggle="modal" data-target="#create_modal"><i class="fas fa-plus"></i> Add New Task</button>
	</div>

	<div class="card-deck">
		<?php foreach ($calendars as $calendar){?>
			<div class="card">
				<div class="card-body">
					<h4 class="card-title"><?=$calendar->title?></h4>
					<button class="btn btn-primary update-btn" data-toggle="modal" data-id="<?=$calendar->id?>" data-target="#update_modal"><i class="fas fa-sync-alt"></i> Update</button>
					<a href="<?=admin_url('admin-post.php')?>?action=delete_full_calendar&id=<?=$calendar->id?>" class="btn btn-danger"><i class="fas fa-minus"></i> Remove</a>
				</div>
			</div>
		<?php }?>
	</div>
</div>

<!-- Todo create modal -->
<div class="modal fade mt-5" id="create_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?=admin_url('admin-post.php')?>" method="POST">
				<input type="hidden" name="action" value="create_full_calendar">
				<div class="modal-header">
					<h4 class="modal-title">Add Task</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="create_title">Title</label>
						<input type="text" name="title" class="form-control" id="create_title">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Create</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- Todo update modal -->
<div class="modal fade" id="update_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="<?=admin_url('admin-post.php')?>" method="POST">
				<input type="hidden" name="action" value="update_full_calendar">
				<input type="hidden" name="id" id="update_id">
				<div class="modal-header">
					<h4 class="modal-title">Update Task</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="update_title">Title</label>
						<input type="text" name="title" class="form-control" id="update_title">
					</div>
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-primary">Update</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>

<script>
	jQuery(function($){
		$('.update-btn').on('click', function(){
			var id = $(this).data('id');
			var parent = $(this).parents('.card');

			$("#update_id").val(id);
			$("#update_title").val(parent.find('.card-title').text());
		});
	});
</script>
<script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth'
        });
        calendar.render();
      });

    </script>
    <?php 
    
     ?>
    <div id='calendar'><p>asdasd</p></div>