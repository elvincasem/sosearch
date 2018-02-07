<?php

class Socharts extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		
		
		
		$this->load->model('socharts_model');
		  $this->data = array(
            'title' => 'HEI by Region',
			'heiclass' => 'active',
			'heilist' => '',
			'programlist' => '',
			'deanslist' => '',
			'programapplication' => '',
			'accounts' => '',
			'contacts' => '',
			'permits' => '',
			'scholarship' => '',
			'scholarslist' => '',
			'accreditedhei' => '',
			'scholarshipapplicant' => '',
			'paymentlist' => '',
			'settingsclass' => '',
			'voucherlist' => '',
			'facultyclass' => '',
			'breadcrumb' =>array('bc'=>"Home")
			);
			$this->js = array(
            'jsfile' => 'central.js'
			);
			
		
		
		
		
		
	}
	
	public function index()
	{

		$data = $this->data;
		$js = $this->js;
		
		$currenttime = time();
		$currentm = date('m',$currenttime);
		$currenty = date('Y',$currenttime);
		header('Location: socharts/filter/'.$currenty.'/'.$currentm);
		
		
		
		
		//$this->load->view('charts/header_view');
		//$data['regionlist'] = json_encode($this->socharts_model->regionlist());
		//$data['totalheiperregion'] = json_encode($this->socharts_model->totalheiperregion());
		//$data['totalheiperregion_table'] = $this->socharts_model->totalheiperregion_table();
		//print_r($data['totalheiperregion']);
		//$this->load->view('charts/socharts_view',$data);
		//$this->load->view('inc/footer_view',$js);
		
	}
	
	public function filter($year,$month){
		$data = $this->data;
		$js = $this->js;
		$data['current_year_filter'] = $year;
		$data['current_month_filter'] = $month;

		$this->load->view('charts/header_view');
		$data['sostatus'] = json_encode($this->socharts_model->sostatus($year,$month));
		$data['totalsostatus'] = json_encode($this->socharts_model->totalsostatus($year,$month));
		//$data['totalheiperregion_table'] = $this->socharts_model->totalheiperregion_table();
		//print_r($data['totalheiperregion']);
		$this->load->view('charts/socharts_view',$data);
		$this->load->view('inc/footer_view',$js);
	}
	
	
	
	
	
	
	
	public function name($productID,$two){
		//$this->load->view('inc/header_view');
		//$productID =  $this->uri->segment(3);
		echo $two;
	}
	
	public function instprofile($heidb,$status){
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
		$this->excel->getActiveSheet()->setTitle('Institutional Profile');
		
		$this->excel->getActiveSheet()->setCellValue('A1','id');	
		$this->excel->getActiveSheet()->setCellValue('B1','instcode');	
		$this->excel->getActiveSheet()->setCellValue('C1','instname');	
		$this->excel->getActiveSheet()->setCellValue('D1','formownership');	
		$this->excel->getActiveSheet()->setCellValue('E1','insttype');	
		$this->excel->getActiveSheet()->setCellValue('F1','insttype2');	
		$this->excel->getActiveSheet()->setCellValue('G1','street');	
		$this->excel->getActiveSheet()->setCellValue('H1','municipality');	
		$this->excel->getActiveSheet()->setCellValue('I1','province1');	
		$this->excel->getActiveSheet()->setCellValue('J1','province2');	
		$this->excel->getActiveSheet()->setCellValue('K1','region');	
		$this->excel->getActiveSheet()->setCellValue('L1','postal code');	
		$this->excel->getActiveSheet()->setCellValue('M1','institution tel');	
		$this->excel->getActiveSheet()->setCellValue('N1','institution fax');	
		$this->excel->getActiveSheet()->setCellValue('O1','institution head');	
		$this->excel->getActiveSheet()->setCellValue('P1','email');	
		$this->excel->getActiveSheet()->setCellValue('Q1','website');	
		$this->excel->getActiveSheet()->setCellValue('R1','establised');
		$this->excel->getActiveSheet()->setCellValue('S1','sec');
		$this->excel->getActiveSheet()->setCellValue('T1','year approved');
		$this->excel->getActiveSheet()->setCellValue('U1','tocollege');
		$this->excel->getActiveSheet()->setCellValue('V1','touniversity');
		$this->excel->getActiveSheet()->setCellValue('W1','institutionhead');
		$this->excel->getActiveSheet()->setCellValue('X1','head title');
		$this->excel->getActiveSheet()->setCellValue('Y1','highest education');
		$this->excel->getActiveSheet()->setCellValue('Z1','latitude');
		$this->excel->getActiveSheet()->setCellValue('AA1','longtitude');
		$this->excel->getActiveSheet()->setCellValue('AB1','heitype');
		$this->excel->getActiveSheet()->setCellValue('AC1','hei_status');
		$this->excel->getActiveSheet()->setCellValue('AD1','hei_remarks');
		
		
		
		
		
		
		$this->load->model('heidirectory_model');
		$hei_dir_list = $this->centraloffice_model->getxlsinstprofile($heidb,$status);
		
		$this->excel->getActiveSheet()->fromArray($hei_dir_list,NULL,'A2');
		$filename='institutional_profile_'.$heidb.'.xls';
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
		 $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5'); 
		 $objWriter->save('php://output');
		
	

	}
	
	
	
}