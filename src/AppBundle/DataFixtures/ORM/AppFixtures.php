<?php

namespace AppBundle\DataFixtures\ORM;

use Hautelook\AliceBundle\Alice\DataFixtureLoader;
use Nelmio\Alice\Fixtures;

class AppFixtures extends DataFixtureLoader
{
    /**
    * {@inheritDoc}
    */
    protected function getFixtures()
    {
        return  array(
            __DIR__ . '/universe.yml',
            __DIR__ . '/characters.yml',
        );
    }

    public function characterName()
    {
        $names = array(
            'Mario',
            'Luigi',
            'Sonic',
            'Pikachu',
            'Link',
            'Lara Croft',
            'Trogdor',
            'Pac-Man',
        );

        return $names[array_rand($names)];
    }
}