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
	<ul id="top_menu">
		<li><a href="">Home</a></li>
		<li><a href="">Tips</a></li>
		<li><a href="">Help</a></li>
		<li><a href="">Contact</a></li>
	</ul>	
	<div class="right">
		
	</div>
</div>
<div id="banner"></div>
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
			<!-- <a href="" class="button green">Log IN</a><br>
			<a href="" class="button">Sign UP</a><br> -->
			<div id="loged">
				<img src="images/profile.jpg"/>
				<div id="right">
					<h1>Кузески Славчо</h1>
					<a href=""><i class="icon-user"></i> Profile</a>
					<a href=""><i class="icon-signout"></i> Log Out</a>
				</div>
			</div>
			<p id="sel_sport">Select your sport:</p>
			<ul id="sports">
				<li><a href="" class="toggler"><div class="icon football"></div>Football <span>52</span></a>
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
			<div class="box_title green"><i class="icon-flag"></i> Top Matches</div>
			<div id="main_top">
				<div id="left"><i class="icon-chevron-left"></i></div>
				<ul>
					<li>
						<div id="teams">Barcelona - Real Madrid</div>
						<div id="tip">1 <p>2.4</p></div>
						<div id="tip">X <p>3.1</p></div>
						<div id="tip">2 <p>2.5</p></div>
					</li>
					<li>
						<div id="teams">Barcelona - Real Madrid</div>
						<div id="tip">1 <p>2.4</p></div>
						<div id="tip">X <p>3.1</p></div>
						<div id="tip">2 <p>2.5</p></div>
					</li>
					<li>
						<div id="teams">Barcelona - Real Madrid</div>
						<div id="tip">1 <p>2.4</p></div>
						<div id="tip">X <p>3.1</p></div>
						<div id="tip">2 <p>2.5</p></div>
					</li>
				</ul>
				<div id="right"><i class="icon-chevron-right"></i></div>
			</div>
			<div class="box">
				<div class="box_title green"><i class="icon-flag"></i> Upcoming events</div>
				<ul class="upcoming">
					<li>
						<div id="sport"><div class="icon tennis"></div></div>
						<div id="match">Rafael Nadal - Roger Federer</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">5+<i class="icon-plus-sign"></i></span></div>
						</div>
						<ul class="more_odds">
							<li>
								<div id="type">First Set <i class="icon-warning-sign" data-title="Correct score"></i></div>
								<div id="tip">1 <span>1.8</span></div>
								<div id="tip">2 <span>1.8</span></div>
							</li>
							<li>
								<div id="type">Handicap (+2.5) <i class="icon-warning-sign" data-title="Correct score"></i></div>
								<div id="tip">1 <span>1.8</span></div>
								<div id="tip">2 <span>1.8</span></div>
							</li>
						</ul>
					</li>
					<li>
						<div id="sport"><div class="icon football"></div></div>
						<div id="match">Olympiakoa - Panatinaikos</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">X <span>3.1</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">16+<i class="icon-plus-sign"></i></span></div>
						</div>
						<ul class="more_odds">
							<li>
								<div id="type">Double Chance <i class="icon-warning-sign" data-title="Correct score"></i></div>
								<div id="tip">1X <span>1.11</span></div>
								<div id="tip">X2 <span>1.8</span></div>
								<div id="tip">12 <span>1.13</span></div>
							</li>
							<li>
								<div id="type">Half Time / Full Time <i class="icon-warning-sign" data-title="Who will be winner on the first half and winner in seccond half"></i></div>
								<div id="tip">1-1 <span>2.5</span></div>
								<div id="tip">1-X <span>15.0</span></div>
								<div id="tip">X-1 <span>4.7</span></div>
								<div id="tip">X-2 <span>5.5</span></div>
								<div id="tip">X-X <span>5.1</span></div>
								<div id="tip">2-X <span>16.0</span></div>
								<div id="tip">2-2 <span>8.5</span></div>
								<div id="tip">2-1 <span>25.0</span></div>
								<div id="tip">1-2 <span>25.0</span></div>
							</li>
							<li>
								<div id="type">Both teams scored <i class="icon-warning-sign" data-title="Correct score"></i></div>
								<div id="tip">NG <span>1.9</span></div>
								<div id="tip">GG <span>1.6</span></div>
							</li>
							<li>
								<div id="type">How many goals <i class="icon-warning-sign" data-title="How many goals will be scored in the match"></i></div>
								<div id="tip">0-1 <span>3.5</span></div>
								<div id="tip">0-2 <span>2.2</span></div>
								<div id="tip">0-3 <span>1.8</span></div>
								<div id="tip">3+ <span>1.6</span></div>
								<div id="tip">4+ <span>2.2</span></div>
								<div id="tip">5+ <span>5.5</span></div>
								<div id="tip">7+ <span>10.5</span></div>
							</li>
							<li>
								<div id="type">Corect score <i class="icon-warning-sign" data-title="Correct score"></i></div>
								<div id="tip">0-0 <span>1.9</span></div>
								<div id="tip">0-1 <span>1.6</span></div>
								<div id="tip">0-2 <span>1.6</span></div>
								<div id="tip">0-3 <span>1.6</span></div>
								<div id="tip">0-4 <span>1.6</span></div>
								<div id="tip">0-5 <span>1.6</span></div>
								<div id="tip">1-0 <span>1.6</span></div>
								<div id="tip">2-0 <span>1.6</span></div>
								<div id="tip">3-0 <span>1.6</span></div>
								<div id="tip">4-0 <span>1.6</span></div>
								<div id="tip">5-0 <span>1.6</span></div>
								<div id="tip">1-1 <span>1.6</span></div>
								<div id="tip">2-1 <span>1.6</span></div>
								<div id="tip">2-2 <span>1.6</span></div>
								<div id="tip">2-3 <span>1.6</span></div>
								<div id="tip">3-2 <span>1.6</span></div>
								<div id="tip">3-3 <span>1.6</span></div>
								<div id="tip">3-4 <span>1.6</span></div>
								<div id="tip">4-4 <span>1.6</span></div>
								<div id="tip">4-3 <span>1.6</span></div>
								<div id="tip">4-5 <span>1.6</span></div>
								<div id="tip">5-4 <span>1.6</span></div>
								<div id="tip">5-5 <span>1.6</span></div>
							</li>
						</ul>
					</li>
					<li>
						<div id="sport"><div class="icon football"></div></div>
						<div id="match">Porto - Benfica</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">X <span>3.1</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">16+<i class="icon-plus-sign"></i></span></div>
						</div>
					</li>
					<li>
						<div id="sport"><div class="icon basketball"></div></div>
						<div id="match">Real Mardrid - Barcelona</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">4+<i class="icon-plus-sign"></i></span></div>
						</div>
					</li>
					<li>
						<div id="sport"><div class="icon hockey"></div></div>
						<div id="match">Frolunda - HV 71.</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">X <span>3.1</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">10+<i class="icon-plus-sign"></i></span></div>
						</div>
					</li>
					<li>
						<div id="sport"><div class="icon football"></div></div>
						<div id="match">Milan - Inter</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">X <span>3.1</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">16+<i class="icon-plus-sign"></i></span></div>
						</div>
					</li>
					<li>
						<div id="sport"><div class="icon hockey"></div></div>
						<div id="match">Kazan - Sibirsk</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">X <span>3.1</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">10+<i class="icon-plus-sign"></i></span></div>
						</div>
					</li>
					<li>
						<div id="sport"><div class="icon tennis"></div></div>
						<div id="match">N. Wawrinka - Del Porto</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">5+<i class="icon-plus-sign"></i></span></div>
						</div>
					</li>
					<li>
						<div id="sport"><div class="icon tennis"></div></div>
						<div id="match">Ana Ivanovic - Venus Williams</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">5+<i class="icon-plus-sign"></i></span></div>
						</div>
					</li>
					<li>
						<div id="sport"><div class="icon football"></div></div>
						<div id="match">Vardar - Rabotnicki</div>
						<div id="tips">
							<div id="tip">1 <span>1.95</span></div>
							<div id="tip">X <span>3.1</span></div>
							<div id="tip">2 <span>2.9</span></div>
							<div id="more">16+<i class="icon-plus-sign"></i></span></div>
						</div>
					</li>
				</ul>	
			</div>
			<div class="box">
				<div class="box_title green"><i class="icon football"></i> Football</div>
				<table class="table">
					<tr class="th">
						<th colspan="2">Spain Primera Devision</th>
						<th>1</th>
						<th>X</th>
						<th>2</th>
						<th>0-2</th>
						<th>3+</th>
						<th>More</th>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Real Madrid - Barcelona</td>
						<td class="clickable">1,95</td>
						<td class="clickable">3.1</td>
						<td class="clickable">2.65</td>
						<td class="clickable">1.9</td>
						<td class="clickable">1.6</td>
						<td class="more">+16 <i class="icon-plus-sign"></i></td>
					</tr>
				</table>
			</div>
			<div class="box">
				<div class="box_title green"><i class="icon tennis"></i> Tennis</div>
				<table class="table">
					<tr class="th">
						<th colspan="2">Rolan Garos</th>
						<th>1</th>
						<th>2</th>
						<th>+ 2.5</th>
						<th>- 2.5</th>
						<th>More</th>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Rafael Nadal - Roger Federer</td>
						<td class="clickable">1,95</td>
						<td class="clickable">1.75</td>
						<td class="clickable">1.8</td>
						<td class="clickable">1.8</td>
						<td class="more">+5 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Rafael Nadal - Roger Federer</td>
						<td class="clickable">1,95</td>
						<td class="clickable">1.75</td>
						<td class="clickable">1.8</td>
						<td class="clickable">1.8</td>
						<td class="more">+5 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Rafael Nadal - Roger Federer</td>
						<td class="clickable">1,95</td>
						<td class="clickable">1.75</td>
						<td class="clickable">1.8</td>
						<td class="clickable">1.8</td>
						<td class="more">+5 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Rafael Nadal - Roger Federer</td>
						<td class="clickable">1,95</td>
						<td class="clickable">1.75</td>
						<td class="clickable">1.8</td>
						<td class="clickable">1.8</td>
						<td class="more">+5 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Rafael Nadal - Roger Federer</td>
						<td class="clickable">1,95</td>
						<td class="clickable">1.75</td>
						<td class="clickable">1.8</td>
						<td class="clickable">1.8</td>
						<td class="more">+5 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Rafael Nadal - Roger Federer</td>
						<td class="clickable">1,95</td>
						<td class="clickable">1.75</td>
						<td class="clickable">1.8</td>
						<td class="clickable">1.8</td>
						<td class="more">+5 <i class="icon-plus-sign"></i></td>
					</tr>
					<tr class="disabled">
						<td>21:00</td>
						<td>Rafael Nadal - Roger Federer</td>
						<td class="clickable">1,95</td>
						<td class="clickable">1.75</td>
						<td class="clickable">1.8</td>
						<td class="clickable">1.8</td>
						<td class="more">+5 <i class="icon-plus-sign"></i></td>
					</tr>
				</table>
			</div>
		</div>
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
					<a href="#tab-0" class="active">Mountly</a>
					<a href="#tab-1">All time</a>
				</div>
				<ul id="tipsters">
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
		</div>
	</div>
	

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
