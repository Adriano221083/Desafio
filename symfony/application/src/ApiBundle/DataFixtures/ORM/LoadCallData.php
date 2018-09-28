<?php

namespace GameBundle\DataFixtures\ORM;

use ApiBundle\Entity\Call;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadCallData
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\DataFixtures\ORM
 */
class LoadCallData extends AbstractFixture implements OrderedFixtureInterface
{
    private $callData = [
        ['011', '016', 1.90],
        ['016', '011', 2.90],
        ['011', '017', 1.70],
        ['017', '011', 2.70],
        ['011', '018', 0.90],
        ['018', '011', 1.90],
    ];

    /**
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        foreach ($this->callData as $callDatum) {
            $call = new Call();
            $call
                ->setOrigin($callDatum[0])
                ->setDestination($callDatum[1])
                ->setRate($callDatum[2]);

            $manager->persist($call);
        }

        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 1;
    }
}