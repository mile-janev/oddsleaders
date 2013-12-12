<?php
    $criteria1 = new CDbCriteria();
    $criteria1->addCondition('active = 1');
    $sports = Sport::model()->findAll($criteria1);
    /*$leagues = explode('|', $_COOKIE['myLeagues']);
    $class = 'load';
    foreach ($leagues as $key => $value) {
        if($value === $tournament->id)
            $class = 'loaded';
    }*/
?>

<div id="sidebar">
    <p class="box_title blue" style="text-align:center; margin:0 0 15px 0;">Select your sport:</p>
    <ul id="sports">
        <?php $i = 0; foreach ($sports as $sport) { $i++; ?>
            <li>
                <a href="#" class="toggler<?php echo ($i==1) ? ' first' : ''; ?>">
                    <div class="icon" style="background-position: <?php echo $sport->icon; ?>"></div>
                    <?php echo $sport->name; ?>
                </a>
                <ul>
                    <?php foreach ($sport->tournaments as $tournament) { 
                        $gamesNumber = count($tournament->stacks);
                        $class = 'load';
                            if ($gamesNumber != 0 && $tournament->active == 1) {
                                if(isset($_COOKIE['myLeagues'])) {
                                $leagues = explode('|', $_COOKIE['myLeagues']);
                                $class = 'load';
                                foreach ($leagues as $key => $value) {
                                    if($value == $tournament->id)
                                    {
                                        $class = 'loaded';
                                    }
                                }
                                }
                        ?>
                        <li><a href="<?php echo $this->createurl('stack/mymatches');?>" data-id="<?=$tournament->id;?>" class="<?=$class;?>" title="<?=$tournament->name;?>">⇢ <?php if(strlen($tournament->name) > 22) { echo substr($tournament->name, 0, 22); }else { echo $tournament->name;} ?> 
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