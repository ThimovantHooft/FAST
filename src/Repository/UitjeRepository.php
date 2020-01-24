<?php

namespace App\Repository;

use App\Entity\Uitje;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Uitje|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uitje|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uitje[]    findAll()
 * @method Uitje[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UitjeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Uitje::class);
    }

    // /**
    //  * @return Uitje[] Returns an array of Uitje objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uitje
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
