<?php

class Soedit extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		//model module
		$this->load->model('soedit_model');
		
		$this->load->helper('date');
		//view module
		 $this->data = array(
            'title' => 'Special Order',
			'purchasesclass' => 'active',
			'aprclass' => 'active',
			'prclass' => '',
			'poclass' => '',
			'receiveclass' => '',
			'usersclass' => '',
			'userssubclass' => '',
			'reportsclass' => '',
			'assetmanagementclass' => '',
			'recevingassetsclass' => '',
			'assetclass' => '',
			'propertyclass' => '',
			'supplymanagementclass' => '',
			'settingsclass' => '',
			'requisitionclass' => '',
			'equipmentclass' => '',
			'itemsclass' => '',
			'suppliersclass' => '',
			'employeesclass' => '',
			'inventoryclass' => '',
			'subnavtitle' => 'Student Search',
			'typeahead' => '1',
			'parclass' => '',
			'icsclass' => '',
			'ptrclass' => '',
			'rreclass' => '',
			'adjustmentclass' => '',
			'customizereportclass' => '',
			'warehouseclass' => ''
			);
		//javascript module
		$this->js = array(
            'jsfile' => 'soedit.js',
			'typeahead' => '1'
			);
	}
	
	public function index()
	{
		$data = $this->data;
		$js = $this->js;
		
		$keyword = $this->input->post('keyword');
		
		if($keyword!=""){
			$data['result_list'] = $this->soedit_model->keywordsearch($keyword);
			$data['sodetails'] =  $this->soedit_model->sodetails($keyword);
			$data['statuslist'] =  $this->soedit_model->statuslist();
			$data['statuslist_names'] =  $this->soedit_model->statuslist_names();
			$data['keyword'] = $keyword;
		}else{
			$data['result_list'] = array();
			$data['sodetails'] =   array();
			$data['statuslist'] =   array();
			$data['statuslist_names'] =  array();
			$data['keyword'] = "";
			
			
		}
		//show apr list
		$data['heilist'] = $this->soedit_model->gethei();
		$data['programlist'] = $this->soedit_model->getprograms();
		$data['memberlist'] = $this->soedit_model->getmember();
		
		//display apr
		$this->load->view('inc/header_search_view');
		$this->load->view('soedit_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function updateso(){
		$so_id = $this->input->post('so_id');
		$instcode = $this->input->post('instcode');
		$number_of_students = $this->input->post('number_of_students');
		$grad_month = $this->input->post('grad_month');
		$grad_day = $this->input->post('grad_day');
		$grad_year = $this->input->post('grad_year');
		$sem_enrolled = $this->input->post('sem_enrolled');
		$acad_year = $this->input->post('acad_year');
		$prog_id = $this->input->post('prog_id');
		$assigned_to = $this->input->post('assigned_to');
		$sostatus = $this->input->post('sostatus');
		$this->soedit_model->updateso($so_id,$instcode,$number_of_students,$grad_month,$grad_day,$grad_year,$sem_enrolled,$acad_year,$prog_id,$assigned_to,$sostatus);
	}
	
	public function updatename(){
		$nameindex = $this->input->post('nameindex');
		$lname = $this->input->post('lname');
		$fname = $this->input->post('fname');
		$mname = $this->input->post('mname');
		$name_status = $this->input->post('name_status');
		
		$this->soedit_model->updatename($nameindex,$lname,$fname,$mname,$name_status);
	}
	public function deletename(){
		$nameindex = $this->input->post('id');
		
		$this->soedit_model->deletename($nameindex);
	}
	
	
	
	public function details($id)
	{
		$data = $this->data;
		$js = $this->js;
		$data['aprid'] = $id;
		$data['aprmaindetails'] = $this->apr_model->getaprmaindetails($id);
		
		//show apr list
		$data['apr_list_items'] = $this->apr_model->get_list_items($id);
		$data['agencyname'] = $this->asset_model->getagencyname("APR","AGENCYNAME");
		$data['agencyaccountcode'] = $this->asset_model->agencyaccountcode("APR","AGENCYACCOUNTCODE");
		$data['procurement'] = $this->asset_model->procurement("APR","PROCUREMENT");
		$data['aprcol1'] = $this->asset_model->col1("APR","COLUMN1");
		$data['aprcol2'] = $this->asset_model->col2("APR","COLUMN2");
		$data['aprcol3'] = $this->asset_model->col2("APR","COLUMN3");
		
		//PO
		$data['suppliers'] = $this->apr_model->getsuppliers();
		
		//print_r($data['aprmaindetails']);
		//display apr
		$this->load->view('inc/header_view');
		$this->load->view('purchases/aprdetails_view',$data);
		$this->load->view('inc/footer_view',$js);
		
	}
	
	public function saveapr(){
		$aprdate = $this->input->post('aprdate');
		$aprno = $this->input->post('aprno');
		$this->apr_model->saveapr($aprdate,$aprno);
	}
	
	public function getitemlist(){
		
		$items = $this->apr_model->getitemlist();
		$tokens = array();
		foreach($items as $items_array){
			$tokens[] = $items_array['itemNo'] . "-". $items_array['description'];
		}
		echo json_encode($tokens);

	}
	
	public function saveapritem(){
		$itemid = $this->input->post('itemid');
		$description = $this->input->post('description');
		$unit = $this->input->post('unit');
		$unitcost = $this->input->post('unitcost');
		$aprid = $this->input->post('aprid');
		$itemqty = $this->input->post('itemqty');
		$this->apr_model->saveapritem($itemid,$aprid,$description,$itemqty,$unit,$unitcost);
	}
	
	public function getitemdetails(){
		
		$itemid = $this->input->post('itemid');
		if($itemid==0){
			echo "0";
		}else{
			$items_details = $this->apr_model->getitemdetails($itemid);
			echo $items_details;
		}
		
				
	}
	
	public function deleteapritem(){
		$aprid = $this->input->post('aprid');
		$sql = "DELETE from purchase_apr_items where apritemsid='".$aprid."'";
		$this->db->query($sql);
		
	}
	public function deleteapr(){
		$aprid = $this->input->post('aprid');
		$this->db->delete('purchase_apr', array('aprid' => $aprid));
		$this->db->delete('purchase_apr_items', array('aprid' => $aprid));
		//$sql = "DELETE from purchase_apr where aprid='".$aprid."'";
		//$this->db->query($sql);
		
	}
	
	public function checkaprduplicate(){
		$aprno = $this->input->post('aprno');
		$duplicatecount = $this->apr_model->checkaprdupliate($aprno);
		echo $duplicatecount;
		//echo json_encode($duplicatecount);
		
	}
	
	public function updateunitprice(){
		$apritemsid = $this->input->post('apritemsid');
		$unitprice = $this->input->post('unitprice');
		$availability = $this->input->post('availability');
		
		$this->apr_model->updateunitprice($apritemsid,$unitprice,$availability);
	}
	
	public function checkpono(){
		$pono = $this->input->post('pono');
		$items = $this->apr_model->checkduplicatepo($pono);
		echo $items;

	}
	
	public function addpo(){
		$podate = $this->input->post('podate');
		$pono = $this->input->post('pono');
		$placeofdelivery = $this->input->post('placeofdelivery');
		$dateofdelivery = $this->input->post('dateofdelivery');
		$deliveryterm = $this->input->post('deliveryterm');
		$paymentterm = $this->input->post('paymentterm');
		$prnomodal = $this->input->post('prnomodal');
		$modeofprocurementpo = $this->input->post('modeofprocurementpo');
		$supplierpo = $this->input->post('supplierpo');
		$prid = $this->input->post('prid');
	
		$lastid = $this->apr_model->savepo($podate,$prid,$pono,$placeofdelivery,$dateofdelivery,$deliveryterm,$paymentterm,$prnomodal,$modeofprocurementpo,$supplierpo);

		echo $lastid;

		//$currentpoid = $lastid;
		//$data_aocitems = $this->purchaserequest_model->copyaoctopo($currentpoid,$supplierpo,$prid);

		//$this->db->insert_batch('purchase_po_items',$data_aocitems); 
		
	}
	
	
	
}