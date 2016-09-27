$(document).ready(function() {
    $('.nano').nanoScroller({
        preventPageScrolling: true
    });
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
 *  Show all available types for the match
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $('.more').on('click', function() {
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
 *  Delete match from sliper
 *  @return html
 * ---------------------------------------------------------------------------------------------------------------------
*/ 
    window.onload = disable_match;  // Start displaying the time when document loads.

    function disable_match()
    {
        $('.play').each(function(){
            time = $(this).attr('data-time');
            curr_time = Math.round(new Date().getTime() / 1000);

            if(curr_time >= time)
            {
                $(this).addClass('finished');
                $(this).removeClass('play');
                code = $(this).find('.clickable').attr('rel');
                $(this).find('.clickable').removeClass('clickable');
                $(this).find('.tipped').removeClass('tipped');
                console.log(code);
                remove_match(code);
            }
        });
        setTimeout(disable_match, 1000);  
    }
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Block tips for finished games
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $('.finished .clickable').each(function(){
        $(this).removeClass('clickable');
    });
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Add the match to slipper and create cookie for that match
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $(".clickable").on('click', function(){
        var gameCode = $(this).attr('rel');
        var league_btn = $(this).attr('id');
        
        $('.'+gameCode).addClass('disable');

        $('.'+gameCode+' .tipped').removeClass('tipped').addClass('clickable');

        empty = $('#empty').attr('class');
        if(empty != 'hide')
        {
            $('#empty').addClass('hide');
        }

        if(league_btn != 'liga')
        {
            var gameType = $(this).find(".gameType").html();
            var gameQuote = $(this).find(".gameQuote").html();
            var gameTypeBet = $(this).find(".gameTypeBet").html();
            var matchName = $('.'+gameCode).find("a").html();
        }
        else
        {
            var gameType = $(this).attr("data-type");
            var gameQuote = $(this).html();
            var matchName = $('.'+gameCode).find('#teams').html();
            var gameTypeBet = $(this).parent().find(".gameTypeBet").html();
        }

        var bets = gameCode + '=' + gameType + '=' + gameQuote + '=' + matchName + '=' + gameTypeBet + '|';

        if($.cookie("myBets")){
            var cookieValue = $.cookie("myBets");
            
            var cookieNewValue = '';
            var matchBets = cookieValue.split('|');
            for (var i=0; i<matchBets.length-1; i++) {
                var gameBet = matchBets[i].split('=');
                if (gameBet[0]!=gameCode) {//If gameCode is same as old will be deleted
                    cookieNewValue += matchBets[i] + "|";
                    //Make edit on slipper div here
                }
                else
                {
                    removeGameFromCookie(gameCode);
                    $('#matchs #'+gameCode).closest('div').remove();
                    $('.'+gameCode).find('.tipped').removeClass('tipped');
                }
            }
            cookieNewValue += bets;
            $.cookie("myBets", cookieNewValue, { expires : 2 });//2 days
        } else {
            $.cookie("myBets", bets, { expires : 2 });//2 days
        }

        $(this).addClass('tipped');
        $(this).removeClass('clickable');
        
        //$('#not_loged').hide();
        // $.removeCookie("myBets");
        html = '<div class="match '+gameCode+'">'+matchName+'<span class="close betSlipperClose" id="'+gameCode+'">X</span><div id="odds"><div class="tip">'+gameType+'</div><span>'+gameQuote+'</span></div></div>';
        $('.match-slip').append(html);

        cal_win_stake();

        $('.nano').nanoScroller({
            preventPageScrolling: true
        });

        return false;
    })
 /*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Delete match from sliper
 *  @return html
 * ---------------------------------------------------------------------------------------------------------------------
*/   
    $('body').delegate('.betSlipperClose', 'click', function(){
        id = $(this).attr('id');

        remove_match(id);
    });
 /*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Delete match from sliper
 *  @return html
 * ---------------------------------------------------------------------------------------------------------------------
*/
    function remove_match(id)
    {
        check_slipper();

        removeGameFromCookie(id);

        $('.match-slip .'+id).remove();
        $('.my-slip .'+id).remove();

        $('.'+id).removeClass('disable');
        $('.'+id).find('.tipped').removeClass('tipped').addClass('clickable');

        $('.nano').nanoScroller({
            preventPageScrolling: true
        });

        cal_win_stake();
    }
 /*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Delete match from sliper
 *  @return html
 * ---------------------------------------------------------------------------------------------------------------------
*/  
    $('.tipped').on('click', function(){
        id = $(this).attr('rel');

        removeGameFromCookie(id);

        $('.match-slip .'+id).remove();
        $('.'+id).removeClass('disable');
        $(this).removeClass('tipped');
        $(this).addClass('clickable');

        cal_win_stake();
        return false;
    });
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Change winning stake when new stake is inserted
 *  @return winning stake
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $('.stake').bind('input', function() {
        cal_win_stake();
    });
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Check the slipper have matches, or stake is bigger than 0
 *  @return boolean
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $('#place_bet').click(function(){
        matchs = $('.match-slip > .match').length;
        stake = $('.stake').val(); // get the current stake of the input field.

        if (matchs <= 0) {
            alert('Please select matches to bet');
            return false;
        }

        if (stake <= 0) {
            alert('Please insert valid value for stake');
            return false;
        }

        return true;
    });
});
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Ouptut html data
 *  @return html
 * ---------------------------------------------------------------------------------------------------------------------
*/
    function check_slipper()
    {
        matchs = $('.match-slip > .match').length;

        if(matchs == 0)
        {
            $('.match-slip #empty').removeClass('hide').addClass('show');
        }
    }
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Calculate the winning stake e.q  stake 2 eura * coefficient 25 = winning stake 50 eura
 *  @return integer
 * ---------------------------------------------------------------------------------------------------------------------
*/
    function cal_win_stake()
    {
        total = 1;
        $('.match-slip .match').each(function(){
            odd = $(this).find('#odds span').text();
            new_odd = odd.replace(',','.');
            total = total * new_odd;
        });

        if($('.match-slip > .match').length == 0)
            total = 0;

        stake = $('.stake').val(); // get the current stake of the input field.
        
        if(stake >= 500)
        {

            stake = '500';
            $('.stake').val('500');
        }

        win = (total*stake).toFixed(2);

        if(win >= 100000)
        {
            win = '100000';
            $('.stake').val((100000 / total).toFixed(0));
        }

        $('#money #win_stake').val(win+' €');
    }
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Add league to cookie and favourites that league
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    $('.clear').on('click', function(){
        $('.match-slip').each(function(){
            $(this).html('');
        });

        $('.disable').each(function(){
            $(this).removeClass('disable');
            $(this).find('.tipped').removeClass('tipped');
        });

        $.cookie('myBets', '' , { expires: 2 });

        cal_win_stake();
        return false;
    });
/*
 * ---------------------------------------------------------------------------------------------------------------------
 *  Add league to cookie and favourites that league
 *  @return 
 * ---------------------------------------------------------------------------------------------------------------------
*/
    function setRemoveMyLeagues(id)
    {
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
                var gameBet = matchBets[i].split('=');
                if (gameBet[0]!=gameCode) {//If gameCode is same as old will be deleted
                    cookieNewValue += matchBets[i] + "|";
                }
            }
            $.cookie("myBets", cookieNewValue, { expires : 2 });//2 days
        } else {
            $.cookie("myBets", bets, { expires : 2 });//2 days
        }
    }