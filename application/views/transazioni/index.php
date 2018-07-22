<div class="container">
  <div class="row mb-2 text-center">
    <h4 class="col-12">Auttalmente ordinato per: <?php echo $ordinato_per; ?></h4>
    <h3 class="col-md-8 text-muted border-bottom border-secondary pb-2">Ordina per</h3>
  </div>
  <div class="row mb-4 text-center text-muted">
    <div class="col-md-4 mb-2">
      <h5>Titolo</h5>
      <div class="container">
        <div class="row d-flex justify-content-center">
          <?php echo form_open('transazioni/index/titolo/asc');?>
          <div class="col-6 mt-2">
            <button type="submit" class="btn btn-outline-warning" name="button">Crescente</button>
          </div>
          </form>
          <?php echo form_open('transazioni/index/titolo/desc');?>
          <div class="col-6 mt-2">
            <button type="submit" class="btn btn-outline-warning" name="button">Decrescente</button>
          </div>
          </form>
        </div>
        <?php echo form_open('transazioni/search');?>
        <div class="row mt-4">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cerca" aria-label="Recipient's username" aria-describedby="basic-addon2" name="cerca">
            <div class="input-group-append">
              <button class="btn btn-outline-secondary" type="submit">Avvia</button>
            </div>
          </div>
        </div>
        </form>
      </div>
    </div>
    <div class="col-md-4 mb-2 text-muted">
      <?php echo form_open('transazioni/sort_by_date');?>
      <h5>Data</h5>
      <div class="container">
        <div class="row text-left">
          <div class="col-6 mt-2 p-0 pr-1">
            <label for="basic-url">Data Inizio</label>
            <input type="date" name="inizio" class="d-inline form-control" value="<?php echo date("Y-01-01"); ?>">
          </div>
          <div class="col-6 mt-2 p-0 pl-1">
            <label for="basic-url">Data Fine</label>
            <input type="date" name="fine" class="d-inline form-control" value="<?php echo date("Y-m-d"); ?>">
          </div>
        </div>
        <div class="row mt-2">
          <button type="submit" class="btn btn-outline-warning col-12" name="button">Ordina</button>
        </div>
      </div>
      </form>
    </div>
    <div class="col-md-4 mb-2 jumbotron bg-white border border-warning text-warning pt-2 pb-2 mt-2">
      <div class="container mb-2">
        <div class="row">
          <div class="col-8 d-flex align-self-center">
            <h5>Mostra pagamenti</h5>
          </div>
          <div class="col-4 d-flex align-self-center">
          <?php echo form_open('transazioni/filter_by');?>
            <button type="submit" class="btn btn-outline-secondary btn-sm" name="button">Filtra</button>
          </div>
        </div>
      </div>
      <div class="form-check d-flex flex-column justify-content-center">
        <label class="text-muted rounded active mb-2">
          <input class="form-check-input" type="radio" name="opzioneTipo" id="idPagamento0" value="disabled" checked>
          <label class="form-check-label" for="idPagamento0">
            Mostra Tutto
          </label>
        </label>
        <div class="container">
          <div class="row">
            <?php if (empty($lista_pagamenti)) { ?>
              <p class="text-muted">Nessun tipo di pagamento disponibile</p>
            <?php } else {?>
            <?php foreach ($lista_pagamenti as $item_pagamento): ?>
              <div class="col-md-6 text-muted">
                <input class="form-check-input" type="radio" name="opzioneTipo" id="idPagamento<?php echo $item_pagamento['idPagamento']; ?>" value="<?php echo $item_pagamento['idPagamento']; ?>" >
                <label class="form-check-label" for="idPagamento<?php echo $item_pagamento['idPagamento']; ?>">
                  <img src="<?php echo base_url().$item_pagamento['imgPath'];?>" alt="<?php echo $item_pagamento['tipo'] ?>" height="30" width="30"> <?php echo $item_pagamento['tipo'] ?>
                </label>
              </div>
            <?php endforeach; ?>
          <?php } ?>
          </div>
        </div>
      </div>
    </form>
    </div>
  </div>
  <div class="row">
    <?php if (empty($transazioni)) { ?>
      <div class="col-12 jumbotron bg-white d-flex justify-content-center">
        <h4 class="text-muted mb-0 d-flex align-self-center">Non è stata trovata alcuna spesa</h4>
        <div class="ml-3 d-flex align-items-stretch align-self-center">
          <img src="<?php echo base_url(); ?>assets/img/informazioni/no-data.svg" alt="nessuna spesa" height="50" width="50">
        </div>
      </div>
    <?php } else { ?>
    <?php foreach ($transazioni as $transazione):?>
      <?php if ($transazione['idPagamento'] == $_SESSION['idPagamento'] || $_SESSION['idPagamento'] == "disabled") { ?>
      <div class="col-md-4">
        <div class="jumbotron p-3 mt-2 text-center <?php echo $variazione = ($transazione['titolo'] == 'Variazione budget') ? 'bg-dark border border-warning text-warning' : '' ; ?>">
          <div class="container">
            <h3><?php echo $transazione['titolo'];?></h3>
            <a class="badge badge-dark" data-toggle="collapse" href="#collapse<?php echo $transazione['idTransazione'];?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php
            $giorno= date("l", strtotime($transazione['data']));
            switch ($giorno) {
              case 'Monday':
              $giorno = "Lunedì";
              break;
              case 'Tuesday':
              $giorno = "Martedì";
              break;
              case 'Wednesday':
              $giorno = "Mercoledì";
              break;
              case 'Thursday':
              $giorno = "Giovedì";
              break;
              case 'Friday':
              $giorno = "Venerdì";
              break;
              case 'Saturday':
              $giorno = "Sabato";
              break;
              case 'Sunday':
              $giorno = "Domenica";
              break;

              default:
              // code...
              break;
            }

            $mese= date("F", strtotime($transazione['data']));
            switch ($mese) {
              case 'January':
              $mese = "Gennaio";
              break;
              case 'February':
              $mese = "Febbraio";
              break;
              case 'March':
              $mese = "Marzo";
              break;
              case 'April':
              $mese = "Aprile";
              break;
              case 'May':
              $mese = "Maggio";
              break;
              case 'June':
              $mese = "Giugno";
              break;
              case 'July':
              $mese = "Luglio";
              break;
              case 'July':
              $mese = "Luglio";
              break;
              case 'August':
              $mese = "Agosto";
              break;
              case 'September':
              $mese = "Settembre";
              break;
              case 'October':
              $mese = "Ottobre";
              break;
              case 'November':
              $mese = "Novembre";
              break;
              case 'December':
              $mese = "Dicembre";
              break;

              default:
              // code...
              break;
            }


            echo $giorno." ".date("d", strtotime($transazione['data']))." ".$mese." ".date("Y", strtotime($transazione['data']));
            ?></a>
            <p class="collapse text-success font-weight-bold mb-0" id="collapse<?php echo $transazione['idTransazione'];?>">
              <?php
              $datauno = date_create($transazione['data']);
              $dataoggi = date_create(date('Y-m-d', time()));
              $quantigiorni = date_diff($datauno, $dataoggi);
              $gformat = ($quantigiorni->format('%a') > 1) ? "giorni" : "giorno" ;
              if ($quantigiorni->format('%a') == 0) {
                echo "Oggi";
              } else {
                echo $quantigiorni->format('%a')." ".$gformat." fa";
              }
              ?>
            </p>
            <div class="d-flex justify-content-center mt-2">
              <img src="<?php echo base_url().$transazione['imgPath'];?>" alt="carta di credito" width="35px" height="35px" data-toggle="tooltip" data-placement="left" title="<?php echo $transazione['tipo']; ?>">
              <div class="ml-3 d-flex align-items-center"><p class="m-0 p-0 font-weight-bold text-<?php if($transazione['cifra'] < 0){ echo 'danger';} else { echo 'success';} ?>">€ <?php echo $transazione['cifra'];?></p></div>
            </div>
            <small><?php echo $transazione['causale'];?></small>
          </div>
          <div class="mt-2">
            <div class="d-flex flex-row justify-content-center">
              <a class="btn btn-outline-danger btn-sm mt-2 mr-2"  data-toggle="collapse" href="#collapseAction<?php echo $transazione['idTransazione']?>" role="button" aria-expanded="false" aria-controls="collapseExample">Elimina</a>
              <button type="button" class="btn btn-outline-warning btn-sm mt-2" data-toggle="modal" data-target="#modalModifica<?php echo $transazione['idTransazione'];?>">Modifica</button>
            </div>

            <div class="collapse" id="collapseAction<?php echo $transazione['idTransazione'];?>">
              <div class="form-group form-check mt-2 p-0">
                <label class="form-check-label text-danger" for="exampleCheck1">Sei sicuro? I dati saranno cancellati <strong>permanentemente</strong></label>
                <?php echo form_open('transazioni/delete/'.$transazione['idTransazione']);?>
                <button type="submit" class="btn btn-danger btn-sm mt-2" name="button">Conferma eliminazione</button>
                </form>
              </div>
            </div>

            <?php echo form_open('transazioni/edit/'.$transazione['idTransazione']);?>
            <div class="modal fade" id="modalModifica<?php echo $transazione['idTransazione'];?>" tabindex="-1" role="dialog" aria-labelledby="modalModificatitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modifica questa spesa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-md-6 text-left">
                        <div class="container mb-2">
                          <h5>Tipo di idPagamento</h5>
                          <?php foreach ($lista_pagamenti as $item_pagamento): ?>
                          <div class="form-check">
                            <input class="form-check-input" type="radio" name="idPagamento" id="idPagamento<?php echo $item_pagamento['idPagamento']; ?>" value="<?php echo $item_pagamento['idPagamento']; ?>" <?php echo $checked = ($transazione['idPagamento'] == $item_pagamento['idPagamento']) ? "checked" : "" ; ?>>
                            <label class="form-check-label" for="idPagamento<?php echo $item_pagamento['idPagamento']; ?>">
                              <img src="<?php echo base_url().$item_pagamento['imgPath'];?>" alt="<?php echo $item_pagamento['tipo'] ?>" height="30" width="30"> <?php echo $item_pagamento['tipo'] ?>
                            </label>
                          </div>
                        <?php endforeach; ?>
                        </div>
                        <div class="container mb-2">
                          <h5>Cifra spesa</h5>
                          <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text text-success">€</span>
                            </div>
                            <input type="number" step="any" class="form-control" aria-label="Amount (to the nearest dollar)" value="<?php echo $transazione['cifra']; ?>" name="cifra">
                          </div>
                        </div>
                        <div class="container mb-4">
                          <h5>Data</h5>
                          <div class="input-group mb-3">
                            <input type="date" class="form-control" value="<?php echo $transazione['data']; ?>" name="data">
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6 text-left">
                        <div class="container mb-2">
                          <h5>Titolo</h5>
                          <input type="text" class="form-control" name="titolo" value="<?php echo $transazione['titolo']; ?>">
                        </div>
                        <div class="container mb-4">
                          <h5>Causale</h5>
                          <textarea class="form-control" style="min-height: 149px;" name="causale"><?php echo $transazione['causale']; ?></textarea>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-outline-success">Modifica</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          </div>
        </div>
      </div>
      <?php  } ?>
    <?php endforeach;?>
  <?php } ?>
  </div>
</div>
