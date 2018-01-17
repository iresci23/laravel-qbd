<?php

return [
	// Map QuickBooks actions to handle functions
	'actions'	=> [
		QUICKBOOKS_ADD_CUSTOMER	=> [
    		[ Iresci23\LaravelQbd\Services\Customer\Customer::class, 'xmlRequest' ],
    		[ Iresci23\LaravelQbd\Services\Customer\Customer::class, 'xmlResponse' ]
		]
	]

];