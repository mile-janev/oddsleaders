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
			$result = '';
                        if ($value->stack) {
                            $stack_res = json_decode($value->stack->result, true);
                        } else {
                            $stack_res = json_decode($value->score, true);
                        }
                        
			$game_type = array('match' => 'Final Score');	
			if(isset($stack_res))
				$result = $stack_res['final']['team1'].':'.$stack_res['final']['team2'];
		?>
		<tr >
			<td><?php echo ($value->stack) ? date('d-m-y H:i', $value->stack->start) : date('d-m-y H:i', $value->start); ?></td>
			<td><?php echo ($value->stack) ? $value->stack->opponent : $value->opponent; ?> </td>
			<td><?=$result;?> </td>
			<td><?=$value->type;?><i class="hint" data-title="<?=$game_type[$value->game_type];?>">?</i></td>
			<td><?=$value->odd;?></td>
			<td class="<?=($value->status != '0') ? ($value->status == '1') ? 'win' : 'lose' : '';?>"><?=($value->status != '0') ? ($value->status == '1') ? 'Win' : 'Lose' : 'Not finished';?></td>
		</tr>
		<?php } ?>
	</table>
	<br>

	<div id="share">
		<div class="fb-share-button" data-href="http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;?>" data-width="110" data-type="button"></div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://twitter.com/share" class="twitter-share-button" data-text="Check my ticket" data-lang="en">Tweet</a>
		<div class="g-plusone" data-size="medium" data-width="300"></div><br>
		Share the ticket with friends ▶ <input type="text" size="50" id="link" value="<?php echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'] ;?>" disabled/>
		<div id="copy" class="button grey"> Copy</div>
	</div>

</div>
<script type="text/javascript">
	$('#copy').live('click', function(){
		text = $('#link').val();
		window.prompt("Copy to clipboard: Ctrl+C, Enter", text);
	});
</script>