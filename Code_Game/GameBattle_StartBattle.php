<link rel="stylesheet" type="text/css" href="css/styles.css">


<!-- CREATE HEATH BAR FOR MONSTER AND HERO ----------------------------- -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!------------------------------------------------------------------------->
<style type="text/css">

#hero_card {
  position: absolute;
  bottom: 0;
  left: 334px;
}

#hero_card{
	background-color: #fff;
}

#monster_card {
  position: absolute;
  right: 334px;
  bottom: 0;
}

#monster_card{
	background-color: #fff;
}

#BattleRow {
  position: relative;
  text-align: center;
  color: white;
}
@media only screen and (max-width: 1180px) {
#hero_card{
	left: 180px;
}

#monster_card {
  right: 180px;
}
@media only screen and (max-width: 876px) {
#hero_card{
	left: 65px;
}

#monster_card {
  right: 65px;
}
@media only screen and (max-width: 876px) {
#hero_card{
  width: 200px;
}

#monster_card {
  width: 200px;
}
@media only screen and (max-width: 532px) {
#hero_card{
  width: 160px;
}

#monster_card {
  width: 160px;
}
@media only screen and (max-width: 450px) {
#hero_card{
  left: 0;
}

#monster_card {
  right: 0;
}
nav{
	z-index: 130;
}
}
</style>

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
	<div id="BattleRow" class="row" style="display: none;">

		<img id="ArenaImage" src="../image/Arena/Arena.gif"> <!-- IMAGE ARENA -->


		<?php 
		

			echo "	<div class='imgheros' '>
						<div id='hero_card' >
							<h5 class='card-title' style='width:100%;color:black'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->getName()  . "</h5>
							<div class='w3-light-grey' style='width:100%;'>
									<div class='w3-container w3-green w3-center' style='width:25%;'>25%</div>
								</div>
							<img style='width:100%;' src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["LevelHero"]] . "Walk.gif'> 
						</div>
						<div id='monster_card' >
							<h5 class='card-title' style='width:100%;color:black;'>" . $arrMonster[$_SESSION["LevelMonster"]]->getName()  . "</h5>
							<div class='w3-light-grey' style='width:100%;'>
									<div class='w3-container w3-green w3-center' style='width:25%''>25%</div>
								</div>
							<img style='width:100%;' src='../image/" . $_SESSION["LevelMonster"] . "MonsterWalk.gif'> 
						</div>
					</div>
					</div>


					<div id='BattleRow1' class='row' style='display: none;''>	
					<div class='informations' style='display:block;width:100%;margin:0 auto;'>
						<div class='card' id='monsterCard' style='display:inline-block;vertical-align:top;float:left;width:20%;'>
							<div class='card-body' style='padding-bottom: 2px'>
								<p class='card-text'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->status() . "</p>
							</div>
						</div>

						<div class='card' id='monsterCard' style='display:inline-block;vertical-align:top;float:right;width:20%;'>
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
	 		$("#BattleRow1").fadeIn();
		});
	});
</script>