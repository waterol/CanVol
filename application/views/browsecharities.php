<div id="browsecharitiespage">
	<div id="idealcharityforyou">
		Find the ideal charity for you!
	</div>

	<select class="filterdropdowns" id="ageonbrowsecharities" name="agegroup">
		<option value="showall"> Age </option>  
		<option value="12"> 12 </option>
		<option value="13"> 13 </option>
		<option value="14"> 14 </option>
		<option value="15"> 15 </option>
		<option value="16"> 16 </option>
		<option value="17"> 17 </option>
		<option value="18"> 18 </option>


	</select>
	<select class="filterdropdowns" name="focus">
		<option value="showall"> Charity Focus </option>
		<option value="humanitarian"> Humanitarian </option>
		<option value="animal"> Animal </option>
		<option value="research"> Research </option>
		<option value="other"> Other </option>
	</select>
	<select class="filterdropdowns" name="quadrant">
		<option value="showall"> Location </option>
		<option value="ne"> NE </option>
		<option value="nw"> NW </option>
		<option value="se"> SE </option>
		<option value="sw"> SW </option>
		<option value="downtown"> Downtown </option>

	</select>
	<select id="sortonbrowsecharities" name="sort">
		<option value="sort"> Sort </option>
		<option value="mostrecent"> Most Recent </option>
		<option value="mostpopular"> Most Popular </option>
		<option value="highestrated"> Highest Rated </option>
		

	</select>

	<?php if(count($charities) > 0): ?>
	<div id="charitylist">
		<?php foreach($charities as $charity): ?>

		<a href="<?=base_url() ?>charity/<?=$charity['id'] ?>" id="charitylink"> 
			<div class="browsecharitiescharities" data-agegroup="" data-agegroupmin='<?=$charity['agegroup_min'] ?>' data-agegroupmax='<?=$charity['agegroup_max'] ?>'  data-focus='<?=$charity['focus'] ?>' data-quadrant='<?=$charity['quadrant'] ?>'>
				<div class="row">

					<div class="col-xs-6 col-md-2">
						<img src="<?=base_url() ?><?=$charity['portraitpath'] ?>" class="charitylistimage">
					</div>

					<div class="col-xs-6 col-md-10">
						<p class="titleinbrowsecharities"><?=$charity['name'] ?></p>
						<p class="addressinbrowsecharities">
							Address: <?=$charity['location'] ?>
						</p>
						<p class="ratingsinbrowsecharities">
							<?php echo ($charity['reviewcount'] < 3 ? "??" : round($charity['score']*25) . "%") ?>
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
	<?php else: ?>
		<p>Couldn't find any charities!</p>
	<?php endif ?>


</div>
