<?php

namespace Controllers;

use Interop\Container\ContainerInterface;
use \Services;

class Checkout {

    protected $view;

    public function __construct(ContainerInterface $ci) {
        $this->view = $ci->view;
    }

    public function getCartPage ($request, $response, $args) {
        $viewData['metaTitle'] = Services\Util::getMetaTitle('cart');
        $viewData['globals'] = $request->getAttribute('globals');
        return $this->view->render($response, '/checkout/cart.twig', $viewData);
    }

    public function getCheckoutPage ($request, $response, $args) {
        $viewData['metaTitle'] = Services\Util::getMetaTitle('checkout');
        $viewData['globals'] = $request->getAttribute('globals');
        return $this->view->render($response, '/checkout/page.twig', $viewData);
    }
}