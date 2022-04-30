<h1>Jogo_Perguntas_Cdi4</h1>
Jogo de perguntas desenvolvido em CodeIgniter 4 e Java Script

<h3>Código para criação de tabelas do mySQL<h3>

<pre>
	CREATE TABLE `jogos` (
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`jogador` VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
		`pontos` INT(11) NULL DEFAULT '0',
		`pulos` INT(11) NULL DEFAULT NULL,
		`datacad` DATETIME NULL DEFAULT NULL,
		PRIMARY KEY (`id`) USING BTREE
	)
	COLLATE='latin1_swedish_ci'
	ENGINE=InnoDB
	;
</pre>

<pre>
	CREATE TABLE `perguntas` (
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`pergunta` VARCHAR(250) NOT NULL DEFAULT '0' COLLATE 'latin1_swedish_ci',
		`resp1` VARCHAR(250) NOT NULL DEFAULT '0' COLLATE 'latin1_swedish_ci',
		`resp2` VARCHAR(250) NOT NULL DEFAULT '0' COLLATE 'latin1_swedish_ci',
		`resp3` VARCHAR(250) NOT NULL DEFAULT '0' COLLATE 'latin1_swedish_ci',
		`resp4` VARCHAR(250) NOT NULL DEFAULT '0' COLLATE 'latin1_swedish_ci',
		`correta` VARCHAR(250) NOT NULL DEFAULT '0' COLLATE 'latin1_swedish_ci',
		PRIMARY KEY (`id`) USING BTREE
	)
	COLLATE='latin1_swedish_ci'
	ENGINE=InnoDB
	;
</pre>

<pre>
	CREATE TABLE `usuarios` (
		`id` INT(11) NOT NULL AUTO_INCREMENT,
		`nome` VARCHAR(200) NOT NULL COLLATE 'latin1_swedish_ci',
		`login` VARCHAR(25) NOT NULL COLLATE 'latin1_swedish_ci',
		`senha` VARCHAR(100) NOT NULL COLLATE 'latin1_swedish_ci',
		`data_c` DATETIME NOT NULL,
		`email` VARCHAR(60) NOT NULL COLLATE 'latin1_swedish_ci',
		`telefone` VARCHAR(15) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
		`oculto` VARCHAR(50) NULL DEFAULT 'n' COLLATE 'latin1_swedish_ci',
		`level` INT(11) NULL DEFAULT NULL,
		PRIMARY KEY (`id`) USING BTREE
	)
	COLLATE='latin1_swedish_ci'
	ENGINE=InnoDB
	;
</pre>



Tabela Usuários é usado pelo pequeno painel administrativo para adicionar novas perguntas.
<ul>
	<li>A Senha tem de ser adicionada em MD5 do PHP</li>
	<li>Adiciona pergunta e seleciona qual a resposta é a correta</li>
</ul> 

Tabela jogo apenas salva as sessões de jogo com o usuário e a pontuação para score
