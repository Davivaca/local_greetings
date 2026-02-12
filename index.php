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

require('../../config.php');

require_login();

$context = context_system::instance();

// Isso cria a URL única do código, a página do bloco.
$PAGE->set_url(new moodle_url('/local/greetings/index.php'));

// Isso o que faz?
$PAGE->set_context($context);

// Isso o que faz?
$PAGE->set_pagelayout('standard');

// Isso o que faz?
$title = get_string('pluginname', 'local_greetings');

// MEU CÓDIGO DO MOODLE.

$title = get_string('pluginname', 'local_greetings');

$PAGE->set_title($title);
$PAGE->set_heading($title);

// Aqui acaba o código alterado.

// Isso finaliza a inicialização DOM e começa a rodar o conteúdo HTML de fato.
echo $OUTPUT->header();

// Isso o que faz?
echo $OUTPUT->heading('Olá, Moodle!');

// Isso o que faz?
echo html_writer::div('Meu plugin local_greetings está funcionando.');

// Isso o que faz?
echo $OUTPUT->footer();
