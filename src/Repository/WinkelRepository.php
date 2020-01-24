<?php

namespace App\Repository;

use App\Entity\Winkel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Winkel|null find($id, $lockMode = null, $lockVersion = null)
 * @method Winkel|null findOneBy(array $criteria, array $orderBy = null)
 * @method Winkel[]    findAll()
 * @method Winkel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WinkelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Winkel::class);
    }

    // /**
    //  * @return Winkel[] Returns an array of Winkel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Winkel
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
