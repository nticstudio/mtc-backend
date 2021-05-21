<?php

namespace App\Repository;

use App\Entity\Zoneval;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Zoneval|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zoneval|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zoneval[]    findAll()
 * @method Zoneval[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZonevalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Zoneval::class);
    }

    // /**
    //  * @return Zoneval[] Returns an array of Zoneval objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Zoneval
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
