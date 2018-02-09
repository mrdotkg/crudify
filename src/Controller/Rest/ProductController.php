<?php

namespace App\Controller\Rest;

use App\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @Route("/rest/product", name="product_show_all")
     * @Method({"GET"})
     * @return JsonResponse
     */
    public function index()
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findEverything();

        return new JsonResponse($product);
    }

    /**
     * @Route("/rest/product/{id}", name="product_show")
     * @Method({"GET"})
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        $product = $this->getDoctrine()
            ->getRepository(Product::class)
            ->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $id
            );
        }

        return new JsonResponse($product->value());
    }

    /**
     * @Route("/rest/product", name="product_create")
     * @Method({"PUT"})
     */
    public function create()
    {
        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to your action: index(EntityManagerInterface $em)
        $em = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(19.99);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $em->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $em->flush();

        return new Response('Saved new product with id ' . $product->getId());
    }


    /**
     * @Route("/rest/product/{id}", name="product_update")
     * @Method({"POST"})
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function update($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);

        $product->setName('New product name!');
        $em->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }

    /**
     * @Route("product/greater-than-price/{price}", name="product_gt_p")
     * @Method({"GET"})
     * @param $price
     * @return JsonResponse
     */
    public function showAllGreaterThanPrice($price)
    {
        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAllGreaterThanPrice($price);

        return new JsonResponse($products);
    }

    /**
     * @Route("/rest/product/{id}", name="product_delete")
     * @Method({"DELETE"})
     * @param $id
     * @return Response
     */
    public function delete($id)
    {
        $em = $this->getDoctrine()->getManager();
        $product = $em->getRepository(Product::class)->find($id);
        $em->remove($product);
        $em->flush();

        return new Response('You ust deleted prudct with id: ' . $id);
    }

}
