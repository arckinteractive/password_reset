<?php

elgg_make_sticky_form('password_reset');

$members = get_input('members');
$all_members = get_input('all_users');
$message = get_input('message');

if (!$message) {
    register_error(elgg_echo('password_reset:nomessage'));
    forward(REFERER);
}

if (!$all_members && !$members) {
    register_error(elgg_echo('password_reset:nomembers'));
    forward(REFERER);
}

system_message(elgg_echo('password:reset:reset:password:success'));

// set our handler for vvvvrrrroooooooooom
elgg_register_event_handler('shutdown', 'system', 'password_reset_shutdown_tasks');

elgg_set_config('password_reset_members', $members);
elgg_set_config('password_reset_all_members', $all_members);
elgg_set_config('password_reset_message', $message);

elgg_clear_sticky_form('password_reset');

forward(REFERER);