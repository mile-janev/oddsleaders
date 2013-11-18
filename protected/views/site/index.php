<?php
/* @var $this SiteController */
    $this->pageTitle = Yii::app()->name;
?>

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
    <?php $i=1; foreach ($topMatches as $topMatch) {
        $teams = explode(' vs ', $topMatch->opponent);
    ?>
        <div id="match">
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
                ?>
                        <a href="#" class="stripe chart_<?php echo $i; ?>_<?php echo $j; ?>"
                           rel="<?php echo OddsClass::getPercent($data->match, $value); ?>">
                            <?php echo $value; ?>
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
            foreach ($upcoming as $key => $value) {
                $odds = json_decode($value['data']);

                $match_odds = '';
                if ($odds) {
                    foreach ($odds->match as $key => $match) {
                        if($key != 'label')
                            $match_odds .= '<div class="tip"><a class="stripe clickable" data-id="'.$value['code'].'">'.ucfirst($key).' <span>'.$match.'</span></a></div>';
                    }
                }
                
                $more = ''; $count = 0;
                if ($odds) {
                    foreach ($odds as $key => $more_odds) {
                        $odd = '';
                        if($key != 'match')
                        {

                            foreach ($more_odds as $tip => $m_odds) {
                                if($tip != 'label')
                                {
                                    if(!empty($m_odds))
                                        $odd .= '<div class="tip"><a class="stripe clickable" data-id="'.$value['code'].'">'.ucfirst($tip).' <span>'.$m_odds.'</span></a></div>';
                                }
                            }

                            $more .= '<li>
                                        <div id="type">'.ucfirst($key).'</i></div>
                                        '.$odd.'
                                    </li>';
                            $count++;
                        }
                    }   
                }
                    $time = strtotime($value['start']) - time();
                    echo '<li class="'.$value['code'].'">
                        <div id="sport"><div class="icon football"></div></div>
                        <div id="match"><a>'.$value['opponent'].'</a> - for <span class="time_play">'.date('H:i:s', $time).'</span></div>
                        <div class="tips">
                            '.$match_odds.'
                            <div class="more">'.$count.'+<i class="icon-plus-sign"></i></div>
                        </div>
                        <ul class="more_odds">
                            '.$more.'
                        </ul>
                    </li>';
            }
        ?>
    </ul>   
</div>
<div id="new_tipsters" class="box">
    <div class="box_title grey"><i class="icon-star"></i> Say hello to our new tipsters</div>
    <div id="users">
        <div id="user"><img src="/images/profile.jpg" alt="Kuzeski Slavco"/><h1>Kuzeski Slavco</h1></div>
        <div id="user"><img src="/images/profile.jpg" alt="Kuzeski Slavco"/><h1>Kuzeski Slavco</h1></div>
        <div id="user"><img src="/images/profile.jpg" alt="Kuzeski Slavco"/><h1>Kuzeski Slavco</h1></div>
        <div id="user"><img src="/images/profile.jpg" alt="Kuzeski Slavco"/><h1>Kuzeski Slavco</h1></div>
        <div id="user"><img src="/images/profile.jpg" alt="Kuzeski Slavco"/><h1>Kuzeski Slavco</h1></div>
        <div id="user"><img src="/images/profile.jpg" alt="Kuzeski Slavco"/><h1>Kuzeski Slavco</h1></div>
        <div id="user"><img src="/images/profile.jpg" alt="Kuzeski Slavco"/><h1>Kuzeski Slavco</h1></div>
        <div id="user"><img src="/images/profile.jpg" alt="Kuzeski Slavco"/><h1>Kuzeski Slavco</h1></div>
    </div>
</div>
<div class="box">
    <div class="box_title green"><i class="icon football"></i> Football</div>
    <ul class="table">
        <li>
            <div id="league">Spain Primera Devision</div>
            <div class="tips">
                <div>1</div>
                <div>X</div>
                <div>2</div>
                <div>More</div>
            </div>
        </li>
        <?php
            foreach ($upcoming as $key => $value) {
                $odds = json_decode($value['data']);

                $match_odds = '';
                if ($odds) {
                    foreach ($odds->match as $key => $match) {
                        if($key != 'label')
                            $match_odds .= '<div class="tip"><a class="clickable" data-id="'.$value['code'].'">'.$match.'</a></div>';
                    }
                }
                
                $more = ''; $count = 0;
                if ($odds) {
                    foreach ($odds as $key => $more_odds) {
                        $odd = '';
                        if($key != 'match')
                        {

                            foreach ($more_odds as $tip => $m_odds) {
                                if($tip != 'label')
                                {
                                    if(!empty($m_odds))
                                        $odd .= '<div class="tip"><a class="clickable" data-id="'.$value['code'].'">'.ucfirst($tip).' <span>'.$m_odds.'</span></a></div>';
                                }
                            }

                            $more .= '<li>
                                        <div id="type">'.ucfirst($key).'</i></div>
                                        '.$odd.'
                                    </li>';
                            $count++;
                        }
                    }   
                }

                echo '<li class="'.$value['code'].'">
                        <div id="time">'.date("d-m H:i", strtotime($value['start'])).'</div>
                        <div id="teams">'.$value['opponent'].'</div>
                        <div class="tips">
                            '.$match_odds.'
                            <div class="more">+16 <i class="icon-plus-sign"></i></div>
                        </div>
                        <ul class="more_odds">
                            '.$more.'
                        </ul>
                    </li>';    
            }
        ?>
    </ul>
</div>
