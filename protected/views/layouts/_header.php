<div id="top" class="blue">
    <div id="top_wrapped">
        <ul id="top_menu">
            <li><?= date("d-m-Y H:i"); ?></li>
            <li>Language<select>
                    <option>English</option>
                    <option>Macedonian</option>
                    <option>Serbian</option>
                </select></li>
        </ul>	
        <div class="right">
            <div id="loged">
                <?php if (Yii::app()->user->isGuest) { ?>
                    <h1>Please login here -></h1>
                <?php } else { ?>
                    <img src="images/profile.jpg"/>
                    <h1>Кузески Славчо</h1>
                <?php } ?>
                
            </div>
            <ul class="config">
                <li><a href=""><i class="icon-indent-right"></i></a>
                    <ul class="grey">
                        <?php if(Yii::app()->user->isGuest) { ?>
                            <li><a id="loginColorbox" href="#partial-login" class="button blue"><i class="icon-signin"></i>Log In</a></li>
                            <li><a id="registerColorbox" href="#partial-register" class="button green"><i class="icon-user"></i>Register</a></li>
                        <?php } else { ?>
                            <li><a href=""><i class="icon-user"></i> Profile</a></li>
                            <li><a href=""><i class="icon-signout"></i> Log Out</a></li>
                            <li><a class="bilans"> CREDITS <span>620 €</span></a></li>
                        <?php } ?>
                    </ul>
                </li>
            </ul>	
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
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        )); 
    ?>
</div>