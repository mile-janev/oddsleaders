<div class="loader"><img src="/images/blue_load.gif" alt="Loading ..."/></div>
<div class="load_matches"></div>
<?php
    if($model != '')
    {

    foreach ($model as $matches) 
    {
?>
        <div class="box" id="<?=$matches[0]->tournament->id;?>">
            <div class="box_title green">Football</div>
                <ul class="table">
                <li>
                    <div id="league">Football</div>
                    <div class="tips">
                        <div>1</div>
                        <div>X</div>
                        <div>2</div>
                        <div>More</div>
                    </div>
                </li>
<?php
       if (isset($_COOKIE['myBets']) && $_COOKIE['myBets']!='') {
           $cookie = explode('|', $_COOKIE['myBets']);
            
           for ($i = 0; $i < count($cookie) - 1; $i++) {
                $exp = explode("=", $cookie[$i]);

                $tipped[$exp[0]][$exp[4]][$exp[1]] = 'tipped';
            }
        }
        foreach ($matches as $value) {

            
            $odds = json_decode($value['data']);

            $match_odds = '';
            if ($odds) {
                foreach ($odds->match as $key => $match) {
                    $type = strtolower($match);

                    if (isset($key) AND $key != 'label')
                    {
                        $key = (string)ucfirst($key);
                        (isset($tipped[$value['code']]['match'][$key])) ? $tiped = 'tipped' : $tiped = '';

                        $match_odds .= '<div class="tip"><span class="gameTypeBet">match</span><a class="clickable '.$tiped.'" id="liga" rel="' . $value['code'] . '" data-type="'.$key.'">' . $match . '</a></div>';
                    }
                }
            }

            $more = '';
            $count = 0;
            if ($odds) {
                foreach ($odds as $key => $more_odds) {
                    $odd = '';
                    if ($key != 'match') {

                        foreach ($more_odds as $tip => $m_odds) {
                            $m_odds = strtolower($m_odds);

                            if ($tip != 'label') {
                                $tip = ucfirst($tip);
                                    (isset($tipped[$value['code']][$key][$tip])) ? $tipe = 'tipped' : $tipe = '';

                                
                                if (!empty($m_odds))
                                    $odd .= '<div class="tip"><span class="gameTypeBet">'.$key.'</span><a class="clickable '.$tipe.'" rel="' . $value['code'] . '"><b class="gameType">' . ucfirst($tip) . '</b> <span class="gameQuote">' . $m_odds . '</span><span class="gameTypeBet">'.$key.'</span></a></div>';
                            }
                        }

                        $more .= '<li>
                                        <div id="type">' . ucfirst($key) . '</i></div>
                                        ' . $odd . '
                                    </li>';
                        $count++;
                    }
                }
            }
            $disable = '';
            if (isset($_COOKIE['myBets']) && $_COOKIE['myBets']!='') {
                foreach ($cookie as $key => $cook) {
                    $exp = explode('=', $cook);
                    if($exp[0] === $value['code'])
                        $disable = 'disable';
                }
            }

            echo '<li class="' . $value['code'] . " ".$disable.'">
                        <div id="time">' . date("d-m-Y H:i", $value->start) . '</div>
                        <div id="teams"><a>' . $value['opponent'] . '</a></div>
                        <div class="tips">
                            ' . $match_odds . '
                            <div class="more">+16 <i class="icon-plus-sign"></i></div>
                        </div>
                        <ul class="more_odds">
                            ' . $more . '
                        </ul>
                    </li>';
        }
        echo '</ul></div>';
	}
	}
	else 
	{
		echo '<h1>You don`t have chosen favourites leagues</h1>';
	}
?>

<?php $this->renderPartial('/partial/leaguejs'); ?>
