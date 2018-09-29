<?php

namespace ApiBundle\Repository;

use ApiBundle\Entity\Call;
use ApiBundle\Entity\CityCode;
use Doctrine\ORM\EntityRepository;

/**
 * CallRepository
 */
class CallRepository extends EntityRepository
{
    /**
     * @param CityCode $origin
     * @param CityCode $destination
     * @return null|object
     */
    public function findByOriginAndDestination(CityCode $origin, CityCode $destination)
    {
        return $this
                ->getEntityManager()
                ->getRepository(Call::class)
                ->findOneBy(['origin' => $origin, 'destination' => $destination]);
    }
}