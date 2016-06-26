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

    public function avatar()
    {
        $names = array(
            'kitten1.jpg',
            'kitten2.jpg',
            'kitten3.jpg',
            'kitten4.jpg',
        );

        return $names[array_rand($names)];
    }

    protected function getProcessors()
    {
        return array(
            new AvatarProcessor($this->container->get('logger'))
        );
    }


}