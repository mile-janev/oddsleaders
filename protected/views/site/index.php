<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;

    $criteria1 = new CDbCriteria();
    $criteria1->order = 'start ASC';
    $criteria1->limit = '20';
    $upcoming = Stack::model()->findAll($criteria1);
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
<div class="box_title blue"><i class="icon-flag"></i> Top Matches</div>
<div id="main_top">
    <div id="match" class="51">
        <div id="teams" class="grey">Barcelona - Milan</div>
        <div id="chartdiv" style="width: 180px; height: 100px;"></div>
        <div id="odds"><a href="" class="stripe" data='51'>1.45</a><a href="" class="stripe" data='51'>3.1</a><a href="" class="stripe" data='51'>4.5</a></div>
    </div>
    <div id="match" class="21">
        <div id="teams" class="grey">Dortmund - Arsenal</div>
        <div id="chartdiv1" style="width: 180px; height: 100px;"></div>
        <div id="odds"><a href="" class="stripe" data='21'>1.45</a><a href="" class="stripe" data='21'>3.1</a><a href="" class="stripe" data='21'>4.5</a></div>
    </div>
    <div id="match" class="12">
        <div id="teams" class="grey">Juventus - Real Madrid</div>
        <div id="chartdiv2" style="width: 180px; height: 100px;"></div>
        <div id="odds"><a href="" class="stripe" data='12'>1.45</a><a href="" class="stripe" data='12'>3.1</a><a href="" class="stripe" data='12'>4.5</a></div>
    </div>
</div>
<div class="box">
    <div class="box_title grey"><i class="icon-flag"></i> Upcoming events</div>
    <ul class="upcoming">
        <?php 
            foreach ($upcoming as $key => $value) {
                $odds = json_decode($value['data']);

                $match_odds = '';
                foreach ($odds->match as $key => $match) {
                    if($key != 'label')
                        $match_odds .= '<a id="tip" class="stripe" data="'.$value['code'].'">'.ucfirst($key).' <span>'.$match.'</span></a>';
                }

                $more = ''; $count = 0;
                foreach ($odds as $key => $more_odds) {
                    $odd = '';
                    if($key != 'match')
                    {

                        foreach ($more_odds as $tip => $m_odds) {
                            if($tip != 'label')
                            {
                                if(!empty($m_odds))
                                    $odd .= '<a id="tip" class="stripe" data="'.$value['code'].'">'.ucfirst($tip).' <span>'.$m_odds.'</span></a>';
                            }
                        }

                        $more .= '<li>
                                    <div id="type">'.ucfirst($key).'</i></div>
                                    '.$odd.'
                                </li>';
                        $count++;
                    }
                }   
                    $time = strtotime($value['start']) - time();
                    echo '<li class="'.$value['code'].'">
                        <div id="sport"><div class="icon football"></div></div>
                        <div id="match"><a>'.$value['opponent'].'</a> - for <span class="time_play">'.date('H:i:s', $time).'</span></div>
                        <div id="tips">
                            '.$match_odds.'
                            <div id="more">'.$count.'+<i class="icon-plus-sign"></i></div>
                        </div>
                        <ul class="more_odds">
                            '.$more.'
                        </ul>
                    </li>';
            }
        ?>
    </ul>   
</div>
<div class="box">
    <div class="box_title grey"><i class="icon-star"></i> Say hello to our new tipsters</div>
</div>
<div class="box">
    <div class="box_title grey"><i class="icon football"></i> Football</div>
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
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
            <td class="clickable">1,95</td>
            <td class="clickable">3.1</td>
            <td class="clickable">2.65</td>
            <td class="clickable">1.9</td>
            <td class="clickable">1.6</td>
            <td class="more">+16 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
            <td class="clickable">1,95</td>
            <td class="clickable">3.1</td>
            <td class="clickable">2.65</td>
            <td class="clickable">1.9</td>
            <td class="clickable">1.6</td>
            <td class="more">+16 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
            <td class="clickable">1,95</td>
            <td class="clickable">3.1</td>
            <td class="clickable">2.65</td>
            <td class="clickable">1.9</td>
            <td class="clickable">1.6</td>
            <td class="more">+16 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
            <td class="clickable">1,95</td>
            <td class="clickable">3.1</td>
            <td class="clickable">2.65</td>
            <td class="clickable">1.9</td>
            <td class="clickable">1.6</td>
            <td class="more">+16 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
            <td class="clickable">1,95</td>
            <td class="clickable">3.1</td>
            <td class="clickable">2.65</td>
            <td class="clickable">1.9</td>
            <td class="clickable">1.6</td>
            <td class="more">+16 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
            <td class="clickable">1,95</td>
            <td class="clickable">3.1</td>
            <td class="clickable">2.65</td>
            <td class="clickable">1.9</td>
            <td class="clickable">1.6</td>
            <td class="more">+16 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
            <td class="clickable">1,95</td>
            <td class="clickable">3.1</td>
            <td class="clickable">2.65</td>
            <td class="clickable">1.9</td>
            <td class="clickable">1.6</td>
            <td class="more">+16 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
            <td class="clickable">1,95</td>
            <td class="clickable">3.1</td>
            <td class="clickable">2.65</td>
            <td class="clickable">1.9</td>
            <td class="clickable">1.6</td>
            <td class="more">+16 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td id="teams">Real Madrid - Barcelona</td>
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
            <td id="time">21:00</td>
            <td>Rafael Nadal - Roger Federer</td>
            <td class="clickable">1,95</td>
            <td class="clickable">1.75</td>
            <td class="clickable">1.8</td>
            <td class="clickable">1.8</td>
            <td class="more">+5 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td>Rafael Nadal - Roger Federer</td>
            <td class="clickable">1,95</td>
            <td class="clickable">1.75</td>
            <td class="clickable">1.8</td>
            <td class="clickable">1.8</td>
            <td class="more">+5 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td>Rafael Nadal - Roger Federer</td>
            <td class="clickable">1,95</td>
            <td class="clickable">1.75</td>
            <td class="clickable">1.8</td>
            <td class="clickable">1.8</td>
            <td class="more">+5 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td>Rafael Nadal - Roger Federer</td>
            <td class="clickable">1,95</td>
            <td class="clickable">1.75</td>
            <td class="clickable">1.8</td>
            <td class="clickable">1.8</td>
            <td class="more">+5 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td>Rafael Nadal - Roger Federer</td>
            <td class="clickable">1,95</td>
            <td class="clickable">1.75</td>
            <td class="clickable">1.8</td>
            <td class="clickable">1.8</td>
            <td class="more">+5 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td>Rafael Nadal - Roger Federer</td>
            <td class="clickable">1,95</td>
            <td class="clickable">1.75</td>
            <td class="clickable">1.8</td>
            <td class="clickable">1.8</td>
            <td class="more">+5 <i class="icon-plus-sign"></i></td>
        </tr>
        <tr class="disabled">
            <td id="time">21:00</td>
            <td>Rafael Nadal - Roger Federer</td>
            <td class="clickable">1,95</td>
            <td class="clickable">1.75</td>
            <td class="clickable">1.8</td>
            <td class="clickable">1.8</td>
            <td class="more">+5 <i class="icon-plus-sign"></i></td>
        </tr>
    </table>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        $("#loginColorbox").colorbox({
            inline: true,
            width: '450px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#loginColorboxInside").colorbox({
            inline: true,
            width: '450px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#registerColorbox").colorbox({
            inline: true,
            width: '300px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#registerColorboxInside").colorbox({
            inline: true,
            width: '300px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });

    });
</script>