<?php

namespace Louvre\BilletterieBundle\Repository;

use Louvre\BilletterieBundle\Entity\Tarif;

/**
 * TarifRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class TarifRepository extends \Doctrine\ORM\EntityRepository
{
    /**
     * @return Tarif
     */
    public function getTarif($age)
    {
        $qb = $this
            ->createQueryBuilder('t')
            ->where('t.ageMini <= :age')
            ->andWhere('t.ageMaxi > :age')
            ->setParameter('age', $age)
        ;
        return $qb
            ->getQuery()
            ->getSingleResult()
            ;
    }

    /**
     * @return Tarif
     */
    public function getTarifReduit()
    {
        $qb = $this
            ->createQueryBuilder('t')
            ->where('t.libelle = :reduit')
            ->setParameter('reduit', "Réduit")
        ;
        return $qb
            ->getQuery()
            ->getSingleResult()
            ;
    }
}
