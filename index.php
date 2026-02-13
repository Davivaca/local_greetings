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

require_login();

$context = context_system::instance();

// Isso o que faz?
$PAGE->set_context($context);

// Isso cria a URL única do código, a página do bloco.
$PAGE->set_url(new moodle_url('/local/greetings/index.php'));

// Isso o que faz?
$PAGE->set_pagelayout('standard');

// Isso faz o nome da página lá em cima seja o nome do title.
$PAGE->set_title($title);

$PAGE->set_heading($title);

// Isso o que faz?
$title = get_string('pluginname', 'local_greetings');

// Isso define o nome do título como o nome do plugin referenciado, nesse caso o local_greetings.
$title = get_string('pluginname', 'local_greetings');

// Aqui acaba o código alterado.

// Isso finaliza a inicialização DOM e começa a rodar o conteúdo HTML de fato.
// O output é uma variável global que serve para gerar o conteúdo html.
echo $OUTPUT->header();

if (isloggedin()) {
    // Esse trecho apenas acontece se o usuário estiver logado.
    // Um echo para usar o nome completo do usuário para dar oi, comando fullname($USER).
    // echo '<h2>Olá, ' . fullname($USER) . '</h2>'; trocado!

    // Substituído por código mustache.
    $usergreeting = 'Olá, ' . fullname($USER);
} else {
    // Esse echo cria um h2 para o texto que eu escrevi.
    // echo '<h2>Olá usuário </h2>'; trocado!

    // Substituído por código mustache.
    $usergreeting = 'Olá, Usuário';
}

// Isso o que faz?
echo $OUTPUT->heading('Olá, Moodle!');

// Isso o que faz?
echo html_writer::div('Meu plugin local_greetings está funcionando.');

// Isso passa a variável $usergreeting para o arquivo greeting_message.
$templatedata = ['usergreeting' => $usergreeting];
echo $OUTPUT->render_from_template('local_greetings/greeting_message', $templatedata);

// Isso var criar o footer que é um botão com um ponto de interrogação.
// SEMPRE DEVE ESTAR POR ÚLTIMO.
echo $OUTPUT->footer();
