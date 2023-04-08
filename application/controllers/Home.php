<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Home extends CI_Controller {

	//load database
	public function __construct()
	{
		parent::__construct();
		$this->load->model('konfigurasi_model');
		$this->load->model('user_model');
		$this->load->model('fasilitas_model');
		$this->load->model('pengunjung_model');
		require APPPATH.'libraries/phpmailer/src/Exception.php';
        require APPPATH.'libraries/phpmailer/src/PHPMailer.php';
        require APPPATH.'libraries/phpmailer/src/SMTP.php';
	}

	public function index()
	{
		$konfigurasi = $this->konfigurasi_model->listing();
		$pengunjung = $this->pengunjung_model->listing();
		$user = $this->user_model->listing_home();
		$fasilitas = $this->fasilitas_model->listing();

		// $ambilDataPengunjung = $konfigurasi->data_pengunjung;
		// $incrementDataPengunjung = $ambilDataPengunjung + 1;
		
		$ip = $this->input->ip_address();
		$cekIp = $this->pengunjung_model->cariIp($ip);
		$hitungCekIp = $this->pengunjung_model->hitungCariIp($ip);
		if($hitungCekIp > 0){
			
				$dataPengunjungUpdate = array(
					'ip'		=>	$ip,
					'tanggal' => date('Y-m-d')
				);
				$this->pengunjung_model->edit($dataPengunjungUpdate);
			
		}else{
			$dataPengunjungInsert = array(
				'ip'		=>	$ip,
				'tanggal' => date('Y-m-d')
			);
$this->pengunjung_model->tambah($dataPengunjungInsert);
		}

		

		// $this->konfigurasi_model->edit($dataIncrement);

        $data = array(	'title'	=>	'Perpustakaan Asia Malang',
						'konfigurasi' => $konfigurasi,
						'user' => $user,
						'fasilitas' => $fasilitas,
						'total' => $this->pengunjung_model->total(),
						'totalHariIni' => $this->pengunjung_model->totalHariIni()
				);
		$this->load->view('home', $data, FALSE);
	}

	public function kirim_email()
	{
		$i = $this->input;
                     $mail = new PHPMailer();
                   
            
                    // SMTP configuration
                    $mail->isSMTP();
					$mail->Mailer = "smtp";	
                    $mail->SMTPDebug  = 0;  
					$mail->SMTPAuth   = TRUE;
					$mail->SMTPSecure = "tls";
					$mail->Port       = 587;
					$mail->Host       = "smtp.gmail.com";
					$mail->Username   = "proh18340@gmail.com";
					$mail->Password   = "blank@bagus.com";
            
                    $mail->IsHTML(true);
					$mail->AddAddress("perpusasia@gmail.com", $i->post('nama'));
					$mail->SetFrom("proh18340@gmail.com", "admin@library.asia.ac.id");
					$mail->AddReplyTo("perpusasia@gmail.com", $i->post('nama'));
					// $mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
					$mail->Subject = $i->post('subjek');
					$content = $i->post('pesan');
					$mail->MsgHTML($content); 
					if(!$mail->Send()) {
					echo "Error while sending Email.";
					var_dump($mail);
					} else {
					echo "Email sent successfully";
					}
	}
}
