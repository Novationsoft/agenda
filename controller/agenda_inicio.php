<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of agenda_inicio
 *
 * @author yo
 */
class agenda_inicio extends fs_controller 
{
  
    public $listado;
    
    public function __construct() {
        parent::__construct(__CLASS__, 'portada', 'agenda');
    }
    
    protected function private_core()
    {
      if ( isset($_POST['fecha']) )
      {
        $fecha = Date('Y-m-d', strtotime($_POST['fecha']));
        $fecha .= ' '.$_POST['hora'];
        
        $sql = "INSERT INTO agenda (fecha,usuario,tarea)
           VALUES ('".$fecha."','".$_POST['usuario']."','".$_POST['tarea']."');";
        
        $this->db->exec($sql);   
      }
      
      $this->listado = $this->select("SELECT * FROM agenda;");
    
    }
}
