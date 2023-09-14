<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Senhas - Recepção</title>
</head>

<body>
    <div class="contentpanel">
        <div class="panel panel-default">
            <br>
            <form name='formSelecionaGuicheRecepcao' id="formSelecionaGuicheRecepcao" class="form-horizontal">
                <div class=" form-group" id="linha_processo">


                    <label class="col-md-1 col-sm-1 col-md-offset-1 control-label">Guichês:</label>
                    <div class="col-md-3 col-sm-3">
                        <select name="guiches" id="guiches" class="form-control" required>
                            <option value="">Selecione um guichê de atendimento...</option>
                            <?php
                            // var_dump($data);
                            foreach ($data['guiches'] as $id => $value) :
                                echo "<option value='" . $value["ID"] . "'>" . $value["GUICHE"] . "</option>";
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <!-- <div class="col-md-3 col-sm-3">
                        <select name="locais" id="locais" class="form-control" required="required">
                            <option value="">Selecione um local de atendimento...</option>
                            <?php
                            foreach ($data as $id => $value) :
                                echo "<option value='" . $value["COD_LOCAL_ATEND"] . "'>" . $value["DESC_LOCAL_ATEND"] . "</option>";
                            endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <select name="guiches" id="guiches" class="form-control" disabled required></select>
                    </div> -->
                    <div class="col-md-2 col-sm-2 text-center ">
                        <button type='submit' class='btn btn-primary' value='Comunicar'>VISUALIZAR SENHAS</button>
                        <!-- <button name='geraExcelColeta' id="geraExcelColeta" onclick="f_Excel();" class='btn btn-primary' value='Comunicar'><i class="glyphicon glyphicon-plus"></i>Excel</button> -->
                    </div>
                </div>
            </form>
            <br>
        </div>
    </div>
    <div class="contentpanel" id="exibeFilaRecepcao" hidden>

        <div class="panel panel-default">

            <div class="panel-body">

                <div class=" row mb30"></div>

                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table parametrizacao table-bordered table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Ação</th>
                                        <th style="text-align: center">Senha</th>
                                        <th style="text-align: center">Tipo</th>
                                        <th style="text-align: center">Data</th>
                                        <th style="text-align: center">Movimentação</th>
                                    </tr>
                                </thead>
                                <tbody id="exibeSenhasRecepcao" name="exibeSenhasRecepcao">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </div>

    </div>
</body>

<div class="modal fade" id="modal_encaminhar" tabindex="-1" aria-labelledby="modal_encaminhar_procedLabel" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog modal-sg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal_encaminhar_procedLabel"><span class="glyphicon glyphicon-pencil  text-info"></span> <span id="modal-titulo" class=" text-info">Detalhes</span></h4>
            </div>
            <div class="modal-body">
                <div id="mensagem_detalhe" style="overflow-y:none">
                    <form name='formEncaminharSenha' id="formEncaminharSenha" class="form-horizontal">
                        <input type="hidden" name="codSenhaEncaminha" id="codSenhaEncaminha">
                        <input type="hidden" name="codGuicheEncaminha" id="codGuicheEncaminha">
                        <input type="hidden" name="codLocalOrigem" id="codLocalOrigem">
                        <input type="hidden" name="codTipo" id="codTipo" value="1">

                        <div class=" form-group" id="linha_processo">

                            <label class="col-md-1 col-sm-1 control-label">Fila:</label>
                            <div class="col-md-6 col-sm-6">
                                <select name="codLocalEncaminha" id="codLocalEncaminha" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    <?php
                                    foreach ($data['locais'] as $id => $value) :
                                        echo "<option value='" . $value["COD_LOCAL_ATEND"] . "'>" . $value["DESC_LOCAL_ATEND"] . "</option>";
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-1 col-sm-1 text-center ">
                                <button type='submit' name='btnSalvar' id="btnSalvar" class='btn btn-primary' value='Comunicar'><i class="glyphicon glyphicon-send"></i> Encaminhar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

</html>