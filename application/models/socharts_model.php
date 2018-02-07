<?php


class Socharts_model extends CI_Model
{
	
	
	public function sostatus($year,$month)
	{
		$sqlq = $this->db->query("SELECT DISTINCT(STATUS) as label FROM so_application WHERE MONTH(date_received)=".$this->db->escape($month)." AND YEAR(date_received)=".$this->db->escape($year)." ORDER BY STATUS ASC");
		return $sqlq->result_array();

	}
	public function totalsostatus($year,$month)
	{
		
		$sqlq = $this->db->query("SELECT DISTINCT(STATUS) as label,COUNT(*) AS value FROM so_application WHERE MONTH(date_received)=".$this->db->escape($month)." AND YEAR(date_received)=".$this->db->escape($year)." GROUP BY STATUS ORDER BY STATUS ASC");
		return $sqlq->result_array();
		
	}
	
	
	
	public function employeelist()
	{
		
		$this->db2 = $this->load->database("personnel_dtr", true);
		$sqlq = $this->db2->query("SELECT CONCAT(fname,' ',lname) AS label FROM tblemployee ORDER BY fname asc");
		return $sqlq->result_array();

	}

	public function commlist($year,$month)
	{
		
		$this->db2 = $this->load->database("personnel_dtr", true);
		$sqlq = $this->db2->query("SELECT COUNT(*) AS VALUE,CONCAT(fname,' ',lname) AS label  FROM tblemployee LEFT JOIN  tblcom_employee_assigned_com ON tblemployee.emp_id = tblcom_employee_assigned_com.emp_id WHERE MONTH(datetime_encoded)=".$this->db->escape($month)." AND YEAR(datetime_encoded) = ".$this->db->escape($year)." GROUP BY tblemployee.emp_id ORDER BY fname asc");
		return $sqlq->result_array();

	}
	
