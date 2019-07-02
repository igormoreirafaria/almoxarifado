<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Login | Almoxarifado</title>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <!--Let browser know website is optimized for mobile-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link type="text/css" rel="stylesheet" href="css/meucss.css"/>
        <script>

                $(document).ready( function(){
                    
                    //verificar se os campos de usuário e senha foram devidamente preenchidos
                    $('#btn_login').click(function(){
                        
                        var campo_vazio = false;
    
                        if($('#login').val() == ''){
                            $('#login').addClass('invalid');
                            campo_vazio = true;
                        } else {
                            $('#login').addClass('valid');
                        }
    
                        if($('#password').val() == ''){
                            $('#password').addClass('invalid');
                            campo_vazio = true;
                        } else {
                            $('#password').addClass('valid');
                        }
    
                        if(campo_vazio) return false;
                    });
                    
                    let ls = location.search.split('?')[1];
                    let query = {}
                    if (ls != undefined){
                        query[ls.split('=')[0]] = ls.split('=')[1];
                    }
                    if(query.erro == '1'){
                        $("#erro").addClass('show');
                    }
                });					
            </script>
    </head>

    <body>


        <div class="container">
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
                <div class="row"></div>
            <div class="row">
                <form method="post" action="validar_acesso.php" id="formLogin">
                    <div class="col s6 offset-s3">
                        <div class="login z-depth-3">
                            <div class="container">
                                <div class="row"></div>
                                <div class="row"></div>
                                <div class="row"></div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="login" type="text" class="validate" name="login">
                                        <label for="login">Login</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="password" class="validate" name="senha">
                                        <label for="password">Password</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <button id="btn_login">Entrar</button>
                                </div>
                                <div class="row">
                                    <span id='erro' class='hidden'>Login ou Senha inválidos!</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!--JavaScript at end of body for optimized loading-->
        <script type="text/javascript" src="js/materialize.min.js"></script>
    </body>
</html>