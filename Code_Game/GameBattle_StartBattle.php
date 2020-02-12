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

	//change level of the Hero
	if(!isset($_SESSION["LevelHero"])){
		$_SESSION["LevelHero"] = 0;
	}
	//change level of the monster
	if(!isset($_SESSION["LevelMonster"])){
		$_SESSION["LevelMonster"] = 0;
	}

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

		//save status of the hero: SETTERS of OOP
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setHP($_COOKIE["CookieHP"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setSTR($_COOKIE["CookieSTR"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setDEF($_COOKIE["CookieDEF"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setAGI($_COOKIE["CookieAGI"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setMANA($_COOKIE["CookieMANA"]);
		$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setEXP($_COOKIE["CookieEXP"]);

		//change HERO (LEVEL UP!)
		if($arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->getEXP() == 0){
			$_SESSION["LevelHero"] = $_SESSION["LevelHero"] + 1;
		}

		//when KILL a monster, Hero receive an item to use:
		//$arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->setMyBag($arrItem[$_SESSION["LevelMonster"]-1]);
		//echo $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->getMyBag([0])->getName();

	} //--------------------------------------------------------------

	//----------------------- GAME OVER  -----------------------------
	if(isset($_POST['gameOver'])){
		//Reset level of monster and hero (restart game)
		$_SESSION["LevelMonster"] = 0;
		$_SESSION["LevelHero"] = 0;

		//Redirect browser to first page:
		header("Location: http://localhost/Game_Fight/Code_Game/GameBattle.php");
	}
?>


<!----------------- MAIN Container -------------------->
<div class="container-fluid bg-1 text-center">

	<h2 class="HeaderHero">Fight!</h2> <!-- Header -->

	<div id="BattleRow" class="row" style="display: none;">

		<img id="ArenaImage" src="../image/Arena/Arena.gif"> <!-- IMAGE ARENA -->


<?php 
		

echo "<div class='imgheros'>
			<div id='hero_card' >
				<h5 class='card-title' style='width:100%;color:black'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->getName()  . "</h5>
				<h5>Level up!</h5>
				<div class='w3-light-grey' style='width:100%;'>
						<div id='hpHero_greenLife' class='w3-container w3-green w3-center' style='width:100%;'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->getHP() . "</div>
				</div>
				<img id='heroWalk' style='width:100%;' src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["TypeHero"]] . "Walk.gif'> 
				<img id='heroAttack' style='width:100%; display:none;' src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["LevelHero"]] . "Attack.gif'> 
				<img id='heroDeath' style='width:100%; display:none;' src='../image/" . $_SESSION["LevelHero"] . $nameHero[$_SESSION["LevelHero"]] . "Death.gif'> 
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
		<div class='card col-sm' id='heroCard'>
			<div class='card-body' style='padding-bottom: 2px'>
				<p class='card-text'>" . $arrHEROS[$_SESSION["TypeHero"]][$_SESSION["LevelHero"]]->status() . "</p>
			</div>
		</div>
		<div id='control' class='col-sm'>	
			<button id='Attack' type='button' class='btn-home' >Attack</button><br>
			<button id='Bag' type='button' class='btn-home' style='width:122px;'>Bag</button>
			<button id='Run' type='button' class='btn-home' style='width:122px;'>Run</button>
			<button id='Special_attack' type='button' class='btn-home'>Special Attack</button>
		</div>
		
		<form method='post'>
			<input type='submit' name='nxtMonster' id='nxtMonster' style='display:none;' class='btn btn-success' value='NEXT MONSTER' />
			<input type='submit' name='gameOver' id='gameOver' style='display:none;' class='btn btn-danger' value='GAME OVER' />
		</form>
		
		
		<div class='card col-sm' id='monsterCard'>
			<div class='card-body' style='padding-bottom: 2px'>
				<p class='card-text'>" . $arrMonster[$_SESSION["LevelMonster"]]->status() . "</p>
			</div>
		</div>";
?>
	</div>  <!-- End Second ROW JOYSTICK -->

	<!-- ALL THE BAG  -->
	<div id='BagRow1' class='row' style="display: none">
		<div class="col-md-6 offset-md-3">
			<table class='table table-sm'>
				<tr>
	                <th> My Bag </th>
	                <th> HP </th>
	                <th> STR </th>
	                <th> DEF </th>
	            </tr>
				<?php //show all itens the hero has:
					for ($i=0; $i < $_SESSION["LevelMonster"]; $i++) { 
						$arrItem[$i]->status($i);
					}
				?>
			</table>
		</div>
	</div>


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
	var Monster_EXP = document.getElementById("status_monster_EXP");
	

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

	function HeroAttack($specialAttack){
		Monster_HP.innerHTML = Monster_HP.innerHTML - ((Hero_STR.innerHTML * $specialAttack) - Monster_DEF.innerHTML); //status
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

		//ADD EXP for the HERO When Kill Monster
		Hero_EXP.innerHTML = Hero_EXP.innerHTML - Monster_EXP.innerHTML;
		if(Hero_EXP.innerHTML <= 0){
			Hero_EXP.innerHTML = 0;
		}
	}

	function HeroDied(){
		//hero  died!
		Hero_HP.innerHTML = 0; //hp Table
		hpHero_greenLife.innerHTML = 0; //hp Green life
		hpHero_greenLife.style.width = '0%'; //reduce hpGreen
		//block all button from JOYSTICK
		BlockAll_Button();
		//change Hero to attack mode
		$("#heroAttack").hide();
		$("#heroDeath").show();

		//after kill Hero
		Button_Attack.innerHTML = "You Died! " + Monster_Name.innerHTML;
		$("#gameOver").fadeIn();
	}

	function HeroAndMonsterAttackRotation($STR_AttackHero){
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
			HeroAttack($STR_AttackHero); //(x) multiple attack

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
			}
		}else{
			//if the Monster has more AGI than HERO, he will attack first
			//attack MONSTER
			MonsterAttack();

			//if the HERO didnt die
			if(Hero_HP.innerHTML > 0){
				//attack HERO
				HeroAttack($STR_AttackHero); //(x) multiple attack

				//IF Monster died!
				if(Monster_HP.innerHTML <= 0){
					
					MonsterDied();
				}
			}else{ //hero  died!
				HeroDied();	
			}
		}
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
		//----------------------------CLICK ATTACK----------------------------------
		$("#Attack").click(function(){

			//Normal rotation Attack monster and attack Hero (Depends who is faster > AGI)
			HeroAndMonsterAttackRotation(1);

		});//----------------------------FINISH ATTACK------------------------------
		//----------------------------RUN FOR OUR LIFE!-----------------------------
		// Gonna run only if the Hero is faster than monster (AGI)
		$("#Run").click(function(){
			if(Hero_AGI.innerHTML > Monster_AGI.innerHTML){
				BlockAll_Button();

				Button_Attack.innerHTML = "RUN!";
				$("#nxtMonster").fadeIn();
			}
			else MonsterAttack();

			//IF hero died!
			if(Hero_HP.innerHTML <= 0){
				HeroDied();
			}
		});//----------------------------FINISH RUN---------------------------------
		//----------------------------SPECIAL ATTACK!-------------------------------
		$("#Special_attack").click(function(){

			//hero can just use special attack when has mana = 1
			if(Hero_MANA.innerHTML == 1){
				//Normal rotation Attack monster and attack Hero (Depends who is faster > AGI)
				HeroAndMonsterAttackRotation(2);

				//reduce MANA = 0
				Hero_MANA.innerHTML = Hero_MANA.innerHTML -1;
			}
			else{
				//attack MONSTER
				MonsterAttack();
				//IF hero died!
				if(Hero_HP.innerHTML <= 0){
					HeroDied();
				}
			}
		});//----------------------------FINISH SPECIAL ATTACK----------------------
		//----------------------------USING BAG-------------------------------------
		$("#Bag").click(function(){
			//open and close bag:
			$("#BagRow1").toggle();	
		});//----------------------------FINISH BAG---------------------------------
		//------------------------------USING ITENS---------------------------------
		for (var i = 0; i < 11; i++) {
			$("#Use_Item_" + i).click(function(){
				//status of every item i click!
				var Item_HP = $(this).parent().prev().prev().prev().text();
				var Item_STR = $(this).parent().prev().prev().text();
				var Item_DEF = $(this).parent().prev().text();
				alert("hp - " + $(this).parent().prev().prev().prev().text());
				alert("STR - " + $(this).parent().prev().prev().text());
				alert("DEF - " + $(this).parent().prev().text());
			});
		}	


	});



	//example of cookies
	// createCookie("tste",20);
	// console.log(getCookie("tste"));
</script>	



