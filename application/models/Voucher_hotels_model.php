<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Voucher_hotels_model extends CI_Model
{
    public function getDataParent($table, $order_column, $parent, $order_type ){
        $this->db->where("parent = '$parent' and status = 'active' and not (idhotels ='GFUB' OR idhotels='GFVL')");
        $this->db->order_by("$order_column", "$order_type");
        $query = $this->db->get("$table");
        $result = $query->result();
        $this->db->save_queries = false;
        return $result;
    }

    function getIdVoucher($idVoucher) {
      
        $this->db->where('idvoucher', $idVoucher);
        $this->db->where('status_voucher', '1');
		$this->db->limit(1);
		$query = $this->db->get("smartreport_voucherhotels");

		if ($query->num_rows() == 1) {
			return TRUE;
		}
		
		return FALSE;
    }
    
    function getIdVoucherEmail($idVoucher, $emailVoucher) {
      
        $this->db->where('idvoucher', $idVoucher);
        $this->db->where('guest_email', $emailVoucher);
        $this->db->where('status_voucher', '1');
		$this->db->limit(1);
		$query = $this->db->get("smartreport_voucherhotels");

		if ($query->num_rows() == 1) {
			return TRUE;
		}
		
		return FALSE;
    }
    
    function update_data_voucher($table, $data, $idVoucher, $emailVoucher){
        $this->db->where('guest_email', $emailVoucher);        
        $this->db->where('idvoucher', $idVoucher);
        $this->db->update("$table", $data);
        return true;
    }

    function get_data_voucher($idVoucher){
        $this->db->from('smartreport_voucherhotels');  
        $this->db->where('idvoucher', $idVoucher);
        return $this->db->get()->result();
    }
}