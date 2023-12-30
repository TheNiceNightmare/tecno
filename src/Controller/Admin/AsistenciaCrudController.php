<?php

namespace App\Controller\Admin;

use App\Entity\Asistencia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TimeField;

class AsistenciaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Asistencia::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            DateField::new('fecha'),
            TimeField::new('hora'),
            AssociationField::new('estudianteParalelo'),
            AssociationField::new('paraleloMateria'),
            AssociationField::new('materiaDocente')
        ];
    }
}
