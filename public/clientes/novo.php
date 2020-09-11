<?php

require_once(__DIR__ . '/../../templates/template-html.php');
ob_start();

?>
<div class="container">
    <div class="py-5 text-center">
        <h2>Cadastro de Clientes</h2>
    </div>
    <div class="row">
        <div class="col-md-12">

            <form action="salvar.php" class="card p-2 my-4" method="POST">

                <div class="form-row">

                    <div class="form-group col-md-6">
                        <label for="nome">Nome</label>
                        <input type="text" placeholder="Nome do Cliente" id="nome" class="form-control" name="nome" required>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="sexo">Sexo</label>
                        <input type="text" class="form-control" id="sexo" name="sexo" placeholder="Sexo" required>
                        <p> <small id="departamentosHelp" class="form-text text-muted">
                                Informe somente a abreviação do sexo: M ou F
                            </small></p>
                    </div>

                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="E-mail" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="endereco">Endereço</label>
                        <input type="endereco" class="form-control" id="endereco" name="endereco" placeholder="Endereço" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="cidade">Cidade</label>
                        <input type="text" class="form-control" id="cidade" name="cidade" placeholder="Cidade" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="estado">Estado</label>
                        <input type="estado" class="form-control" id="estado" name="estado" placeholder="Estado" required>
                        <p> <small id="departamentosHelp" class="form-text text-muted">
                                Informe somente a abreviação do estado, por exemplo: MT, RO, SP, RJ, SC...
                            </small></p>
                    </div>
                </div>

                <div class="input-group">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
                    </div>
                </div>
                
            </form>

        </div>
    </div>
</div>
<?php

$content = ob_get_clean();
echo html($content);

?>