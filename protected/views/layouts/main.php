<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /> -->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" />
	<!--[if lt IE 8]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome-ie7.min.css" media="screen, projection" />
	<![endif]-->
    <?php
        $script = Yii::app()->clientScript;
        $script->registerCoreScript('jquery');
    ?>

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
<div id="top" class="blue">
	<div id="top_wrapped">
		<ul id="top_menu">
			<li><?=date("d-m-Y H:i");?></li>
			<li>Language<select>
					<option>English</option>
					<option>Macedonian</option>
					<option>Serbian</option>
				</select></li>
		</ul>	
		<div class="right">
			<div id="loged">
				<img src="images/profile.jpg"/>
				<h1>Кузески Славчо</h1>
			</div>
				<ul class="config">
					<li><a href=""><i class="icon-indent-right"></i></a>
						<ul class="grey">
							<li><a href=""><i class="icon-user"></i> Profile</a></li>
							<li><a href=""><i class="icon-signout"></i> Log Out</a></li>
							<li><a class="bilans"> CREDITS <span>620 €</span></a></li>
						</ul>
					</li>
				</ul>	
		</div>
	</div>
</div>
<div id="banner">
	<a href="/"><img src="/images/logo.png" title="Oddsleaders.com"/></a>
</div>
	<div id="mainmenu">
		<ul>
			<li><a href="" class="selected"><i class="icon-home"></i> HOME</a></li>
			<li><a href=""><i class="icon-comments"></i> TIPS</a></li>
			<li><a href=""><i class="icon-book"></i> HELP</a></li>
			<li><a href=""><i class="icon-envelope"></i> CONTACT</a></li>
			<li><a href=""><i class="icon-globe"></i>GAMES</a></li>
		</ul>
	</div><!-- mainmenu -->
