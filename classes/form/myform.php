<?php
// moodleform is defined in formslib.php.
// Essa linha carrega o arquivo que contem a classe moodleform.
// $CFG->libdir → pasta /lib do Moodle.
require_once("$CFG->libdir/formslib.php");

// Esse class myform diz que a classe criada myform é um tipo de formulario moodle
class myform extends moodleform {
    // Add elements to form.
    // Essa linha define os campos e é chamado automaticamente quando o formulário é criado
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
    function validation($data, $files) {
        return [];
    }
}