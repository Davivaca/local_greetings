<?php
function local_greetings_get_greeting($user) {
    if ($user == null) {
        return get_string('greetinguser', 'local_greetings');
    }

    $country = $user->country;
    switch ($country) {
        // Caso de ser o país Espanha.
        case 'ES':
            $langstr = 'greetinguseres';
            break;
        // Caso de ser o país Fiji.
         case 'FJ':
            $langstr = 'greetinguserfj';
            break;
        // Caso de ser o país Brasil.
         case 'PT':
            $langstr = 'greetinguserpt';
            break;
        default:
            $langstr = 'greetingloggedinuser';
            break;
    }

    return get_string($langstr, 'local_greetings', fullname($user));
}