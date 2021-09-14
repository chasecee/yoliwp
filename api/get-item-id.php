<?php
function get_item_id() {
	if ( isset ( $_GET['item_id'] ) ) :
		$item_id = $_GET['item_id'];
	endif;

return $item_id;
}
?>
