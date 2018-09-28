<?php

namespace GameBundle\DataFixtures\ORM;

use ApiBundle\Entity\Plan;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class LoadPlanData
 * @author Rafael Silveira <rsilveiracc@gmail.com>
 * @package ApiBundle\DataFixtures\ORM
 */
class LoadPlanData extends AbstractFixture implements OrderedFixtureInterface
{
    private $planData = [
        ['FaleMais 30', 30],
        ['FaleMais 60', 60],
        ['FaleMais 120', 120]
    ];

    /**
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {

        foreach ($this->planData as $planDatum) {
            /** @var Plan $call */
            $plan = new Plan();
            $plan
                ->setName($planDatum[0])
                ->setRate($planDatum[1]);

            $manager->persist($plan);
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