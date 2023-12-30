<?php

namespace App\Controller\Admin;

use App\Entity\EstudianteParalelo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class EstudianteParaleloCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EstudianteParalelo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('estudiante'),
            AssociationField::new('paralelo'),
            BooleanField::new('activo')
        ];
    }
}
