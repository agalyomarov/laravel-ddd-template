<?php


namespace App\Presentation\Controllers;

use App\Application\DTOs\Payment\AddressDto;
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

    public function actionChangeAddress(Request $request, $clientId)
    {
        $addressDto = AddressDto::fromArray([
            "country" => "RU",
            "city" => "Moscow",
            "zip" => "123456",
            "lines" => [
                "street1",
                "street2"
            ]
        ]);
        $addressMapper = AddressMapper::fromDto($addressDto);
        $this->clientService->changeAddress(1, $addressMapper);
    }
}
