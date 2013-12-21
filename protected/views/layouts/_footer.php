<div id="footer" class="grey">
    <div class="footerWrapper">
    	Oddsleaders.com <?=(date('Y',time()) != '2013') ? date('Y', time()).' - 2013' : '2013';?> &copy; All right reaserved
        <ul id="footerMenu">
            <li><?php echo CHtml::link('About us', Yii::app()->createUrl('site/page', array('view'=>'about'))); ?></li>
            <li><?php echo CHtml::link('Help', Yii::app()->createUrl('site/page', array('view'=>'help'))); ?></li>
            <li><?php echo CHtml::link('Terms and conditions', Yii::app()->createUrl('site/page', array('view'=>'terms'))); ?></li>
            <li><?php echo CHtml::link('Privacy', Yii::app()->createUrl('site/page', array('view'=>'privacy'))); ?></li>
            <li><?php echo CHtml::link('Partners', Yii::app()->createUrl('site/page', array('view'=>'partners'))); ?></li>
        </ul>
    </div>
<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=1454745711416645";
		fjs.parentNode.insertBefore(js, fjs);
	}
	(document, 'script', 'facebook-jssdk'));

	!function(d,s,id)
	{
		var js,fjs=d.getElementsByTagName(s)[0];
		if(!d.getElementById(id)){
			js=d.createElement(s);
			js.id=id;
			js.src="https://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);
		}
	}
	(document,"script","twitter-wjs");

	(function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/platform.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
</div>