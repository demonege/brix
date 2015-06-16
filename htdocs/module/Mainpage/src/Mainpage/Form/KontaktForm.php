<?php

namespace Mainpage\Form;

use Zend\Form\Form;

class KontaktForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct("Kontakt Form");

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'placeholder' => 'name',
                'class' => 'input-box',
            ),
        ));

        $this->add(array(
            'name' => 'email',
            'attributes' => array(
                'placeholder'  => 'email',
                'class' => 'input-box',
            ),
        ));

        $this->add(array(
            'name' => 'betreff',
            'attributes' => array(
                'placeholder'  => 'betreff',
                'class' => 'input-box',
            ),
        ));

        $this->add(array(
            'name' => 'beschreibung',
            'type' => 'textarea',
            'attributes' => array(
                'placeholder' => 'ihre Nachricht an uns',
                'class' => 'description',
            ),
        ));

        $this->add(array(
            'name' => 'abschicken',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'abschicken',
                'class' => 'brix-btn',
            ),
        ));
    }
}

?>