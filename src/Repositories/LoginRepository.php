<?php
namespace Api\Repositories;

	class LoginRepository extends Conexao
	{

		public function verificarAcesso($usuario,$senha)
		{
			$sql ="SELECT * FROM (SELECT (select max(A.SENHA_BKP)
								from wp_senha a
							where a.codigo = codigo_senha) senha,
							login
						FROM (SELECT (select max(a.codigo)
										from wp_senha a
									where a.codigo_usuario = b.codigo) codigo_senha,
									b.login
								FROM WP_USUARIO b where b.codigo_status = 1))
					where login = :usuario
						AND SENHA = :senha";


			$bind = array(':usuario' => $usuario,
						  ':senha'	 => $senha);

			$rows=$this->executeQuery($sql,$bind);
			return $rows;
		}
	}

?>
