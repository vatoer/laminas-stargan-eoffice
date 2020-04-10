<?php

/**
 * @see       https://github.com/laminas/laminas-mvc-skeleton for the canonical source repository
 * @copyright https://github.com/laminas/laminas-mvc-skeleton/blob/master/COPYRIGHT.md
 * @license   https://github.com/laminas/laminas-mvc-skeleton/blob/master/LICENSE.md New BSD License
 * @see       https://docs.laminas.dev/tutorials/getting-started/modules/#autoloading
 */

declare(strict_types=1);

namespace ModuleName;

class Module
{
    public function getConfig() : array
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}
