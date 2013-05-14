<?php error_reporting(0); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Promissórias</title>
  <link href="http://twitter.github.com/bootstrap/assets/css/bootstrap.css" rel="stylesheet">
  <link href="http://www.eyecon.ro/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
  <script type="text/javascript" src="http://twitter.github.com/bootstrap/assets/js/jquery.js"></script>
  <script type="text/javascript" src="http://twitter.github.com/bootstrap/assets/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://www.eyecon.ro/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script>
    $(function(){
      $('#data').datepicker({
        format: 'dd/mm/yyyy'
      });
      $('input').tooltip('hide');
    });
  </script>
</head>
<body>
  <div class="container">
    <?php if ($error) { ?>
      <div class="alert alert-block">
        <h4>Atenção!</h4>
        Nenhum campo pode ficar em branco!
      </div>
    <?php } ?>
    <div>
      <form action="download.php" method="post" class="form-horizontal">
        <div class="row-fluid">
          <div class="span6">
            <legend>
              Dados da Promissória:
            </legend>
            <div class="control-group">
              <label class="control-label">Quantidade:</label>
              <div class="controls">
                <input type="text" id="quantidade" name="quantidade" title="Exemplo: 36" rel="tooltip" data-placement="right">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Data Início:</label>
              <div class="controls">
                <input type="text" id="data" name="data" title="Exemplo: 01/01/2013" rel="tooltip" data-placement="right">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Valor da Parcela:</label>
              <div class="controls">
                <input type="text" id="valor" name="valor" title="Exemplo: 500,00" rel="tooltip" data-placement="right">
              </div>
            </div>
          </div>

          <div class="span6">
            <legend>
              Dados do Vendedor:
            </legend>
            <div class="control-group">
              <label class="control-label">Nome:</label>
              <div class="controls">
                <input type="text" id="v_nome" name="v_nome" title="Exemplo: Nome Vendedor ou Empresa" rel="tooltip" data-placement="right">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">CPF/CNPJ:</label>
              <div class="controls">
                <input type="text" id="v_cpfcnpj" name="v_cpfcnpj" title="Exemplo: CPF/CNPJ" rel="tooltip" data-placement="right">
              </div>
            </div>
          </div>
        </div>

        <div class="span12" style="margin-left: 0px;">
          <legend>
            Dados do Cliente:
          </legend>
        </div>

        <div class="row-fluid">
          <div class="span6">
            <div class="control-group">
              <label class="control-label">Nome:</label>
              <div class="controls">
                <input type="text" id="c_nome" name="c_nome" title="Exemplo: Nome do Cliente" rel="tooltip" data-placement="right">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Endereço:</label>
              <div class="controls">
                <input type="text" id="c_endereco" name="c_endereco" title="Exemplo: Endereço" rel="tooltip" data-placement="right">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Cidade:</label>
              <div class="controls">
                <input type="text" id="c_cidade" name="c_cidade" title="Exemplo: Cidade" rel="tooltip" data-placement="right">
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Estado:</label>
              <div class="controls">
                <input type="text" id="c_estado" name="c_estado" title="Exemplo: Estado" rel="tooltip" data-placement="right">
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">&nbsp;</label>
              <div class="controls">
                <button type="submit" class="btn">Gerar Promissórias</button>
              </div>
            </div>
          </div>

          <div class="span6">
            <div class="control-group">
              <label class="control-label">CPF/CNPJ:</label>
              <div class="controls">
                <input type="text" id="c_cpfcnpj" name="c_cpfcnpj" title="Exemplo: CPF/CNPJ" rel="tooltip" data-placement="right">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Bairro:</label>
              <div class="controls">
                <input type="text" id="c_bairro" name="c_bairro" title="Exemplo: Bairro" rel="tooltip" data-placement="right">
              </div>
            </div>
            
            <div class="control-group">
              <label class="control-label">Cep:</label>
              <div class="controls">
                <input type="text" id="c_cep" name="c_cep" title="Exemplo: 74000-000" rel="tooltip" data-placement="right">
              </div>
            </div>
          </div>
        </div>

      </form>
    </div>
  </div>
</body>
</html>