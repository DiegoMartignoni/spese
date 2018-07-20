<div class="container jumbotron bg-warning">
  <h1 class="">Attualmente in costruzione</h1>
  <h2>Idee</h2>
  <ul>
    <li>Aggiungere delle api nella home per controllare i movimenti finanza</li>
    <li>Aggiungere una sezione per gestire le carte</li>
    <li>Aggiungere una sezione per il bilancio</li>
  </ul>
</div>
<div class="container mt-4 jumbotron pb-1 bg-info text-white">
  <div class="row mb-2">
    <div class="col-md-9">
      <h1><?php echo $title = (base_url() != "http://localhost/spese/") ? "Tutto pronto <span class='badge badge-light text-info'>:)</span>" : "Configura l'applicazione anche per telefono" ; ?></h1>
    </div>
    <div class="col-md-3 mt-2">
      <?php echo form_open('pages/reset');?>
        <button type="submit" name="button" class="mt-2 btn btn-outline-warning btn-sm btn-block" data-toggle="tooltip" data-placement="top" title="Disabilita temporaneamente l'utilizzo da smartphone">Ripristina <u>config.php</u></button>
      </form>
    </div>
  </div>
  <?php if (base_url() != "http://localhost/spese/") { ?>
  <p>Hai configurato correttamente l'applicazione, ora puoi usarla anche sul tuo smartphone</p>
  <div class="jumbotron bg-white">
    <div class="row text-info">
      <div class="col-md-8 d-flex flex-column justify-content-center align-self-center text-center">
        <h3>Scansiona il QR code e inizia ad usare l'app da telefono!</h3>
        <p class="mt-2">Se preferisci copia questo link nel tuo browser: <u><?php echo base_url(); ?></u></p>
      </div>
      <div class="col-md-4 d-flex justify-content-center align-self-center">
        <img src="https://api.qrserver.com/v1/create-qr-code/?data=<?php echo base_url(); ?>&amp;size=200x200&color=17a2b8&bgcolor=ffffff" alt="qr-code" title="" height="200" width="200"/>
      </div>
    </div>
  </div>
  <?php } else {?>
  <p>Disponibile per SO: <span class="badge badge-primary">Windows</span></p>
  <div class="d-flex flex-row">
    <h3>3 semplici passaggi, tutto alla luce del sole </h3>
    <img src="<?php echo base_url() ?>assets/img/informazioni/sun.svg" alt="sole" height="35" width="35" class="ml-2">
  </div>
  <ul>
    <li>Scarica il file <a class="badge badge-success" href="<?php echo base_url(); ?>assets/config/ip_finder.bat" download data-toggle="tooltip" data-placement="right" title="Cliccami!">ip_finder.bat</a> <?php echo form_open('pages/exec');?><button type="submit" class="btn btn-outline-light btn-sm mt-2 mb-2">Esegui direttamente</button></form></li>
    <li>Esegui il file, verrà eseguito il comando in automatico <code class="text-warning">ipconfig > C:\xampp\htdocs\spese\assets\config\network_info.txt</code>, in modo da ottenere le informazioni sul tuo indirizzo ip locale.</li>
    <li>
      Avvia la configurazione
      <a class="badge badge-warning" data-toggle="collapse" href="#collapseWarning" role="button" aria-expanded="false" aria-controls="collapseWarning">Conferma</a>
    </li>
  </ul>
  <div class="collapse" id="collapseWarning">
    <div class="card card-body rounded bg-warning text-dark">
      <strong>ATTENZIONE!</strong>
      <p>Confermando modificherai parzialmente alcuni dati fondamentali per il corretto funzionamento dell'applicazione. <u>Assicurati che l'indirizzo ip della tua macchina sia fisso prima di procedere!</u></p>
      <small>Puoi ripristinare il servizio da pc recandoti su questo <a href="http://localhost/spese/" class="badge badge-primary">link</a> e cliccando il bottone "Ripristina config.php"</small>
      <?php echo form_open('pages/config');?>
        <button type="submit" name="button" class="mt-2 btn btn-danger">Avvia configurazione</button>
      </form>
    </div>
  </div>
<?php } ?>
</div>
