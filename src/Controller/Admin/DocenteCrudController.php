<?php

namespace App\Controller\Admin;

use App\Entity\Docente;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DocenteCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Docente::class;
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
