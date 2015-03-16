<?php

namespace Mainpage\Controller;

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

        $view->addChild($verkauf, 'verkauf')
             ->addChild($angebot, 'angebot')
             ->addChild($kontakt, 'kontakt')
             ->addChild($galery, 'galery');

        return $view;

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


}
?>