<?php

require_once(__DIR__ . '/../../templates/template-html.php');

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Cliente.php');
require_once(__DIR__ . '/../../dao/DaoCliente.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (!$conn->connect()) {
    die();
}

$daoCliente = new DaoCliente($conn);
$cliente = $daoCliente->porId($_GET['id_cliente']);

if (!$cliente)
    header('Location: ./index.php');

else {
    ob_start();

    ?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Clientes</h2>
        </div>
        <div class="row">
            <div class="col-md-12">

                <form action="atualizar.php" class="card p-2 my-4" method="POST">

                    <input type="hidden" name="id_cliente" value="<?php echo $cliente->getId(); ?>">


                    <div class="form-row">

                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" placeholder="Nome do Cliente" id="nome" value="<?php echo $cliente->getNome(); ?>" class="form-control" name="nome" required>
                        </div>

                        <div class="form-group col-md-6">
                            <label for="sexo">Sexo</label>
                            <input type="text" class="form-control" id="sexo" value="<?php echo $cliente->getSexo(); ?>" name="sexo" placeholder="Sexo" required>
                            <p> <small id="departamentosHelp" class="form-text text-muted">
                                    Informe somente a abreviação do sexo: M ou F
                                </small></p>
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" value="<?php echo $cliente->getEmail(); ?>" name="email" placeholder="E-mail" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endereco">Endereço</label>
                            <input type="endereco" class="form-control" id="endereco" value="<?php echo $cliente->getEndereco(); ?>" name="endereco" placeholder="Endereço" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" value="<?php echo $cliente->getCidade(); ?>" name="cidade" placeholder="Cidade" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="estado">Estado</label>
                            <input type="estado" class="form-control" id="estado" value="<?php echo $cliente->getEstado(); ?>" name="estado" placeholder="Estado" required>
                            <p> <small id="departamentosHelp" class="form-text text-muted">
                                    Informe somente a abreviação do estado, por exemplo: MT, RO, SP, RJ, SC...
                                </small></p>
                        </div>
                    </div>


                    <div class="input-group">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
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
} // else-if

?>