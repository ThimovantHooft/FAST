<?php

namespace App\Repository;

use App\Entity\Donatie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Donatie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Donatie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Donatie[]    findAll()
 * @method Donatie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DonatieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Donatie::class);
    }

    // /**
    //  * @return Donatie[] Returns an array of Donatie objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Donatie
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
