<?php

namespace App\Controller\Admin;

use App\Entity\Asistencia;
use App\Entity\Curso;
use App\Entity\Docente;
use App\Entity\Estudiante;
use App\Entity\EstudianteParalelo;
use App\Entity\Materia;
use App\Entity\MateriaDocente;
use App\Entity\Paralelo;
use App\Entity\ParaleloMateria;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        //return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(CursoCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('some/path/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Asistencia Wong');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('Cursos', 'fas fa-layer-group', Curso::class);
        yield MenuItem::linkToCrud('Paralelos', 'fas fa-map-signs', Paralelo::class);
        yield MenuItem::linkToCrud('Docentes', 'fas fa-user-tie', Docente::class);
        yield MenuItem::linkToCrud('Estudiantes', 'fas fa-user-graduate', Estudiante::class);
        yield MenuItem::linkToCrud('Materias', 'fas fa-book', Materia::class);
        yield MenuItem::linkToCrud('Asistencia', 'fas fa-tasks', Asistencia::class);
        yield MenuItem::linkToCrud('Estudiante - Paralelo', 'fas fa-street-view', EstudianteParalelo::class);
        yield MenuItem::linkToCrud('Paralelo - Materia', 'fas fa-book-atlas', ParaleloMateria::class);
        yield MenuItem::linkToCrud('Materia - Docente', 'fas fa-book-open-reader', MateriaDocente::class);
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}
