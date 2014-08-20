<?php
// generally useful helper functions

// Display "selected" if match, great for select blocks
function pick_select($a, $b)
{
	if(strcasecmp($a, $b) == 0)
		echo "selected";
}



?>