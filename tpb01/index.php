<?php

if(isset($_POST["salvar"])){
    
    $a10 = fopen('1.0.txt',"w");
    fwrite($a10,$_POST["10"]);
    fclose($a10);
    
    $a11 = fopen('1.1.txt',"w");
    fwrite($a11,$_POST["11"]);
    fclose($a11);
    
    $a20 = fopen('2.0.txt',"w");
    fwrite($a20,$_POST["20"]);
    fclose($a20);
    
    $a21 = fopen('2.1.txt',"w");
    fwrite($a21,$_POST["21"]);
    fclose($a21);
            
    $a30 = fopen('3.0.txt',"w");
    fwrite($a30,$_POST["30"]);
    fclose($a30);
        
    $a31 = fopen('3.1.txt',"w");
    fwrite($a31,$_POST["31"]);
    fclose($a31);
    
    $a40 = fopen('4.0.txt',"w");
    fwrite($a40,$_POST["40"]);
    fclose($a40);
           
    $a41 = fopen('4.1.txt',"w");
    fwrite($a41,$_POST["41"]);
    fclose($a41);
        
    $a50 = fopen('5.0.txt',"w");
    fwrite($a50,$_POST["50"]);
    fclose($a50);
        
    $a51 = fopen('5.1.txt',"w");   
    fwrite($a51,$_POST["51"]); 
    fclose($a51);
}

