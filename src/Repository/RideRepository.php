<?php

namespace App\Repository;

use App\Entity\Ride;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Ride|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ride|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ride[]    findAll()
 * @method Ride[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RideRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ride::class);
    }

     /**
     * @return Ride[] Returns an array of Ride objects
      */
    
    public function findByExampleField($value1,$value2)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.pick_up_from = :val  ')
            ->setParameter('val', $value1)
            ->andWhere('r.drop_to = :val2')
            ->setParameter('val2',$value2)
            ->orderBy('r.pick_up_time', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    public  function findByLocation($val1,$val2)
    {
        $entityManager = $this->getEntityManager();

        $query = $entityManager->createQuery(
            'SELECT r
            FROM App\Entity\Ride r
            WHERE r.pick_up_from = :val1 and r.drop_to = :val2
            ORDER BY r.pick_up_time ASC'
        )->setParameter('val1', $val1)
         ->setParameter('val2', $val2);

        // returns an array of Product objects
        return $query->getResult();
    }
    

    /*
    public function findOneBySomeField($value): ?Ride
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
