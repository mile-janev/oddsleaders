
$(document).ready(function() {
    $('.services li').click(function() {
        $(this).find('ul').show();
        $(this).mouseleave(function() {
            $(this).find('ul').hide();
        });
    });

    $('.tab_btn').click(function() {
        $('.tab_btn').removeClass('current');
        tab = $(this).attr('href');

        $('.tabb').hide();
        $(tab).show();
        $(this).addClass("current");

        return false;
    });

    $('.more, #more').click(function() {
        $(this).parent("div").next().slideToggle();
    });

    function side_toggle(obj)
    {
        if (obj.attr('class') != 'active')
        {
//            $('#sports li ul').slideUp();
            obj.next().slideToggle();
            $('#sports li a').removeClass('active');
            obj.addClass('active');
        }
    }
    ;
    $(".toggler").click(function()
    {
        side_toggle($(this));
        return false;
    });

    side_toggle($('.first'));

    $('.nano').nanoScroller({
        preventPageScrolling: true
    });

    var chart;

    var chartData = [
        {
            "teams": "Barcelona win",
            "procent": 70,
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": 10,
            "short": "X"
        },
        {
            "teams": "Milan win",
            "procent": 20,
            "short": "2"
        }
    ];

    AmCharts.ready(function() {
        // SERIAL CHART
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
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
        graph.fillColors = ["#1a5e83", "#0088cc"];
        graph.labelText = "[[description]]";
        graph.balloonText = "[[category]]: [[value]] %";
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv");
    });

    var chart;

    var chartData = [
        {
            "teams": "Dortmund win",
            "procent": 30,
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": 40,
            "short": "X"
        },
        {
            "teams": "Arsenal win",
            "procent": 30,
            "short": "2"
        }
    ];

    AmCharts.ready(function() {
        // SERIAL CHART
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
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
        graph.fillColors = ["#1a5e83", "#0088cc"];
        graph.labelText = "[[description]]";
        graph.balloonText = "[[category]]: [[value]] %";
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv1");
    });

    var chartData = [
        {
            "teams": "Juventus win",
            "procent": 20,
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": 50,
            "short": "X"
        },
        {
            "teams": "Real Madrid win",
            "procent": 30,
            "short": "2"
        }
    ];

    AmCharts.ready(function() {
        // SERIAL CHART
        var chart = new AmCharts.AmSerialChart();
        chart.dataProvider = chartData;
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
        graph.fillColors = ["#1a5e83", "#0088cc"];
        graph.labelText = "[[description]]";
        graph.balloonText = "[[category]]: [[value]] %";
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv2");
    });
});