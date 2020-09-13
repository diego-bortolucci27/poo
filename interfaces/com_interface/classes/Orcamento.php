<?php
	
	/*
		A classe Orcamento foi alterada para utilizar o conceito de interfaces, onde terá o papel de classe que "depende" da interface OrcavelInterface, ajustamos o método adiciona(), para indicar que esse método não precisa mais que o parâmetro recebido seja necessariamente do tipo Produto, mas sim do tipo OrcavelInterface.

		Isso mesmo, uma interface também é um tipo. Como indicamos a interface como parâmetro significa que em tempo de execução podemos passar como parâmetro qualquer objeto que implemente essa interface (ex.: Produto, Serviço). Essa nova relação entre Orcamento e OrcavelInterface caracteriza um acoplamento do tipo dinâmico é prefeível ao estático, demonstrado no exemplo anterior (pasta "sem interface"). 

		As vantagens do uso de interfaces não param por aí. Além de diminuir o acoplamento, permite que acrescentamos novas classes que possam ser acrescidas em um orçamento, sem a necessidade de reescrever a classe Orcamento. 

		Basta criar uma nova classe que implementa a interface requerida "OrcavelInterface". Essa característica melhora muito a questão do recuso de software.
	*/

	class Orcamento
	{
		private $itens;

		public function adiciona(OrcavelInterface $item, $qtd)
		{
			$this->itens[] = array($qtd, $item);
		}

		public function calculaTotal()
		{
			$total = 0;
			foreach ($this->itens as $item)
			{
				$total += ($item[0] * $item[1]->getPreco());
			}

			return $total;
		}
	}
?>