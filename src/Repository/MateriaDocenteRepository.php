<?php

namespace App\Repository;

use App\Entity\MateriaDocente;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<MateriaDocente>
 *
 * @method MateriaDocente|null find($id, $lockMode = null, $lockVersion = null)
 * @method MateriaDocente|null findOneBy(array $criteria, array $orderBy = null)
 * @method MateriaDocente[]    findAll()
 * @method MateriaDocente[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MateriaDocenteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MateriaDocente::class);
    }

    public function save(MateriaDocente $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(MateriaDocente $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return MateriaDocente[] Returns an array of MateriaDocente objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?MateriaDocente
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
