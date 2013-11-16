
$(document).ready(function() {
//digital clock
function displayTime() {
    var elt = document.getElementById("clock");  // Find element with id="clock"
    var now = new Date();                        // Get current time
    elt.innerHTML = now.toLocaleTimeString();    // Make elt display it
    setTimeout(displayTime, 1000);               // Run again in 1 second
}
window.onload = displayTime;  // Start displaying the time when document loads.
//	time 
	function countdown()
	{
		$('.time_play').each(function(){
			time = $(this).text().split(':');
			hours = time[0];
			minutes = time[1];
			seconds = time[2];

			if(seconds == 0) {
				seconds = 59;
				minutes = time[1]-1;
			} else {
				seconds = time[2]-1;
			}

			if(minutes == 0)
			{
				hours = time[0]-1;
			}

			if(String(seconds).length == 1) {
				seconds = '0'+seconds;
			}
			if(String(minutes).length == 1) {
				minutes = '0'+minutes;
			}
			$(this).html(hours+':'+minutes+':'+seconds);
		});
	}

	setInterval(function() {
		countdown();
	},1000);

    $('.services li').click(function() {
        $(this).find('ul').show();
        $(this).mouseleave(function() {
            $(this).find('ul').hide();
        });
    });
// tabs switch
    $('.tab_btn').click(function() {
        $('.tab_btn').removeClass('current');
        tab = $(this).attr('href');

        $('.tabb').hide();
        $(tab).show();
        $(this).addClass("current");

		return false;
	});
// 
    function mark_played(game_id) 
    {
        $(document).find('a').each(function(index, element) {
            if (game_id == $(this).attr('data-id')) {
                $(this).contents().unwrap();
            }
        });
    }

    $('#tip').live('click', function(){
        return false;
    });
	
    $('.clickable').live('click', function(){
		game_id = $(this).attr('data-id');
        $(this).closest('div').addClass('selected');
        $('.'+game_id).addClass('disable');
		mark_played(game_id);
		return false;
	});


	$('#matchs #match .close').live('click', function(){
		match = $(this).attr('id');

		$('.match-'+match).remove();
		
		$('.nano').nanoScroller({
			preventPageScrolling: true
		});
	});

    $('.more').click(function() {
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
            "procent": 20,
            "short": "1"
        },
        {
            "teams": "Draw",
            "procent": 20,
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
        graph.fillColors = ["#51a351", "#62c462"];
        graph.labelText = "[[description]]";
        graph.balloonText = "[[category]]: [[value]] %";
        chart.addGraph(graph);

        // WRITE
        chart.write("chartdiv1");
    });

    var chart;

    var chartData1 = [
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
        chart.write("chartdiv2");
    });

    var chartData2 = [
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
        chart.write("chartdiv3");
    });
});
