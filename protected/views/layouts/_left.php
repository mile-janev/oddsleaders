<?php
    $criteria1 = new CDbCriteria();
    $criteria1->addCondition('active = 1');
    $sports = Sport::model()->findAll($criteria1);
?>

<div id="sidebar">
    <p class="box_title blue" style="text-align:center; margin:0 0 15px 0;">Select your sport:</p>
    <ul id="sports">
        <?php $i = 0; foreach ($sports as $sport) { $i++; ?>
            <li>
                <a href="#"
                   class="toggler<?php // echo ($i==1) ? ' first' : ''; ?>">
                    <div class="icon" style="background-position: <?php echo $sport->icon; ?>"></div><?php echo $sport->name; ?>
                    <!--<span>&nbsp;</span>-->
                </a>
                <ul>
                    <?php foreach ($sport->tournaments as $tournament) { 
                        $gamesNumber = count($tournament->stacks);
                            if ($gamesNumber != 0 && $tournament->active == 1) {
                    ?>
                        <li><a href="#" title="<?=$tournament->name;?>">⇢ <?php if(strlen($tournament->name) > 22) { echo substr($tournament->name, 0, 22); }else { echo $tournament->name;} ?> 
                                <span><?php echo $gamesNumber; ?></span>
                            </a>
                        <li>
                        <?php } ?>
                    <?php } ?>
                </ul>
            </li>
        <?php } ?>
    </ul>
</div>