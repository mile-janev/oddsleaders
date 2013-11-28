<div id="rightbar">
    <div class="box_title blue"><i class="icon-credit-card"></i> Bet slip</div>
    <div id="bet_slip">
        <form class="form" action="#" method="POST">
            <div class="nano">
                <div class="content">
                    <div id="matchs" class="match-slip">
                        <div id="not_loged">
                            <p>Your slipper is EMPTY.<br> To select a bet please click on price. <br> You need to be</p> 
                            <a id="loginColorbox" href="<?php echo (Yii::app()->controller->id.'/'.$this->action->id == 'site/index') ? "#partial-login" : Yii::app()->createUrl('site/login'); ?>" class="button blue  "><i class="icon-signin"></i> Log in</a> or
                            <a id="registerColorbox" href="<?php echo (Yii::app()->controller->id.'/'.$this->action->id == 'site/index') ? "#partial-register" : Yii::app()->createUrl('user/register'); ?>" class="button green"><i class="icon-user"></i> Register</a>
                        </div>
                        <?php 
                            $matchs = explode('|',$_COOKIE['myBets']);
                            foreach ($matchs as $key => $value) {
                                $type = explode("-", $value);
                                //print_r($type[1]);
                                //echo '<div class="match" id="match-5">'.$types[0].'<span class="close" id="5">X</span><div id="odds"><div class="tip">'.$types[0].'</div><span>'.$types[0].'</span></div></div>';
                            }
                        ?>
                        <!-- <div class="match" id="match-5">Barcelona - Milan <span class="close" id="5">X</span><div id="odds"><div class="tip">1</div><span>1.45</span></div></div> -->
                    </div>
                </div>
            </div>
            <div id="stake">
                Place your stake 
                <input type="text" name="stake" class="stake"> €
            </div>
            <div id="money">
                Winning stake <span>0 €</span> 
            </div>
            <a href="" class="clear">Clear bets</a>
            <input type="submit" value="Place Bet" class="button blue right">
        </form>
    </div>
    <div class="box_title blue"><i class="icon-hand-up"></i> Best tipsters</div>
    <div id="tabs">
        <a href=".tab-0" class="tab_btn current">Mountly</a>
        <a href=".tab-1" class="tab_btn">All time</a>
    </div>
    <div class="tab_box">
            <ul id="tipsters" class="tabb tab-0">
                <li id="row"><span>1</span><div class="user"><a href="">tiger_s</a></div><div id="credits">632€</div></li>
                <li id="row"><span>2</span><div class="user"><a href="">janev</a></div><div id="credits">602€</div></li>
                <li id="row"><span>3</span><div class="user"><a href="">mile</a></div><div id="credits">600€</div></li>
                <li id="row"><span>4</span><div class="user"><a href="">slavco</a></div><div id="credits">555€</div></li>
                <li id="row"><span>5</span><div class="user"><a href="">kuzeski</a></div><div id="credits">512€</div></li>
                <li id="row"><span>6</span><div class="user"><a href="">jmile</a></div><div id="credits">480€</div></li>
                <li id="row"><span>7</span><div class="user"><a href="">leaders</a></div><div id="credits">421€</div></li>
                <li id="row"><span>8</span><div class="user"><a href="">odds</a></div><div id="credits">398€</div></li>
                <li id="row"><span>9</span><div class="user"><a href="">bets.com</a></div><div id="credits">350€</div></li>
                <li id="row"><span>10</span><div class="user"><a href="">tipster</a></div><div id="credits">312€</div></li>
                <li id="row"><div class="user" style="text-align:center; width:100%;"><a href="">See all <i class="icon-double-angle-right"></i></a></div></li>
            </ul>
            <ul id="tipsters" class="tabb tab-1">
                <li id="row"><span>1</span><div class="user"><a href="">slavco</a></div><div id="credits">555€</div></li>
                <li id="row"><span>2</span><div class="user"><a href="">mile</a></div><div id="credits">600€</div></li>
                <li id="row"><span>3</span><div class="user"><a href="">janev</a></div><div id="credits">602€</div></li>
                <li id="row"><span>4</span><div class="user"><a href="">kuzeski</a></div><div id="credits">512€</div></li>
                <li id="row"><span>5</span><div class="user"><a href="">odds</a></div><div id="credits">398€</div></li>
                <li id="row"><span>6</span><div class="user"><a href="">bets.com</a></div><div id="credits">350€</div></li>
                <li id="row"><span>7</span><div class="user"><a href="">tipster</a></div><div id="credits">312€</div></li>
                <li id="row"><span>8</span><div class="user"><a href="">jmile</a></div><div id="credits">480€</div></li>
                <li id="row"><span>9</span><div class="user"><a href="">tiger_s</a></div><div id="credits">632€</div></li>
                <li id="row"><span>10</span><div class="user"><a href="">leaders</a></div><div id="credits">421€</div></li>
                <li id="row"><div class="user" style="text-align:center; width:100%;"><a href="">See all <i class="icon-double-angle-right"></i></a></div></li>
            </ul>
    </div>
</div>