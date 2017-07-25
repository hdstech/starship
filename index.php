<?php require "Resource.php"; ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		<link rel="stylesheet" href="css/style.css">
	</head>
  <body>
		<div class="d-flex flex-column text-center header justify-content-center">
			<div class="img-container">
				<img src="img/header.jpg" alt="" width="100%" height="auto">
			</div>
			<h1>Starships</h1>
			<nav aria-label="Page navigation">
			  <ul class="pagination text-center d-flex justify-content-center">
			    <li class="page-item">
						<?php echo "<a href='index.php?page=".($page <=1 ? $page = 1 : $page-1)."' class='page-link' aria-label='Previous'>"; ?>
			        <span aria-hidden="true">&laquo;</span>
			        <span class="sr-only">Previous</span>
			      </a>
			    </li>
					<?php
						for ($page=1; $page < $page_num ; $page++) {
							echo " <li class='page-item'>
								<a href='index.php?page=".$page."' class='".($_GET['page'] == $page ? 'page-link p-active':'page-link')."'>{$page}</a>
								</li>";
					 	};
					?>
					 <li class="page-item">
						 <?php
								$current_page = $_GET['page'];
							 	echo "<a href='index.php?page=".($current_page == 5 ? $current_page = 5 : $current_page+1)."' class='page-link' aria-label='Previous'>"; ?>
				        <span aria-hidden="true">&raquo;</span>
				        <span class="sr-only">Next</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div>

		<div class="container d-flex justify-content-center align-content-center">
					<table class="table w-75">
						<tbody>
							<?php
							foreach ($slice as $results)
							echo "
								<tr class='d-flex justify-content-center w-100'>
									<td class='flex-first w-50'>
										<span class='card-block'>
											<h3>{$results['name']}</h3>
											<p><strong>Length: </strong>{$results['length']}</p>
											<p><strong>Crew: </strong>{$results['crew']}</p>
											<p><strong>Passengers: </strong> {$results['passengers']}</p>
											<button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#". str_replace(' ', '', $results['name']) ."'>
						  					More Info <span aria-hidden='true'>&raquo;
											</button>
										</span>
									</td>
									<td class='flex-last'>
										<div style='height: 200px; width: 200px; background-repeat: contain;'>
										<img src='img/starships/".str_replace(' ','-',$results['name']) .".png' class='img-thumbnail'/>
										</div>
									</td>
								</tr>

							<div class='modal fade' id='". str_replace(' ', '', $results['name']) ."' tabindex='-1' role='dialog' aria-labelledby='starshipModalInfo' aria-hidden='true'>
						  <div class='modal-dialog' role='document'>
						    <div class='modal-content'>
						      <div class='modal-header'>
						        <h5 class='modal-title' id='starshipModalInfo'>{$results['name']}</h5>
						        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
						          <span aria-hidden='true'>&times;</span>
						        </button>
						      </div>
						      <div class='modal-body'>
						        <p>
						        	<strong>Manufacturer: </strong> {$results['manufacturer']}
						        </p>
										<p>
						        	<strong>Starship Class: </strong> {$results['model']}
						        </p>
										<p>
						        	<strong>Hyperdrive Rating: </strong> {$results['hyperdrive_rating']}
						        </p>
										<p>
						        	<strong>Cargo Capacity: </strong> {$results['cargo_capacity']}
						        </p>
										<p>
						        	<strong>Cost in Credits: </strong> {$results['cost_in_credits']}
						        </p>
										<p>
						        	<strong>Max Atmosphering Speed: </strong> {$results['max_atmosphering_speed']}
						        </p>
										<p>
						        	<strong>MGLT: </strong> {$results['MGLT']}
						        </p>
						      </div>
						      <div class='modal-footer'>
						        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
						      </div>
						    </div>
						  </div>
						</div>";?>
					</tbody>
				</table>
		</div>

    <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		<script type="text/javascript" src="path_to/jquery.simplePagination.js"></script>
		<script>
			$('document').ready(function (){
			});
		</script>
	</body>
</html>
