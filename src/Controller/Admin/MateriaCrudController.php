<?php

namespace App\Controller\Admin;

use App\Entity\Materia;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MateriaCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Materia::class;
    }

}
