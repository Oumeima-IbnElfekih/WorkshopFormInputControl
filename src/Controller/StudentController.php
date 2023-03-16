<?php

namespace App\Controller;

use App\Entity\Student;
use App\Form\StudentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StudentController extends AbstractController
{
    #[Route('/student', name: 'app_student')]
    public function index(): Response
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    #[Route('/student/add', name: 'student_add')]
    public function addStudent(ManagerRegistry $doctrine,Request $req): Response {
        $em = $doctrine->getManager();
        $student = new Student();
        $form = $this->createForm(StudentType::class,$student);
        $form->handleRequest($req);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($student);
            $em->flush();
            return $this->redirectToRoute('student_add');
        }

        return $this->renderForm('student/add.html.twig',['form'=>$form]);
    }
}
