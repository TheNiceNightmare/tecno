<?php

namespace App\Repository;

use App\Entity\EstudianteParalelo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EstudianteParalelo>
 *
 * @method EstudianteParalelo|null find($id, $lockMode = null, $lockVersion = null)
 * @method EstudianteParalelo|null findOneBy(array $criteria, array $orderBy = null)
 * @method EstudianteParalelo[]    findAll()
 * @method EstudianteParalelo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EstudianteParaleloRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EstudianteParalelo::class);
    }

    public function save(EstudianteParalelo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(EstudianteParalelo $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return EstudianteParalelo[] Returns an array of EstudianteParalelo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('e.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?EstudianteParalelo
//    {
//        return $this->createQueryBuilder('e')
//            ->andWhere('e.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
