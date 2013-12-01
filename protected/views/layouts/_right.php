<div id="rightbar">
    <div class="box_title blue"><i class="icon-credit-card"></i> Bet slip</div>
    <div id="bet_slip">
        <form class="form" action="#" method="POST">
            <div class="nano">
                <div class="content">
                    <div id="matchs" class="match-slip">
                        <?php if (!isset($_COOKIE['myBets'])) { ?>
                            <div id="not_loged">
                                <p>Your slipper is EMPTY.<br> To select a bet please click on price. <br> You need to be</p> 
                                <a id="loginColorbox" href="<?php echo (Yii::app()->controller->id . '/' . $this->action->id == 'site/index') ? "#partial-login" : Yii::app()->createUrl('site/login'); ?>" class="button blue  "><i class="icon-signin"></i> Log in</a> or
                                <a id="registerColorbox" href="<?php echo (Yii::app()->controller->id . '/' . $this->action->id == 'site/index') ? "#partial-register" : Yii::app()->createUrl('user/register'); ?>" class="button green"><i class="icon-user"></i> Register</a>
                            </div>
                        <?php } else {
                            $cookieValue = explode('|', $_COOKIE['myBets']);
                            for ($i = 0; $i < count($cookieValue) - 1; $i++) {
                                $bet = explode("-", $cookieValue[$i]);
                        ?>
                            <div class="match">
                                <?php echo $bet[3]; ?>
                                <span class="close betSlipperClose" id="<?php echo $bet[0]; ?>">X</span>
                                <div id="odds">
                                    <div class="tip"><?php echo $bet[1]; ?></div>
                                    <span><?php echo $bet[2]; ?></span>
                                </div>
                            </div>
                        <?php } } ?>
                    </div>
                </div>
            </div>
            <div id="stake">
                Place your stake 
                <input type="text" name="stake" class="stake"> €
            </div>
            <div id="money">
                Winning stake <span><input type="text" id="win_stake" name="win_stake" value="0 €"/></span> 
            </div>
            <a href="" class="clear">Clear bets</a>
            <input type="submit" value="Place Bet" class="button blue right">
        </form>
    </div>
    <div class="box_title blue"><i class="icon-hand-up"></i> Best tipsters</div>
    <div id="tabs">
        <a href=".tab-0" class="tab_btn current">Monthly</a>
        <a href=".tab-1" class="tab_btn">All time</a>
    </div>
    <div class="tab_box">
        <ul class="tipsters tabb tab-0">
            <?php $tipstersMonth = OddsClass::getTipsters(TRUE); ?>
            <?php if ($tipstersMonth) { ?>
                <?php for($i=0; $i<count($tipstersMonth); $i++) { ?>
                    <li class="row">
                        <span class="rightBorderDotted bestTipstersId"><?php echo $i+1; ?></span>
                        <span class="user">
                            <a href="#"><?php echo $tipstersMonth[$i]->username; ?></a>
                        </span>
                        <span class="credits"><?php echo $tipstersMonth[$i]->conto; ?>€</span>
                    </li>
                <?php } ?>
                    <li class="row">
                        <span class="user" style="text-align:center; width:100%;">
                            <a href="#">See all <i class="icon-double-angle-right"></i></a>
                        </span>
                    </li>
            <?php } ?>
        </ul>
        <ul class="tipsters tabb tab-1">
            <?php $tipstersMonth = OddsClass::getTipsters(FALSE); ?>
            <?php if ($tipstersMonth) { ?>
                <?php for($i=0; $i<count($tipstersMonth); $i++) { ?>
                    <li class="row">
                        <span class="rightBorderDotted bestTipstersId"><?php echo $i+1; ?></span>
                        <span class="user">
                            <a href="#"><?php echo $tipstersMonth[$i]->username; ?></a>
                        </span>
                        <span class="credits"><?php echo $tipstersMonth[$i]->conto; ?>€</span>
                    </li>
                <?php } ?>
                    <li class="row">
                        <span class="user" style="text-align:center; width:100%;">
                            <a href="">See all <i class="icon-double-angle-right"></i></a>
                        </span>
                    </li>
            <?php } ?>
        </ul>
    </div>
</div>