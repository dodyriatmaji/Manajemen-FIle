<?php
class Upload extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper(array('form', 'url'));
	}
	function index(){
		$this->load->view('upload_form', array('error' => ' ' ));
	}
	function cobaupload(){
		$config['upload_path'] = './uploads/'; // folder untuk menyimpan hasil upload
		$config['allowed_types'] = 'gif|jpg|png'; // tipe file yang diperbolehkan
		$config['max_width'] = 1028; // ukuran maksimal yang diperbolehkan
		$config['max_height'] = 780; // ukuran maksimal yang diperbolehkan
		$config['encrypt_name'] = TRUE; // enkripsi nama file
		$this->load->library('upload', $config);
		if($this->upload->do_upload('myfile')){ // jika file berhasil diupload
			$tp=$this->upload->data();
			$res = $tp['full_path'];
			$ori = $tp['file_name'];
			$rw = $tp['raw_name'];
			$fr = $tp['file_ext'];
			$kcl = $tp['raw_name'].'_thumb'.$tp['file_ext'];
			$tnd = $tp['raw_name'].'_water'.$tp['file_ext'];
			$mr = $tp['file_path'].$ori;
			$tn = $tp['file_path'].$tnd;
			$ubah = $this->ubah_ukuran_gambar($res);
			$mark = $this->watermarking($mr);
			chmod($res,0777);
			chmod($tn,0777);
			$data = array('upload_data' => $this->upload->data(),'ori'=>$ori,'tnd'=>$tnd,'kcl'=>$kcl);
			$this->load->view('upload_success', $data);
		}
		else { // jika file gagal diupload
			$error = array('error' => $this->upload->display_errors());
			$this->load->view('upload_form', $error);
		}
	}

	// fungsi untuk membuat watermark
	function watermarking($gb) {
		$config['source_image'] = $gb;
		$config['wm_text'] = '12141366'; // text watermark
		$config['wm_type'] = 'text'; 
		$config['wm_font_path'] = './system/fonts/texb.ttf'; 
		$config['wm_font_size'] = 25;
		$config['wm_font_color'] = 'ffffff';
		$config['wm_vrt_alignment'] = 'middle';
		$config['wm_hor_alignment'] = 'center';
		$config['wm_padding'] = 20;
		$config['thumb_marker'] = '_water';
		$this->image_lib->initialize($config);
		$this->image_lib->watermark();
	}

	// fungsi untuk merubah ukuran/risize
	function ubah_ukuran_gambar($tp) {
		$config ['image_library'] = 'gd2';
		$config ['source_image'] = $tp;
		$config ['create_thumb'] = TRUE;
		$config ['maintain_ratio'] = TRUE;
		$config ['width'] = 75;
		$config ['height'] = 50;
		$this->load->library('image_lib',$config);
		$this->image_lib->resize();
	}
}
 