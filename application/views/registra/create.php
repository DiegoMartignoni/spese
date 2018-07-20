<?php echo form_open('registra/create');?>
<div class="container jumbotron bg-light">
  <div class="d-flex flex-row">
    <h2 class="text-warning d-flex align-self-center">Registra una nuova spesa</h2>
    <div class="d-flex align-items-stretch align-self-center ml-3">
      <img src="<?php echo base_url(); ?>assets/img/pagamenti/new.svg" alt="new" height="45" width="45">
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-6">
      <div class="container mb-2">
        <h5>Tipo di pagamento</h5>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="pagamento" id="pagamento0" value="0" checked>
          <label class="form-check-label" for="pagamento0">
            <img src="<?php echo base_url();?>assets/img/pagamenti/0.svg" alt="Bancomat" height="30" width="30"> Bancomat
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="pagamento" id="pagamento1" value="1">
          <label class="form-check-label" for="pagamento1">
            <img src="<?php echo base_url();?>assets/img/pagamenti/1.svg" alt="Contanti" height="30" width="30"> Contanti
          </label>
        </div>
      </div>
      <div class="container mb-2">
        <h5>Cifra spesa</h5>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text text-success">€</span>
          </div>
          <input type="number" step="any" class="form-control" aria-label="Amount (to the nearest dollar)" value="0.00" name="cifra">
        </div>
      </div>
      <div class="container mb-4">
        <h5>Data</h5>
        <div class="input-group mb-3">
          <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="data">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="container mb-2">
        <h5>Titolo</h5>
        <input type="text" class="form-control" name="titolo">
      </div>
      <div class="container mb-4">
        <h5>Causale</h5>
        <textarea class="form-control" style="min-height: 149px;" name="causale"></textarea>
      </div>
      <div class="container">
        <button type="submit" name="button" class="btn btn-outline-success mt-2 mr-2">Salva, registra nuova spesa</button>
        <button type="submit" name="button" class="btn btn-outline-success mt-2 mr-4" value="exit">Salva ed esci</button>
      </div>
    </div>
  </div>
</div>
</form>
