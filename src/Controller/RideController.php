<?php

namespace App\Controller;

use App\Entity\Ride;
use App\Form\RideType;
use App\Repository\RideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ride")
 */
class RideController extends AbstractController
{
    /**
     * @Route("/", name="ride_index", methods={"GET"})
     */
    public function index(RideRepository $rideRepository): Response
    {
        return $this->render('ride/index.html.twig', [
            'rides' => $rideRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ride_new", methods={"GET","POST"})
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
     */
    public function show(Ride $ride): Response
    {
        return $this->render('ride/show.html.twig', [
            'ride' => $ride,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ride_edit", methods={"GET","POST"})
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
}
