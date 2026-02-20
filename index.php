<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Greetings plugin main page.
 *
 * @package    local_greetings
 * @copyright  2026 Davi Vaccarezza
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * Comandos importantes para lembrar
 * isloggedin() determina se um usuário está logado ou não
 * isguestuser()
 * requirelogin() checa se o usuário está logado, se não estiver manda de volta para apágina de login
 * fullname() retorna o nome completo do usuário
 */

require('../../config.php');
require_once($CFG->dirroot . '/local/greetings/lib.php');
require_once($CFG->dirroot . '/local/greetings/classes/form/message_form.php');

require_login();

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/greetings/index.php'));
$PAGE->set_pagelayout('standard');

// Isso define o nome do título como o nome do plugin
$title = get_string('pluginname', 'local_greetings');

$PAGE->set_title($title);
$PAGE->set_heading($title);

// Adição de código da classe forms
$messageform = new \local_greetings\form\message_form();

// Isso finaliza a inicialização DOM e começa a rodar o conteúdo HTML
echo $OUTPUT->header();

if ($messageform->is_cancelled()) {

    redirect(new moodle_url('/local/greetings/index.php'));

} else if ($fromform = $messageform->get_data()) {

    echo $OUTPUT->notification('Mensagem enviada com sucesso!', 'notifysuccess');
    echo html_writer::div('Você escreveu: ' . $fromform->message);

} else {

    if (isloggedin()) {
        $usergreeting = local_greetings_get_greeting($USER);
    } else {
        $usergreeting = get_string('greeting_user', 'local_greetings');
    }

    echo $OUTPUT->heading('Olá, Moodle!');
    echo html_writer::div('Meu plugin local_greetings está funcionando.');

    $templatedata = ['usergreeting' => $usergreeting];
    echo $OUTPUT->render_from_template('local_greetings/greeting_message', $templatedata);

    // Isso tambem e novo
    $messageform->display();

    if($data = $messageform->get_data()) {
        $message = required_param('message', PARAM_TEXT);

        echo $OUTPUT->heading($message, 4);
    }

}

// SEMPRE DEVE ESTAR POR ÚLTIMO.
echo $OUTPUT->footer();
