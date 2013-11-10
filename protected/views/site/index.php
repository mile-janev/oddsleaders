<?php
/* @var $this SiteController */

$this->pageTitle = Yii::app()->name;
?>

<!-- <a id="loginColorbox" href="#partial-login" class="button blue"><i class="icon-signin"></i> Log In</a><br />

<a id="registerColorbox" href="#partial-register" class="button green"><i class="icon-user"></i> Register</a><br /> -->

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
    <div id="match">
        <div id="teams" class="grey">Barcelona - Milan</div>
        <div id="chartdiv" style="width: 180px; height: 100px;"></div>
        <div id="odds"><a href="" class="stripe">1.45</a><a href="" class="stripe">3.1</a><a href="" class="stripe">4.5</a></div>
    </div>
    <div id="match">
        <div id="teams" class="grey">Dortmund - Arsenal</div>
        <div id="chartdiv1" style="width: 180px; height: 100px;"></div>
        <div id="odds"><a href="" class="stripe">1.45</a><a href="" class="stripe">3.1</a><a href="" class="stripe">4.5</a></div>
    </div>
    <div id="match">
        <div id="teams" class="grey">Juventus - Real Madrid</div>
        <div id="chartdiv2" style="width: 180px; height: 100px;"></div>
        <div id="odds"><a href="" class="stripe">1.45</a><a href="" class="stripe">3.1</a><a href="" class="stripe">4.5</a></div>
    </div>
