<!doctype html>
<html lang="en" class="h-100 w-100">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

  <title>Spese</title>
</head>
<body class="h-100 w-100">
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <a class="navbar-brand" href="/spese">Le mie spese</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active mr-3">
          <a class="nav-link font-weight-bold" href="<?php echo base_url();?>">Home</a>
        </li>
        <li class="nav-item active mr-3">
          <a class="nav-link d-flex aling-self-center" href="<?php echo base_url();?>lista">
            <img src="<?php echo base_url(); ?>assets/img/b-lista.svg" class="mr-2" alt="lista" height="25" width="25">
            Lista transazioni
          </a>
        </li>
        <li class="nav-item active mr-3">
          <a class="nav-link d-flex aling-self-center" href="<?php echo base_url();?>portafogli">
            <img src="<?php echo base_url(); ?>assets/img/b-portafoglio.svg" class="mr-2" alt="lista" height="25" width="25">
            Portafoglio e risparmi
          </a>
        </li>
        <li class="nav-item active mr-3">
          <a class="nav-link d-flex aling-self-center" href="<?php echo base_url();?>nuova_spesa">
            <img src="<?php echo base_url(); ?>assets/img/b-transazione.svg" class="mr-2" alt="lista" height="25" width="25">
            Registra transazione
          </a>
        </li>
      </ul>
    </div>
  </nav>
  <div class="w-100 h-100 p-4">
