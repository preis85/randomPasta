<!DOCTYPE html>
<html>
<head>
	<title>Random</title>
</head>
<body>
	<form action="" method="post">
		<label for="caminho">Caminho</label>
		<input type="text" name="caminho" id="caminho" style="width: 90%" value="<?=isset($_POST['caminho']) ? $_POST['caminho'] : ''?>" />
		<br/><br/>
		<button type="submit">Gerar</button>
	</form>
	<pre>
<?php
	function limpa($array){
		array_shift($array);
		array_shift($array);
		return $array;
	}

	function buscaArquivo($caminho, &$resultado){
		$dir = scandir($caminho);
		$dir = limpa($dir);
		foreach ($dir as $file) {
			if(is_file($caminho . "\\" . $file)){
				$resultado[] = $caminho . "\\" . $file;
			} elseif(is_dir($caminho . "\\" . $file)) {
				$resultado = buscaArquivo($caminho . "\\" . $file, $resultado);
			}
		}
		return $resultado;
	}

	if(isset($_POST['caminho'])){
		$resultado = [];
		$resultado = buscaArquivo($_POST['caminho'], $resultado);
		shuffle($resultado);

		print_r($resultado);
	}
?>
	</pre>
</body>
</html>