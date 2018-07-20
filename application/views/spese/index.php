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
          <?php echo form_open('spese/index/titolo/asc');?>
          <div class="col-6 mt-2">
            <button type="submit" class="btn btn-outline-warning" name="button">Crescente</button>
          </div>
          </form>
          <?php echo form_open('spese/index/titolo/desc');?>
          <div class="col-6 mt-2">
            <button type="submit" class="btn btn-outline-warning" name="button">Decrescente</button>
          </div>
          </form>
        </div>
        <?php echo form_open('spese/search');?>
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
      <?php echo form_open('spese/sort_by_date');?>
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
            <h5>Mostra spese</h5>
          </div>
          <div class="col-4 d-flex align-self-center">
          <?php echo form_open('spese/filter_by');?>
            <button type="submit" class="btn btn-outline-secondary btn-sm" name="button">Filtra</button>
          </div>
        </div>
      </div>
      <div class="btn-group btn-group-toggle d-flex flex-column justify-content-center" data-toggle="buttons">
        <label class="btn btn-outline-light rounded active mb-2">
          <input type="radio" name="opzioneTipo" id="option1" autocomplete="off" checked value="disabled"> Tutto
        </label>
        <label class="btn btn-outline-success rounded mb-2">
          <input type="radio" name="opzioneTipo" id="option2" autocomplete="off" value="1">  Contanti
        </label>
        <label class="btn btn-outline-warning rounded mb-2">
          <input type="radio" name="opzioneTipo" id="option3" autocomplete="off" value="0">  Bancomat
        </label>
      </div>
    </form>
    </div>
  </div>
  <div class="row">
    <?php if (empty($spese)) { ?>
      <div class="col-12 jumbotron bg-white d-flex justify-content-center">
        <h4 class="text-muted mb-0 d-flex align-self-center">Non è stata trovata alcuna spesa</h4>
        <div class="ml-3 d-flex align-items-stretch align-self-center">
          <img src="<?php echo base_url(); ?>assets/img/informazioni/no-data.svg" alt="nessuna spesa" height="50" width="50">
        </div>
      </div>
    <?php } else { ?>
    <?php foreach ($spese as $spesa):?>
      <?php if ($spesa['pagamento'] == $_SESSION['pagamento'] || $_SESSION['pagamento'] == "disabled") { ?>
      <div class="col-md-4">
        <div class="jumbotron p-3 mt-2 text-center">
          <div class="container">
            <h3><?php echo $spesa['titolo'];?></h3>
            <a class="badge badge-dark" data-toggle="collapse" href="#collapse<?php echo $spesa['idSpesa'];?>" role="button" aria-expanded="false" aria-controls="collapseExample"><?php
            $giorno= date("l", strtotime($spesa['data']));
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

            $mese= date("F", strtotime($spesa['data']));
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


            echo $giorno." ".date("d", strtotime($spesa['data']))." ".$mese." ".date("Y", strtotime($spesa['data']));
            ?></a>
            <p class="collapse text-success font-weight-bold mb-0" id="collapse<?php echo $spesa['idSpesa'];?>">
              <?php
              $datauno = date_create($spesa['data']);
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
              <img src="<?php echo base_url();?>assets/img/pagamenti/<?php echo $spesa['pagamento']?>.svg" alt="carta di credito" width="35px" height="35px" data-toggle="tooltip" data-placement="left" title="
              <?php
              switch ($spesa['pagamento']) {
                case 0:
                echo "Bancomat";
                break;
                case 1:
                echo "Contanti";
                break;
                default:
                echo "???";
                break;
              }
              ?>">
              <div class="ml-3 d-flex align-items-center"><p class="m-0 p-0 font-weight-bold">€ <?php echo $spesa['cifra'];?></p></div>
            </div>
            <small><?php echo $spesa['causale'];?></small>
          </div>
          <div class="mt-2">
            <a class="btn btn-outline-danger btn-sm"  data-toggle="collapse" href="#collapseAction<?php echo $spesa['idSpesa']?>" role="button" aria-expanded="false" aria-controls="collapseExample">Elimina</a>
            <div class="collapse" id="collapseAction<?php echo $spesa['idSpesa'];?>">
              <div class="form-group form-check mt-2 p-0">
                <label class="form-check-label text-danger" for="exampleCheck1">Sei sicuro? I dati saranno cancellati <strong>permanentemente</strong></label>
                <?php echo form_open('spese/delete/'.$spesa['idSpesa']);?>
                <button type="submit" class="btn btn-danger btn-sm mt-2" name="button">Conferma eliminazione</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php  } ?>
    <?php endforeach;?>
  <?php } ?>
  </div>
</div>
