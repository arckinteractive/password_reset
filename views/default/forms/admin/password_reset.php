<?php

echo '<label>' . elgg_echo('password_reset:label:choose:user') . '</label>';
echo elgg_view('input/userpicker');
echo elgg_view('output/longtext', array(
    'value' => elgg_echo('password_reset:help:choose:user'),
    'class' => 'elgg-subtext'
));

echo elgg_view('input/checkbox', array(
    'name' => 'all_users',
    'value' => '1',
    'class' => 'password-reset-all-users',
    'id' => 'password-reset-all-users'
));

echo '<label for="all_users">' . elgg_echo('password_reset:label:all_users') . '</label>';
echo elgg_view('output/longtext', array(
    'value' => elgg_echo('password_reset:help:all_users'),
    'class' => 'elgg-subtext'
));


$help = elgg_echo('password_reset:body', array(
    elgg_get_logged_in_user_entity()->name,
    elgg_echo('password_reset:custom_message:placeholder'),
    elgg_echo('password_reset:password:placeholder'),
    elgg_get_site_url() . 'settings/user/' . elgg_get_logged_in_user_entity()->username
));
echo '<label>' . elgg_echo('password_reset:custom_message') . '</label>';
echo elgg_view('input/longtext', array(
    'name' => 'message',
    'value' => elgg_get_sticky_value('password_reset', 'message')
));
echo elgg_view('output/longtext', array(
    'value' => elgg_echo('password_reset:custom_message_help', array($help)),
    'class' => 'elgg-subtext'
));

echo '<br><br>';

echo elgg_view('input/submit', array('value' => elgg_echo('submit')));
elgg_clear_sticky_form('password_reset');
?>

<script>
    $(document).ready(function() {
        $('#password-reset-all-users').click(function() {
            if ($(this).is(':checked')) {
                if (!confirm(elgg.echo('password_reset:all_users:confirm'))) {
                    return false;
                }
            }
        });
    });
</script>