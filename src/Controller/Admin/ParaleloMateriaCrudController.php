<?php

namespace App\Controller\Admin;

use App\Entity\ParaleloMateria;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class ParaleloMateriaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ParaleloMateria::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('paralelo'),
            AssociationField::new('materia'),
            BooleanField::new('activo')
        ];
    }
}
