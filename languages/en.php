<?php

$english = array(
    'admin:users:password_reset' => 'Password Reset',
    'password_reset:label:choose:user' => 'Select users to reset password',
    'password_reset:help:choose:user' => 'Type the name of the user and select them from the results.  You can select as many users as you like.',
    'password_reset:label:all_users' => "Reset password for ALL USERS",
    'password_reset:help:all_users' => "If you check this box then the password will be reset for <strong>ALL USERS</strong> of this site except for yourself.",
    'password_reset:all_users:confirm' => "Checking this box will reset the password for ALL USERS - are you absolutely sure you want to do this?",
    'password:reset:reset:password:success' => "Passwords reset for selected users",
    'password_reset:nomembers' => "No members were selected",
    'password_reset:custom_message:placeholder' => '{{{Custom Message}}}',
    'password_reset:password:placeholder' => '{{{Password}}}',
    'password_reset:custom_message_help' => "The resulting email will have the following structure: %s",
    'password_reset:custom_message' => "Custom Message",
    'password_reset:nomessage' => 'You should provide a message letting the user know why their password was reset',
    
    'password_reset:subject' => "Password reset notice for %s",
    'password_reset:body' => "
        Hello %s,
        
%s
        
Your new password is %s
You can log in and change your password at %s

If you log in through one of the social login providers (eg. Googe, Facebook, etc) this does not affect you and you may disregard this notice.",
);

add_translation("en", $english);