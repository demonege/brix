<?php

namespace Mainpage\Controller;

use Mainpage\Form\KontaktForm;
use Mainpage\Model\Kontakt;
use Mainpage\Model\Calender;
use Mainpage\Form\CalenderForm;
use Mainpage\Model\SendMail;
use Mainpage\Model\CalenderData;
use Mainpage\Model\Event;
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

        $kalenderberreich = new ViewModel();
        $kalenderberreich->setTemplate('mainpage/mainpage/kalenderberreich');

        $kontakt->setVariable('form', $this->getContactForm());

        $view->addChild($verkauf, 'verkauf')
             ->addChild($angebot, 'angebot')
             ->addChild($kontakt, 'kontakt')
             ->addChild($galery, 'galery')
             ->addChild($kalenderberreich,'kalenderberreich');

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
            if($form->isValid())
            {
                $emailfields = $this->getRequest()->getPost();
                $message = new SendMail($emailfields);
            }
        }

        return $form;
    }

    private function getCalenderForm()
    {
        $form = new CalenderForm();
        $request = $this->getRequest();
        if ($request->isPost())
        {
            $kalender = new Calender();
            $form->setInputFilter($kalender->getInputFilter());
            $form->setData($request->getPost());
            if($form->isValid())
            {
                $fieldData = $this->getRequest()->getPost();
                $Data = new CalenderData($fieldData);
            }
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

    public function kalenderberreichAction()
    {

    }

    public function layerAction()
    {
        $layer = new ViewModel();
        $layer->setTerminal(true);

        return $layer;
    }

    public function kalenderSaveAction()
    {
        $kalenderSave = new ViewModel();
        $kalenderSave->setTerminal(true);
        $kalenderSave->setVariable('form', $this->getCalenderForm());
        return $kalenderSave;
    }

    public function kalenderEventAction()
    {

        $data = $this->getRequest()->getPost();
        $event = new Event($data[0]);
        $resulte = $event->getSelect();
        $jsonData = json_encode($resulte[0]);

        if ($jsonData) {
            echo $jsonData;
        }
        else {
            echo '{}';
        }
        exit;
    }
}
?>