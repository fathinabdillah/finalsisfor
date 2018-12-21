<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
  		parent ::__construct();
		$this->load->model('model_library'); 
 }
	public function index() {
		$this->load->view('admin/index');
	}
	public function login() {
		$this->load->view('login');
	}
	public function loginAction() {
		redirect(base_url("index.php/admin/index"));
	}
	public function customer() {
		$this->load->view('admin/customer');
	}
	public function customerTambah(){
		$this->load->view('admin/customerForm');	
	}
	public function company() {
		$this->load->view('admin/company');
	}
	public function companyTambah(){
		$this->load->view('admin/companyForm');	
	}
	public function library() {
		$db_library['library']=$this->model_library->getAllData('library');
		$this->load->view('admin/library', $db_library);
	}
	public function libraryTambah(){
		$this->load->view('admin/libraryForm');	
	}
	public function product() {
		$this->load->view('admin/product');
	}
	public function productTambah(){
		$this->load->view('admin/productForm');	
	}
	public function post(){
		$this->load->view('admin/posts');	
	}
 public function simpan(){
  $data = array('judul_buku'=> $this->input->post('judul_buku', true),
   'penulis'=> $this->input->post('penulis', true),
   'kategori'=> $this->input->post('kategori', true),
   'bahasa'=> $this->input->post('bahasa', true),
   'deskripsi_singkat_buku'=> $this->input->post('deskripsi_singkat_buku', true),
   'status'=> $this->input->post('status', true)
  );

  $this->model_library->insertData('library',$data);
  redirect('admin/library');
 }
 public function edit($id)
 {
  $db_library['library'] = $this->model_library->getData('library',$id,'no_buku');
  $this->load->view('admin/libraryFormEdit', $db_library);
 }
 public function update()
 {
  $data = array('judul_buku'=> $this->input->post('judul_buku', true),
   'penulis'=> $this->input->post('penulis', true),
   'kategori'=> $this->input->post('kategori', true),
   'bahasa'=> $this->input->post('bahasa', true),
   'deskripsi_singkat_buku'=> $this->input->post('deskripsi_singkat_buku', true),
   'status'=> $this->input->post('status', true)
 );
 	$id = $this->input->post('hidden_id');
 	$this->model_library->update('library',$data,$id, 'no_buku');
 		redirect('admin/library');
 }
 public function delete()
 {
  $u = $this->uri->segment(3);
  $this->model_library->delete('library', $u, 'no_buku');
  redirect('admin/library','refresh');
 }
}
