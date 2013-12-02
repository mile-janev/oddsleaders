<?php if(Yii::app()->user->hasFlash('new_error')):?>
    <div id="new_error">
        <?php echo Yii::app()->user->getFlash('new_error'); ?>
    </div>
    <br />
<?php endif; ?>

<h3>Izlistaj gi site cookie-a ovde</h3>

<?php if (isset($_COOKIE['myBets'])) { ?>
    <?php echo $_COOKIE['myBets']; ?>
<?php } ?>