<?php $this->pageTitle=Yii::app()->name . ' - Help'; ?>

<h1>Help</h1>
<div id="questions">
	<a href="" class="button grey">1. How do I make a bet?</a>
	<div class="answer">First, login with your user ID and password.<br>
		Login box at header<br>
		ALTIMG<br>
		Select one or several bets from our line-up and use the mouse to click on an outcome. Your bet will then appear in the bet slip on the right-hand side of the homepage. Next, specify the amount you wish to wager and your preferred category (single, multi, or system bets) and click on "next".<br><br>
		1. Click an outcome 2. Your bet slipALTIMG<br>
		In the third and final phase, you can either confirm the final placement of the bet or cancel it. Please note that our Rules do not permit cancelling any bets once they have been placed.

		ALTIMG
		3. Cancel or place your bet
	</div>
	<a href="" class="button grey">2. When I try to place a bet, I get a message that I have exceeded the winning limit. How high is the winning limit?</a>
	<div class="answer">
		For our earnings limits, please see our Betting - Standards.<br><br>
		Our bookmakers are also entitled to set lower winning limits per bet. You will be informed of this directly when you place your bet.<br><br>
		There may be various reasons for changing a winning limit, depending on the supply and demand for a bet. Please note that winning limits may also be lowered at short notice when our bookmakers update the odds. It is usually possible to place the same bet with higher stakes shortly thereafter. In the meantime, however, the odds may also have changed.
	</div>
	<a href="" class="button grey">3. How high is the minimum and maximum bet on a bet?</a>
	<div class="answer">
		The maximum stake on a bet is calculated from the above-mentioned winning limit. If upon placing a bet you receive the message that your current stake exceeds this limit, please reduce your stake. The minimum stake for a bet is EUR 0.50; USD 0.50; £ 0.50.

If your account balance is below this amount, you also have the option of placing smaller bets.
	</div>
	<a href="" class="button grey">4. How I can delete my posts on the betting slip?</a>
	<a href="" class="button grey">5. I put a bet by accident. What I can do?</a>
	<a href="" class="button grey">6. How I can know if my bet has been accepted?</a>
	<a href="" class="button grey">7. How I can know if I won the bet?</a>
	<a href="" class="button grey">8. What type of bets are there?</a>
	<a href="" class="button grey">9. What is a single bet?</a>
	<a href="" class="button grey">10. What are multi bets?</a>
	<a href="" class="button grey">11. Which bets can be combined to form a multi (parlay)?</a>
	<a href="" class="button grey">12. What does 1X2 mean?</a>
	<a href="" class="button grey">13. What does 1 2 mean?</a>
	<a href="" class="button grey">14. What are Head-to-Head bets?</a>
	<a href="" class="button grey">15. What are handicap bets?</a>
	<a href="" class="button grey">16. Why was my bet cancelled?</a>
	<a href="" class="button grey">17. I bet on a game that was postponed. What happens to my bet?</a>
	<a href="" class="button grey">18. My player / driver / team failed to show up at the event. What Happens to my bet?</a>
	<a href="" class="button grey">19. My bet has not yet been resolved. Why not?</a>
	<a href="" class="button grey">20. My bet has been settled, but the gains have not been credited to my account</a>
	<a href="" class="button grey">21. My bet was settled incorrectly</a>
	<a href="" class="button grey">22. Where can I find the result of a specific game?</a>
	<a href="" class="button grey">23. How I can know the scores and results?</a>
</div>
<script type="text/javascript">
	$('#questions a').click(function(){
		$(this).next('.answer').slideToggle();
		click = $(this).attr('class');
		if(click == 'button grey')
		{
			$(this).addClass('click');
		}
		else
		{
			$(this).removeClass('click');
		}
		return false;
	});
</script>