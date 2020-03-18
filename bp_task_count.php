<style>
	
#blink {
  -webkit-animation: blink1 3s linear infinite;
  animation: blink1 3s linear infinite;
  
}
@-webkit-keyframes blink1 {
  0% { color: rgba(255, 255, 255, 1); }
  65% { color: rgba(248, 73, 50, 1); }

}
@keyframes blink1 {
  0% { color: rgba(255, 255, 255, 1); }
  65% { color: rgba(248, 73, 50, 1); }

}



	
</style>
<script src="https://use.fontawesome.com/974ec0e192.js"></script>
<script src="https://kit.fontawesome.com/175968d18b.js" crossorigin="anonymous"></script>
<?
	global $DB;
	global $USER;
	$user_id = $USER->GetID();
	$bp_tasks = $DB->Query("SELECT '$user_id' from b_bp_task_user where status = '0' and user_id = '$user_id' ");
	$bp_tasks_array=array();
		while ($row = $bp_tasks->Fetch())
	{
		echo $row['NAME'];
		array_push($bp_tasks_array, $row);
	}
	if (count($bp_tasks_array) != '0'){
	echo '<span id=blink><i class="fas fa-bell"></i><b> '.count($bp_tasks_array).'</b></span>';
	}
	?>
	
	