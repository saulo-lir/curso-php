<div class='container'>
    <h1>Cadastre-se</h1>

    <?php

    if(isset($_POST['nome']) && !empty($_POST['nome'])){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = $_POST['senha'];
        $telefone = addslashes($_POST['telefone']);

        $usuario = new Usuarios();

        if(!empty($nome) && !empty($email) && !empty($senha) && !empty($telefone)){

            if($usuario->cadastrar($nome, $email, $senha, $telefone)){
    ?>
                <div class='alert alert-success'>
                    <strong>Parabéns!</strong> Cadastrado com sucesso. <a href='<?= BASE_URL ?>login' class='alert-link'>Faça o login agora</a>
                </div>
    <?php
            }else{
    ?>
            <div class='alert alert-warning'>
                Este usuário já existe! <a href='<?= BASE_URL ?>login.php' class='alert-link'>Faça o login agora</a>
            </div>
    <?php
            }

        }else{
    ?>
        <div class='alert alert-warning'>
            Preencha todos os campos!
        </div>
    <?php
        }
   }
    ?>

    <form method='POST'>
        <div class='form-group'>
            <label for='nome'>Nome:</label>
            <input type='text' name='nome' id='nome' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='email'>E-mail:</label>
            <input type='email' name='email' id='email' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='senha'>Senha:</label>
            <input type='password' name='senha' id='senha' class='form-control' />
        </div>
        <div class='form-group'>
            <label for='telefone'>Telefone:</label>
            <input type='text' name='telefone' id='telefone' class='form-control' />
        </div>

        <input type='submit' value='Cadastrar' class='btn btn-default' />
    </form>

</div>
