<div class="container-fluid">
  <div class="row">
    <?php foreach ($budgets as $budget): ?>
      <?php $color = (($budget['red']*0.299 + $budget['green']*0.587 + $budget['blue']*0.114) > 130) ? 'dark' : 'white' ; ?>
      <div class="col-md-6 p-1">
        <div class="jumbotron mb-1 text-<?php echo $color;?>" style="background-color: rgb(<?php echo $budget['red'] ?>, <?php echo $budget['green'] ?>, <?php echo $budget['blue'] ?>);">
          <div class="d-flex flex-row">
            <h2 class="d-flex align-self-center"><?php echo $budget['tipo'];?></h2>
            <div class="d-flex align-items-stretch align-self-center ml-3">
              <img src="<?php echo base_url().$budget['imgPath']; ?>" alt="new" height="45" width="45">
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-4 d-flex flex-column justify-content-center mt-2">
              <p class="d-flex justify-content-center mb-0">Budget:</p>
              <h4 class="d-flex align-self-center mt-2 p-2 rounded bg-<?php echo $color; ?>" style="color: rgb(<?php echo $budget['red'] ?>, <?php echo $budget['green'] ?>, <?php echo $budget['blue'] ?>);">€ <?php echo $budget['budget']; ?></h4>
            </div>
            <div class="col-md-8 d-flex flex-column align-self-center mt-2">
              <p class="d-flex justify-content-center mb-0">Variazioni budget:</p>
              <?php echo form_open('portafoglio/edit_budget');?>
              <div class="input-group mt-2 mb-2">
                <div class="input-group-prepend">
                  <span class="input-group-text bg-<?php echo $color;?> border border-<?php echo $color;?>" style="color: rgb(<?php echo $budget['red'] ?>, <?php echo $budget['green'] ?>, <?php echo $budget['blue'] ?>);">€</span>
                </div>
                <input type="number" step="any" class="form-control font-weight-bold border border-<?php echo $color;?> text-<?php echo $color;?>" value="0.00" name="cifra" style="background-color: rgb(<?php echo $budget['red'] ?>, <?php echo $budget['green'] ?>, <?php echo $budget['blue'] ?>);">
              </div>
              <div class="input-group">
                <input type="text" name="causale" class="form-control font-weight-bold border border-<?php echo $color;?> text-<?php echo $color;?>" value="Variazione valore budget" style="background-color: rgb(<?php echo $budget['red'] ?>, <?php echo $budget['green'] ?>, <?php echo $budget['blue'] ?>);">
                <div class="input-group-append">
                  <button class="btn btn-outline-<?php echo (($budget['red']*0.299 + $budget['green']*0.587 + $budget['blue']*0.114) > 130) ? 'dark' : 'light' ;?>" type="button" data-toggle="collapse" href="#collapseWarning<?php echo $budget['idPagamento']; ?>" role="button" aria-expanded="false" aria-controls="collapseWarning<?php echo $budget['idPagamento']; ?>">Salva</button>
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="collapse col-12" id="collapseWarning<?php echo $budget['idPagamento']; ?>">
              <div class="card card-body border-0 text-center m-0" style="background-color: rgb(<?php echo $budget['red'] ?>, <?php echo $budget['green'] ?>, <?php echo $budget['blue'] ?>);">
                <p class="mb-2 font-weight-bold">Confermare la modifica?</p>
                  <input type="text" name="titolo" value="Variazione budget" hidden>
                  <input type="date" name="data" value="<?php echo date('Y-m-d'); ?>" hidden>
                  <input type="number" name="idPagamento" value="<?php echo $budget['idPagamento']; ?>" hidden>
                  <small class="mb-2">Queste modifche <u class="font-weight-bold">non</u> saranno registrare come una normale transazione, bensì come una variazione speciale</small>
                  <button type="submit" name="button" class="btn btn-block mt-2 btn-outline-<?php echo (($budget['red']*0.299 + $budget['green']*0.587 + $budget['blue']*0.114) > 130) ? 'dark' : 'light' ;?>">Procedi</button>
                </form>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-md-12 d-flex align-items-start mt-2">
              <p class="d-flex align-items-start mb-0">Transazioni eseguite su questo conto:</p>
            </div>
          </div>
          <div class="row mt-2">
            <div class="col-md-4 mt-2">
              <div class=" d-flex flex-column justify-content-center align-self-center rounded border border-<?php echo $color; ?>">
                <p class="d-flex align-self-center mb-0 border-bottom border-<?php echo $color; ?>">Ultima settimana</p>
                <h4 class="d-flex justify-content-center mt-2 mb-0"><?php echo $trans_settimana[$budget['idPagamento']]; ?></h4>
              </div>
            </div>
            <div class="col-md-4 mt-2">
              <div class=" d-flex flex-column justify-content-center align-self-center rounded border border-<?php echo $color; ?>">
                <p class="d-flex align-self-center mb-0 border-bottom border-<?php echo $color; ?>">Ultimo mese</p>
                <h4 class="d-flex justify-content-center mt-2 mb-0"><?php echo $trans_mese[$budget['idPagamento']]; ?></h4>
              </div>
            </div>
            <div class="col-md-4 mt-2">
              <div class=" d-flex flex-column justify-content-center align-self-center rounded border border-<?php echo $color; ?>">
                <p class="d-flex align-self-center mb-0 border-bottom border-<?php echo $color; ?>">Ultimo anno</p>
                <h4 class="d-flex justify-content-center mt-2 mb-0"><?php echo $trans_anno[$budget['idPagamento']]; ?></h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>
