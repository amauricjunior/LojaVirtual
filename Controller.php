<?php
class Controller{

  public $nomeTemplate;

  public function __construct(){
    
  }

  //aqui eu devo passar o que? o nome do template? pode ser dai fica mais limpo
  public function chamarTemplateView($viewNome, $dados = array()){
    $this->nomeTemplate.='.php';
    require_once $this->nomeTemplate; //dentro do template eu carrego a view com comando php
  }

  public function chamarView($view, $dados = array()){
    extract($dados);
    require_once $view . '.php';
  }


}
