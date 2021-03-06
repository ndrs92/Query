
		 
		<div class="container-fluid">
			<div class="col-sm-8">
				<a class="btn btn-primary" href="#" data-toggle="modal" data-target="#pregunta"><?= __("Publica tu Query!"); ?></a>
				<span class="pull-right">
					
				</span>
			</div>
			<div class="col-sm-4"></div>
		</div>
		<br>


		<div id="question-body" class="container-fluid preguntas">

			<div class="col-sm-8">
				<ul class="list-group">
					<li class="list-group-item active quizma-font titulo-lista">
						<?= __("Preguntas"); ?>
					</li>

					<?php
					foreach($querys as $query){
						?>

						<li class="list-group-item">
							<span class="badge">Respuestas: <?= count($query["Comment"]); ?> </span>
							<span class="title" ><a class="pregunta-link" href="view.html"><?= $this->Html->link($query['Query']['title'], array('controller' => 'queries', 'action' => 'view', $query['Query']['id'])) ?></a></span>
							<br>
							<div class="tags-y-puntuacion">
								<div class="progress progress-striped active puntuacion">
									<?php
									if($votesQuery[$query['Query']['id']][2]['percentagePositive']!=0){
										echo "<div class='progress-bar progress-bar-success' style='width:".$votesQuery[$query['Query']['id']][2]['percentagePositive']."%'><span class='count-votos'>".$votesQuery[$query['Query']['id']][0]['positiveVote']." votos</span></div>";		
									}
									echo "<div class='progress-bar progress-bar-danger' style='width: ".$votesQuery[$query['Query']['id']][3]['percentageNegative']."%'><span class='count-votos'>".$votesQuery[$query['Query']['id']][1]['negativeVote']." votos</span></div>";
									?>
								</div>
							</div>
						</li>

						<?php
					}
					?>



					<div class="container-fluid row-centered">
						<div class="col-sm-2"></div>
						<div class="col-sm-8 ">
							<!-- 
								<li class="disabled"><a href="#">«</a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#">4</a></li>
								<li><a href="#">»</a></li>
							-->
							<ul class="pagination">
								<?php 
								if($this->Paginator->hasPrev()){
									echo $this->Paginator->prev('«', array('tag' => 'li'));
								} else {
									echo "<li class='disabled'>";
									echo $this->Paginator->prev('«', array('tag' => 'a'));
									echo "</li>";
								}

								echo $this->Paginator->numbers(array('tag'=>'li', 'separator'=>'', 'currentTag'=>'a', 'currentClass'=>'disabled')); 
								
								if($this->Paginator->hasNext()){
									echo $this->Paginator->next('»', array('tag' => 'li'));
								} else {
									echo "<li class='disabled'>";
									echo $this->Paginator->next('»', array('tag' => 'a'));
									echo "</li>";
								}
								?>
							</ul>

						</div>
						<div class="col-sm-2"></div>

					</div>


				</ul>
			</div>
			<div class="col-sm-4">
				<ul class="list-group">
					<li class="list-group-item active quizma-font titulo-lista">
						Lo nuevo
					</li>
					<li class="list-group-item">
						<?php
							//Preguntas respondidas 
							$preguntasRespondidas=0;
							$preguntasSinRespuesta=0;

							foreach ($allQuerys as $key => $comment) {
								
								foreach ($comment["Comment"] as $key => $row) {
									//echo strtotime($row["modified"]) === strtotime('today');
									if( explode(" ", $row["modified"])[0] == date('Y-m-d')){								$preguntasRespondidas++;
										break;
									}
								}
							}

							//Preguntas sin votar

							//Preguntas sin respuesta
							foreach ($allQuerys as $key => $comment) {
								
								if(empty($comment["Comment"])){
									$preguntasSinRespuesta++;									
								}
							}
						?>						
						<span class="badge"><?= $preguntasRespondidas;?></span>
						Preguntas respondidas hoy
					</li>
					<li class="list-group-item">
						<span class="badge"><?= $queriesNoVotes?></span>
						Preguntas sin votar
					</li>
					<li class="list-group-item">
						<span class="badge"><?= $preguntasSinRespuesta;?></span>
						Preguntas sin respuesta
					</li>
				</ul>
			</div>
		</div>