</div>
<div class="box">
    <div class="box_title grey"><i class="icon-flag"></i> Upcoming events</div>
    <ul class="upcoming">
        <li>
            <div id="sport"><div class="icon tennis"></div></div>
            <div id="match">Rafael Nadal - Roger Federer - for 2:30</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">5+<i class="icon-plus-sign"></i></span></div>
            </div>
            <ul class="more_odds">
                <li>
                    <div id="type">First Set <i class="icon-warning-sign" data-title="Correct score"></i></div>
                    <div id="tip" class="stripe">1 <span>1.8</span></div>
                    <div id="tip" class="stripe">2 <span>1.8</span></div>
                </li>
                <li>
                    <div id="type">Handicap (+2.5) <i class="icon-warning-sign" data-title="Correct score"></i></div>
                    <div id="tip" class="stripe">1 <span>1.8</span></div>
                    <div id="tip" class="stripe">2 <span>1.8</span></div>
                </li>
            </ul>
        </li>
        <li>
            <div id="sport"><div class="icon football"></div></div>
            <div id="match">Olympiakoa - Panatinaikos - for 5:00</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">X <span>3.1</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">16+<i class="icon-plus-sign"></i></span></div>
            </div>
            <ul class="more_odds">
                <li>
                    <div id="type">Double Chance <i class="icon-warning-sign" data-title="Correct score"></i></div>
                    <div id="tip" class="stripe">1X <span>1.11</span></div>
                    <div id="tip" class="stripe">X2 <span>1.8</span></div>
                    <div id="tip" class="stripe">12 <span>1.13</span></div>
                </li>
                <li>
                    <div id="type">Half Time / Full Time <i class="icon-warning-sign" data-title="Who will be winner on the first half and winner in seccond half"></i></div>
                    <div id="tip" class="stripe">1-1 <span>2.5</span></div>
                    <div id="tip" class="stripe">1-X <span>15.0</span></div>
                    <div id="tip" class="stripe">X-1 <span>4.7</span></div>
                    <div id="tip" class="stripe">X-2 <span>5.5</span></div>
                    <div id="tip" class="stripe">X-X <span>5.1</span></div>
                    <div id="tip" class="stripe">2-X <span>16.0</span></div>
                    <div id="tip" class="stripe">2-2 <span>8.5</span></div>
                    <div id="tip" class="stripe">2-1 <span>25.0</span></div>
                    <div id="tip" class="stripe">1-2 <span>25.0</span></div>
                </li>
                <li>
                    <div id="type">Both teams scored <i class="icon-warning-sign" data-title="Correct score"></i></div>
                    <div id="tip" class="stripe">NG <span>1.9</span></div>
                    <div id="tip" class="stripe">GG <span>1.6</span></div>
                </li>
                <li>
                    <div id="type">How many goals <i class="icon-warning-sign" data-title="How many goals will be scored in the match"></i></div>
                    <div id="tip" class="stripe">0-1 <span>3.5</span></div>
                    <div id="tip" class="stripe">0-2 <span>2.2</span></div>
                    <div id="tip" class="stripe">0-3 <span>1.8</span></div>
                    <div id="tip" class="stripe">3+ <span>1.6</span></div>
                    <div id="tip" class="stripe">4+ <span>2.2</span></div>
                    <div id="tip" class="stripe">5+ <span>5.5</span></div>
                    <div id="tip" class="stripe">7+ <span>10.5</span></div>
                </li>
                <li>
                    <div id="type">Corect score <i class="icon-warning-sign" data-title="Correct score"></i></div>
                    <div id="tip" class="stripe">0-0 <span>1.9</span></div>
                    <div id="tip" class="stripe">0-1 <span>1.6</span></div>
                    <div id="tip" class="stripe">0-2 <span>1.6</span></div>
                    <div id="tip" class="stripe">0-3 <span>1.6</span></div>
                    <div id="tip" class="stripe">0-4 <span>1.6</span></div>
                    <div id="tip" class="stripe">0-5 <span>1.6</span></div>
                    <div id="tip" class="stripe">1-0 <span>1.6</span></div>
                    <div id="tip" class="stripe">2-0 <span>1.6</span></div>
                    <div id="tip" class="stripe">3-0 <span>1.6</span></div>
                    <div id="tip" class="stripe">4-0 <span>1.6</span></div>
                    <div id="tip" class="stripe">5-0 <span>1.6</span></div>
                    <div id="tip" class="stripe">1-1 <span>1.6</span></div>
                    <div id="tip" class="stripe">2-1 <span>1.6</span></div>
                    <div id="tip" class="stripe">2-2 <span>1.6</span></div>
                    <div id="tip" class="stripe">2-3 <span>1.6</span></div>
                    <div id="tip" class="stripe">3-2 <span>1.6</span></div>
                    <div id="tip" class="stripe">3-3 <span>1.6</span></div>
                    <div id="tip" class="stripe">3-4 <span>1.6</span></div>
                    <div id="tip" class="stripe">4-4 <span>1.6</span></div>
                    <div id="tip" class="stripe">4-3 <span>1.6</span></div>
                    <div id="tip" class="stripe">4-5 <span>1.6</span></div>
                    <div id="tip" class="stripe">5-4 <span>1.6</span></div>
                    <div id="tip" class="stripe">5-5 <span>1.6</span></div>
                </li>
            </ul>
        </li>
        <li>
            <div id="sport"><div class="icon football"></div></div>
            <div id="match">Porto - Benfica - for 6:24</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">X <span>3.1</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">16+<i class="icon-plus-sign"></i></span></div>
            </div>
        </li>
        <li>
            <div id="sport"><div class="icon basketball"></div></div>
            <div id="match">Real Mardrid - Barcelona - for 6:30</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">4+<i class="icon-plus-sign"></i></span></div>
            </div>
        </li>
        <li>
            <div id="sport"><div class="icon hockey"></div></div>
            <div id="match">Frolunda - HV 71. - for 7:00</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">X <span>3.1</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">10+<i class="icon-plus-sign"></i></span></div>
            </div>
        </li>
        <li>
            <div id="sport"><div class="icon football"></div></div>
            <div id="match">Milan - Inter - for 7:15</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">X <span>3.1</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">16+<i class="icon-plus-sign"></i></span></div>
            </div>
        </li>
        <li>
            <div id="sport"><div class="icon hockey"></div></div>
            <div id="match">Kazan - Sibirsk - for 7:45</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">X <span>3.1</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">10+<i class="icon-plus-sign"></i></span></div>
            </div>
        </li>
        <li>
            <div id="sport"><div class="icon tennis"></div></div>
            <div id="match">N. Wawrinka - Del Porto - for 8:00</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">5+<i class="icon-plus-sign"></i></span></div>
            </div>
        </li>
        <li>
            <div id="sport"><div class="icon tennis"></div></div>
            <div id="match">Ana Ivanovic - Venus Williams - for 10:00</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">5+<i class="icon-plus-sign"></i></span></div>
            </div>
        </li>
        <li>
            <div id="sport"><div class="icon football"></div></div>
            <div id="match">Vardar - Rabotnicki - for 15:00</div>
            <div id="tips">
                <div id="tip" class="stripe">1 <span>1.95</span></div>
                <div id="tip" class="stripe">X <span>3.1</span></div>
                <div id="tip" class="stripe">2 <span>2.9</span></div>
                <div id="more">16+<i class="icon-plus-sign"></i></span></div>
            </div>
        </li>
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