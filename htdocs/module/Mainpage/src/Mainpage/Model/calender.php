<?php
namespace Mainpage\Model;

use JsonSchema\Validator;
use Zend\InputFilter\Factory as InputFactory;
use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class Calender implements InputFilterAwareInterface
{
    public $name;

    protected $inputFilter;

    public function exchangeArray($data)
    {
        $this->name      = (isset($data['name'])) ? $data['name'] : null;
    }

    public function getArrayCopy()
    {
        return get_object_vars($this);
    }

    public function setInputFilter(InputFilterInterface $inputFilter)
    {
        throw new \Exception("Not used");
    }

    public function getInputFilter()
    {
        if (!$this->inputFilter)
        {
            $inputFilter = new InputFilter();
            $factory     = new InputFactory();

            $inputFilter->add($factory->createInput(array(
                'name'     => 'name',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),

                'validators' => array(
                    array(
                        'name'    => 'StringLength',
                        'options' => array(
                            'encoding' => 'UTF-8',
                            'min'      => 5,
                            'max'      => 255,
                            'messages' => array(
                                \Zend\Validator\StringLength::TOO_LONG => 'Der angebe text ist zu lang',
                                \Zend\Validator\StringLength::TOO_SHORT => 'Der angebe text ist zu Kurz mindestes 5 Zeichen',
                            )
                        ),
                    ),
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Bitte ausfüllen',
                            ),
                        ),
                    ),
                ),
            )));

            $inputFilter->add($factory->createInput(array(
                'name'     => 'datum',
                'required' => true,
                'filters'  => array(
                    array('name' => 'StripTags'),
                    array('name' => 'StringTrim'),
                ),
                'validators' => array(
                    array(
                        'name'    => 'Date',
                        'options' => array(
                            'format' =>'d.m.Y',
                            'message' => array(
                                \Zend\Validator\Date::INVALID_DATE => 'fehlerhaftes datum bitte korregieren',
                                \Zend\Validator\Date::FALSEFORMAT => 'fehlerhaftes Format bitte Korregieren z.b 01.01.1994',
                            ),
                        ),
                    ),
                    array(
                        'name' => 'NotEmpty',
                        'options' => array(
                            'messages' => array(
                                \Zend\Validator\NotEmpty::IS_EMPTY => 'Bitte ausfüllen',
                            ),
                        ),
                    ),
                ),
            )));

            $this->inputFilter = $inputFilter;
        }
        return $this->inputFilter;
    }

}

?>