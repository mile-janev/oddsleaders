<div id="top" class="blue">
    <div id="top_wrapped">
        <ul id="top_menu">
            <li><?=date('d-M-Y', time());?> <div id="clock" style="display:inline-block;"></div></li>
            <li>Language<select>
                    <option>English</option>
                    <option>Macedonian</option>
                    <option>Serbian</option>
                </select></li>
        </ul>
        <div class="right">
                <?php if (Yii::app()->user->isGuest) { ?>
                <div id="top_btn">
                    <a id="loginColorbox" href="<?php echo (Yii::app()->controller->id.'/'.$this->action->id == 'site/index') ? "#partial-login" : Yii::app()->createUrl('site/login'); ?>" class="button grey"><i class="icon-signin"></i> Log in</a>
                    You are new here ?? 
                    <a id="registerColorbox" href="<?php echo (Yii::app()->controller->id.'/'.$this->action->id == 'site/index') ? "#partial-register" : Yii::app()->createUrl('user/register'); ?>" class="button grey"><i class="icon-user"></i> Register</a>
                </div>
                <?php } else { ?>
                <div id="loged">
                    <img src="images/regtop.png"/>
                    <h1><?php echo Yii::app()->user->name; ?></h1>
                    <ul class="config">
                        <li><a href=""><i class="icon-indent-right"></i></a>
                            <ul class="grey">
                                <li><a href="<?php echo Yii::app()->createUrl('user/profile'); ?>"><i class="icon-user"></i> Profile</a></li>
                                    <li><a href="/index.php?r=site/logout"><i class="icon-signout"></i> Log Out</a></li>
                                    <li><a class="bilans"> CREDITS <span><?php echo Yii::app()->user->conto; ?> €</span></a></li>
                            </ul>
                        </li>
                    </ul>	
                </div>
                <?php } ?>
        </div>
    </div>
</div>
<div id="banner">
    <a href="/"><img src="/images/logo.png" title="Oddsleaders.com"/></a>
</div>
<div id="mainmenu">
    <?php 
        $this->widget('zii.widgets.CMenu',array(
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'Top Matches', 'url'=>array('/stack/topmatches')),
                array('label'=>'Tickets', 'url'=>array('/user/tickets'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'My History', 'url'=>array('/user/history'), 'visible'=>!Yii::app()->user->isGuest),
                array('label'=>'Bet Manager', 'url'=>array('/user/betmanager'), 'visible'=>!Yii::app()->user->isGuest),
            ),
        )); 
    ?>
</div>