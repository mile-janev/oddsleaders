<?php
/* @var $this SiteController */
    $this->pageTitle = Yii::app()->name;
?>
<div class="loader"><img src="/images/blue_load.gif" alt="Loading ..."/></div>
<div class="load_matches"></div>
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
<div class="box_title green"><i class="icon-flag"></i> Top Matches</div>
<div id="main_top">
    <?php $i=1; foreach ($topMatches as $topMatch) {
        $teams = explode(' vs ', $topMatch->opponent);
    ?>
        <div class="match">
            <div id="teams" class="grey">
                <span class="chart_<?php echo $i; ?>_home"><?php echo $teams[0]; ?></span>
                -
                <span class="chart_<?php echo $i; ?>_guest"><?php echo $teams[1]; ?></span>
            </div>
            <div id="chartdiv<?php echo $i; ?>" style="width: 180px; height: 100px;"></div>
            <div id="odds">
                <?php 
                    $data = json_decode($topMatch->data);
                    $j=0;
                    foreach ($data->match as $key => $value) { 
                        if ($key != 'label') {
                            $j++;
                ?>
                        <a href="#" class="stripe chart_<?php echo $i; ?>_<?php echo $j; ?>"
                           rel="<?php echo OddsClass::getPercent($data->match, $value); ?>">
                            <?php echo $value; ?>
                        </a>
                <?php } } ?>
            </div>
        </div>
    <?php $i++; } ?>
</div>
<div class="box">
    <div class="box_title grey"><i class="icon-flag"></i> Upcoming events</div>
    <ul class="upcoming">
        <?php 
            foreach ($upcoming as $key => $value) {
                $odds = json_decode($value['data']);

                $match_odds = '';
                if ($odds) {
                    foreach ($odds->match as $key => $match) {
                        if($key != 'label')
                            $match_odds .= '<div class="tip"><a class="stripe clickable" rel="'.$value['code'].'"><p class="gameType">'.ucfirst($key).'</p><span class="gameQuote">'.$match.'</span></a></div>';
                    }
                }
                
                $more = ''; $count = 0;
                if ($odds) {
                    foreach ($odds as $key => $more_odds) {
                        $odd = '';
                        if($key != 'match')
                        {

                            foreach ($more_odds as $tip => $m_odds) {
                                if($tip != 'label')
                                {
                                    if(!empty($m_odds))
                                        $odd .= '<div class="tip"><a class="stripe clickable" rel="'.$value['code'].'"><p class="gameType">'.ucfirst($tip).'</p><span class="gameQuote">'.$m_odds.'</span></a></div>';
                                }
                            }

                            $more .= '<li>
                                        <div id="type">'.ucfirst($key).'</i></div>
                                        '.$odd.'
                                    </li>';
                            $count++;
                        }
                    }   
                }
                    $time = strtotime($value['start']) - time();
                    echo '<li class="'.$value['code'].'">
                        <div id="sport"><div class="icon football"></div></div>
                        <div class="match"><a>'.$value['opponent'].'</a> - for <span class="time_play">'.date('H:i:s', $time).'</span></div>
                        <div class="tips">
                            '.$match_odds.'
                            <div class="more">'.$count.'+<i class="icon-plus-sign"></i></div>
                        </div>
                        <ul class="more_odds">
                            '.$more.'
                        </ul>
                    </li>';
            }
        ?>
    </ul>   
</div>
<div id="new_tipsters" class="box">
    <div class="box_title grey"><i class="icon-star"></i> Say hello to our new tipsters</div>
    <div id="users">
        <?php foreach ($users as $user) { ?>
            <div class="user">
                <img src="<?php echo ($user['image']) ? $user['image'] : '/images/regtop.png'; ?>" alt="<?php echo $user['name']; ?>"/>
                <h1><?php echo $user['name']; ?></h1>
            </div>
        <?php } ?>
    </div>
</div>
<!-- <div class="box">
    <div class="box_title green"><i class="icon football"></i> Football</div>
    <ul class="table">
        <li>
            <div id="league">Spain Primera Devision</div>
            <div class="tips">
                <div>1</div>
                <div>X</div>
                <div>2</div>
                <div>More</div>
            </div>
        </li>
        <?php
            foreach ($upcoming as $key => $value) {
                $odds = json_decode($value['data']);

                $match_odds = '';
                if ($odds) {
                    foreach ($odds->match as $key => $match) {
                        if($key != 'label')
                            $match_odds .= '<div class="tip"><a class="clickable" rel="'.$value['code'].'">'.$match.'</a></div>';
                    }
                }
                
                $more = ''; $count = 0;
                if ($odds) {
                    foreach ($odds as $key => $more_odds) {
                        $odd = '';
                        if($key != 'match')
                        {

                            foreach ($more_odds as $tip => $m_odds) {
                                if($tip != 'label')
                                {
                                    if(!empty($m_odds))
                                        $odd .= '<div class="tip"><a class="clickable" rel="'.$value['code'].'">'.ucfirst($tip).' <span>'.$m_odds.'</span></a></div>';
                                }
                            }

                            $more .= '<li>
                                        <div id="type">'.ucfirst($key).'</i></div>
                                        '.$odd.'
                                    </li>';
                            $count++;
                        }
                    }   
                }

                echo '<li class="'.$value['code'].'">
                        <div id="time">'.date("d-m H:i", strtotime($value['start'])).'</div>
                        <div id="teams">'.$value['opponent'].'</div>
                        <div class="tips">
                            '.$match_odds.'
                            <div class="more">+16 <i class="icon-plus-sign"></i></div>
                        </div>
                        <ul class="more_odds">
                            '.$more.'
                        </ul>
                    </li>';    
            }
        ?>
    </ul>
