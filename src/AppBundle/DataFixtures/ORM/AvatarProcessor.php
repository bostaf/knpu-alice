<?php
/**
 * User: bostaf
 * Date: 26.06.16
 * Time: 17:41
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Character;
use Nelmio\Alice\ProcessorInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Filesystem\Filesystem;

class AvatarProcessor implements ProcessorInterface
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function preProcess($object)
    {
        if ( ! $object instanceof Character) {
            return;
        }

        if ( ! $object->getAvatarFilename()) {
            return;
        }

        $projectRoot = __DIR__ . '/../../../../';
        $targetFilename = 'fixtures_' . mt_rand(0, 100000) . 'jpg';

        $fs = new Filesystem();
        $fs->copy(
            $projectRoot . '/resources/' . $object->getAvatarFilename(),
            $projectRoot . '/web/uploads/avatars/' . $targetFilename,
            true
        );

        $this->logger->debug(sprintf(
            'Character %s using filename %s from %s',
            $object->getName(),
            $targetFilename,
            $object->getAvatarFilename()
        ));

        $object->setAvatarFilename($targetFilename);
    }

    public function postProcess($object)
    {
        // TODO: Implement postProcess() method.
    }

}