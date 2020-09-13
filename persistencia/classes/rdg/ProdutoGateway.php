<?php

	class ProdutoGateway
	{
		private static $conn;
		private $data;

		public static function setConnection(PDO $conn)
		{
			self::$conn = $conn;
		}

		public function find($id)
		{
			$sql = "SELECT * FROM produto WHERE id = '$id'";
			print "$sql <br>";
			$result = self::$conn->query($sql);
			return $result->fetchObject(__CLASS__);
		}

		public function all($filter = '')
		{
			$sql = "SELECT * FROM produto";
			if($filter)
			{
				$sql .= "where $filter";
			}
			print "$sql <br>";
			$result = self::$conn->query($sql);
			return $result->fetchAll(PDO:: FETCH_CLASS, __CLASS__);
		}

		public function delete()
		{
			$sql = "DELETE FROM produto WHERE id = '$id'";
			print "$sql <br>";
			return self::$conn->query($sql);
		}

		public function save()
		{
			if(empty($this->data['id']))
			{
				$id = $this->getLastId() + 1;
				$sql = "INSERT INTO produto (id, descricao, estoque, preco_custo, preco_venda, codigo_barras, data_cadastro, origem) VALUES (
				'{$id}', " .
				"'{$this->descricao}', " .
				"'{$this->estoque}', " .
				"'{$this->preco_custo}', " .
				"'{$this->preco_venda}', " .
				"'{$this->codigo_barras}', " .
				"'{$this->data_cadastro}', " .
				"'{$this->origem}')";
			}
			else
			{
				$sql = "UPDATE produto SET descricao = '{$this->descricao}' ," .
				" estoque = '{$this->estoque}'," .
				" preco_custo = '{$this->preco_custo}'," .
				" preco_venda = '{$this->preco_venda}'," .
				" codigo_barras = '{$this->codigo_barras}'," .
				" data_cadastro = '{$this->data_cadastro}'," .
				" origem = '{$this->origem}' " .
				"WHERE id = '{$this->id}'";
			}
			print "$sql <br>";
			return self::$conn->exec($sql); // Executa o insert se não tiver o id, ou executa o update se tem id.
		}

		private function getLastId()
		{
			$sql = "SELECT max(id) as max FROM produto";
			$result = self::$conn->query($sql);
			$data = $result->fetch(PDO::FETCH_OBJ);
			return $data->max;
		}
	}
?>