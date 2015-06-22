<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Mainpage\Controller\Mainpage' => 'Mainpage\Controller\MainpageController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'mainpage' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/mainpage[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Mainpage\Controller\Mainpage',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'mainpage' => __DIR__ . '/../view',
        ),
        'template_map' => array(
            'layout/layout'     => __DIR__ . '/../view/layout/layout.phtml',
            'verkauf'           => __DIR__ . '/../view/mainpage/mainpage/verkauf.phtml',
            'angebot'           =>__DIR__ . '/../view/mainpage/mainpage/angebot.phtml',
            'galery'            =>__DIR__ . '/../view/mainpage/mainpage/galery.phtml',
            'kontakt'           =>__DIR__ . '/../view/mainpage/mainpage/kontakt.phtml',
            'kalenderberreich'  =>__DIR__ . '/../view/mainpage/mainpage/kalenderberreich.phtml',
        ),
    ),
);
?>