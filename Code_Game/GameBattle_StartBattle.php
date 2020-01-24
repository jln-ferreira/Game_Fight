<link rel="stylesheet" type="text/css" href="css/styles.css">

<?php
	// Start the session
	session_start();
	//bring Header to MainPage
	require_once "Header.html";
	require_once "Iniciate_Hero_Monster.php";
	require_once "Iniciate_Bag.php";







	//game brain (change this to other page)
	if(isset($_GET['HeroFight'])){
		//0 -> Warrior
		//1 -> Archer
		//2 -> Mage

		$_SESSION["TypeHero"] = $_GET['HeroFight'];
	} 
?>




<!----------------- MAIN Container -------------------->
<div class="container-fluid bg-1 text-center">

	<h2 class="HeaderHero">Fight!</h2> <!-- Header -->

	<div id="BattleRow" class="row" style="display: none;"> <!-- third container LETS FIGHT  -->
		<img id="ArenaImage" src="../image/Arena/Arena.gif">

	</div>  <!-- End Second Container -->
	

</div><!----------- FINISH MAIN Container ------------->


<script>
	
	//Fight And desapears
	$(document).ready(function(){
		$(".HeaderHero").fadeOut(2000, function(){
	 		$("#BattleRow").fadeIn();
		});
	});
</script>