<?php

	namespace Hcode\PagSeguro\CreditCard;

    use Exception;
    use DOMDocument;
    use DOMElement;
    use Hcode\PagSeguro\Config;

	class Installment {

		private $quantity;
		private $value;

		public function __construct(int $quantity, int $value)
		{

			if ($quantity < 1 || $quantity > Config::MAX_INSTALLMENT)
			{

				throw new Exception("Número de parcelas inválida");
				
			}

			if ($value <= 0)
			{

				throw new Exception("Valor total inválido.");
				
			}

			$this->quantity = $quantity;
			$this->value = $value;

		}

        public function getDOMElement():DOMElement
        {

            $dom = new DOMDocument();

            $installment = $dom->createElement("installment");
            $installment = $dom->appendChild($installment);

            $quantity = $dom->createElement("quantity", $this->quantity);
            $quantity = $installment->appendChild($quantity);

            $value = $dom->createElement("value", number_format($this->value, 2, ".", ""));
            $value = $installment->appendChild($value);

            $noInterestInstallmentQuantity = $dom->createElement("noInterestInstallmentQuantity", Config::MAX_INSTALLMENT_NO_INTEREST);
            $noInterestInstallmentQuantity = $installment->appendChild($noInterestInstallmentQuantity);

            return $installment;
            
        }

	}

?>