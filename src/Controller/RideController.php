<?php

namespace App\Controller;

use App\Entity\Ride;
use App\Form\RideType;
use App\Form\SearchType;
use App\Repository\RideRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

/**
 * @Route("/ride")
 */
class RideController extends AbstractController
{
    /**
     * @Route("/", name="ride_index", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function index(RideRepository $rideRepository): Response
    {
        return $this->render('ride/index.html.twig', [
            'rides' => $rideRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ride_new", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function new(Request $request): Response
    {
        $ride = new Ride();
        $form = $this->createForm(RideType::class, $ride);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ride);
            $entityManager->flush();

            return $this->redirectToRoute('ride_index');
        }

        return $this->render('ride/new.html.twig', [
            'ride' => $ride,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ride_show", methods={"GET"})
     * @IsGranted("ROLE_USER")
     */
    public function show(Ride $ride): Response
    {
        return $this->render('ride/show.html.twig', [
            'ride' => $ride,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ride_edit", methods={"GET","POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function edit(Request $request, Ride $ride): Response
    {
        $form = $this->createForm(RideType::class, $ride);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ride_index');
        }

        return $this->render('ride/edit.html.twig', [
            'ride' => $ride,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ride_delete", methods={"POST"})
     * @IsGranted("ROLE_ADMIN")
     */
    public function delete(Request $request, Ride $ride): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ride->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ride);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ride_index');
    }


      /**
     * @Route("/search/s", name="ride_search")
     * @IsGranted("ROLE_USER")
     */
    public function search(Request $request): Response
    {
        //dd('ici');
        $form = $this->createForm(SearchType::class);
        
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $task = $form->getData();

            
            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
            // $entityManager = $this->getDoctrine()->getManager();
            // $entityManager->persist($task);
            // $entityManager->flush();

            // return $this->redirectToRoute('task_success');
        }

        return $this->render('ride/search.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
