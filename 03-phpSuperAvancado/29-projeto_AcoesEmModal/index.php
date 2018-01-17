<?php 

try{
	$pdo = new PDO('mysql:dbname=projeto_acoes_em_modal;host=localhost','root','');
	$sql = $pdo->query("SELECT * FROM usuarios");
	$usuarios = $sql->fetchAll();

}catch(PDOException $ex){
	echo 'Erro: '.$ex->getMessage();
	exit;
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset='utff_8' />
		<meta name='viewport' content='width=device-width, initial-scale=1' />
		<link rel='stylesheet' href='assets/bootstrap.min.css' />
		<link rel='stylesheet' href='assets/style.css' />
		<script type='text/javascript' src='assets/jquery-3.2.1.min.js'></script>
		<script type='text/javascript' src='assets/bootstrap.min.js'></script>
		<script type='text/javascript' src='assets/script.js'></script>
	</head>
	<body>

		<h1>Usuários</h1>

		<table border='1' width='500'>
			<?php foreach($usuarios as $usuario){ ?>
				<tr>
					<td><?= $usuario['nome'] ?></td>
					<td><?= $usuario['email'] ?></td>
					<td><?= $usuario['senha'] ?></td>
					<td>
						<a href='javascript:;' onclick="editar('<?= $usuario['id'] ?>')">Editar</a>
						<a href='javascript:;' onclick="excluir('<?= $usuario['id'] ?>')">Excluir</a>
					</td>
				</tr>
			<?php } ?>	
		</table>	


		<div class='modal fade' id='modal' role='dialog'>
			<div class='modal-dialog'>
				<div class='modal-content'>
					<div class='modal-body'>...</div>
				</div>
			</div>
		</div>
		
	</body>
</html>