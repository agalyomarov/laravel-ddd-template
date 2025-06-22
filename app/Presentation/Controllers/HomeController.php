<?php


namespace App\Presentation\Controllers;

use App\Domain\Payment\Contracts\Service\InvoiceServiceInterface;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function __construct(

        private InvoiceServiceInterface $invoiceService
    ) {}
    public function index(Request $request)
    {
        $invoice_id = $this->invoiceService->create(1);
        return $invoice_id;
    }
}
