<?php
    abstract class Produtos{ 


        protected $nome;
        protected $preco;
        protected $qtdEstoque;
        protected $cadastro;

        protected function __construct(string $nome, float $preco, int $qtdEstoque, string $cadastro){
            $this->nome = $nome;
            $this->preco = $preco;
            $this->qtdEstoque = $qtdEstoque;
            $this->cadastro = $cadastro;
            }
        public function getNome() {
            return $this->nome;
            }
        public function getpreco() {
            return $this->preco;
            }
        public function getqtdEstoque() {
            return $this->qtdEstoque;     
            }
        public function getcadastro(){
            return $this->cadastro;
            }   
        abstract public function baixarEstoque(int $qtdEstoque): void;
    }
    abstract class Clientes{
        
        protected $nome;
        protected $tipo;

        public function __construct(string $nome, string $tipo){
           $this->nome = $nome;
           $this->tipo = $tipo;
            }

        public function getNome(){
            return $this->nome;
        }

        abstract public function getDesconto();
    }
    class ClienteComum extends Clientes{

        public function __construct(string $nome){
            parent::__construct($nome,"comum");
        }
        
        public function getDesconto(){
            return 0;
        }
    }
    class ClienteVip extends Clientes{

        public function __construct(string $nome){
            parent::__construct($nome,"vip");
        }
        
        public function getDesconto(){
            return 0.10;
        }
    }
$cliente1 = new ClienteComum("Pedro");
$cliente2 = new ClienteVip("Carlos");

echo $cliente1->getNome()."-Desconto: ". 
($cliente1->getDesconto()* 100). "%<br>";

echo $cliente2->getNome()."-Desconto: ". 
($cliente2->getDesconto()* 100). "%";
?>