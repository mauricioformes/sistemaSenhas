<?php

namespace Api\Repositories;

class PainelRepository extends Conexao
{

   public function buscaFilaSenha($tipo, $codLocalDestino)
   {

      $sql = "SELECT f.*,
                     case
                       when f.cod_local_origem = 25 and f.cod_local_destino = 25 then
                        'NOVA SENHA'
                       else
                        (SELECT ate.desc_local_atend
                           FROM atend_clocal_internacao ate
                          where ate.cod_local_atend = f.cod_local_origem) || ' encaminhou para ' ||
                        (SELECT ate.desc_local_atend
                           FROM atend_clocal_internacao ate
                          where ate.cod_local_atend = f.cod_local_destino)
                     end movimentacao FROM (SELECT w.codigo,
		               case
                        when tipo = 'I' then
                         'Internação'
                        WHEN TIPO = 'Q' THEN
                         'Visita Quarto'
                        WHEN TIPO = 'B' THEN
                         'Visita UTI'
                        WHEN TIPO = 'C' THEN
                         'Internação Prévia'
                        WHEN TIPO = 'A' THEN
                         'Autorização'
                        WHEN TIPO = 'P' THEN
                         'Procedimentos Ambulatórios'
                        WHEN TIPO = 'S' THEN
                         'SAC - Informações'
                      end tipo,
					  w.data_cadastro,
					  w.senha,
                 w.chama_senha,
                 (select a.cod_local_orig
                  from ATEND_MOVIMENTACAO_INTERNACAO a
                 where w.codigo = a.seq_mov
                   AND SEQ_ATEND = (select MAX(A.SEQ_ATEND)
                                      from ATEND_MOVIMENTACAO_INTERNACAO a
                                     where w.codigo = a.seq_mov)) cod_local_origem,
                 (select a.cod_local_dest
          from ATEND_MOVIMENTACAO_INTERNACAO a
         where w.codigo = a.seq_mov
           AND SEQ_ATEND = (select MAX(A.SEQ_ATEND)
                              from ATEND_MOVIMENTACAO_INTERNACAO a
                             where w.codigo = a.seq_mov)) cod_local_destino
				from web_atend_controle_internacao w 
            --where w.tipo in (" . $tipo . ")
            where w.chama_senha <> 'F'
            ORDER BY W.DATA_CADASTRO ASC) F WHERE F.COD_LOCAL_DESTINO = " . $codLocalDestino;

      //   var_dump($sql);
      //  exit;

      $rows = $this->executeQuery($sql);

      return $rows;
   }


   public function chamaSenha($idSenha, $guiche)
   {

      $sql = "UPDATE web_atend_controle_internacao SET DATA_CHAMADA = SYSDATE,
                                                      GUICHE = " . $guiche . ",
                                                      CHAMA_SENHA = 'S'
                                                      WHERE CODIGO = " . $idSenha;

      //   var_dump($sql);
      //  exit;

      $rows = $this->executeQuery($sql);

      return $rows;
   }

   public function finalizarSenha($idSenha, $guiche)
   {

      $sql = "UPDATE web_atend_controle_internacao SET DATA_ATENDIMENTO = SYSDATE,
                                                      GUICHE = " . $guiche . ",
                                                      CHAMA_SENHA = 'F'
                                                      WHERE CODIGO = " . $idSenha;

      //   var_dump($sql);
      //  exit;

      $rows = $this->executeQuery($sql);

      return $rows;
   }

   public function pararSenha($idSenha, $guiche)
   {

      $sql = "UPDATE web_atend_controle_internacao SET DATA_ATENDIMENTO = SYSDATE,
                                                      GUICHE = " . $guiche . ",
                                                      CHAMA_SENHA = 'P'
                                                      WHERE CODIGO = " . $idSenha;

      //   var_dump($sql);
      //  exit;

      $rows = $this->executeQuery($sql);

      return $rows;
   }



   public function insereMovimentacao($codSenha, $codGuicheEncaminha, $codLocalOrigem, $codLocalEncaminha)
   {

      session_start();

      $sql = "SELECT max(SEQ_ATEND) + 1 codigo FROM ATEND_MOVIMENTACAO_INTERNACAO";
      $rows = $this->executeQuery($sql);

      $sql = "INSERT INTO ATEND_MOVIMENTACAO_INTERNACAO
                           (SEQ_ATEND,
                            SEQ_MOV,
                            DATA_MOV,
                            COD_LOCAL_ORIG,
                            COD_LOCAL_DEST,
                            USUARIO_MOV,
                            DATA_REGISTRO)
                        VALUES
                           (" . $rows[0]["CODIGO"] . ",
                            " . $codSenha . ",
                            SYSDATE,
                            " . $codLocalOrigem . ",
                            " . $codLocalEncaminha . ",
                            '" . $_SESSION["usuario"]["usuario"]["LOGIN"] . "',
                            sysdate)";

      //   var_dump($sql);
      //  exit;

      $rows = $this->executeQuery($sql);

      $sql = "UPDATE web_atend_controle_internacao SET CHAMA_SENHA = 'N'
      WHERE CODIGO = " . $codSenha;

//   var_dump($sql);
//  exit;

$rows = $this->executeQuery($sql);

      return $rows;
   }
}
