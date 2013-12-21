<?php

$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	$model[0]->ticket_id,
);

?>

<h1>View Ticket #<?php echo $model[0]->ticket_id; ?></h1>	
<div class="userGridNew">
	<table class="items">
		<tr>
			<th>Time</th>
			<th>Teams</th>
			<th>Result</th>
			<th>Type</th>
			<th>Odd</th>
			<th>Status</th>
		</tr>
		<?php foreach ($model as $key => $value) { 
			$stack_res = json_decode($value->stack->result, true);
			$result = $stack_res['final']['team1'].':'.$stack_res['final']['team2'].' ('.$stack_res['half-time']['team1'].':'.$stack_res['half-time']['team2'].')';
		?>
		<tr >
			<td><?=date('d-m-y H:i', $value->stack->start);?></td>
			<td><?=$value->stack->opponent;?> </td>
			<td><?=$result;?> </td>
			<td><?=$value->type;?></td>
			<td><?=$value->odd;?></td>
			<td class="<?=($value->status != '0') ? ($value->status == '1') ? 'win' : 'lose' : '';?>"><?=($value->status != '0') ? ($value->status == '1') ? 'Win' : 'Lose' : 'Not finished';?></td>
		</tr>
		<?php } ?>
	</table>
	<br>
	Share the ticket with friends ▶ <input type="text" size="50" id="link" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;?>" disabled/>
	<div id="copy" class="button grey"> Copy</div>
	<input type="hidden" id="clipboard">
</div>
<script type="text/javascript">
	$('#copy').live('click', function(){
		text = $('#link').val();
		window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	});
</script>