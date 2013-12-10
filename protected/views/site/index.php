<?php
/* @var $this SiteController */
    $this->pageTitle = Yii::app()->name;
    
    if (isset($_COOKIE['myBets']) && $_COOKIE['myBets']!='') 
    {
       $cookie = explode('|', $_COOKIE['myBets']);
        
       for ($i = 0; $i < count($cookie) - 1; $i++) {
            $exp = explode("=", $cookie[$i]);

            $tipped[$exp[0]][$exp[4]][$exp[1]] = 'tipped';
        }
    }
?>
<div class="loader"><img src="/images/blue_load.gif" alt="Loading ..."/></div>
<div class="load_matches"></div>
<div style='display:none'>
    <div id="partial-login" class="partial-form">
        <?php $this->renderPartial('login', array('model' => $login, 'facebook' => $facebook)); ?>
    </div>
</div>

<div style='display:none'>
    <div id="partial-register" class="partial-form">
        <?php $this->renderPartial('/user/register', array('model' => $model, 'facebook' => $facebook)); ?>
    </div>
</div>
<div class="box_title green"><i class="icon-flag"></i> Top Matches</div>
<div id="main_top">
    <?php 
        $i=1; 
        $disable = '';        
        
        foreach ($topMatches as $topMatch) 
        {
            if (isset($_COOKIE['myBets']) && $_COOKIE['myBets']!='') 
            {
                foreach ($cookie as $key => $cook) {
                    $exp = explode('=', $cook);
                    if($exp[0] === $topMatch['code'])
                        $disable = 'disable';
                }
            }
            
            $teams = explode(' vs ', $topMatch->opponent);
    ?>
        <div class="match <?=$topMatch['code'];?> <?=$disable;?>">
            <a href="" class="none"><?=$topMatch->opponent;?></a>
            <div id="teams" class="grey">
                <span class="chart_<?php echo $i; ?>_home"><?php echo $teams[0]; ?></span>
                -
                <span class="chart_<?php echo $i; ?>_guest"><?php echo $teams[1]; ?></span>
            </div>
            <div id="chartdiv<?php echo $i; ?>" style="width: 180px; height: 100px;"></div>
            <div id="odds">
                <?php 
                    $data = json_decode($topMatch->data);
                    $j=0;
                    foreach ($data->match as $key => $value) { 
                        if ($key != 'label') {
                            $j++;
                            $key = ucfirst($key);
                            (isset($tipped[$topMatch['code']]['match'][$key])) ? $tiped = 'tipped' : $tiped = '';
                ?>
                        <a href="#" class="stripe clickable <?=$tiped;?> chart_<?=$i.'_'.$j;?>"
                           rel = "<?=$topMatch['code'];?>"
                           data="<?php echo OddsClass::getPercent($data->match, $value); ?>">
                            <?php echo $value; ?>
                            <div class="none">
                                <p class="gameType"><?=$key;?></p><span class="gameQuote"><?=$value;?></span><span class="gameTypeBet">match</span>
                            </div>
                        </a>
                <?php } } ?>
            </div>
        </div>
    <?php $i++; } ?>
</div>
<div class="box">
    <div class="box_title grey"><i class="icon-flag"></i> Upcoming events</div>
    <ul class="upcoming">
        <?php 
            $tipped = array();
            if (isset($_COOKIE['myBets']) && $_COOKIE['myBets']!='') {
               $cookie = explode('|', $_COOKIE['myBets']);
                
               for ($i = 0; $i < count($cookie) - 1; $i++) {
                    $exp = explode("=", $cookie[$i]);

                    $tipped[$exp[0]][$exp[4]][$exp[1]] = 'tipped';
                }
            }
            if(count($upcoming) > 0)
            {
                foreach ($upcoming as $key => $value) {
                    $odds = json_decode($value['data']);
                    if($value['code'])
                    $match_odds = '';
                    if ($odds) {
                        foreach ($odds->match as $key => $match) {          


                            if($key != 'label')
                            {
                                $key = ucfirst($key);
                                (isset($tipped[$value['code']]['match'][$key])) ? $tiped = 'tipped' : $tiped = '';
                                
                                $match_odds .= '<div class="tip"><a class="stripe clickable '.$tiped.'" rel="'.$value['code'].'"><p class="gameType">'.$key.'</p><span class="gameQuote">'.$match.'</span><span class="gameTypeBet">match</span></a></div>';
                            }
                        }
                    }
                    $more = ''; $count = 0;
                    if ($odds) {
                        foreach ($odds as $key => $more_odds) {
                            $odd = '';
                            if($key != 'match')
                            {
                                foreach ($more_odds as $tip => $m_odds) {
                                    $m_odds = strtolower($m_odds);
                                    
                                   if($tip != 'label')
                                    {
                                        $tip = ucfirst($tip);
                                        (isset($tipped[$value['code']][$key][$tip])) ? $tipe = 'tipped' : $tipe = '';

                                        if(!empty($m_odds))
                                            $odd .= '<div class="tip"><a class="stripe clickable '.$tipe.'" rel="'.$value['code'].'"><p class="gameType">'.$tip.'</p><span class="gameQuote">'.$m_odds.'</span><span class="gameTypeBet">'.$key.'</span></a></div>';
                                    }
                                }

                                $more .= '<li>
                                            <div id="type">'.$key.'</i></div>
                                            '.$odd.'
                                        </li>';
                                $count++;
                            }
                        }   
                    }
                        $time = $value->start - time();
                        $disable = '';
                        
                        if (isset($_COOKIE['myBets']) && $_COOKIE['myBets']!='') {
                            foreach ($cookie as $key => $cook) {
                                $exp = explode('=', $cook);
                                if($exp[0] === $value['code'])
                                    $disable = 'disable';
                            }
                        }

                        echo '<li class="'.$value['code']." ".$disable.' play" data-time="'.$value->start.'">
                            <div id="sport"><div class="icon" style="background-position: '.$value->tournament->sport->icon.'"></div></div>
                            <div class="match"><a>'.$value['opponent'].'</a> - for <span class="time_play">'.date('H:i:s', $time).'</span></div>
                            <div class="tips">
                                '.$match_odds.'
                                <div class="more">'.$count.'+<i class="icon-plus-sign"></i></div>
                            </div>
                            <ul class="more_odds">
                                '.$more.'
                            </ul>
                        </li>';
                }
            }
            else
            {
                echo '<li class="no-match">There is no upcoming event in next 24 hours</li>';
            }
        ?>
    </ul>   
</div>
<div id="new_tipsters" class="box">
    <div class="box_title grey"><i class="icon-star"></i> Say hello to our new tipsters</div>
    <div id="users">
        <?php foreach ($users as $user) { ?>
        <a href="<?php echo Yii::app()->createUrl('user/view', array('id'=>$user->id)); ?>">
                <div class="user">
                        <img src="<?php echo ($user->image) ? $user->image : '/images/regtop.png'; ?>" alt="<?php echo $user->username; ?>"/>
                        <h1><?php echo $user->username; ?></h1>
                </div>
            </a>
        <?php } ?>
    </div>
</div>

<?php $this->renderPartial('/partial/leaguejs'); ?>