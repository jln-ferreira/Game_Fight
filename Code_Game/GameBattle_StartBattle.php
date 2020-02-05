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

	//which lvl the hero/ monster are: IT WILL CHANGE!
	$_SESSION["LevelHero"] = 0;
	$_SESSION["LevelMonster"] = 0;

	//----------------------- HERO CHOOSED ----------------------------
	if(isset($_GET['HeroFight'])){
		//0 -> Warrior
		//1 -> Archer
		//2 -> Mage

		$_SESSION["TypeHero"] = $_GET['HeroFight'];
	} //--------------------------------------------------------------	
	//----------------------- CHANGE HERO AND MONSTER LEVEL ----------
	//It happen when the player click on the 'next monster' after kill the monster
	if(isset($_POST['nxtMonster'])){
		$_SESSION["LevelMonster"] = $_SESSION["LevelMonster"] + 1;

		//save status of the hero:
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setHP($_COOKIE["CookieHP"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setSTR($_COOKIE["CookieSTR"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setDEF($_COOKIE["CookieDEF"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setAGI($_COOKIE["CookieAGI"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setEXP($_COOKIE["CookieMANA"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setMANA($_COOKIE["CookieEXP"]);
	} //--------------------------------------------------------------
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
						<div id='hpHero_greenLife' class='w3-container w3-green w3-center' style='width:100%;'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->getHP() . "</div>
				</div>
				<img id='heroWalk' style='width:100%;' src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["LevelHero"]] . "Walk.gif'> 
				<img id='heroAttack' style='width:100%; display:none;' src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["LevelHero"]] . "Attack.gif'> 
			</div>
			<div id='monster_card' >
				<h5 class='card-title' style='width:100%;color:black;'>" . $arrMonster[$_SESSION["LevelMonster"]]->getName()  . "</h5>
				<div class='w3-light-grey' style='width:100%;'>
						<div id='hpMonster_greenLife' class='w3-container w3-green w3-center' style='width:100%''>". $arrMonster[$_SESSION["LevelMonster"]]->getHP() . "</div>
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
			
			<form method='post'>
    			<input type='submit' name='nxtMonster' id='nxtMonster' style='display:none;' class='btn btn-success' value='NEXT MONSTER' />
    			<input type='submit' name='gameOver' id='gameOver' style='display:none;' class='btn btn-danger' value='GAME OVER' />
			</form>
			
			
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

	//HP FIXED
	var fixHeroHP = document.getElementById("hpHero_greenLife").innerHTML;
	var fixMonsterHp = document.getElementById("hpMonster_greenLife").innerHTML;
	//HP CHAR
	var hpHero_greenLife = document.getElementById("hpHero_greenLife");
	var hpMonster_greenLife = document.getElementById("hpMonster_greenLife");

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



	//FUNCTIONS ----------------->
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

	function HeroAttack(){
		Monster_HP.innerHTML = Monster_HP.innerHTML - (Hero_STR.innerHTML - Monster_DEF.innerHTML); //status
		hpMonster_greenLife.innerHTML = Monster_HP.innerHTML; //hp
		hpMonster_greenLife.style.width = (hpMonster_greenLife.innerHTML/fixMonsterHp)*100 + "%"; //reduce hpGreen
	}

	function MonsterAttack(){
		Hero_HP.innerHTML = Hero_HP.innerHTML - (Monster_STR.innerHTML - Hero_DEF.innerHTML); //status
		hpHero_greenLife.innerHTML = Hero_HP.innerHTML; //hpHero_greenLife
		hpHero_greenLife.style.width = (hpHero_greenLife.innerHTML/fixHeroHP)*100 + "%";//reduce hpGreen
	}

	function MonsterDied(){
		Monster_HP.innerHTML = 0; //hp Table
		hpMonster_greenLife.innerHTML = 0; //hp Green life
		hpMonster_greenLife.style.width = '0%'; //reduce hpGreen
		//block all button from JOYSTICK
		BlockAll_Button();
		//change monster to attack mode
		$("#monsterAttack").hide();
		$("#monsterDeath").show();

		//after kill monster
		Button_Attack.innerHTML = "You killed " + Monster_Name.innerHTML;
		$("#nxtMonster").fadeIn();
	}

	function HeroDied(){
		//hero  died!
		Hero_HP.innerHTML = 0; //hp Table
		hpHero_greenLife.innerHTML = 0; //hp Green life
		hpHero_greenLife.style.width = '0%'; //reduce hpGreen
		//block all button from JOYSTICK
		BlockAll_Button();
		//change Hero to attack mode
		$("#monsterAttack").hide();
		$("#monsterDeath").show();

		//after kill Hero
		Button_Attack.innerHTML = "You Died! " + Monster_Name.innerHTML;
		$("#gameOver").fadeIn();
	}

	//COOKIES
	//setCOOKIES
	function createCookie(cookieName,cookieValue){
      document.cookie = cookieName + "=" + cookieValue;
	}

	//getCOOKIES
	function getCookie(name) {
		var value = "; " + document.cookie;
		var parts = value.split("; " + name + "=");
		if (parts.length == 2) return parts.pop().split(";").shift();
	}

	function SaveStatusHero(){
		//save current status of the HERO
		createCookie("CookieHP",Hero_HP.innerHTML);
		createCookie("CookieSTR",Hero_STR.innerHTML);
		createCookie("CookieDEF",Hero_DEF.innerHTML);
		createCookie("CookieAGI",Hero_AGI.innerHTML);
		createCookie("CookieMANA",Hero_MANA.innerHTML);
		createCookie("CookieEXP",Hero_EXP.innerHTML);
	}
	
	//END FUNCTIONS --------------->

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
				HeroAttack();

				//if the monster didnt die
				if(Monster_HP.innerHTML > 0){
					//attack MONSTER
					MonsterAttack();

					//IF hero died!
					if(Hero_HP.innerHTML <= 0){
						HeroDied();
					}

				}else{ //monster died!
					MonsterDied();

					//save current status of the HERO
					SaveStatusHero();
					console.log(getCookie("CookieHP"));
				}
			}else{
				//if the Monster has more AGI than HERO, he will attack first
				//attack MONSTER
				MonsterAttack();

				//if the HERO didnt die
				if(Hero_HP.innerHTML > 0){
					//attack HERO
					HeroAttack();

					//IF Monster died!
					if(Monster_HP.innerHTML <= 0){
						
						MonsterDied();
					}
				}else{ //hero  died!
					HeroDied();	
				}
			}
		});
	});

	//example
	// createCookie("tste",20);
	// console.log(getCookie("tste"));




</script>	