</div> -->

<?php $this->renderPartial('/partial/leaguejs'); ?>
<script type="text/javascript">
    /*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Most played games charts
 *  @return script
 * ---------------------------------------------------------------------------------------------------------------------
*/
    var chart;

    var chartData1 = [
        {
            "teams": $('.chart_1_home').html() + " win",
            "procent": $('.chart_1_1').attr('rel'),
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": $('.chart_1_2').attr('rel'),
            "short": "X"
        },
        {
            "teams": $('.chart_1_guest').html() + " win",
            "procent": $('.chart_1_3').attr('rel'),
            "short": "2"
        }
    ];

    AmCharts.ready(function() {
        // SERIAL CHART
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData1;
        chart.categoryField = "teams";
        chart.startDuration = 2;
        // change balloon text color                
        chart.balloon.color = "#000000";

        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.gridAlpha = 0;
        categoryAxis.axisAlpha = 0;
        categoryAxis.labelsEnabled = false;

        // value
        var valueAxis = new AmCharts.ValueAxis();
        valueAxis.gridAlpha = 0;
        valueAxis.axisAlpha = 0;
        valueAxis.labelsEnabled = false;
        valueAxis.minimum = 0;
        chart.addValueAxis(valueAxis);

        // GRAPH
        var graph = new AmCharts.AmGraph();
        graph.balloonText = "[[category]]: [[value]]";
        graph.valueField = "procent";
        graph.descriptionField = "short";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 1;
        graph.fillColors = ["#51a351", "#62c462"];
        graph.labelText = "[[description]]";
        graph.balloonText = "[[category]]: [[value]] %";
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv1");
    });

    var chart;

    var chartData2 = [
        {
            "teams": $('.chart_2_home').html() + " win",
            "procent": $('.chart_2_1').attr('rel'),
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": $('.chart_2_2').attr('rel'),
            "short": "X"
        },
        {
            "teams": $('.chart_2_guest').html() + " win",
            "procent": $('.chart_2_3').attr('rel'),
            "short": "2"
        }
    ];

    AmCharts.ready(function() {
        // SERIAL CHART
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData2;
        chart.categoryField = "teams";
        chart.startDuration = 2;
        // change balloon text color                
        chart.balloon.color = "#000000";

        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.gridAlpha = 0;
        categoryAxis.axisAlpha = 0;
        categoryAxis.labelsEnabled = false;

        // value
        var valueAxis = new AmCharts.ValueAxis();
        valueAxis.gridAlpha = 0;
        valueAxis.axisAlpha = 0;
        valueAxis.labelsEnabled = false;
        valueAxis.minimum = 0;
        chart.addValueAxis(valueAxis);

        // GRAPH
        var graph = new AmCharts.AmGraph();
        graph.balloonText = "[[category]]: [[value]]";
        graph.valueField = "procent";
        graph.descriptionField = "short";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 1;
        graph.fillColors = ["#51a351", "#62c462"];
        graph.labelText = "[[description]]";
        graph.balloonText = "[[category]]: [[value]] %";
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv2");
    });

    var chartData3 = [
        {
            "teams": $('.chart_3_home').html() + " win",
            "procent": $('.chart_3_1').attr('rel'),
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": $('.chart_3_2').attr('rel'),
            "short": "X"
        },
        {
            "teams": $('.chart_3_guest').html() + " win",
            "procent": $('.chart_1_1').attr('rel'),
            "short": "2"
        }
    ];

    AmCharts.ready(function() {
        // SERIAL CHART
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData3;
        chart.categoryField = "teams";
        chart.startDuration = 2;
        // change balloon text color                
        chart.balloon.color = "#000000";

        // AXES
        // category
        var categoryAxis = chart.categoryAxis;
        categoryAxis.gridAlpha = 0;
        categoryAxis.axisAlpha = 0;
        categoryAxis.labelsEnabled = false;

        // value
        var valueAxis = new AmCharts.ValueAxis();
        valueAxis.gridAlpha = 0;
        valueAxis.axisAlpha = 0;
        valueAxis.labelsEnabled = false;
        valueAxis.minimum = 0;
        chart.addValueAxis(valueAxis);

        // GRAPH
        var graph = new AmCharts.AmGraph();
        graph.balloonText = "[[category]]: [[value]]";
        graph.valueField = "procent";
        graph.descriptionField = "short";
        graph.type = "column";
        graph.lineAlpha = 0;
        graph.fillAlphas = 1;
        graph.fillColors = ["#51a351", "#62c462"];
        graph.labelText = "[[description]]";
        graph.balloonText = "[[category]]: [[value]] %";
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv3");
    });
</script>