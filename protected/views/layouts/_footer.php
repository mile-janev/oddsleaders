<div id="footer" class="grey">
    <div class="footerWrapper">
        <ul id="footerMenu">
            <li><?php echo CHtml::link('About us', Yii::app()->createUrl('site/page', array('view'=>'about'))); ?></li>
            <li><?php echo CHtml::link('Help', Yii::app()->createUrl('site/page', array('view'=>'help'))); ?></li>
            <li><?php echo CHtml::link('Terms and conditions', Yii::app()->createUrl('site/page', array('view'=>'terms'))); ?></li>
            <li><?php echo CHtml::link('Privacy', Yii::app()->createUrl('site/page', array('view'=>'privacy'))); ?></li>
            <li><?php echo CHtml::link('Partners', Yii::app()->createUrl('site/page', array('view'=>'partners'))); ?></li>
        </ul>
    </div>
</div>