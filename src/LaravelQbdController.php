<?php
namespace Iresci23\LaravelQbd;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Iresci23\LaravelQbd\LaravelQbd;
use Illuminate\Support\Facades\Log;

class LaravelQbdController extends Controller
{
    protected $QBD;

    public function __construct()
    {  
        $this->QBD  = new LaravelQbd;
    	
        $this->QBD->connect();
    	
    }

    public function initQBWC(Request $request){

        $response = $this->QBD->initServer(false, false); //$return,$debug

        $contentType = 'text/plain';

        if($request->isMethod('post'))
        {
            $contentType = 'text/xml';
        }
        elseif($request->input('wsdl') !== null or $request->input('WSDL') !== null)
        {
            $contentType = 'text/xml';
        }

        if($contentType == 'text/xml'){
            $tidy = new \tidy();
            $response = $tidy->repairString($response, ['input-xml'=> 1, 'indent' => 0, 'wrap' => 0]);
        }

        // Uncomment log if you want to see the request headers submitted from WebConnector
        // Log::info(print_r(getallheaders(), true));

        return response($response,200)->header('Content-Type', $contentType);

    }

    public function generateQWC(){

        $xml = $this->QBD->generateQWC();

        // header('Content-type: text/xml');
        // print($xml);
        // exit;

        return response($xml,200)
                        ->header('Content-Type', 'text/xml')
                        ->header('Content-Disposition', 'attachment; filename="my-quickbooks-wc-file.qwc"'); // Send as a file download
        
    }

    public function testForm(){

    	return view('qbd::example');
    }

    public function addCustomer(Request $request){

        $this->QBD->enqueue(QUICKBOOKS_ADD_CUSTOMER, $request->input('id'));

    }
}
