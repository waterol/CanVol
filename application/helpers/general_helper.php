<?php
// generally useful helper functions

// Display "selected" if match, great for select blocks
function pick_select($a, $b)
{
	if(strcasecmp($a, $b) == 0)
		echo "selected";
}

// Convert numbers to ratings
function rating_to_words($rating)
{
	switch($rating)
	{
		case 0: return "Avoid!";
		case 1: return "Poor";
		case 2: return "Fair";
		case 3: return "Good";
		case 4: return "Great!";

	}
}



?>