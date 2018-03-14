<?php
//Excluir arquivos
if(isset($_GET['excluir'])){
       //verifica se os dois arquivos existem
       if(file_exists("inputNome".$_GET['excluir'].".php") && file_exists("inputTags".$_GET['excluir'].".php")){
           //deleta os dois
           unlink("inputNome".$_GET['excluir'].".php") && unlink("inputTags".$_GET['excluir'].".php");
           echo 'success';
       }else{
           //caso s� exista um dos dois, verifica qual �, e deleta
          if(file_exists("inputNome".$_GET['excluir'].".php")){
              if(unlink("inputNome".$_GET['excluir'].".php")){ echo 'success';}else{    echo 'error';}
            }
          if(file_exists("inputTags".$_GET['excluir'].".php")){
              if(unlink("inputTags".$_GET['excluir'].".php")){ echo 'success';}else{    echo 'error';}
            }
        }          
}

//Verifica se est�o querendo salvar o campo
if(isset($_GET["salvar"])){
    /*identificando e salvando o campo*/
    for($i=0;$i<=5;$i++){                           //Cria vari�vel com valor din�mico. 
       $campo = $_GET["salvar"];                    //Armazena o texto do campo.
       if("inputNome".$i==$campo){                  //Este script ir� rodar at� achar o nome do arquivo.
           $a = fopen('inputNome'.$i.'.php',"w");   //Se n�o existir, cria e abre. Se existir, abre.
           fwrite($a,$_GET['texto']);               //Escreve no arquivo.
           fclose($a);                              //Fecha o arquivo.
           break;                                   //Freia o loop se achar cumprir a fun��o.
       }//for
       /*identificando e salvando o campo*/
       if("inputTags".$i==$campo){                  //Este script ir� rodar at� achar o nome do arquivo.
           $a = fopen('inputTags'.$i.'.php',"w");   //Se n�o existir, cria e abre. Se existir, abre.
           fwrite($a,$_GET['texto']);               //Escreve no arquivo.
           fclose($a);                              //Fecha o arquivo.
           break;                                   //Freia o loop se achar cumprir a fun��o.
       }//for
    }//for
}//if GET salvar
    
?>