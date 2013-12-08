<div class="box">
	<div class="box_title green"><?=$model[0]['name'];?></div>
	<div id="user_box">
		<form method="POST" action="#" class="form" enctype="multipart/form-data">
			<div id="left">
				<img src="<?=$model[0]['image'];?>"/><br/><br>
				<div id="mybutton" class="button grey"><input type="file" id="myfile">Change Avatar</div>
			</div>
			<div id="right">
				<label>Name:<br><input type='text' id="input" value="<?=$model[1]['name'];?>" disabled/></label>
				<label>Email:<br><input type='text' id="input" value="<?=$model[1]['email'];?>" disabled/></label>
				<label>Member since: <input type="text" value="<?=date('d F Y H:i:s', strtotime($model[1]['date_created']));?>" disabled/></label>
				<label>Credits: <input type="text" value="<?=$model[0]['conto'];?>" disabled/></label>
			</div><br>
			<input type="button" value="Edit Information" class="button grey right edit">
		</form>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function(){
	$('.edit').click(function(){
		disabled = $('#input').is(':disabled');

		if(disabled)
		{
			$('#user_box #input').prop('disabled',false);
			$(this).val('Save Changes');
		}
		else
		{
			$('#user_box #input').prop('disabled',true);
			$(this).val('Edit Information');
			alert('Your Information are successfully changed');
		}
	});
});
</script>