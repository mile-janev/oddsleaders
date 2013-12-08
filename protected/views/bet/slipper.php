<?php if(Yii::app()->user->hasFlash('new_error')):?>
    <div id="new_error">
        <?php echo Yii::app()->user->getFlash('new_error'); ?>
    </div>
    <br />
<?php endif; ?>
<?php if(isset($_COOKIE['myBets']) AND $_COOKIE['myBets'] != '') { ?>
 <div class="box" id="my_slipper">
        <div class="box_title green">My bet slipper</div>
        	<ul class="my-slip">
                <?php
                    $cookieValue = explode('|', $_COOKIE['myBets']);
                    for ($i = 0; $i < count($cookieValue) - 1; $i++) {
                        $bet = explode("=", $cookieValue[$i]);
                ?>
	                <li class="match <?php echo $bet[0]; ?>">
	                    <?php echo $bet[3]; ?>
	                    <div class="close betSlipperClose" id="<?php echo $bet[0]; ?>">X</div>
                        <div class="tip"><?php echo $bet[1]; ?></div>
                        <div class="odds"><?php echo $bet[2]; ?></div>
	                </li>
	            <?php } ?>
        	</ul>
        	<br>
    </div>
<?php } else { echo '<h3>Your slipper is EMPTY. To select a bet please click on price. </h3>'; }?>