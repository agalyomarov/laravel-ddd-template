<?php


namespace App\Presentation\Controllers;

use App\Application\DTOs\Payment\AddressMapper;
use App\Domain\Payment\Contracts\Service\ClientServiceInterface;
use App\Domain\Payment\Contracts\Service\InvoiceServiceInterface;
use Illuminate\Http\Request;


class HomeController extends Controller
{

    public function __construct(

        private InvoiceServiceInterface $invoiceService,
        private ClientServiceInterface $clientService
    ) {}
    public function index(Request $request)
    {
        $invoice_id = $this->invoiceService->create(1);
        return $invoice_id;
    }

    public function actionChangeAddress(Request $request, int $clientId = 2)
    {
        // $validated = $request->validate([
        //     'country' => 'required|string',
        //     'city' => 'required|string',
        //     'zip' => 'required|string',
        //     'lines' => 'required|array'
        // ]);

        $address  = AddressMapper::fromArray([
            "country" => "RU",
            "city" => "Moscow",
            "zip" => "123456",
            "lines" => [
                "street1",
                "street2"
            ]
        ]); //ValueObject Address
        $this->clientService->changeAddress($clientId, $address);
    }
}
