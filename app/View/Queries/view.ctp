<div class="container-fluid">


	<h2 class="query-title"><?= $targetQuery["Query"]["title"]; ?></h2>
	<div class="container-fluid row">
		<div class="col-sm-12 col-xs-8">
			<small class="creator"><?= __("Creado por")." "; ?><?= $this->Html->link($author["username"], "/users/view/".$author["id"]);?> - <?= $targetQuery["Query"]["created"]; ?></small>
			<?php
			$userLogged = $this->Session->read("User.id");
			if(isset($userLogged)){
				$voted = $this->requestAction("/users/voted/".$this->Session->read("User.id")."/".$targetQuery["Query"]["id"]);
				if($voted){
					?>
					<small class="pull-right" ><?= $this->Html->link(__("Eliminar Voto") .' <i class="fa fa-trash-o"></i>' , "/queries/deleteVote/".$targetQuery["Query"]["id"]."/".$this->Session->read("User.id")."/".isset($voted), array('escape' => false)); ?></small>
					<?php
				}
			}
			?>


		</div>
		<div class="visible-xs col-xs-4">

			<?php 
			if($this->Session->read("User.id")){
				
				$id_user =$this->Session->read("User.id");
				$id_query=$targetQuery['Query']['id'];
				$voted = $this->requestAction("/users/voted/$id_user/$id_query");
				
				if($voted && $voted[0]["queries_users"]["vote"]==1){
					
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('up-arrow-icon.png', array(
						'alt' => 'Arrow Up',
						'height' => '20', 
						'width' => '20'
						));
				}
				if($voted && $voted[0]["queries_users"]["vote"]==-1){
					
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('up-arrow-icon.png', array(
						'alt' => 'Arrow Up',
						'height' => '20', 
						'width' => '20',
						'url' => array('controller' => 'queries', 'action' => 'updateVote', 'up',$targetQuery["Query"]["id"], $id_voto, $id_user)
						));				
				}
				if(empty($voted)){
					
					echo $this->Html->image('up-arrow-icon.png', array(
						'alt' => 'Arrow Up',
						'height' => '20', 
						'width' => '20',
						'url' => array('controller' => 'queries', 'action' => 'vote', 'up',$targetQuery["Query"]["id"], $id_user)
						));	
				}
				//<img src="./img/up-arrow-icon.png" alt="Arrow Up" height="20" width="20">-->
				if(!empty($numVotos)) echo '<span class="vote-count"> '.$numVotos.' </span>';
				else echo '<span class="vote-count"> 0 </span>';
				
				if($voted && $voted[0]["queries_users"]["vote"]==1){
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('down-arrow-icon.png', array(
						'alt' => 'Arrow Down',
						'height' => '20', 
						'width' => '20',
						'url' => array('controller' => 'queries', 'action' => 'updateVote', 'down',$targetQuery["Query"]["id"], $id_voto, $id_user)
						));
				}
				if($voted && $voted[0]["queries_users"]["vote"]==-1){
					$id_voto = $voted[0]["queries_users"]["id"];
					echo $this->Html->image('down-arrow-icon.png', array(
						'alt' => 'Arrow Down',
						'height' => '20', 
						'width' => '20'
						));				
				}
				

				if(empty($voted)){
					echo $this->Html->image('down-arrow-icon.png', array(
						'alt' => 'Arrow Down',
						'height' => '20', 
						'width' => '20',
						'url' => array('controller' => 'queries', 'action' => 'vote', 'down',$targetQuery["Query"]["id"],$id_user)
						));	
				}
				
			}
			else{

				echo $this->Html->image('up-arrow-icon.png', array(
					'alt' => 'Arrow Up',
					'height' => '20', 
					'width' => '20'
					));
				if(!empty($numVotos)) echo '<span class="vote-count"> '.$numVotos.' </span>';
				else echo '<span class="vote-count"> 0 </span>';
				echo $this->Html->image('down-arrow-icon.png', array(
					'alt' => 'Arrow Down',
					'height' => '20', 
					'width' => '20'
					));
				
			}
			?>
		</div>
	</div>
	<hr class="query-separator">
	<br>
	<div class="container-fluid row">
		<div class="col-sm-1 hidden-xs vote">
			<!--<div class="vote-question">-->
			<div>
				<?php 
				if($this->Session->read("User.id")){
					
					$id_user =$this->Session->read("User.id");
					$id_query=$targetQuery['Query']['id'];
					$voted = $this->requestAction("/users/voted/$id_user/$id_query");
					
					if($voted && $voted[0]["queries_users"]["vote"]==1){
						
						$id_voto = $voted[0]["queries_users"]["id"];
						echo $this->Html->image('up-arrow-icon.png', array(
							'alt' => 'Arrow Up',
							'height' => '25', 
							'width' => '25'
							));
						echo '</br>';
						
					}
					if($voted && $voted[0]["queries_users"]["vote"]==-1){
						
						$id_voto = $voted[0]["queries_users"]["id"];
						echo $this->Html->image('up-arrow-icon.png', array(
							'alt' => 'Arrow Up',
							'height' => '25', 
							'width' => '25',
							'url' => array('controller' => 'queries', 'action' => 'updateVote', 'up',$targetQuery["Query"]["id"],$id_voto, $id_user)
							));
						echo '</br>';				
					}
					if(empty($voted)){
						
						echo $this->Html->image('up-arrow-icon.png', array(
							'alt' => 'Arrow Up',
							'height' => '25', 
							'width' => '25',
							'url' => array('controller' => 'queries', 'action' => 'vote', 'up',$targetQuery["Query"]["id"], $id_user)
							));
						echo '</br>';	
					}
				//<img src="./img/up-arrow-icon.png" alt="Arrow Up" height="25" width="25">-->
					if(!empty($numVotos)) echo '<span class="vote-count">'.$numVotos.'</span>';
					else echo '<span class="vote-count"> 0 </span>';
					echo '</br>';
					
					if($voted && $voted[0]["queries_users"]["vote"]==1){
						$id_voto = $voted[0]["queries_users"]["id"];
						echo $this->Html->image('down-arrow-icon.png', array(
							'alt' => 'Arrow Down',
							'height' => '25', 
							'width' => '25',
							'url' => array('controller' => 'queries', 'action' => 'updateVote', 'down',$targetQuery["Query"]["id"], $id_voto, $id_user)
							));
						echo '</br>';
					}
					if($voted && $voted[0]["queries_users"]["vote"]==-1){
						$id_voto = $voted[0]["queries_users"]["id"];
						echo $this->Html->image('down-arrow-icon.png', array(
							'alt' => 'Arrow Down',
							'height' => '25', 
							'width' => '25'
							));
						echo '</br>';				
					}
					if(empty($voted)){
						echo $this->Html->image('down-arrow-icon.png', array(
							'alt' => 'Arrow Down',
							'height' => '25', 
							'width' => '25',
							'url' => array('controller' => 'queries', 'action' => 'vote', 'down',$targetQuery["Query"]["id"], $id_user)
							));
						echo '</br>';	
					}
					
				}
				else{

					echo $this->Html->image('up-arrow-icon.png', array(
						'alt' => 'Arrow Up',
						'height' => '25', 
						'width' => '25'
						));
					echo '</br>';
					if(!empty($numVotos)) echo '<span class="vote-count">'.$numVotos.' </span></br>';
					else echo '<span class="vote-count"> 0 </span></br>';
					echo $this->Html->image('down-arrow-icon.png', array(
						'alt' => 'Arrow Down',
						'height' => '25', 
						'width' => '25'
						));
					echo '</br>';
					
				}
				?>
			</div>
		</div>
		<div class="col-sm-11 col-xs-12 question-content-div">
			<!--<div class="description-question">-->	
			<p class="question-content"> 
				<?= $targetQuery["Query"]["content"]; ?>
			</p>	
		</div>
	</div>
	<hr class="query-separator">

	<?php
	if($this->Session->read("User.id")){
		?>

		<a class="btn btn-primary pull-right" href="#" data-toggle="modal" data-target="#responderQuery"><?= __("Responder"); ?></a>

		<?php
	}
	?>



