<style src="css/styles_Cards.css" type="text/css"></style>

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

	</div>


	<div id="Container_ChoseHero" class="row" style="display: none"> <!-- Second container Choose a character  -->

		<div class="col-xs-6 col-md-4">
			<div class="card" style="width: 18rem;">
				<img src="../image/2WarriorWalk.gif"> <!-- Warrior GIF -->
				<div class="card-body" style="padding-bottom: 2px">
					<h5 class="card-title">Warrior</h5>
					<p class="card-text"> <?php echo $arrHEROS[0][0]->status(); ?></p>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-md-4">
			<div class="card" style="width: 18rem;">
				<img src="../image/6ArcherWalk.gif"> <!-- Archer GIF -->
				<div class="card-body">
					<h5 class="card-title">Archer</h5>
					<p class="card-text"><?php echo $arrHEROS[1][0]->status(); ?></p>
				</div>
			</div>
		</div>

		<div class="col-xs-6 col-md-4">
			<div class="card" style="width: 18rem;">
				<img src="../image/5MageWalk.gif"> <!-- Mage GIF -->
				<div class="card-body">
					<h5 class="card-title">Wizzard</h5>
					<p class="card-text"><?php echo $arrHEROS[2][0]->status(); ?></p>
				</div>
			</div>
		</div>


	<?php 

		$LenghHeroArr = sizeof($arrHEROS); // 3

		for ($i=0; $i < $LenghHeroArr; $i++) { 
			echo "<div class='col-xs-6 col-md-4'>
					<div class='card' style='width: 18rem;'>
						<img src='../image/ShowHero/show" . $i . ".gif'> 
						<div class='card-body' style='padding-bottom: 2px'>
							<h5 class='card-title'>Warrior</h5>
							<p class='card-text'>" . $arrHEROS[$i][0]->status() . "</p>
						</div>
					</div>
				</div>";

		}


	?>
		

	</div> 
	

</div><!----------- FINISH MAIN Container ------------->




<script>
	
	$(document).ready(function(){ 
		$("#startGame").click(function(){
			$(this).fadeOut(); //start Game disappear

			$("#Container_ChoseHero").fadeIn(4500); //start Game disappear



		});
	});

</script>