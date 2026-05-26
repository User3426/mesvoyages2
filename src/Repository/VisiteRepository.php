<?php

namespace App\Repository;

use App\Entity\Visite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Visite>
 */
class VisiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Visite::class);
    }
    
    /**
     * Retourne toutes les visites triées sur un champ
     * @param type $champs
     * @param type $ordre
     * @return Visite[]
     */
    public function findAllOrderBy($champs, $ordre): array{
        return $this->createQueryBuilder('v')
                ->orderBy('v.'.$champs, $ordre)
                ->getQuery()
                ->getResult();
    }
}