</div>


<div class="container-fluid answers-block">
			<!--<div class="col-sm-1">
			</div>
		-->

		
		<?php 
			//$targetQuery["Comment"]
		foreach ($sortedComments as $comment){

			?>


			<div class="query-answer container-fluid">
				<div class="col-sm-1 hidden-xs">
					<div class="vote">
						<?php 
						$id_comment = $comment['comments']['id'];
						if($this->Session->read("User.id")){
							
							$id_user =$this->Session->read("User.id");
							$votedComment = $this->requestAction("/users/votedComment/$id_user/$id_comment");

							if($votedComment && $votedComment[0]["comments_users"]["vote"]==1){

								$id_voto = $votedComment[0]["comments_users"]["id"];
								echo $this->Html->image('up-arrow-icon.png', array(
									'alt' => 'Arrow Up',
									'height' => '25', 
									'width' => '25'
									));
								echo '</br>';

							}
							if($votedComment && $votedComment[0]["comments_users"]["vote"]==-1){

								$id_voto = $votedComment[0]["comments_users"]["id"];
								echo $this->Html->image('up-arrow-icon.png', array(
									'alt' => 'Arrow Up',
									'height' => '25', 
									'width' => '25',
									'url' => array('controller' => 'comments', 'action' => 'updateVoteComment', 'up',$comment['comments']['id'],$id_voto, $id_user, $targetQuery["Query"]["id"])
									));
								echo '</br>';				
							}
							if(empty($votedComment)){

								echo $this->Html->image('up-arrow-icon.png', array(
									'alt' => 'Arrow Up',
									'height' => '25', 
									'width' => '25',
									'url' => array('controller' => 'comments', 'action' => 'voteComment', 'up',$comment['comments']['id'], $id_user, $targetQuery["Query"]["id"])
									));
								echo '</br>';	
							}
				//<img src="./img/up-arrow-icon.png" alt="Arrow Up" height="25" width="25">-->
							$numVotosComment = $this->requestAction("/comments/votes/$id_comment");
							if(!empty($numVotosComment)) echo '<span class="vote-count"> '.$numVotosComment.' </span>';
							else echo '<span class="vote-count"> 0 </span>';
							echo '</br>';

							if($votedComment && $votedComment[0]["comments_users"]["vote"]==1){
								$id_voto = $votedComment[0]["comments_users"]["id"];
								echo $this->Html->image('down-arrow-icon.png', array(
									'alt' => 'Arrow Down',
									'height' => '25', 
									'width' => '25',
									'url' => array('controller' => 'comments', 'action' => 'updateVoteComment', 'down',$comment['comments']['id'],$id_voto, $id_user, $targetQuery["Query"]["id"])
									));
								echo '</br>';
							}
							if($votedComment && $votedComment[0]["comments_users"]["vote"]==-1){
								$id_voto = $votedComment[0]["comments_users"]["id"];
								echo $this->Html->image('down-arrow-icon.png', array(
									'alt' => 'Arrow Down',
									'height' => '25', 
									'width' => '25'
									));
								echo '</br>';				
							}
							if(empty($votedComment)){
								echo $this->Html->image('down-arrow-icon.png', array(
									'alt' => 'Arrow Down',
									'height' => '25', 
									'width' => '25',
									'url' => array('controller' => 'comments', 'action' => 'voteComment', 'down',$comment['comments']['id'], $id_user, $targetQuery["Query"]["id"])
									));
								echo '</br>';	
							}

						}
						else{

							echo $this->Html->image('up-arrow-icon.png', array(
								'alt' => 'Arrow Up',
								'height' => '25', 
								'width' => '25'
								));
							echo '</br>';
							$numVotosComment = $this->requestAction("/comments/votes/$id_comment");
							if(!empty($numVotosComment)) echo '<span class="vote-count"> '.$numVotosComment.' </span><br/>';
							else echo '<span class="vote-count">  0 </span></br>';
							echo $this->Html->image('down-arrow-icon.png', array(
								'alt' => 'Arrow Down',
								'height' => '25', 
								'width' => '25'
								));
							echo '</br>';

						}

						//$targetQuery["Comment"]
						foreach ($targetQuery["Comment"] as $key => $row) {
							if($comment['comments']['id'] == $row['id']){
								$comment_content=$row['content'];
								$comment_picture=$row['User']['profile_pic_route'];
								$comment_username=$row['User']['username'];
								$comment_userId=$row['User']['id'];
								break;
							}
						}
						?>
						
					</div>
				</div>
				<div class="col-sm-9 col-xs-12 bubble"><?= $comment_content; ?>
				</div>
				<div class="col-sm-2 col-xs-3 restriccion"><?php echo $this->Html->image("user-icons/".$comment_picture, array('alt' => 'Avatar', "class" => "comment-profile-img", "height" => "80")); ?>
					<br>

					<p class=" query-response-user-name"><?= $this->Html->link($comment_username, "/users/view/".$comment_userId);?></p>
				</div>
				<div class="visible-xs col-xs-9">
					<?php
					$id_comment = $comment['comments']['id'];
					if($this->Session->read("User.id")){

						$id_user =$this->Session->read("User.id");
						$votedComment = $this->requestAction("/users/votedComment/$id_user/$id_comment");

						if($votedComment && $votedComment[0]["comments_users"]["vote"]==1){

							$id_voto = $votedComment[0]["comments_users"]["id"];
							echo $this->Html->image('up-arrow-icon.png', array(
								'alt' => 'Arrow Up',
								'height' => '20', 
								'width' => '20'
								));


						}
						if($votedComment && $votedComment[0]["comments_users"]["vote"]==-1){

							$id_voto = $votedComment[0]["comments_users"]["id"];
							echo $this->Html->image('up-arrow-icon.png', array(
								'alt' => 'Arrow Up',
								'height' => '20', 
								'width' => '20',
								'url' => array('controller' => 'comments', 'action' => 'updateVoteComment', 'up',$comment['comments']['id'],$id_voto, $id_user, $targetQuery["Query"]["id"])
								));

						}
						if(empty($votedComment)){

							echo $this->Html->image('up-arrow-icon.png', array(
								'alt' => 'Arrow Up',
								'height' => '20', 
								'width' => '20',
								'url' => array('controller' => 'comments', 'action' => 'voteComment', 'up',$comment['comments']['id'], $id_user, $targetQuery["Query"]["id"])
								));

						}
				//<img src="./img/up-arrow-icon.png" alt="Arrow Up" height="20" width="20">-->
						echo "</br>";
						$numVotosComment = $this->requestAction("/comments/votes/$id_comment");							
						if(!empty($numVotosComment)) echo '<span class="vote-count"> '.$numVotosComment.' </span>';
						else echo '<span class="vote-count"> 0 </span>';
						echo "</br>";


						if($votedComment && $votedComment[0]["comments_users"]["vote"]==1){
							$id_voto = $votedComment[0]["comments_users"]["id"];
							echo $this->Html->image('down-arrow-icon.png', array(
								'alt' => 'Arrow Down',
								'height' => '20', 
								'width' => '20',
								'url' => array('controller' => 'comments', 'action' => 'updateVoteComment', 'down',$comment['comments']['id'],$id_voto, $id_user, $targetQuery["Query"]["id"])
								));

						}
						if($votedComment && $votedComment[0]["comments_users"]["vote"]==-1){
							$id_voto = $votedComment[0]["comments_users"]["id"];
							echo $this->Html->image('down-arrow-icon.png', array(
								'alt' => 'Arrow Down',
								'height' => '20', 
								'width' => '20'
								));

						}
						if(empty($votedComment)){
							echo $this->Html->image('down-arrow-icon.png', array(
								'alt' => 'Arrow Down',
								'height' => '20', 
								'width' => '20',
								'url' => array('controller' => 'comments', 'action' => 'voteComment', 'down',$comment['comments']['id'], $id_user, $targetQuery["Query"]["id"])
								));

						}

					}
					else{

						echo $this->Html->image('up-arrow-icon.png', array(
							'alt' => 'Arrow Up',
							'height' => '20', 
							'width' => '20'
							));

						$numVotosComment = $this->requestAction("/comments/votes/$id_comment");
						echo "</br>";
						if(!empty($numVotosComment)) echo '<span class="vote-count"> '.$numVotosComment.' </span>';
						else echo '<span class="vote-count"> 0 </span>';
						echo "</br>";
						echo $this->Html->image('down-arrow-icon.png', array(
							'alt' => 'Arrow Down',
							'height' => '20', 
							'width' => '20'
							));


					}

					?>
					<!--<img src="./img/up-arrow-icon.png" alt="Arrow Up" height="25" width="25"><br>
					<span class="vote-count">+10  </span><br>
					<img src="./img/down-arrow-icon.png" alt="Arrow Down" height="25" width="25">-->
				</div>
			</div>


			<?php
		}
		?>

		<div id="responderQuery" class="modal fade" role="dialog">
			<div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h4 class="modal-title"><?= $this->Html->image('icon_dark_background', array(
							'alt' => 'icono',
							'class' => 'modal-header-icon'
							));?><!--<img class="modal-header-icon" src="/img/icon_dark_background.png" ></img>--><?= __("Responder"); ?></h4>
						</div>
						<div class="modal-body">
							<div class="container-fluid">
								<div class="col-sm-12">
									<?= $this->Form->create('Comment', array('action' => '/add')); ?>
									<?= $this->Form->input("user_id", array("type" => "hidden", "value" => $this->Session->read("User.id")));?>
									<?= $this->Form->input("query_id", array("type" => "hidden", "value" => $targetQuery["Query"]["id"]));?>

									<h3>Danos tu solución:</h3><br>

									<div class="form-group">
										<?= $this->Form->textarea("content", array("class" => "form-control", "placeholder" => "Tu respuesta es...", "id" => "textArea", "rows" => "8"));?>
									</div>
									<div class="form-group pull-right">
										<?= $this->Form->submit('Comentar', array('class' => 'btn btn-info')); ?>

									</div>
									<?= $this->Form->end(); ?>

								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
