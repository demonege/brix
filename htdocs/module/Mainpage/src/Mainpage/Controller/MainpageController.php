<?php

namespace Mainpage\Controller;

use Mainpage\Form\KontaktForm;
use Mainpage\Model\Kontakt;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class MainpageController extends AbstractActionController
{

    public function indexAction()
    {

        $view = new ViewModel();

        $verkauf = new ViewModel();
        $verkauf->setTemplate('mainpage/mainpage/verkauf');

        $angebot = new ViewModel();
        $angebot->setTemplate('mainpage/mainpage/angebot');

        $kontakt = new ViewModel();
        $kontakt->setTemplate('mainpage/mainpage/kontakt');

        $galery = new ViewModel();
        $galery->setTemplate('mainpage/mainpage/galery');

        $kontakt->setVariable('form', $this->getContactForm());

        $view->addChild($verkauf, 'verkauf')
             ->addChild($angebot, 'angebot')
             ->addChild($kontakt, 'kontakt')
             ->addChild($galery, 'galery');

        return $view;
    }

    private function getContactForm()
    {
        $form = new KontaktForm();
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $kontakt = new Kontakt();

            $form->setInputFilter($kontakt->getInputFilter());
            $form->setData($request->getPost());
            $formdata = $request->getPost();
            $kontakt->validation($formdata);
//            if($form->isValid())
//            {
//                die('alles valide');
//            }
        }

        return $form;
    }

    public function verkaufAction()
    {
    }

    public function angebotAction()
    {
    }

    public function galeryAction()
    {

    }

    public function kontaktAction()
    {

    }

    public function layerAction()
    {
        $layer = new ViewModel();
        $layer->setTerminal(true);

        return $layer;
    }
}
?>