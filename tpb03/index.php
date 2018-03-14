<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Page Test</title>
        <meta charset="windows-1252">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">        
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:600,700" rel="stylesheet">
        <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        
        <script src="jquery.nicescroll-master/jquery.nicescroll.min.js"></script>
        
        <script>
            $(document).ready(function(){
               
            //verifica se o dispositivo e mobile
            if(/Mobi/.test(navigator.userAgent)){
            }else{
                $("body").niceScroll({
                    cursorcolor:"red",
                    cursorwidth:"8px"
                });
            }
                
               // HOVER CSS 
                $(".div").hover(function(){
                    $(this).addClass("div-green");
                  }, function() {
                    $(this).removeClass("div-green");
                });
                
                
               function cssDinamico(id){
                            $("#"+id).on("click", function(){           //quando for clicado
                                $(this).removeClass("div-green");       //livra a div selecionada da class usada no hover acima, bordas na cor verde. 
                                $(this).removeClass("div");             //remove a class padrão que aplica o css na cor verde das bordas, veja a linha 32
                                $(this).addClass("div-red");            //class que substitui a class div-green 
                                $(this).addClass("div-selected");       //class que substitui a class padrão, para não perder as dimenssões da div, e se livrar do hover padrão
                                for(var i=0;i<=5;i++){                  //criando variavel com valor dinamico
                                    if("#"+id!="#div-"+i){              //verificando qual é a div selecionada
                                        //sabendo qual a div selecionada, posso deixar as demais em configuração nornal, como antes
                                        $("#div-"+i).removeClass("div-red");        //remove a class que faz uma div ser a selecionada
                                        $(this).removeClass("div-selected");        //remove a class auxiliar da class div
                                        $(this).addClass("div");                    /*adiciona novamente a class div, para pegar tanto o estilo padrão
                         *                                                            quanto o hover novamente*/
                                                                                                        
                                    }
                                }
                            })
                } 
                
               //-------------
               
               function limpar(id){
                   //verifica se os dois já estão vazios
                   if($("#inputNome"+id).val()=="" && $("#inputTags"+id).val()==""){
                        $("#inputNome"+id+",#inputTags"+id).val("");//apagando valores dos campos
                        swal({title: 'Campo Vazio',timer: 500,type: "error"});}
                   else{
                        //apaga os valores dos campos
                        $("#inputNome"+id+",#inputTags"+id).val("");//apagando valores dos campos
                        //Função abaixo apaga os textos salvos, e os aquivos tbm.
                        $.ajax({
                                 url: "function.php?excluir="+id,                                    
                                 success: function(data){swal({title: data,timer: 500,type: data});}
                         });//ajax
                   }                   
               }
               
               function organizaDivs(idButton){
                   
                    var str = idButton;
                    var match = str.split("-");
                    //alert(idButton);alert(match[0]);alert(match[1]); 
                    var div = match[0];
                    var btn = match[1];
                    //salvando o valor dos campos da divs
                    var valor1 = $("#inputNome"+div).val();
                    var valor2 = $("#inputNome"+btn).val();
                    var valor3 = $("#inputTags"+div).val();
                    var valor4 = $("#inputTags"+btn).val();
                    //vaerifica se existe algum campo vazio
                    if(valor1==""||valor2==""||valor3==""||valor4==""){
                            
                            swal({title: 'Campo Vazio',timer: 500,type: "error"})
                            
                    }else{
                        //invertendo os valores
                        $("#inputNome"+div).val(valor2);
                        $("#inputNome"+btn).val(valor1);
                        $("#inputTags"+div).val(valor4);
                        $("#inputTags"+btn).val(valor3);
                    }
               }//function organizaDivs
                
               function inputNomes(idInputNomes,idCaracteresNomes){
                    
                    $(""+idInputNomes+"").keyup(function(){
                        
                        //removendo "#" por que não pega na URL
                        idInputNomes = idInputNomes.replace("#","");
                        
                        var txt = $(this).val();// pega o que é digitado 
                        
                        $.ajax({//Função abaixo salva cada caractere automaticamente.
                            url: "function.php?salvar="+idInputNomes+"&texto="+txt,                                    
                            success: function(data){
                                	//alert(data);	                        
                            }//success
                        });//ajax   
                        
                        //Função abaixo imprime a quantidade de carcters disponivel em tempo real
                        $(this).attr("maxlength","64");//add atributo
                        var limite = 64;
                        var caracteresDigitados = $(this).val().length;
                        var caracteresRestantes = limite - caracteresDigitados;
                        //alert(limite);
                        if(caracteresRestantes < 10){
                            $(""+idCaracteresNomes+"").addClass("btn btn-outline-danger").html("Nome: 0"+caracteresRestantes);
                        }if(caracteresRestantes >= 10){
                            $(""+idCaracteresNomes+"").removeClass("btn btn-outline-danger").addClass("btn btn-outline-info").html("Nome: "+caracteresRestantes);
                        }
                    });
              }//function inputNomes
               
               function inputTags(idInputTags,idCaracteresTags){
                    
                    $(""+idInputTags+"").keyup(function(){
                    
                        //removendo "#" por que não pega na URL
                        idInputTags = idInputTags.replace("#","");
                    
                        var txt = $(this).val();// pega o que é digitado
                        
                        $.ajax({//Função abaixo salva cada caractere automaticamente.
                            url: "function.php?salvar="+idInputTags+"&texto="+txt,                                    
                            success: function(data){
                                	//alert(data);		                        
                            }//success
                        });//ajax
                        
                        //Função abaixo imprime a quantidade de carcters disponivel em tempo real
                        $(this).attr("maxlength","200");//add atributo
                        var limite = 200;
                        var caracteresDigitados = $(this).val().length;
                        var caracteresRestantes = limite - caracteresDigitados;
                        //alert(limite);                        
                        if(caracteresRestantes >= 100){
                            $(""+idCaracteresTags+"").html("Tags: "+caracteresRestantes);
                        }
                        if(caracteresRestantes <= 99){
                            $(""+idCaracteresTags+"").removeClass("btn btn-outline-danger").addClass("btn btn-outline-info").html("Tags: 0"+caracteresRestantes);
                        }
                        if(caracteresRestantes < 10){
                            $(""+idCaracteresTags+"").addClass("btn btn-outline-danger").html("Tags: 00"+caracteresRestantes);
                        }
                    });
              }//function inputTags
              
              $("#inputTags1").keyup(function(){ inputTags("#inputTags1","#caracteresTags1"); });
              $("#inputTags2").keyup(function(){ inputTags("#inputTags2","#caracteresTags2"); });
              $("#inputTags3").keyup(function(){ inputTags("#inputTags3","#caracteresTags3"); });
              $("#inputTags4").keyup(function(){ inputTags("#inputTags4","#caracteresTags4"); });
              $("#inputTags5").keyup(function(){ inputTags("#inputTags5","#caracteresTags5"); });
              
              $("#inputNome1").keyup(function(){ inputNomes("#inputNome1","#caracteresNome1"); });
              $("#inputNome2").keyup(function(){ inputNomes("#inputNome2","#caracteresNome2"); });
              $("#inputNome3").keyup(function(){ inputNomes("#inputNome3","#caracteresNome3"); });
              $("#inputNome4").keyup(function(){ inputNomes("#inputNome4","#caracteresNome4"); });
              $("#inputNome5").keyup(function(){ inputNomes("#inputNome5","#caracteresNome5"); });
              
              $(".btn-secondary").on("click", function(){ organizaDivs($(this).attr("id")); });
              
              $(".limpar").on("click", function(){ limpar($(this).attr("id")); });
              
              $(".div").on("click", function(){ cssDinamico($(this).attr("id")); });
                          
            });
            
        </script>
        <style>
            #salvar{
                position: fixed;
                margin-top: -90px;
                margin-left: -500px;
                z-index: 1;
                cursor: pointer;
                width: 1000px;
                padding: 20px;
                opacity: 0.3;
                font-size: 15px;
                font-family: 'Open Sans', sans-serif;
            }
            #salvar:hover{
                opacity: 0.9;
                box-shadow: 0px 0px 10px #000;
            }
            body{
                background-color: white;
            }
            .input{
                margin-top: 20px;
                width: 695px;
                padding: 7px;
                background-color: #ebe9e9;
                border: none;            
                font-size: 20px;
                font-family: 'Open Sans', sans-serif;
            }
            .tags{                
                margin-top: 20px;
                width: 1200px;
                padding: 10px;
                background-color: #ebe9e9;
                border: none;
            }
            .div-selected{                
                transition:0.1s;
                width: 1350px;
                height: 160px;
                border: 10px solid #ccc;
            }
            .div{                
                transition:0.1s;
                width: 1350px;
                height: 170px;
                border: 10px solid #ccc;
            }
            #div-1{
                margin-top: 100px;                
            }
            #div-5{
                margin-bottom: 300px;                
            }            
            
            button{cursor: pointer;}
            
            .div-green{border-radius: 10px; border: 5px solid green;box-shadow: 0px 0px 25px #000;width: 1380px;height: 170px;cursor: pointer;}
            .div-red{border-radius: 10px; border: 5px solid red;box-shadow: 0px 0px 25px #000;width: 1380px;height: 170px;cursor: pointer;}
            
        </style>
    </head>
    <body>
    
    <center>
    
    <form action="" method="post">
        <!--input id="salvar" class="btn btn-primary" type="submit" name="salvar" value="Salvar"-->
        <div id="div-1" class="div">
            <button id="caracteresNome1" class="btn btn-outline-info" disabled>Nome: 64</button> <input name="10" id="inputNome1" class="input" type="text" value="<?php if(file_exists('inputNome1.php')){echo file_get_contents('inputNome1.php');}else{echo'';};?>"> <button type="button" id="1" class="limpar btn btn-outline-primary"> Limpar</button>            
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="1-1" class="btn btn-secondary">1</button>
            <button type="button" id="1-2" class="btn btn-secondary">2</button>
            <button type="button" id="1-3" class="btn btn-secondary">3</button>
            <button type="button" id="1-4" class="btn btn-secondary">4</button>
            <button type="button" id="1-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>01</button><br>
            <button id="caracteresTags1" class="btn btn-outline-info" disabled>Tags: 200</button> <input name="11" id="inputTags1" class="input tags" type="text" value="<?php if(file_exists('inputTags1.php')){echo file_get_contents('inputTags1.php');}else{echo'';};?>">
        </div><br>
        <div id="div-2" class="div">
            <button id="caracteresNome2" class="btn btn-outline-info" disabled>Nome: 64</button> <input name="20" id="inputNome2" class="input" type="text" value="<?php if(file_exists('inputNome2.php')){echo file_get_contents('inputNome2.php');}else{echo'';};?>"> <button type="button" id="2" class="limpar btn btn-outline-primary"> Limpar</button>
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="2-1" class="btn btn-secondary">1</button>
            <button type="button" id="2-2" class="btn btn-secondary">2</button>
            <button type="button" id="2-3" class="btn btn-secondary">3</button>
            <button type="button" id="2-4" class="btn btn-secondary">4</button>
            <button type="button" id="2-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>02</button><br>
            <button id="caracteresTags2" class="btn btn-outline-info" disabled>Tags: 200</button> <input name="21" id="inputTags2" class="input tags" type="text" value="<?php if(file_exists('inputTags2.php')){echo file_get_contents('inputTags2.php');}else{echo'';};?>">
        </div><br>
        <div id="div-3" class="div">
            <button id="caracteresNome3" class="btn btn-outline-info" disabled>Nome: 64</button> <input name="30" id="inputNome3" class="input" type="text" value="<?php if(file_exists('inputNome3.php')){echo file_get_contents('inputNome3.php');}else{echo'';};?>"> <button type="button" id="3" class="limpar btn btn-outline-primary"> Limpar</button>
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="3-1" class="btn btn-secondary">1</button>
            <button type="button" id="3-2" class="btn btn-secondary">2</button>
            <button type="button" id="3-3" class="btn btn-secondary">3</button>
            <button type="button" id="3-4" class="btn btn-secondary">4</button>
            <button type="button" id="3-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>03</button><br>
            <button id="caracteresTags3" class="btn btn-outline-info" disabled>Tags: 200</button> <input name="31" id="inputTags3" class="input tags" type="text" value="<?php if(file_exists('inputTags3.php')){echo file_get_contents('inputTags3.php');}else{echo'';};?>">
        </div><br>
        <div id="div-4" class="div">
            <button id="caracteresNome4" class="btn btn-outline-info" disabled>Nome: 64</button> <input name="40" id="inputNome4" class="input" type="text" value="<?php if(file_exists('inputNome4.php')){echo file_get_contents('inputNome4.php');}else{echo'';};?>"> <button type="button" id="4" class="limpar btn btn-outline-primary"> Limpar</button>
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="4-1" class="btn btn-secondary">1</button>
            <button type="button" id="4-2" class="btn btn-secondary">2</button>
            <button type="button" id="4-3" class="btn btn-secondary">3</button>
            <button type="button" id="4-4" class="btn btn-secondary">4</button>
            <button type="button" id="4-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>04</button><br>
            <button id="caracteresTags4" class="btn btn-outline-info" disabled>Tags: 200</button> <input name="41" id="inputTags4" class="input tags" type="text" value="<?php if(file_exists('inputTags4.php')){echo file_get_contents('inputTags4.php');}else{echo'';};?>">
        </div><br>
        <div id="div-5" class="div">
            <button id="caracteresNome5" class="btn btn-outline-info" disabled>Nome: 64</button> <input name="50" id="inputNome5" class="input" type="text" value="<?php if(file_exists('inputNome5.php')){echo file_get_contents('inputNome5.php');}else{echo'';};?>"> <button type="button" id="5" class="limpar btn btn-outline-primary"> Limpar</button>
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="5-1" class="btn btn-secondary">1</button>
            <button type="button" id="5-2" class="btn btn-secondary">2</button>
            <button type="button" id="5-3" class="btn btn-secondary">3</button>
            <button type="button" id="5-4" class="btn btn-secondary">4</button>
            <button type="button" id="5-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>05</button><br>
            <button id="caracteresTags5" class="btn btn-outline-info" disabled>Tags: 200</button> <input name="51" id="inputTags5" class="input tags" type="text" value="<?php if(file_exists('inputTags5.php')){echo file_get_contents('inputTags5.php');}else{echo'';};?>">
        </div><br>  
    </form>
    
    </center>
    
    </body>
</html>
