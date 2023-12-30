<?php

namespace App\Controller\Admin;

use App\Entity\MateriaDocente;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;

class MateriaDocenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MateriaDocente::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            AssociationField::new('materia'),
            AssociationField::new('docente'),
            BooleanField::new('activo')
        ];
    }
}
