<?php
class Pages extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    //$this->load->model('news_model');
    $this->load->helper('url_helper');
    $this->load->library('email');
  }

  public function view($page = 'home')
  {
    $this->load->helper('url');
    if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
    {
      // Whoops, we don't have a page for that!
      show_404();
    }

    $data['title'] = ucfirst($page); // Capitalize the first letter

    $this->load->view('templates/header', $data);
    $this->load->view('pages/home', $data);
    $this->load->view('templates/footer', $data);
  }

  public function config(){
    //prima parte
    $ip = "localhost";
    $reading = fopen('assets/config/network_info.txt', 'r');
    while (!feof($reading)) {
      $line = fgets($reading);
      if (stristr($line, '   Indirizzo IPv4. . . . . . . . . . . . :')) {
        $pattern = '/\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/';
        preg_match($pattern, $line, $matches);
        $ip = (empty($matches[0])) ? "localhost" : $matches[0] ;
        //$ip = $matches[0];
        print_r($matches);
        echo "trovato";
      }
    }
    fclose($reading);

    // seconda parte
    $reading = fopen('application/config/config.php', 'r');
    $writing = fopen('application/config/config-temp.php', 'w');

    $replaced = false;

    while (!feof($reading)) {
      $line = fgets($reading);
      if (stristr($line, '$config[\'base_url\'] = \'http://localhost/spese/\';')) {
        echo $line = '$config[\'base_url\'] = \'http://'.$ip.'/spese/\';'."\n";
        $replaced = true;
        echo "fatto";
      }
      fputs($writing, $line);
    }
    fclose($reading); fclose($writing);
    // might as well not overwrite the file if we didn't replace anything
    if ($replaced)
    {
      rename('application/config/config-temp.php', 'application/config/config.php');
    } else {
      unlink('application/config/config-temp.php');
    }
    header('Location: http://'.$ip.'/spese');
  }

  public function reset(){
    $reading = fopen('application/config/config.php', 'r');
    $writing = fopen('application/config/config-temp.php', 'w');

    $replaced = false;

    while (!feof($reading)) {
      $line = fgets($reading);
      if (stristr($line, '$config[\'base_url\'] = ')) {
        echo $line = '$config[\'base_url\'] = \'http://localhost/spese/\';'."\n";
        $replaced = true;
        echo "fatto";
      }
      fputs($writing, $line);
    }
    fclose($reading); fclose($writing);
    // might as well not overwrite the file if we didn't replace anything
    if ($replaced)
    {
      rename('application/config/config-temp.php', 'application/config/config.php');
    } else {
      unlink('application/config/config-temp.php');
    }
    header('Location: http://localhost/spese');
  }

  public function exec(){
    if (system('cmd /c C:\xampp\htdocs\spese\assets\config\ip_finder.bat')) {
      echo "fatto";
    }
    header('Location: '.base_url());
  }
}
