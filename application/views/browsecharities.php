<div id="browsecharitiespage">
	<div id="idealcharityforyou">
		Find the ideal charity for you!
	</div>

	<select class="filterdropdowns" id="ageonbrowsecharities" name="age">
		<option value="Age"> Age </option>  
		<option value="12-14"> 12-14 </option>
		<option value="15-17"> 15-17 </option>
		<option value="18+"> 18+ </option>

	</select>
	<select class="filterdropdowns" name="charityfocus">
		<option value="charityfocus"> Charity Focus </option>
		<option value="humanitarian"> Humanitarian </option>
		<option value="animal"> Animal </option>
		<option value="research"> Research </option>
		<option value="other"> Other </option>
	</select>
	<select class="filterdropdowns" name="location">
		<option value="location"> Location </option>
		<option value="ne"> NE </option>
		<option value="nw"> NW </option>
		<option value="se"> SE </option>
		<option value="sw"> SW </option>
		<option value="downtown"> Downtown </option>

	</select>
	<select class="filterdropdowns" id="sortonbrowsecharities" name="sort">
		<option value="sort"> Sort </option>
		<option value="mostrecent"> Most Recent </option>
		<option value="mostpopular"> Most Popular </option>
		<option value="highestrated"> Highest Rated </option>
		

	</select>

	<?php foreach($charities as $charity): ?>

	<a href="<?=base_url() ?>charity/<?=$charity['id'] ?>" id="charitylink"> 
		<div class="browsecharitiescharities">
			<div class="row">

				<div class="col-sm-2">
					<img src="img/profilepicforfox.jpg" class="charitylistimage">
				</div>

				<div class="col-sm-10">
					<p class="titleinbrowsecharities"><?=$charity['name'] ?></p>
					<p class="addressinbrowsecharities">
						Address: <?=$charity['location'] ?>
					</p>
					<p class="ratingsinbrowsecharities">
						<?=round($charity['score']*25) ?>%
					</p>
					<p class="reviewsinbrowsecharities">
						Reviews: <?=$charity['reviewcount'] ?>
					</p> 

				</div>
			</div>

		</div>
	</a>

	<?php endforeach ?>


</div>