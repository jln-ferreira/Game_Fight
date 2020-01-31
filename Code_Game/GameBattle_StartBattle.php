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

.btn-home{
  margin: 10px auto;
  width: 250px;
  letter-spacing: 2px;
  border-radius: 8px;
  font-family: 'Skranji', cursive;
  color: #ffc000;
  font-size: 18px;
  font-weight: 400;
  text-shadow: 0 1px 3px #000;
  text-align: center;
  padding: 10px 0;
  background: radial-gradient(circle, #8b0000, #8b0000);
  border-top: 4px ridge #ffb000;
  border-left: 4px groove #ffb000;
  border-right: 4px ridge #ffb000;
  border-bottom: 4px groove #ffb000;
  box-shadow: inset 0px 0px 5px 3px rgba(1,1,1,0.3);
}

.btn-home:hover{
  background: radial-gradient(circle, #e52b2b, #8b0000);
  box-shadow: 0px 0 5px 5px rgba(255,255,255,0.2)
}

.btn-home:active{
  background: radial-gradient(circle, #ec6a6a, #e52b2b);
  box-shadow: 0px 0 5px 5px rgba(255,255,255,0.2)
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
		

echo "<div class='imgheros' '>
			<div id='hero_card' >
				<h5 class='card-title' style='width:100%;color:black'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->getName()  . "</h5>
				<div class='w3-light-grey' style='width:100%;'>
						<div class='w3-container w3-green w3-center' style='width:25%;'>25%</div>
				</div>
				<img id='heroWalk' style='width:100%;' src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["LevelHero"]] . "Walk.gif'> 
				<img id='heroAttack' style='width:100%; display:none;' src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["LevelHero"]] . "Attack.gif'> 
			</div>

			<div id='monster_card' >
				<h5 class='card-title' style='width:100%;color:black;'>" . $arrMonster[$_SESSION["LevelMonster"]]->getName()  . "</h5>
				<div class='w3-light-grey' style='width:100%;'>
						<div class='w3-container w3-green w3-center' style='width:25%''>25%</div>
				</div>
				<img id='monsterWalk' style='width:100%;' src='../image/" . $_SESSION["LevelMonster"] . "MonsterWalk.gif'> 
				<img id='monsterAttack' style='width:100%; display:none;' src='../image/" . $_SESSION["LevelMonster"] . "MonsterAttack.gif'>
				<img id='monsterDeath' style='width:100%; display:none;' src='../image/" . $_SESSION["LevelMonster"] . "MonsterDeath.gif'> 
			</div>
		</div>
	</div>


	<div id='BattleRow1' class='row' style='display: none;margin-left:10px;margin-right:10px;margin-top:10px;'>	
		<div class='informations' style='display:block;width:100%;margin:0 auto;'>
			<div class='card' id='monsterCard' style='display:inline-block;vertical-align:top;float:left;width:20%;'>
				<div class='card-body' style='padding-bottom: 2px'>
					<p class='card-text'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->status() . "</p>
				</div>
			</div>

			<div id='control' style='display:inline-block;vertical-align:top;width:25%; margin:0 auto;'>	
				<button id='Attack' type='button' class='btn-home' >Attack</button><br>
				<button id='Bag' type='button' class='btn-home' style='width:122px;'>Bag</button>
				<button id='Run' type='button' class='btn-home' style='width:122px;'>Run</button>
				<button id='Special_attack' type='button' class='btn-home'>Special Attack</button>
			</div>

			<button id='nxtMonster' style='display:none;' type='button' class='btn btn-success'>NEXT MONSTER</button>
			<button id='gameOver' style='display:none;' type='button' class='btn btn-danger'>GAME OVER</button>
			
			<div class='card' id='monsterCard' style='display:inline-block;vertical-align:top;float:right;width:20%;'>
				<div class='card-body' style='padding-bottom: 2px'>
					<p class='card-text'>" . $arrMonster[$_SESSION["LevelMonster"]]->status() . "</p>
				</div>
			</div>
		</div>";
?>
	</div>  <!-- End Second Container JOYSTICK -->

	
	

</div><!----------- FINISH MAIN Container ------------->


<script>
	//joystick buttons
	var Button_Attack = document.getElementById("Attack");
	var Button_Bag = document.getElementById("Bag");
	var Button_Run = document.getElementById("Run");
	var Button_SAttack = document.getElementById("Special_attack");


	//status Hero------>
	var Hero_Name = document.getElementById("status_hero_Name");
	var Hero_HP = document.getElementById("status_hero_HP");
	var Hero_STR = document.getElementById("status_hero_STR");
	var Hero_DEF = document.getElementById("status_hero_DEF");
	var Hero_AGI = document.getElementById("status_hero_AGI");
	var Hero_MANA = document.getElementById("status_hero_MANA");
	var Hero_EXP = document.getElementById("status_hero_EXP");

	//status Monster------>
	var Monster_Name = document.getElementById("status_monster_Name");
	var Monster_HP = document.getElementById("status_monster_HP");
	var Monster_STR = document.getElementById("status_monster_STR");
	var Monster_DEF = document.getElementById("status_monster_DEF");
	var Monster_AGI = document.getElementById("status_monster_AGI");

	//functions --------->
	function BlockAll_Button(){
		//block all button from JOYSTICK
		Button_Attack.style.cursor = 'not-allowed';
		Button_Attack.style.pointerEvents = "none";
		Button_Bag.style.cursor = 'not-allowed';
		Button_Bag.style.pointerEvents = "none";
		Button_Run.style.cursor = 'not-allowed';
		Button_Run.style.pointerEvents = "none";
		Button_SAttack.style.cursor = 'not-allowed';
		Button_SAttack.style.pointerEvents = "none";
	}

	//start the page
	//Fight And desapears
	$(document).ready(function(){
		$(".HeaderHero").fadeOut(2000, function(){
	 		$("#BattleRow").fadeIn();
	 		$("#BattleRow1").fadeIn();
		});
	});

	//PLAY WITH JOYSTICK!
	$(document).ready(function(){
		//----------------------------CLICK ATTACK-----------------------------
		$("#Attack").click(function(){

			//change hero to attack mode
			$("#heroWalk").hide();
			$("#heroAttack").show();

			//change monster to attack mode
			$("#monsterWalk").hide();
			$("#monsterAttack").show();

			//compair AGI;
			//if the hero has more AGI than monster, he will attack first
			if(Hero_AGI.innerHTML >= Monster_AGI.innerHTML){
				//attack HERO
				Monster_HP.innerHTML = Monster_HP.innerHTML - (Hero_STR.innerHTML - Monster_DEF.innerHTML);

				//if the monster didnt die
				if(Monster_HP.innerHTML >= 0){
					//attack MONSTER
					Hero_HP.innerHTML = Hero_HP.innerHTML - (Monster_STR.innerHTML - Hero_DEF.innerHTML);
				}else{ //monster died!

					//block all button from JOYSTICK
					BlockAll_Button();
					//change monster to attack mode
					$("#monsterAttack").hide();
					$("#monsterDeath").show();

					//after kill monster
					Button_Attack.innerHTML = "You killed " + Monster_Name.innerHTML;
					$("#nxtMonster").fadeIn();
					
				}
			}
			


		});
	});
</script>