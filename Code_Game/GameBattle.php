<link rel="stylesheet" type="text/css" href="css/styles.css">

<?php
//bring Header to MainPage
require_once "Header.html";
require_once "Iniciate_Hero_Monster.php";
require_once "Iniciate_Bag.php";



?>

<!----------------- MAIN Container -------------------->
<div class="container-fluid bg-1 text-center">

	
	<div id="Container_StartGame" class="container"> <!-- First container START GAME  -->

		<img id="startGame" src="../image/StartGame.gif"> <!-- startGame GIF -->

	</div><!--  End first container -->


	<div id="Container_ChoseHero" class="row" style="display: none"> <!-- Second container Choose a character  -->
	
		<h2 class="HeaderHero">Choose Your HERO!</h2> <!-- Header -->
		<?php 

			$LenghHeroArr = sizeof($arrHEROS); // Count the number of heroes (3)
			$nameHero = ["Warrior", "Archer", "Wizard"]; //give name to each hero to CHOOSE

			for ($i=0; $i < $LenghHeroArr; $i++) { 
				echo "<a class='send_Hero' href='GameBattle_StartBattle.php?HeroFight=" . $i ."'>
						<div class='HeroChoose col-xs-6 col-md-4'>
							<div class='card' >
								<img src='../image/ShowHero/show" . $i . ".gif'> 
								<div class='card-body' style='padding-bottom: 2px'>
									<h5 class='card-title'>" . $nameHero[$i]  . "</h5>
									<p class='card-text'>" . $arrHEROS[$i][0]->status() . "</p>
								</div>
							</div>
						</div>
					</a>";
			}

		?>
		
	</div>  <!-- End Second Container -->
	

</div><!----------- FINISH MAIN Container ------------->




<script>
	
	//first part - introduton to choose a HERO 
	$(document).ready(function(){ 
		$("#startGame").click(function(){
			$(this).fadeOut(1000, function(){
				$("#Container_ChoseHero").fadeIn(2500); 
			}); 
		});
	});

</script>