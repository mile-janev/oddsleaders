<div class="box">
	<div class="box_title green"><?=$model[0]['name'];?></div>
	<div id="user_box">
		<form method="POST" action="#" class="form">
			<img src="<?=$model[0]['image'];?>"/>
			<label>Name:<br><input type='text' value="<?=$model[1]['name'];?>"/></label>
			<label>Email:<br><input type='text' value="<?=$model[1]['email'];?>"/></label>
			<label>Member since: <?=date('d M Y', strtotime($model[1]['date_created']));?></label>
			<label>Credits: <?=$model[0]['conto'];?> <a href="">Buy more</a></label>
			<input type="submit" value="Change" class="button blue">
		</form>
	</div>
</div>