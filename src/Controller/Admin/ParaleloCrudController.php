<?php

namespace App\Controller\Admin;

use App\Entity\Paralelo;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ParaleloCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Paralelo::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('nombre'),
            AssociationField::new('curso'),
            BooleanField::new('activo')
        ];
    }

}
