<?php
/*
 * User Gallery
 *
 * @author Per Jensen
 * @license http://www.gnu.org/licenses/gpl-2.0.html GNU General Public License v2
 * @copyright Copyright (c) 2019, Per Jensen
 *
 */

return function() {
	elgg_register_event_handler('init', 'system', 'usergallery_init');
};

function usergallery_init() {

	elgg_extend_view('elgg.css', 'usergallery/usergallery.css');
}
