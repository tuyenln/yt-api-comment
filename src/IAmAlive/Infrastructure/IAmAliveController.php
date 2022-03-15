<?php

namespace App\IAmAlive\Infrastructure;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class IAmAliveController extends AbstractController
{
    public function index(Request $request): Response
    {
        return new Response('i-am-alive');
    }
}