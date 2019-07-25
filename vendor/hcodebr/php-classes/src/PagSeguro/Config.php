<?php

	namespace Hcode\PagSeguro;

	class Config {

		const SANDBOX = true;

		const SANDBOX_EMAIL = "marjorie-humberto@hotmail.com";
		const PRODUCTION_EMAIL = "marjorie-humberto@hotmail.com";

		const SANDBOX_TOKEN = "F7F54BB6DE4644BDBC025671AE847E32";
		const PRODUCTION_TOKEN = "";

		const SANDBOX_SESSIONS = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
		const PRODUCTION_SESSIONS = "https://ws.pagseguro.uol.com.br/v2/sessions";

		const SANDBOX_URL_JS = "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";
		const PRODUCTION_URL_JS = "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";

		const PRODUCTION_URL_TRANSACTION = "https://ws.pagseguro.uol.com.br/v2/transactions";
		const SANDBOX_URL_TRANSACTION = "https://ws.sandbox.pagseguro.uol.com.br/v2/transactions";

		const MAX_INSTALLMENT_NO_INTEREST = 10;
		const MAX_INSTALLMENT = 10;
		const NOTIFICATION_URL = "http://www.html5dev.com.br/payment/notification";

		public static function getAuthentication():array {

			if (Config::SANDBOX === true)
			{

				return [
					"email"=>Config::SANDBOX_EMAIL,
					"token"=>Config::SANDBOX_TOKEN
				];

			} else {

				return [
					"email"=>Config::PRODUCTION_EMAIL,
					"token"=>Config::PRODUCTION_TOKEN
				];

			}

		}

		public static function getUrlSessions():string {

			return (Config::SANDBOX === true) ? Config::SANDBOX_SESSIONS : PRODUCTION_SESSIONS;
			
		}

		public static function getUrlJS()
		{

			return (Config::SANDBOX === true) ? Config::SANDBOX_URL_JS : PRODUCTION_URL_JS;

		}

		public static function getUrlTransaction()
		{

			return (Config::SANDBOX === true) ? Config::SANDBOX_URL_TRANSACTION : PRODUCTION_URL_TRANSACTION;

		}

	}

?>