<div id="wrapped">
	<div id="content">
		<div id="sidebar">
			<p class="box_title blue" style="text-align:center; margin:0 0 15px 0;">Select your sport:</p>
			<ul id="sports">
				<li><a href="" class="toggler active"><div class="icon football"></div>Football <span>52</span></a>
					<ul>
						<li><a href="">⇢ Premier League <span>(12)</span></a><li>
						<li><a href="">⇢ Championship <span>(10)</span></a><li>
						<li><a href="">⇢ League One <span>(5)</span></a><li>
						<li><a href="">⇢ League Two <span>(3)</span></a><li>
						<li><a href="">⇢ Conference premier <span>(11)</span></a><li>
						<li><a href="">⇢ Bundesliga <span>(2)</span></a><li>
						<li><a href="">⇢ 2 Bundesliga <span>(6)</span></a><li>
						<li><a href="">⇢ 3 Liga <span>(7)</span></a><li>
						<li><a href="">⇢ Primera Devision <span>(3)</span></a><li>
						<li><a href="">⇢ Ligue 1 <span>(4)</span></a><li>
						<li><a href="">⇢ Ligue 2 <span>(9)</span></a><li>
						<li><a href="">⇢ Seria A <span>(10)</span></a><li>
					</ul>
				</li>
				<li><a href="" class="toggler"><div class="icon hockey"></div>Ice Hockey <span>52</span></a>
					<ul>
						<li><a href="">⇢ NHL <span>(5)</span></a><li>
						<li><a href="">⇢ Rusia KHL <span>(5)</span></a><li>
						<li><a href="">⇢ Chech Extraliga <span>(5)</span></a><li>
						<li><a href="">⇢ Finaland liga <span>(5)</span></a><li>
						<li><a href="">⇢ Sweden SHL liga <span>(5)</span></a><li>
					</ul>
				</li>
				<li><a href="" class="toggler"><div class="icon basketball"></div>Basketball <span>23</span></a>
					<ul>
						<li><a href="">⇢ NBA <span>(5)</span></a><li>
						<li><a href="">⇢ France LNB <span>(9)</span></a><li>
						<li><a href="">⇢ Greece A1 <span>(8)</span></a><li>
						<li><a href="">⇢ Italia Lega A <span>(6)</span></a><li>
						<li><a href="">⇢ Croatia Superleague <span>(5)</span></a><li>
						<li><a href="">⇢ Turkey TBL <span>(4)</span></a><li>
					</ul>
				</li>
				<li><a href="" class="toggler"><div class="icon tennis"></div>Tennis <span>20</span></a>
					<ul>
						<li><a href="">⇢ Wimbledon <span>(3)</span></a><li>
						<li><a href="">⇢ France Open <span>(8)</span></a><li>
						<li><a href="">⇢ US Open <span>(7)</span></a><li>
						<li><a href="">⇢ Rolan Garos <span>(11)</span></a><li>
						<li><a href="">⇢ Dubai Open <span>(15)</span></a><li>
						<li><a href="">⇢ Beijing Open <span>(20)</span></a><li>
					</ul>
				</li>
				<li><a href="" class="toggler"><div class="icon baseball"></div>Baseball <span>12</span></a>
					<ul>
						<li><a href="">⇢ NPB <span>(8)</span></a><li>
						<li><a href="">⇢ LMB <span>(5)</span></a><li>
						<li><a href="">⇢ MLB <span>(10)</span></a><li>
					</ul>
				</li>
				<li><a href="" class="toggler"><div class="icon snooker"></div>Snooker <span>5</span></a>
					<ul>
						<li><a href="">⇢ Asian Tournament <span>(8)</span></a><li>
						<li><a href="">⇢ World Championsip <span>(3)</span></a><li>
					</ul>
				</li>
			</ul>
		</div>
		<div id="main">
			<?php echo $content; ?>
		<div id="rightbar">
			<div class="box_title blue"><i class="icon-credit-card"></i> Bet slip</div>
			<div id="bet_slip">
				<form class="form" action="#" method="POST">
					<div class="nano">
						<div class="content">
							<div id="matchs">
								<div id="match">Barcelona - Milan <span class="close">X</span><div id="odds"><div id="tip">1</div><span>1.45</span></div></div>
								<div id="match">Dortmund - Arsenal <span class="close">X</span><div id="odds"><div id="tip">2</div><span>1.45</span></div></div>
								<div id="match">Juventus - Real Madrid <span class="close">X</span><div id="odds"><div id="tip">X</div><span>1.45</span></div></div>
								<div id="match">N. Djokovic - R. Federer <span class="close">X</span><div id="odds"><div id="tip">2</div><span>1.45</span></div></div>
								<div id="match">Barcelona - Milan <span class="close">X</span><div id="odds"><div id="tip">1</div><span>1.45</span></div></div>
							</div>
						</div>
					</div>
							<div id="stake">
								Place your stake 
								<input type="text" name="stake"> €
							</div>
							<div id="money">
								Winning stake <span>25000 €</span> 
							</div>
							<a href="" class="clear">Clear bets</a>
							<input type="submit" value="Place Bet" class="button blue right">
				</div>
				<div class="box_title blue"><i class="icon-hand-up"></i> Best tipsters</div>
				<div id="tabs">
					<a href="#tab-0" class="current">Mountly</a>
					<a href="#tab-1">All time</a>
				</div>
				<div  class="tab_box">
					<div id="tab-0">
						<ul id="tipsters" class="tabb">
							<li id="row"><span>1</span><div id="user"><a href="">tiger_s</a></div><div id="credits">632€</div></li>
							<li id="row"><span>2</span><div id="user"><a href="">janev</a></div><div id="credits">602€</div></li>
							<li id="row"><span>3</span><div id="user"><a href="">mile</a></div><div id="credits">600€</div></li>
							<li id="row"><span>4</span><div id="user"><a href="">slavco</a></div><div id="credits">555€</div></li>
							<li id="row"><span>5</span><div id="user"><a href="">kuzeski</a></div><div id="credits">512€</div></li>
							<li id="row"><span>6</span><div id="user"><a href="">jmile</a></div><div id="credits">480€</div></li>
							<li id="row"><span>7</span><div id="user"><a href="">leaders</a></div><div id="credits">421€</div></li>
							<li id="row"><span>8</span><div id="user"><a href="">odds</a></div><div id="credits">398€</div></li>
							<li id="row"><span>9</span><div id="user"><a href="">bets.com</a></div><div id="credits">350€</div></li>
							<li id="row"><span>10</span><div id="user"><a href="">tipster</a></div><div id="credits">312€</div></li>
							<li id="row"><div id="user" style="text-align:center; width:100%;"><a href="">See all <i class="icon-double-angle-right"></i></a></div></li>
						</ul>
					</div>
					<div id="tab-1" class="tabb">
						<ul id="tipsters">
							<li id="row"><span>1</span><div id="user"><a href="">slavco</a></div><div id="credits">555€</div></li>
							<li id="row"><span>2</span><div id="user"><a href="">mile</a></div><div id="credits">600€</div></li>
							<li id="row"><span>3</span><div id="user"><a href="">janev</a></div><div id="credits">602€</div></li>
							<li id="row"><span>4</span><div id="user"><a href="">kuzeski</a></div><div id="credits">512€</div></li>
							<li id="row"><span>5</span><div id="user"><a href="">odds</a></div><div id="credits">398€</div></li>
							<li id="row"><span>6</span><div id="user"><a href="">bets.com</a></div><div id="credits">350€</div></li>
							<li id="row"><span>7</span><div id="user"><a href="">tipster</a></div><div id="credits">312€</div></li>
							<li id="row"><span>8</span><div id="user"><a href="">jmile</a></div><div id="credits">480€</div></li>
							<li id="row"><span>9</span><div id="user"><a href="">tiger_s</a></div><div id="credits">632€</div></li>
							<li id="row"><span>10</span><div id="user"><a href="">leaders</a></div><div id="credits">421€</div></li>
							<li id="row"><div id="user" style="text-align:center; width:100%;"><a href="">See all <i class="icon-double-angle-right"></i></a></div></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<div id="footer" class="grey">
		<ul>
			<li><a href="">About us</a></li>
			<li><a href="">Help</a></li>
			<li><a href="">Terms and conditions</a></li>
			<li><a href="">Privacy</a></li>
			<li><a href="">Partners</a></li>
		</ul>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