	public function commlisttable($year,$month)
	{
		
		$this->db2 = $this->load->database("personnel_dtr", true);
		$sqlq = $this->db2->query("SELECT *,CONCAT(fname,' ',lname) AS label  FROM tblemployee LEFT JOIN  tblcom_employee_assigned_com ON tblemployee.emp_id = tblcom_employee_assigned_com.emp_id WHERE MONTH(datetime_encoded)=".$this->db->escape($month)." AND YEAR(datetime_encoded) = ".$this->db->escape($year)." ORDER BY fname asc");
		return $sqlq->result_array();

	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	public function regionlist_all()
	{
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		return $sqlq->result_array();
		
	}
	
	
	
	
	public function totalheiperregion_table()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value,'".$regions['region_description']."' as regionname,'".$regions['region_db']."' as region_db  from a_institution_profile where hei_status='ACTIVE'");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	
	public function searchhei($heisearch)
	{
		$clean_search = "%$heisearch%";
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		//$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select * from a_institution_profile where hei_status='ACTIVE' AND instname like ".$this->db->escape($clean_search)."");
			$countper_region += $cpr->result_array();
			///array_push($countper_region,$searchresult[0]);
			//$countper_region[$ctr]=$result;
			//$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function facultysearch($facultynamesearch)
	{
		$clean_search = "%$facultynamesearch%";
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		//$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("SELECT a_faculty.instcode,instname,facultyid, faculty_name,faculty_full_part_code,fullpart_description,faculty_gender,highestdegree_description,faculty_programname,faculty_masters,faculty_doctorate,license_description,tenure,rank_description,teaching_description, subjects, salary_description,faculty_status,a_institution_profile.region
FROM a_faculty
LEFT JOIN ref_f_fullpart ON a_faculty.faculty_full_part_code = ref_f_fullpart.fullpartcode
LEFT JOIN ref_f_highestdegree ON a_faculty.highest_degree_code = ref_f_highestdegree.highestdegreecode
LEFT JOIN ref_f_license ON a_faculty.professional_license_code = ref_f_license.licensecode
LEFT JOIN ref_f_rank ON a_faculty.rank_code = ref_f_rank.rankcode
LEFT JOIN ref_f_teachingload ON a_faculty.teaching_load_code = ref_f_teachingload.teachingloadcode
LEFT JOIN ref_f_salary ON a_faculty.annual_salary_code = ref_f_salary.salarycode 
LEFT JOIN a_institution_profile ON a_faculty.instcode = a_institution_profile.instcode where faculty_deleted=0 AND faculty_name like ".$this->db->escape($clean_search)."");
			$countper_region += $cpr->result_array();
			///array_push($countper_region,$searchresult[0]);
			//$countper_region[$ctr]=$result;
			//$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function getxlsinstprofile($heidb,$status)
	{
		//$result = $this->db->get('contacts');
		$this->db3 = $this->load->database($heidb, true);
		if($status=="ALL"){
			$heidir = $this->db3->query("SELECT * FROM a_institution_profile");
		}else{
			$heidir = $this->db3->query("SELECT * FROM a_institution_profile where hei_status=".$this->db->escape($status)."");
		}
		
		return $heidir->result_array();
		
		
	}
	
	public function totalloginperregion()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value from users_log");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function totalloginperregion_table()
	{
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		$countper_region = array();
		$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			$cpr=$this->db2->query("Select count(*) as value,'".$regions['region_description']."' as regionname,'".$regions['region_db']."' as region_db from users_log");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++;
		endforeach;
		
		return $countper_region;
	}
	
	public function getxlsuserlog($heidb)
	{
		//$result = $this->db->get('contacts');
		$this->db3 = $this->load->database($heidb, true);
		
			$heidir = $this->db3->query("SELECT * FROM users_log");
		
		
		return $heidir->result_array();
		
		
	}
	
		public function get()
	{
		
		$query = $this->db->get('school_year');
		return $query->result_array();
		
		
	}
	
	public function checksy($school_year)
	{
		
		
		$checkuser = $this->db->query("SELECT count(syid) as duplicateid FROM school_year where school_year=".$this->db->escape($school_year)."");
		return $checkuser->result_array();
		
	}
	
	public function savesy($school_year)
	{
		
		$sql = "INSERT INTO school_year (school_year) VALUES (".$this->db->escape($school_year).")";
		$this->db->query($sql);
		
		
		$sqlq = $this->db->query("Select * from regions order by regionid ASC");
		$regionlist = $sqlq->result_array();
		
		//$countper_region = array();
		//$ctr=0;
		foreach($regionlist as $regions):
			$this->db2 = $this->load->database($regions['region_db'], true);
			
			
			$b_program = $this->db2->query("SELECT * FROM b_program where program_deleted=0");
			$programlist = $b_program->result_array();
			
			//insert blank enrolment
			$esql = "INSERT INTO b_program_enrolment (e_programid,instcode,edatayear,pcredit,tuitionperunit,programfee) SELECT programid, instcode,".$this->db2->escape($school_year)." ,pcredit,tuitionperunit,programfee FROM b_program";
			$this->db2->query($esql);
			
			//insert blank graduate
			$gsql = "INSERT INTO b_program_graduate (g_programid,instcode,gdatayear)
	SELECT programid, instcode, ".$this->db2->escape($school_year)." FROM b_program";
			$this->db2->query($gsql);
				
			
			/*
			
			$cpr=$this->db2->query("Select count(*) as value,'".$regions['region_description']."' as regionname,'".$regions['region_db']."' as region_db from users_log");
			$result = $cpr->result_array();
			//unset($result);
			$countper_region[$ctr]=$result[0];
			//$countper_region[$ctr] = '"value:"'.'"'.$result[0]['value'].'"';
			$ctr++; */
		endforeach;
		
		//return $countper_region;
		

		
	}
	public function deletesy($syid)
	{
		
		//$this->db->delete('project', array('projectid' => $projectid));
		$sql = "DELETE FROM school_year where syid=".$this->db->escape($syid)."";
		$this->db->query($sql);
		
	}
	
}

?>