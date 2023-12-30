<?php

namespace App\Controller\Admin;

use App\Entity\Estudiante;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class EstudianteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Estudiante::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
