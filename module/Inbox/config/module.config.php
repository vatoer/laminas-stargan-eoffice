<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Inbox;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'router' => [
        'routes' => [
            'inbox' => [
                'type'    => Literal::class,
                'options' => [
                    'route'    => '/inbox',
                    'defaults' => [
                        '__NAMESPACE__' => 'Inbox\Controller',
                        'controller' => Controller\IndexController::class,
                        'action'     => 'index',
                    ],
                ],

                // The following allows "/news" to match on its own if no child
                // routes match:
                'may_terminate' => true,

                // Child routes begin:
                'child_routes' => [
                    'tes' => [
                        'type' => \Laminas\Router\Http\Segment::class,
                        'options' => [
                            'route'    => '/tes[/:year]',
                            'defaults' => [
                                'action' => 'tes',
                            ],
                            'constraints' => [
                                'year' => '\d{4}',
                            ],
                        ],
                    ],
                    // child with  diffirent controller
                    'other' => [
                        'type' => \Laminas\Router\Http\Segment::class,
                        'options' => [
                            'route'    => '/other[/:action[/:a[/:b[/:c]]]]',
                            'defaults' => [
                                'controller' => Controller\OtherController::class,
                                'action' => 'index',
                            ],
                            'constraints' => [
                                'a' => '\d{4}',
                            ],
                        ],
                    ],
                ],

            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class,
            Controller\OtherController::class => InvokableFactory::class,
        ],
        'aliases' => [
            //
            //'index'=>Controller\IndexController::class
        ]
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'template_map' => [
            'layout/layout-inbox'           => __DIR__ . '/../view/layout/layout.phtml',
            'inbox/index/index' => __DIR__ . '/../view/inbox/index/index.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
