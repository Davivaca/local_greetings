<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle. If not, see <https://www.gnu.org/licenses/>.

/**
 * Library functions for the Greetings local plugin.
 *
 * @package    local_greetings
 * @copyright  2026 Davi Vaccarezza
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
/**
 * Insert a link to index.php on the site front page navigation menu.
 *
 * @package local_greetings
 * @param navigation_node $frontpage Node representing the front page.
 */
/**
 * Returns the greeting for a user based on their country.
 *
 * @param stdClass|null $user Moodle user object.
 * @return string Greeting message.
 */
function local_greetings_extend_navigation_frontpage(navigation_node $frontpage) {
    $frontpage->add(
        get_string('pluginname', 'local_greetings'),
        new moodle_url('/local/greetings/index.php'),
        navigation_node::TYPE_CUSTOM,
    );
}
/**
 * Returns a greeting for the specified user.
 *
 * @param stdClass|null $user User object or null.
 * @return string Greeting message.
 */
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
        // Caso ingles australia.
        case 'AU':
            $langstr = 'greetinguserau';
            break;
        default:
            $langstr = 'greetingloggedinuser';
            break;
    }

    return get_string($langstr, 'local_greetings', fullname($user));
}
