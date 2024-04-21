<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>Документы</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
			crossorigin="anonymous"
		/>
	</head>
	<body>
		<div class="container overflow-hidden">
			<div class="row gy-5">
				<?php foreach($company as $com):?>
					<div class="col-6">
						<div class="card" style="width: 18rem">
							<div class="card-body">
								<h5 class="card-title"><?=$com['num']?></h5>
								<p class="card-text">
									<a href="<?=$com['href']?>">
										<?=$com['name']?>
									</a>
								</p>
								<?php foreach($files as $file):?>
									<?php if($file['id_doc'] === $com['num']): ?>
										<div class="col-12 m-2">
											<a href="<?=$file['href']?>" class="btn btn-primary"><?=$file['name']?></a>
										</div>
									<?php endif?>
								<?php endforeach;?>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
			crossorigin="anonymous"
		></script>
	</body>
</html>
