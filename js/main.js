$(document).ready(function() {
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Digital clock
 *  @return current time
 * ---------------------------------------------------------------------------------------------------------------------
*/
    function displayTime() 
    {
        var elt = document.getElementById("clock");  // Find element with id="clock"
        var now = new Date();                        // Get current time
        elt.innerHTML = now.toLocaleTimeString();    // Make elt display it
        setTimeout(displayTime, 1000);               // Run again in 1 second
    }
    window.onload = displayTime;  // Start displaying the time when document loads.
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Upcoming events countdown time
 *  @return time
 * ---------------------------------------------------------------------------------------------------------------------
*/
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
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Best tipsters tabs
 *  @return unknown
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $('.tab_btn').click(function() {
        $('.tab_btn').removeClass('current');
        tab = $(this).attr('href');

        $('.tabb').hide();
        $(tab).show();
        $(this).addClass("current");

		return false;
	});
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Mark game as played
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    function mark_played(game_id) 
    {
        $(document).find('a').each(function(index, element) {
            if (game_id == $(this).attr('rel')) {
                $(this).contents().unwrap();
            }
        });
    }
    // do not allow user to click on played game
    $('#tip').live('click', function(){
        return false;
    });
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Show all available types for the match
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $('.more').live('click', function() {
        $(this).parent("div").next().slideToggle();
    });
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Menu toggle
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    function side_toggle(obj)
    {
        if (obj.attr('class') != 'active')
        {
            obj.next().slideToggle();
            $('#sports li a').removeClass('active');
            obj.addClass('active');
        }
    }

    $(".toggler").click(function()
    {
        side_toggle($(this));
        return false;
    });

    side_toggle($('.first'));
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Ouptut html data
 *  @return html
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $('.stake').bind('input', function() { 
        cal_win_stake();
    });
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Calculate the winning stake e.q  stake 2 eura * coefficient 25 = winning stake 50 eura
 *  @return integer
 * ---------------------------------------------------------------------------------------------------------------------
*/
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
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Add the match to slipper and create cookie for that match
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $(".clickable").click(function(){
        var gameCode = $(this).attr('rel');
        
        $(this).addClass('tipped');
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
        
       // mark_played(gameCode);
        
        $('#not_loged').hide();
        // $.removeCookie("myBets");
        html = '<div class="match">'+matchName+'<span class="close betSlipperClose" id="'+gameCode+'">X</span><div id="odds"><div class="tip">'+gameType+'</div><span>'+gameQuote+'</span></div></div>';
        $('.match-slip').append(html);
        console.log($.cookie("myBets"));
        cal_win_stake();
        $('.nano').nanoScroller({
            preventPageScrolling: true
        });

        return false;
    })
    
    $('body').delegate('.betSlipperClose', 'click', function(){
        removeGameFromCookie($(this).attr('id'));
        $(this).parent().remove();
    })

});
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Add league to cookie and favourites that league
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
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
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Remove the played match from cookie
 *  @return html
 * ---------------------------------------------------------------------------------------------------------------------
*/
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