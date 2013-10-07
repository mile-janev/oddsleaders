<?php

class SlaveController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('odds'),//
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionOdds()
        {
            $u_id = Yii::app()->user->id;
//            $isAdmin = array_key_exists($u_id, $this->admin);
            $isAdmin = 1;
            $develop = '1';
            $sports = array('Football');
            $events = array('Eng. Premier League','French Ligue 1','Italian Serie A','Spanish Liga Primera');
            $choice = array('Ftb_Mr3', 'Ftb_Htf', 'Ftb_Dbc', 'Ftb_10'); // Code for available tips
            $tips = array('%1%' => '1', 'Draw' => 'X', '%2%' => '2',
            				'%1% / Draw' => '1/X', 'Draw / %1%' => 'X/1', 'Draw / Draw' => 'X/X', 'Draw / %2%' => 'X/2', '%2% / Draw' => '2/X', '%1% / %1%' => '1/1', '%2% / %1%' => '2/1', '%1% / %2%' => '1/2', '%2% / %2%' => '2/2',
            				'%1% or Draw' => '1X', '%1% or %2%' => '12', 'Draw or %2%' => 'X2',
            				'Over 0.5' => '1+', 'Over 1.5' => '2+', 'Over 2.5' => '3+', 'Over 3.5' => '4+', 'Over 4.5' => '5+', 'Over 5.5' => '6+', 'Over 6.5' => '7+', 'Over 7.5' => '8+', 'Under 0.5' => '0', 'Under 1.5' => '0-1', 'Under 2.5' => '0-2', 'Under 3.5' => '0-3', 'Under 4.5' => '0-4', 'Under 5.5' => '0-5', 'Under 6.5' => '0-6', 'Under 7.5' => '0-8'
            				);


            if(($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) || $isAdmin)
            {
                if($develop === '1')
				{
					$url = 'http://xml.cdn.betclic.com/odds_en.xml';
				}
				else
				{
					$url = 'http://www.dev/odds.xml';
				}

				$html = simplexml_load_file($url);

				foreach ($html->sport as $sport) {
					if(in_array((string)$sport->attributes()->name, $sports))
					{
						foreach ($sport->event as $event) {
							if(in_array($event->attributes()->name,$events))
							{
								$i = 0;
								foreach ($event->match as $match) 
								{
									$teams = explode(' - ', $match->attributes()->name);
									if(isset($teams[1]))
									{
										$game[$i]['home'] = $teams[0];
										$game[$i]['away'] = $teams[1];
										foreach ($match->bets as $bets) {
											foreach ($bets->bet as $bet) {
												if (in_array($bet->attributes()->code, $choice)) 
												{
													foreach($bet->choice as $odds)
													{
														$game[$i]['bets'][$tips[(string)$odds->attributes()->name]] = (string)$odds->attributes()->odd;
														$tipovi[$i][$tips[(string)$odds->attributes()->name]] = (string)$odds->attributes()->odd;
													}
												}
											}
										}
									}
									//print_r(json_encode($tipovi));
									print_r($game);
									$i++;
								}
							}
						}
					}
				}
            }
            else
            {
                die('Access forbiden');
            }
        }
}