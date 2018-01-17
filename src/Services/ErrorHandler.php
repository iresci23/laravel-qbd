<?php
namespace Iresci23\LaravelQbd\Services;

use Illuminate\Support\Facades\Log;

class ErrorHandler
{
	/**
	 * Catch and handle errors from QuickBooks
	 */		
	public static function catchallErrors($requestID, $user, $action, $ID, $extra, &$err, $xml, $errnum, $errmsg)
	{
		Log::error(print_r(array($err,$errnum, $errmsg), true));
		return true;
	}
}