<?php

	namespace Hcode\PagSeguro;

	class Bank {

		private $name;

		public function __construct(string $name)
		{

			if (!$name)
			{

				throw new Exception("Informe o nome do Banco");
				
			}

			$this->name = $name;
			
		}

	}

?>