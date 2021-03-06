<?php


class Soedit_model extends CI_Model
{
	
	public function keywordsearch($keyword)
	{
		$users = $this->db->query("SELECT so_application_names.index,lname,fname,mname,so_application_names.status,ProgName,InstName,so_number,date_numbered,remarks,date_reco_approval FROM so_application_names LEFT JOIN so_application_remarks ON so_application_names.index = so_application_remarks.index LEFT JOIN so_application ON so_application_names.so_id = so_application.so_id left join programs on so_application.prog_id = programs.ProgID where so_application.so_id=".$this->db->escape($keyword)."");
		return $users->result_array();
		
		
	}
	
	public function gethei()
	{
		$users = $this->db->query("SELECT * from heimasterlist");
		return $users->result_array();
		
		
	}
	public function statuslist()
	{
		$users = $this->db->query("SELECT DISTINCT(status) FROM so_application");
		return $users->result_array();
		
		
	}
	public function statuslist_names()
	{
		$users = $this->db->query("SELECT DISTINCT(status) FROM so_application_names");
		return $users->result_array();
		
		
	}
	
	public function sodetails($keyword)
	{
		$users = $this->db->query("SELECT * from so_application where so_application.so_id=".$this->db->escape($keyword)."");
		$result =  $users->result_array();
		return $result[0];
		
		
	}
	
	public function getprograms()
	{
		$users = $this->db->query("SELECT * from programs");
		return $users->result_array();
		
		
	}
	
	public function getmember()
	{
		$users = $this->db->query("SELECT * from members");
		return $users->result_array();
		
		
	}
	
	public function updateso($so_id,$instcode,$number_of_students,$grad_month,$grad_day,$grad_year,$sem_enrolled,$acad_year,$prog_id,$assigned_to,$sostatus)
	{
				
		$sql = "update so_application set InstCode=".$this->db->escape($instcode).",prog_id=".$this->db->escape($prog_id).",number_of_students=".$this->db->escape($number_of_students).",grad_month=".$this->db->escape($grad_month).",grad_day=".$this->db->escape($grad_day).",grad_year=".$this->db->escape($grad_year).",sem_enrolled=".$this->db->escape($sem_enrolled).",acad_year=".$this->db->escape($acad_year).",assigned_to=".$this->db->escape($assigned_to).",status=".$this->db->escape($sostatus)." where so_id=".$this->db->escape($so_id)."";

		$this->db->query($sql);

		
		
	}
	
	public function updatename($nameindex,$lname,$fname,$mname,$name_status)
	{
				
		$sql = "update so_application_names set lname=".$this->db->escape($lname).",fname=".$this->db->escape($fname).",mname=".$this->db->escape($mname).",status=".$this->db->escape($name_status)." where so_application_names.index=".$this->db->escape($nameindex)."";
		echo $sql;
		$this->db->query($sql);

		
		
	}
	public function deletename($nameindex)
	{
		$this->db->delete('so_application_names', array('index' => $nameindex)); 
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function getsuppliers()
	{
		$sup = $this->db->query("SELECT * from suppliers");
		return $sup->result_array();

	}
	
	public function getaprmaindetails($id)
	{
		$sql = $this->db->query("SELECT * from purchase_apr where aprid='$id'");
		$aprmain = $sql->result_array();
		return $aprmain[0];
	}
	
	public function saveapr($aprdate,$aprno)
	{
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		
		$sql = "INSERT INTO purchase_apr (aprdate,aprno,addedby) VALUES (".$this->db->escape($aprdate).", ".$this->db->escape($aprno).", ".$this->db->escape($uid).")";
		$this->db->query($sql);
		//echo $this->db->affected_rows();
		
		$sqlselect = $this->db->query("SELECT MAX(aprid) AS lastid FROM purchase_apr");
		$lastidinserted = $sqlselect->result_array();
		//echo json_encode($lastidinserted[0]);
		$currentid = $lastidinserted[0]['lastid'];
		echo $currentid;
		
		
	}
	
	public function getitemlist()
	{
		$itemlist = $this->db->query("SELECT * from items");
		return $itemlist->result_array();
		
		
	}
	
	public function saveapritem($itemid,$aprid,$description,$itemqty,$unit,$unitcost)
	{
		
		$sql = "INSERT INTO purchase_apr_items (itemid,aprid,description,qty,unit,unitprice) VALUES (".$this->db->escape($itemid).",".$this->db->escape($aprid).",".$this->db->escape($description).",".$this->db->escape($itemqty).",".$this->db->escape($unit).",".$this->db->escape($unitcost).")";
		$this->db->query($sql);
				
		
	}
	
	public function getitemdetails($itemid){
		$sqlselect = $this->db->query("SELECT * FROM items where itemNo=$itemid");
		$itemdetails = $sqlselect->result_array();
		echo json_encode($itemdetails[0]);
	}

	public function get_list_items($aprid)
	{
		$itemlist = $this->db->query("SELECT * from purchase_apr_items where aprid='$aprid'");
		return $itemlist->result_array();
		
		
	}
	public function checkaprdupliate($aprno)
	{
		$duplicatecount = $this->db->query("SELECT count(*) as duplicate from purchase_apr where aprno='$aprno'");
		$duplic = $duplicatecount->result_array();
		echo json_encode($duplic[0]);
		
		
		
	}
	public function updateunitprice($apritemsid,$unitprice,$availability)
	{
				
		$sql = "update purchase_apr_items set unitprice=".$this->db->escape($unitprice).",availability=".$this->db->escape($availability)." where apritemsid=".$this->db->escape($apritemsid)."";

		$this->db->query($sql);
		
		
		
		
	}
	
	public function checkduplicatepo($pono)
	{
		
		$sql = $this->db->query("SELECT COUNT(*) as duplicatepono from purchase_po where pono='$pono'");
		$pomain = $sql->result_array();
		echo $pomain[0]['duplicatepono'];
	}
	
	public function savepo($podate,$prid,$pono,$placeofdelivery,$dateofdelivery,$deliveryterm,$paymentterm,$prnomodal,$modeofprocurementpo,$supplierpo)
	{
		$this->load->library('session');
		$this->session;
		$uid = $this->session->userdata('uid');
		
		$sql = "INSERT INTO purchase_po (podate,pono,prid,prno,supplierid,modeofprocurement,placeofdelivery,dateofdelivery,deliveryterm,paymentterm,addedby) VALUES (".$this->db->escape($podate).", ".$this->db->escape($pono).", ".$this->db->escape($prid).",".$this->db->escape($prnomodal).", ".$this->db->escape($supplierpo).", ".$this->db->escape($modeofprocurementpo).",".$this->db->escape($placeofdelivery).", ".$this->db->escape($dateofdelivery).", ".$this->db->escape($deliveryterm).", ".$this->db->escape($paymentterm).", ".$this->db->escape($uid).")";
		$this->db->query($sql);
		
		
		$sqlselect = $this->db->query("SELECT MAX(poid) AS lastid FROM purchase_po");
		$lastidinserted = $sqlselect->result_array();
		
		$currentid = $lastidinserted[0]['lastid'];
		
		
		//copy values from other tables
		$sqlselect2 = $this->db->query("SELECT $currentid as poid,purchase_apr_items.itemid as itemid,purchase_apr_items.description,purchase_apr_items.qty,purchase_apr_items.unit,purchase_apr_items.unitprice FROM purchase_apr_items where purchase_apr_items.aprid='$prid'");
		$result_array =  $sqlselect2->result_array();
		$this->db->insert_batch('purchase_po_items',$result_array); 
		
		return $currentid;
		
	}
	
	
}

?>