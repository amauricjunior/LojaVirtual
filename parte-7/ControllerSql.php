<?php
/*	UTFPR/CT/DAINF - Disciplina CSM41-Desenvolvimento de Aplicações WEB
	Prof. José Buiar
	
	Framework Exemplo com modelo MVC - Model View Controller

	Controlador SQL - Exemplo de Utilização 
	
	1.0 - 23ago20 - Versão Inicial
r
*/
class ControllerSql extends ControllerBase {
// Método para buscar todos os dados
	public $nomeViewDetail='ViewDetalhe';
	public $nomeViewList='ViewListaLink';
	public $nomeViewEdit='ViewEditar';
//
//
// Método para inserir um registro (CREATE)
	public function adicionar() {
		debug(__CLASS__."::".__FUNCTION__."()");
		$this->chamarView(
			$this->nomeViewEdit, array(
				'dados'			=>	null,
				'id'			=>	null,
				'controller'	=>	get_class($this)
				// passar nome do controller atual
		));
	}
	public function salvar() {
		debug(__CLASS__."::".__FUNCTION__."()");
		// Processar a atualização utilizando 
		// dados do REQUEST
		$this->model->create( $_REQUEST );
		// Chamar a View		
		$this->listar();
	}
//
//
// Método para buscar registros (READ)
	public function listar() { // todos os registros
		debug(__CLASS__."::".__FUNCTION__."()"); 
		// Obter dados
		$dados = $this->model->read();
		// Chamar a View	
		$this->chamarView(
			$this->nomeViewList, array(
				'dados'	=>	$dados,
				'controller'	=>	get_class($this)				
		));
	
	}
	public function buscar() { // um registro especifico
		debug(__CLASS__."::".__FUNCTION__."()");
		// Obter dados
		$id = $this->obterChave();
		$dados = $this->model->read( $id );
		$this->chamarView(
			$this->nomeViewDetail, array(
				'dados'			=>	$dados, 
				'id'			=>	$id,
				'controller'	=>	get_class($this)
				// passar nome do controller atual
		));
	}	
//	
//
// Método para excluir um registro (DELETE)
	public function excluir() {
		debug(__CLASS__."::".__FUNCTION__."()");
		// Processar a exclusão
		$this->model->delete( $this->obterChave() );
		// Chamar a View		
		$this->listar();
	}	
//
//
// Método para atualizar um registro (UPDATE)
	public function editar() {
		debug(__CLASS__."::".__FUNCTION__."()");
		// Processar a atualização
		$id = $this->obterChave();
		$dados = $this->model->read( $id );
		// Chamar a View		
		$this->chamarView(
			$this->nomeViewEdit, array(
				'dados'			=>	$dados, 
				'id'			=>	$id,
				'controller'	=>	get_class($this)
				// passar nome do controller atual
		));
	}
	public function atualizar() {
		debug(__CLASS__."::".__FUNCTION__."()");
		// Processar a atualização
		$id = $this->obterChave();
		$this->model->update( $id, $_REQUEST );
		// Chamar a View		
		$this->listar();
	}	
//
//
//
	public function obterChave() {
		return $_REQUEST['id'];
	}
}