<div class="container jumbotron bg-success text-white">
  <div class="d-flex flex-row">
    <h2 class="d-flex align-self-center">Il mio portafoglio</h2>
    <div class="d-flex align-items-stretch align-self-center ml-3">
      <img src="<?php echo base_url(); ?>assets/img/portafogli.svg" alt="new" height="45" width="45">
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-3 d-flex align-self-center mt-2">
      <p class="d-flex align-self-center mb-0">Il tuo budget attuale:</p>
    </div>
    <div class="col-md-4 d-flex flex-column align-self-center mt-2">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text bg-white text-success">€</span>
        </div>
        <input type="number" min="<?php echo $budgets['0']['budget']; ?>" step="any" class="form-control bg-success text-white font-weight-bold" aria-label="Amount (to the nearest dollar)" value="<?php echo $budgets['0']['budget']; ?>" name="cifra">
        <div class="input-group-append">
          <button class="btn btn-outline-light" type="button">Incrementa budget</button>
        </div>
      </div>
    </div>
  </div>
  <div class="row mt-4">
    <div class="col-md-3 d-flex align-self-center mt-2">
      <p class="d-flex align-self-center mb-0">Le spese di questa settimana:</p>
    </div>
    <div class="col-md-5 d-flex align-self-center mt-2">
    </div>
    <div class="col-md-4 d-flex flex-column align-self-center mt-2">

    </div>
  </div>
</div>
