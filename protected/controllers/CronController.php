<?php

class CronController extends Controller
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
				'actions'=>array('result'),//
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionResult()
        {
            $u_id = Yii::app()->user->id;
//            $isAdmin = array_key_exists($u_id, $this->admin);
            $isAdmin = 1;

            if(($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) || $isAdmin)
            {

                $parserAll = new SimpleHTMLDOM;
                $htmlAll = $parserAll->file_get_html('http://www.livescore.com/soccer/2013-10-06/');
                foreach($htmlAll->find('table.league-table') as $elementAll)
                {
                    foreach ($elementAll->find('tr') as $elementTable)
                    {
                        foreach ($elementTable->find('td.fh') as $homeTeam)
                        {
                            $homeTeamName = $homeTeam->innertext;
                            echo "<pre>".$homeTeamName."</pre>";
                        }
                        foreach ($elementTable->find('td.fa') as $guestTeam)
                        {
                            $guestTeamName = $guestTeam->innertext;
                            echo "<pre>".$guestTeamName."</pre>";
                        }
                        foreach ($elementTable->find('td.fs a') as $result)
                        {
                            $resultArray = explode("-", $result->innertext);
                            $homeTeamGoals = $resultArray[0];
                            $guestTeamGoals = $resultArray[1];
                            echo "<pre>".$guestTeamGoals."</pre>";
                        }
                        echo "<pre><br /></pre>";
//                        var_dump($bla);
//                        echo "<pre>".$elementTable->innertext."</pre>";
//                        exit();
                    }
                    
//                    echo "<pre>".$elementAll->innertext."</pre>";
//                    exit();
                }
                
                exit();
            }
            else
            {
                die('Access forbiden');
            }
        }
}