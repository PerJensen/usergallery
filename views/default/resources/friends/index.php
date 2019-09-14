<?php
/**
 * Elgg friends page
 *
 * @package Elgg.Core
 * @subpackage Social.Friends
 */

$owner = elgg_get_page_owner_entity();
if (!$owner instanceof ElggUser) {
	throw new \Elgg\EntityNotFoundException;
}

$title = elgg_echo("friends:owned", [$owner->getDisplayName()]);

$options = [
	'relationship' => 'friend',
	'relationship_guid' => $owner->getGUID(),
	'inverse_relationship' => false,
	'type' => 'user',
	'size' => 'large',
	'limit' => 12,
	'order_by_metadata' => [
		[
			'name' => 'name',
			'direction' => 'ASC',
		],
	],
	'full_view' => false,
	'list_class' => 'elgg-list-users',
	'no_results' => elgg_echo('friends:none'),
];
$content = elgg_list_entities($options);

$params = [
	'filter_id' => 'filter',
	'filter_value' => 'friends',
	'content' => $content,
	'title' => $title,
];
$body = elgg_view_layout('one_sidebar', $params);

echo elgg_view_page($title, $body);