?>

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
        <link href="https://fonts.googleapis.com/css?family=Baloo+Bhaijaan" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.9/sweetalert2.min.css">
        
        <script>
            $(document).ready(function(){
               
               $("#div1").on("click", function(){
                   $(this).css({"border": "10px solid #000","width": "1400px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 25px #000"});
               });
               $("#div2,#div3,#div4,#div5").on("click", function(){
                   $("#div1").css({"transition":"0.1s","border": "10px solid lightgray","width": "1350px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 0px #fff"});
               });
               //-------------
               $("#div2").on("click", function(){
                   $(this).css({"border": "10px solid #000","width": "1400px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 25px #000"});
               });
               $("#div1,#div3,#div4,#div5").on("click", function(){
                   $("#div2").css({"transition":"0.1s","border": "10px solid lightgray","width": "1350px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 0px #fff"});
               });
               //-------------
               $("#div3").on("click", function(){
                   $(this).css({"border": "10px solid #000","width": "1400px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 25px #000"});
               });
               $("#div1,#div2,#div4,#div5").on("click", function(){
                   $("#div3").css({"transition":"0.1s","border": "10px solid lightgray","width": "1350px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 0px #fff"});
               });
               //-------------
               $("#div4").on("click", function(){
                   $(this).css({"border": "10px solid #000","width": "1400px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 25px #000"});
               });
               $("#div1,#div2,#div3,#div5").on("click", function(){
                   $("#div4").css({"transition":"0.1s","border": "10px solid lightgray","width": "1350px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 0px #fff"});
               });
               //-------------
               $("#div5").on("click", function(){
                   $(this).css({"border": "10px solid #000","width": "1400px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 25px #000"});
               });
               $("#div1,#div2,#div3,#div4").on("click", function(){
                   $("#div5").css({"transition":"0.1s","border": "10px solid lightgray","width": "1350px","height": "160px","cursor": "pointer","box-shadow": "0px 0px 0px #fff"});
               });
               //-------------
               
               function limpar(campo){
                   var campo1 = $("#inputNome"+campo).val("");
                   var campo2 = $("#inputTags"+campo).val("");
                   //if(campo1=="" && campo2==""){
                       swal({
                                title: 'Campo Limpo',
                                timer: 500,
                                type: "success"
                            })
                   //}
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
                            
                            swal({
                                title: 'Campo Vazio',
                                timer: 500,
                                type: "error"
                              })
                            
                    }else{
                        //invertendo os valores
                        $("#inputNome"+div).val(valor2);
                        $("#inputNome"+btn).val(valor1);
                        $("#inputTags"+div).val(valor4);
                        $("#inputTags"+btn).val(valor3);
                    }
               }//function organizaDivs
                
               function inputNomes(idInputNomes,idCaracteresNomes){
                    //alert(inputTags);
                    $(""+idInputNomes+"").keyup(function(){
                        //alert(inputTags);
                        //var txt = $(this).val(); pega o que é digitado
                        $(this).attr("maxlength","64");//add atributo
                        var limite = 64;
                        var caracteresDigitados = $(this).val().length;
                        var caracteresRestantes = limite - caracteresDigitados;
                        //alert(limite);
                        $(""+idCaracteresNomes+"").html("Nome: "+caracteresRestantes+" ");
                    });
              }//function inputNomes
               
              function inputTags(idInputTags,idCaracteresTags){
                    //alert(inputTags);
                    $(""+idInputTags+"").keyup(function(){
                        //alert(inputTags);
                        //var txt = $(this).val(); pega o que é digitado
                        $(this).attr("maxlength","255");//add atributo
                        var limite = 255;
                        var caracteresDigitados = $(this).val().length;
                        var caracteresRestantes = limite - caracteresDigitados;
                        //alert(limite);
                        $(""+idCaracteresTags+"").html("Tags: "+caracteresRestantes+" ");
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
                font-family: 'Baloo Bhaijaan', cursive;
            }
            #salvar:hover{
                opacity: 0.9;
                box-shadow: 0px 0px 10px #000;
            }
            body{
                background-color: white;
            }
            .div{
                background-color: white;
            }
            .input{
                margin-top: 20px;
                width: 600px;
                padding: 7px;
                background-color: #ebe9e9;
                border: none;            
                font-size: 15px;
                font-family: 'Baloo Bhaijaan', cursive;
            }
            .tags{                
                margin-top: 20px;
                width: 1200px;
                padding: 10px;
                background-color: #ebe9e9;
                border: none;
            }
            .div{                
                transition:0.3s;
                width: 1350px;
                height: 160px;
                border: 10px solid lightgray;                
            }
            #div1{
                margin-top: 100px;                
            }
            #div5{
                margin-bottom: 300px;                
            }            
            #div1:hover{border: 10px solid black;box-shadow: 0px 0px 25px #000;width: 1400px;height: 160px;cursor: pointer;}
            #div2:hover{border: 10px solid black;box-shadow: 0px 0px 25px #000;width: 1400px;height: 160px;cursor: pointer;}
            #div3:hover{border: 10px solid black;box-shadow: 0px 0px 25px #000;width: 1400px;height: 160px;cursor: pointer;}
            #div4:hover{border: 10px solid black;box-shadow: 0px 0px 25px #000;width: 1400px;height: 160px;cursor: pointer;}
            #div5:hover{border: 10px solid black;box-shadow: 0px 0px 25px #000;width: 1400px;height: 160px;cursor: pointer;}
            button{cursor: pointer;}
        </style>
    </head>
    <body>
    <center>
    <form action="" method="post">
        <input id="salvar" class="btn btn-primary" type="submit" name="salvar" value="Salvar">
        <div id="div1" class="div">
            <span id="caracteresNome1"></span><input name="10" id="inputNome1" class="input" type="text" value="<?php echo file_get_contents('1.0.txt');?>"> <button type="button" id="1" class="limpar btn btn-outline-primary"> Limpar</button>            
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="1-1" class="btn btn-secondary">1</button>
            <button type="button" id="1-2" class="btn btn-secondary">2</button>
            <button type="button" id="1-3" class="btn btn-secondary">3</button>
            <button type="button" id="1-4" class="btn btn-secondary">4</button>
            <button type="button" id="1-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>01</button><br>
            <span id="caracteresTags1"></span><input name="11" id="inputTags1" class="input tags" type="text" value="<?php echo file_get_contents('1.1.txt');?>">
        </div><br>
        <div id="div2" class="div">
            <span id="caracteresNome2"></span><input name="20" id="inputNome2" class="input" type="text" value="<?php echo file_get_contents('2.0.txt');?>"> <button type="button" id="2" class="limpar btn btn-outline-primary"> Limpar</button>
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="2-1" class="btn btn-secondary">1</button>
            <button type="button" id="2-2" class="btn btn-secondary">2</button>
            <button type="button" id="2-3" class="btn btn-secondary">3</button>
            <button type="button" id="2-4" class="btn btn-secondary">4</button>
            <button type="button" id="2-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>02</button><br>
            <span id="caracteresTags2"></span><input name="21" id="inputTags2" class="input tags" type="text" value="<?php echo file_get_contents('2.1.txt');?>">
        </div><br>
        <div id="div3" class="div">
            <span id="caracteresNome3"></span><input name="30" id="inputNome3" class="input" type="text" value="<?php echo file_get_contents('3.0.txt');?>"> <button type="button" id="3" class="limpar btn btn-outline-primary"> Limpar</button>
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="3-1" class="btn btn-secondary">1</button>
            <button type="button" id="3-2" class="btn btn-secondary">2</button>
            <button type="button" id="3-3" class="btn btn-secondary">3</button>
            <button type="button" id="3-4" class="btn btn-secondary">4</button>
            <button type="button" id="3-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>03</button><br>
            <span id="caracteresTags3"></span><input name="31" id="inputTags3" class="input tags" type="text" value="<?php echo file_get_contents('3.1.txt');?>">
        </div><br>
        <div id="div4" class="div">
            <span id="caracteresNome4"></span><input name="40" id="inputNome4" class="input" type="text" value="<?php echo file_get_contents('4.0.txt');?>"> <button type="button" id="4" class="limpar btn btn-outline-primary"> Limpar</button>
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="4-1" class="btn btn-secondary">1</button>
            <button type="button" id="4-2" class="btn btn-secondary">2</button>
            <button type="button" id="4-3" class="btn btn-secondary">3</button>
            <button type="button" id="4-4" class="btn btn-secondary">4</button>
            <button type="button" id="4-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>04</button><br>
            <span id="caracteresTags4"></span><input name="41" id="inputTags4" class="input tags" type="text" value="<?php echo file_get_contents('4.1.txt');?>">
        </div><br>
        <div id="div5" class="div">
            <span id="caracteresNome5"></span><input name="50" id="inputNome5" class="input" type="text" value="<?php echo file_get_contents('5.0.txt');?>"> <button type="button" id="5" class="limpar btn btn-outline-primary"> Limpar</button>
            <div class="btn-group mr-2" role="group" aria-label="First group">
            <button type="button" id="5-1" class="btn btn-secondary">1</button>
            <button type="button" id="5-2" class="btn btn-secondary">2</button>
            <button type="button" id="5-3" class="btn btn-secondary">3</button>
            <button type="button" id="5-4" class="btn btn-secondary">4</button>
            <button type="button" id="5-5" class="btn btn-secondary">5</button>
            </div><button type="button" class="btn btn-outline-info" disabled>05</button><br>
            <span id="caracteresTags5"></span><input name="51" id="inputTags5" class="input tags" type="text" value="<?php echo file_get_contents('5.1.txt');?>">
        </div><br>  
    </form>
    </center>
    </body>
</html>
