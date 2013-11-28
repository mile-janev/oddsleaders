<?php
	foreach ($model as $matches) 
	{
?>
		<div class="box">
			<div class="box_title green">Football</div>
				<ul class="table">
				<li>
		            <div id="league"><?php echo $matches[0]->tournament['name']; ?></div>
		            <div class="tips">
		                <div>1</div>
		                <div>X</div>
		                <div>2</div>
		                <div>More</div>
		            </div>
		        </li>
<?php
        foreach ($matches as $key => $value) {
            $odds = json_decode($value['data']);

            $match_odds = '';
            if ($odds) {
                foreach ($odds->match as $key => $match) {
                    if ($key != 'label')
                        $match_odds .= '<div class="tip"><a class="clickable" rel="' . $value['code'] . '">' . $match . '</a></div>';
                }
            }

            $more = '';
            $count = 0;
            if ($odds) {
                foreach ($odds as $key => $more_odds) {
                    $odd = '';
                    if ($key != 'match') {

                        foreach ($more_odds as $tip => $m_odds) {
                            if ($tip != 'label') {
                                if (!empty($m_odds))
                                    $odd .= '<div class="tip"><a class="clickable" rel="' . $value['code'] . '">' . ucfirst($tip) . ' <span>' . $m_odds . '</span></a></div>';
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

            echo '<li class="' . $value['code'] . '">
                        <div id="time">' . date("d-m H:i", strtotime($value['start'])) . '</div>
                        <div id="teams">' . $value['opponent'] . '</div>
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


?>