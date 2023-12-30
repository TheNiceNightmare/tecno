<?php

namespace App\Repository;

use App\Entity\ParaleloMateria;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ParaleloMateria>
 *
 * @method ParaleloMateria|null find($id, $lockMode = null, $lockVersion = null)
 * @method ParaleloMateria|null findOneBy(array $criteria, array $orderBy = null)
 * @method ParaleloMateria[]    findAll()
 * @method ParaleloMateria[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ParaleloMateriaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ParaleloMateria::class);
    }

    public function save(ParaleloMateria $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ParaleloMateria $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ParaleloMateria[] Returns an array of ParaleloMateria objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ParaleloMateria
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
