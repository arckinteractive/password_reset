<?php

function password_reset_init() {
    elgg_register_admin_menu_item('administer', 'password_reset', 'users');
    
    elgg_register_action('admin/password_reset', dirname(__FILE__) . '/actions/password_reset.php', 'admin');
}


function password_reset_shutdown_tasks() {
    $all_members = elgg_get_config('password_reset_all_members');
    $members = elgg_get_config('password_reset_members');
    $message = elgg_get_config('password_reset_message');
    
    $current_user = elgg_get_logged_in_user_guid();
    
    $options = array(
        'type' => 'user',
        'wheres' => array("e.guid NOT IN({$current_user})"),
        'limit' => false,
    );

    if ($all_members) {
        $results = new ElggBatch('elgg_get_entities', $options);
    }
    elseif ($members) {
        $options['guids'] = $members;
        $results = new ElggBatch('elgg_get_entities', $options);
    }
    else {
        // nothing to do
        return;
    }

    foreach ($results as $user) {
        
        if (!$user) {
            continue;
        }
        
        $password = generate_random_cleartext_password();

        // Always reset the salt before generating the user password.
        $user->salt = generate_random_cleartext_password();
        $user->password = generate_user_password($user, $password);

        if ($user->save()) {

            notify_user(
                $user->guid,
                elgg_get_site_entity()->guid,
                elgg_echo('password_reset:subject', array($user->name)),
                elgg_echo('password_reset:body', array(
                    $user->name,
                    $message,
                    $password,
                    elgg_get_site_url() . 'settings/user/' . $user->username
                    )),
                NULL,
                'email');
        }
    }
}

elgg_register_event_handler('init', 'system', 'password_reset_init');
