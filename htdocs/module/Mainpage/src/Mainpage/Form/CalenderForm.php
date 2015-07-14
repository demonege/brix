<?php

namespace Mainpage\Form;

use Zend\Form\Form;

class CalenderForm extends Form
{
    public function __construct($name = null)
    {

        parent::__construct("Calender Form");

        $this->add(array(
            'name' => 'name',
            'attributes' => array(
                'placeholder' => 'name',
                'class' => 'input-box',
            ),
        ));

        $this->add(array(
            'name' => 'abschicken',
            'type' => 'submit',
            'attributes' => array(
                'value' => 'abschicken',
                'class' => 'save-btn',
            ),
        ));

        $this->add(array(
            'name' => 'datum',
            'attributes' => array(
                'placeholder' => 'dd.mm.yyyy',
                'class' => 'input-box',
            ),
        ));
    }
}