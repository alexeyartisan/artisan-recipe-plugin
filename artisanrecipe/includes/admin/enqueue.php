<?php

function ar_admin_enqueue() {
	global $typenow;

	if ( $typenow !== 'recipe' ) {
		return;
	}
}