<?php
	
	/*
		Um orçamento é composto de itens. Inicialmente poderemos orçar produtos. 

		Então vamos criar uma classe Orçamento que terá uma agragação com Produto. A classe Orçamento contém um método adiciona() que recebe um objeto de classe Produto, bem como a quantidade a ser adicionada. Cada produto adicionado é acrescido ao final do vetor $itens. A classe Orcamento também contém o método calculaTotal() que retorna o total de itens incluídos no orçamento.
	*/

	class Orcamento
	{
		private $itens;

		public function adiciona(Produto $produto, $qtd)
		{
			$this->itens[] = array($qtd, $produto);
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