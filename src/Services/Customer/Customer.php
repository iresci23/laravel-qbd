<?php
namespace Iresci23\LaravelQbd\Services\Customer;

use Illuminate\Support\Facades\Log;

class Customer
{
	/**
	 * Issue a request to QuickBooks to add a customer
	 */
	public static function xmlRequest($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $version, $locale)
	{
		// Do something here to load data using your model
		
		// Build the qbXML request from $data
		$xml = '<?xml version="1.0" encoding="utf-8"?>
		<?qbxml version="2.0"?>
		<QBXML>
			<QBXMLMsgsRq onError="stopOnError">
				<CustomerAddRq requestID="' . $requestID . '">
					<CustomerAdd>
						<Name>Irelene C (' . mt_rand() . ')</Name>
						<CompanyName>Irelene C </CompanyName>
						<FirstName>Keith</FirstName>
						<LastName>Palmer</LastName>
						<BillAddress>
							<Addr1>ConsoliBYTE, LLC</Addr1>
							<Addr2>134 Stonemill Road</Addr2>
							<City>Mansfield</City>
							<State>CT</State>
							<PostalCode>06268</PostalCode>
							<Country>United States</Country>
						</BillAddress>
						<Phone>860-634-1602</Phone>
						<AltPhone>860-429-0021</AltPhone>
						<Fax>860-429-5183</Fax>
						<Email>Keith@ConsoliBYTE.com</Email>
						<Contact>Keith Palmer</Contact>
					</CustomerAdd>
				</CustomerAddRq>
			</QBXMLMsgsRq>
		</QBXML>';
	
		return $xml;
	}

	/**
	 * Handle a response from QuickBooks indicating a new customer has been added
	 */	
	public static function xmlResponse($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents)
	{
		// Do something here to record that the data was added to QuickBooks successfully 
		Log::info(print_r(array($requestID, $user, $action, $ID, $extra, &$err, $last_action_time, $last_actionident_time, $xml, $idents), true));
		return true; 
	}
}