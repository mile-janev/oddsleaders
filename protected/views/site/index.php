<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<a id="loginColorbox" href="#partial-login">Log In</a><br />

<a id="registerColorbox" href="#partial-register">Register</a><br />

 <div style='display:none'>
    <div id="partial-login" class="partial-form">
        <?php $this->renderPartial('login', array('model'=>$login, 'facebook' => $facebook)); ?>
    </div>
 </div>

 <div style='display:none'>
    <div id="partial-register" class="partial-form">
        <?php $this->renderPartial('/user/register', array('model'=>$model, 'facebook' => $facebook)); ?>
    </div>
 </div>

<script type="text/javascript">
$(document).ready( function() {

    $("#loginColorbox").colorbox({
        inline:true,
        width: '300px',
        opacity: 0.70,
        speed: 100,
        scrolling: false
    });
    $("#loginColorboxInside").colorbox({
        inline:true,
        width: '300px',
        opacity: 0.70,
        speed: 100,
        scrolling: false
    });
    $("#registerColorbox").colorbox({
        inline:true,
        width: '510px',
        opacity: 0.70,
        speed: 100,
        scrolling: false
    });
    $("#registerColorboxInside").colorbox({
        inline:true,
        width: '510px',
        opacity: 0.70,
        speed: 100,
        scrolling: false
    });

});
</script>