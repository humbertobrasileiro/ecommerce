<?php

	namespace Hcode\PagSeguro;

	use Exception;
	use DOMDocument;
	use DOMElement;

	class Address {

		private $street;
		private $number;
		private $complement;
		private $district;
		private $postalCode;
		private $city;
		private $state;
		private $country;

		public function __construct(
			string $street,
			string $number,
			string $complement,
			string $district,
			string $postalCode,
			string $city,
			string $state,
			string $country
		)
		{

			if (!$street)
			{

				throw new Exception("Informe o Logradouro do endereço.");
				
			}

			if (!$number)
			{

				throw new Exception("Informe o Número do endereço.");
				
			}

			if (!$district)
			{

				throw new Exception("Informe o Bairro do endereço.");
				
			}

			if (!$postalCode)
			{

				throw new Exception("Informe o CEP do endereço.");
				
			}

			if (!$city)
			{

				throw new Exception("Informe a Cidade do endereço.");
				
			}

			if (!$state)
			{

				throw new Exception("Informe o Estado do endereço.");
				
			}

			if (!$country)
			{

				throw new Exception("Informe o País do endereço.");
				
			}

			$this->street = $street;
			$this->number = $number;
			$this->complement = $complement;
			$this->district = $district;
			$this->postalCode = $postalCode;
			$this->city = $city;
			$this->state = $state;
			$this->country = $country;

		}

		public function getDOMElement($node = "address"):DOMElement
		{

			$dom = new DOMDocument();

			$address = $dom->createElement($node);
			$address = $dom->appendChild($address);

			$street = $dom->createElement("street", utf8_encode($this->street));
			$street = $address->appendChild($street);

			$number = $dom->createElement("number", $this->number);
			$number = $address->appendChild($number);

			$complement = $dom->createElement("complement", $this->complement);
			$complement = $address->appendChild($complement);

			$district = $dom->createElement("district", $this->district);
			$district = $address->appendChild($district);

			$postalCode = $dom->createElement("postalCode", $this->postalCode);
			$postalCode = $address->appendChild($postalCode);

			$city = $dom->createElement("city", utf8_encode($this->city));
			$city = $address->appendChild($city);

			$state = $dom->createElement("state", $this->state);
			$state = $address->appendChild($state);

			$country = $dom->createElement("country", $this->country);
			$country = $address->appendChild($country);

			return $address;
			
		}

	}

?>