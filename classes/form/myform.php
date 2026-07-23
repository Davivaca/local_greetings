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
 * Description of the file.
 *
 * @package    local_greetings
 * @copyright  2026 Davi Vaccarezza
 * @license    https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

// Moodleform is defined in formslib.php.
// Essa linha carrega o arquivo que contem a classe moodleform.
// $CFG->libdir → pasta /lib do Moodle.
namespace local_greetings\form;

defined('MOODLE_INTERNAL') || die();

require_once($GLOBALS['CFG']->libdir . '/formslib.php');

// This class defines a Moodle form.
/**
 * Form used by the local_greetings plugin.
 *
 * @package    local_greetings
 */
class myform extends moodleform {
    // Add elements to form.
    // Essa linha define os campos e é chamado automaticamente quando o formulário é criado.
    /**
     * Defines the elements of the form.
     */
    public function definition() {
        // A reference to the form is stored in $this->form.
        // A common convention is to store it in a variable, such as `$mform`.
        // $this->_form é o objeto interno do formulário isso apenas apelida o form.
        $mform = $this->_form; // Don't forget the underscore!
        // Add elements to your form.
        // O que cada coisa faz? 'text' = Tipo do campo.
        // 'email' = Nome interno do campo.
        // get_string('email') = Texto exibido.
        $mform->addElement('text', 'email', get_string('email'));
        // Set type of element.
        // Isso diz para limpar o campo antes de usar? esse é o comando PARAM_.
        $mform->setType('email', PARAM_NOTAGS);
        // Default value.
        // Essa linha define o valor inicial.
        $mform->setDefault('email', 'Please enter email');
    }
    // Custom validation should be added here.
    // Esse método é chamado quando o usuário envia o formulário.
    /**
     * Validates the submitted data.
     *
     * @param array $data
     * @param array $files
     * @return array
     */
    public function validation($data, $files) {
        return [];
    }
}
