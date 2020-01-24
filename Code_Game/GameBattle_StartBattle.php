<link rel="stylesheet" type="text/css" href="css/styles.css">


<!-- CREATE HEATH BAR FOR MONSTER AND HERO ----------------------------- -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!------------------------------------------------------------------------->

<?php
	// Start the session
	session_start();
	//bring Header to MainPage
	require_once "Header.html";
	require_once "Iniciate_Hero_Monster.php";
	require_once "Iniciate_Bag.php";

	$nameHero = ["Warrior", "Archer", "Wizard"]; //NAME FOR EACH FIGHTER 





	//game brain -------------
	//(change this to other page)

	//----------------------- HERO CHOOSED ----------------------------
	if(isset($_GET['HeroFight'])){
		//0 -> Warrior
		//1 -> Archer
		//2 -> Mage

		$_SESSION["TypeHero"] = $_GET['HeroFight'];
	} //--------------------------------------------------------------





	//which lvl the hero/ monster are: IT WILL CHANGE!
	$_SESSION["LevelHero"] = 0;
	$_SESSION["LevelMonster"] = 0;
?>




<!----------------- MAIN Container -------------------->
<div class="container-fluid bg-1 text-center">

	<h2 class="HeaderHero">Fight!</h2> <!-- Header -->

	<div id="BattleRow" class="row" style="display: none;"> <!-- third container LETS FIGHT  -->
		<img id="ArenaImage" src="../image/Arena/Arena.gif"> <!-- IMAGE ARENA -->


		<?php 
		

			echo "<div class='char col-xs-6 col-md-6'> 
						<div class='card' >
							<h5 class='card-title'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->getName()  . "</h5>
							<div class='w3-light-grey'>
									<div class='w3-container w3-green w3-center' style='width:25%''>25%</div>
								</div>
							<img src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["LevelHero"]] . "Walk.gif'> 
						</div>

						<div class='card' >
							<div class='card-body' style='padding-bottom: 2px'>
								<p class='card-text'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->status() . "</p>
							</div>
						</div>


						<div class='card' >
							<h5 class='card-title'>" . $arrMonster[$_SESSION["LevelMonster"]]->getName()  . "</h5>
							<div class='w3-light-grey'>
									<div class='w3-container w3-green w3-center' style='width:25%''>25%</div>
								</div>
							<img src='../image/" . $_SESSION["LevelMonster"] . "MonsterWalk.gif'> 
						</div>

						<div class='card' >
							<div class='card-body' style='padding-bottom: 2px'>
								<p class='card-text'>" . $arrMonster[$_SESSION["LevelMonster"]]->status() . "</p>
							</div>
						</div>

					</div>";
		?>

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