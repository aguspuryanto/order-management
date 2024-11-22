<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Order extends BaseController
{
    public function index()
    {
        $orderModel = new \App\Models\OrderModel();
        $orders = $orderModel->findAll();
        return view('order/index', ['orders' => $orders]);
    }

    public function create()
    {
        if ($this->request->getMethod() === 'post') {
            $orderModel = new \App\Models\OrderModel();
            $orderModel->insert($this->request->getPost());
            return redirect()->to('/orders');
        }
        return view('order/create');
    }

}
