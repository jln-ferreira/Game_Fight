<link rel="stylesheet" type="text/css" href="css/styles.css">

<?php
//bring Header to MainPage
require_once "Header.html";
require_once "Iniciate_Hero_Monster.php";
require_once "Iniciate_Bag.php";

$nameHero = ["Warrior", "Archer", "Wizard"]; //NAME FOR EACH FIGHTER 

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
			
			for ($i=0; $i < $LenghHeroArr; $i++) { 
				echo "<div class='HeroChoose col-xs-6 col-md-4'>
						<a style='text-decoration: inherit;' class='send_Hero' href='GameBattle_StartBattle.php?HeroFight=" . $i ."'>
							<div class='card' >
								<img src='../image/ShowHero/show" . $i . ".gif'> 
								<div class='card-body' style='padding-bottom: 2px'>
									<h5 class='card-title'>" . $nameHero[$i]  . "</h5>
									<p class='card-text'>" . $arrHEROS[$i][0]->status() . "</p>
								</div>
							</div>
						</a>
					  </div>
					";
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