<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração - Guichês</title>
</head>

<body>
    <div class="contentpanel">
        <div class="panel panel-default">
            <br>
            <form name='form_pesquisa_guiche' id="form_pesquisa_guiche" class="form-horizontal">
                <div class=" form-group" id="linha_processo">

                    <label class="col-md-1 col-sm-1 col-md-offset-1 control-label">Local:</label>
                    <div class="col-md-6 col-sm-6">
                        <select name="locais" id="locais" class="form-control" required>
                            <option value="">Selecione...</option>
                            <?php
                            foreach ($data as $id => $value) :
                                echo "<option value='" . $value["COD_LOCAL_ATEND"] . "'>" . $value["DESC_LOCAL_ATEND"] . "</option>";
                            //var_dump($value);
                            endforeach;

                            //exit;
                            ?>
                        </select>
                    </div>



                    <div class="col-md-2 col-sm-2 text-center ">
                        <button type='submit' name='btnPesquisaGuiche' id="btnPesquisaGuiche" class='btn btn-primary' value='Comunicar'><i class="glyphicon glyphicon-search"></i>Pesquisar</button>
                        <button type='button' name='btnNovoGuiche' id="btnNovoGuiche" class='btn btn-primary' onclick="f_novoGuiche();"><i class="glyphicon glyphicon-plus"></i>NOVO</button>

                        <!-- <button name='geraExcelColeta' id="geraExcelColeta" onclick="f_Excel();" class='btn btn-primary' value='Comunicar'><i class="glyphicon glyphicon-plus"></i>Excel</button> -->

                    </div>

                </div>
            </form>
            <br>
        </div>
    </div>
    <div class="contentpanel" id="exibeDivGuiche" hidden>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class=" row mb30"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table parametrizacao table-bordered table-striped table-dark">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Local</th>
                                        <th style="text-align: center">Guiche</th>
                                        <th style="text-align: center">Data Cadastro</th>
                                        <th style="text-align: center">Usuário</th>
                                    </tr>
                                </thead>
                                <tbody id="exibeTabelaGuiche">

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<div class="modal fade" id="modal_cadastra" tabindex="-1" aria-labelledby="modal_cadastra_procedLabel" data-backdrop="static" aria-hidden="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content ">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="modal_cadastra_procedLabel"><span class="glyphicon glyphicon-pencil  text-info"></span> <span id="modal-titulo" class=" text-info">Detalhes</span></h4>
            </div>
            <div class="modal-body">
                <div id="mensagem_detalhe" style="overflow-y:none">
                    <form name='formCadastraGuiche' id="formCadastraGuiche" class="form-horizontal">
                        <div class=" form-group" id="linha_processo">

                            <label class="col-md-1 col-sm-1 control-label">Local:</label>
                            <div class="col-md-4 col-sm-4">
                                <select name="cadlocais" id="cadlocais" class="form-control" required>
                                    <option value="">Selecione...</option>
                                    <?php
                                    foreach ($data as $id => $value) :
                                        echo "<option value='" . $value["COD_LOCAL_ATEND"] . "'>" . $value["DESC_LOCAL_ATEND"] . "</option>";
                                    //var_dump($value);
                                    endforeach;

                                    //exit;
                                    ?>
                                </select>
                            </div>

                            <label class="col-md-1 col-sm-1 control-label">Nome:</label>
                            <div class="col-md-4 col-sm-4">
                                <input type="text" id="cadNomeGuiche" name="cadNomeGuiche" class="form-control" required>
                            </div>



                            <div class="col-md-1 col-sm-1 text-center ">
                                <button type='submit' name='btnSalvar' id="btnSalvar" class='btn btn-primary' value='Comunicar'><i class="glyphicon glyphicon-save"></i>Salvar</button>

                                <!-- <button name='geraExcelColeta' id="geraExcelColeta" onclick="f_Excel();" class='btn btn-primary' value='Comunicar'><i class="glyphicon glyphicon-plus"></i>Excel</button> -->

                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div><!-- modal-content -->
    </div><!-- modal-dialog -->
</div><!-- modal -->

</html>