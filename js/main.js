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
 
    function mark_played(game_id) 
    {
        $(document).find('a').each(function(index, element) {
            if (game_id == $(this).attr('rel')) {
                $(this).contents().unwrap();
            }
        });
    }

    $('#tip').live('click', function(){
        return false;
    });
	
    $('.clickable').live('click', function(){
		game_id = $(this).attr('rel');
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

    $('.more').live('click', function() {
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

    $('.match-slip').bind("DOMSubtreeModified",function(){
        cal_win_stake();
        $('.nano').nanoScroller({
            preventPageScrolling: true
        });
    });

    $('.stake').bind('input', function() { 
        cal_win_stake();
    });

// calculate the posible winning stake
    function cal_win_stake()
    {
        var total = 1;
        $('.match-slip .match').each(function(){
            odd = $(this).find('#odds span').text();
            new_odd = odd.replace(',','.');
            total = total * new_odd;
        });      

        stake = $('.stake').val(); // get the current stake of the input field.
        $('#money #win_stake').val((total*stake).toFixed(2)+' €');
    }

// top matches charts
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
    
    $(".clickable").click(function(){
        var gameCode = $(this).attr('rel');
        
        $(this).closest('div').addClass('selected');
        $('.'+gameCode).addClass('disable');
        

        var gameType = $(this).find(".gameType").html();
        var gameQuote = $(this).find(".gameQuote").html();
        var matchName = $('.'+gameCode).find("a").html();
        
        var bets = gameCode + '-' + gameType + '-' + gameQuote + '-' + matchName + '|';

        if($.cookie("myBets")){
            var cookieValue = $.cookie("myBets");
            
            var cookieNewValue = '';
            var matchBets = cookieValue.split('|');
            for (var i=0; i<matchBets.length-1; i++) {
                var gameBet = matchBets[i].split('-');
                if (gameBet[0]!=gameCode) {//If gameCode is same as old will be deleted
                    cookieNewValue += matchBets[i] + "|";
                    //Make edit on slipper div here
                }
            }
            cookieNewValue += bets;
            $.cookie("myBets", cookieNewValue, { expires : 2 });//2 days
        } else {
            $.cookie("myBets", bets, { expires : 2 });//2 days
        }
        
        mark_played(gameCode);
        
        $('#not_loged').hide();
        // $.removeCookie("myBets");
        html = '<div class="match">'+matchName+'<span class="close betSlipperClose" id="'+gameCode+'">X</span><div id="odds"><div class="tip">'+gameType+'</div><span>'+gameQuote+'</span></div></div>';
        $('.match-slip').append(html);
        console.log($.cookie("myBets"));

        return false;
    })
    
    $('body').delegate('.betSlipperClose', 'click', function(){
        removeGameFromCookie($(this).attr('id'));
        $(this).parent().remove();
    })

});

function setRemoveMyLeagues(id)
{
    console.log(id);
    var myLeaguesString = id + '|';
    var have = false;
    
    if($.cookie("myLeagues")){
        var cookieValue = $.cookie("myLeagues");
        var cookieNewValue = '';
        var leagues = cookieValue.split('|');
        for (var i=0; i<leagues.length-1; i++) {
            if (leagues[i]!=id) {
                cookieNewValue += leagues[i] + "|";
            } else {
                have = true;
            }
        }
        if(!have) {
            cookieNewValue += myLeaguesString;
        }
        
        $.cookie("myLeagues", cookieNewValue, { expires : 2 });//2 days
    } else {
        $.cookie("myLeagues", myLeaguesString, { expires : 2 });//2 days
    }
}

function removeGameFromCookie(gameCode)
{
    if($.cookie("myBets")){
        var cookieValue = $.cookie("myBets");

        var cookieNewValue = '';
        var matchBets = cookieValue.split('|');
        for (var i=0; i<matchBets.length-1; i++) {
            var gameBet = matchBets[i].split('-');
            if (gameBet[0]!=gameCode) {//If gameCode is same as old will be deleted
                cookieNewValue += matchBets[i] + "|";
            }
        }
        $.cookie("myBets", cookieNewValue, { expires : 2 });//2 days
    } else {
        $.cookie("myBets", bets, { expires : 2 });//2 days
    }
}
