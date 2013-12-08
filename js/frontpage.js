$(document).ready(function() {
// load login and register popups 
    $(document).ready(function() {

        $("#loginColorbox").colorbox({
            inline: true,
            width: '450px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#loginColorboxInside").colorbox({
            inline: true,
            width: '450px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#registerColorbox").colorbox({
            inline: true,
            width: '300px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });
        $("#registerColorboxInside").colorbox({
            inline: true,
            width: '300px',
            opacity: 0.70,
            speed: 100,
            scrolling: false
        });

    });
    
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
            "procent": $('.chart_1_1').attr('data'),
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": $('.chart_1_2').attr('data'),
            "short": "X"
        },
        {
            "teams": $('.chart_1_guest').html() + " win",
            "procent": $('.chart_1_3').attr('data'),
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
            "procent": $('.chart_2_1').attr('data'),
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": $('.chart_2_2').attr('data'),
            "short": "X"
        },
        {
            "teams": $('.chart_2_guest').html() + " win",
            "procent": $('.chart_2_3').attr('data'),
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
            "procent": $('.chart_3_1').attr('data'),
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": $('.chart_3_2').attr('data'),
            "short": "X"
        },
        {
            "teams": $('.chart_3_guest').html() + " win",
            "procent": $('.chart_1_1').attr('data'),
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

})