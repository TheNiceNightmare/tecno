<?php

namespace App\Controller\Admin;

use App\Entity\Curso;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CursoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Curso::class;
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
