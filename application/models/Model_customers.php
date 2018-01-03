<?php
date_default_timezone_set("Asia/Jakarta");
class Model_customers extends CI_Model {

    public $table = "tbl_customer";

	function show_active() {
        $hasil = $this->db->query("SELECT distinct tcr.*,tc.country_name,tp.postal_name,ty.city_name
                                   FROM tbl_customer as tcr, tbl_country as tc, tbl_postal as tp, tbl_city as ty
                                   WHERE tcr.country_id=tc.country_id and tcr.postal_id=tp.postal_id and tcr.city_id=ty.city_id and tcr.cust_status='active' 
                                   ORDER BY customer_id DESC");
        return $hasil;
    }

	function save() {
        $tanggal = date('Y-m-d H:i:s');

        $data = array(
            'date_log' => $tanggal,
            'cust_code' => $this->input->post('cust_code', TRUE),
            'cust_company' => $this->input->post('cust_company', TRUE),
            'cust_name' => $this->input->post('cust_name', TRUE),
            'cust_id_number' => $this->input->post('cust_id_number', TRUE),
            'cust_address1' => $this->input->post('cust_address1', TRUE),
            'cust_address2' => $this->input->post('cust_address2', TRUE),
            'country_id' => $this->input->post('country_id', TRUE),
            'postal_id' => $this->input->post('postal_id', TRUE),
            'city_id' => $this->input->post('city_id', TRUE),
            'cust_phone' => $this->input->post('cust_phone', TRUE),
            'cust_fax' => $this->input->post('cust_fax', TRUE),
            'cust_mobile' => $this->input->post('cust_mobile', TRUE),
            'cust_NPWP' => $this->input->post('cust_NPWP', TRUE),
            'cust_NPWP_Address1' => $this->input->post('cust_NPWP_Address1', TRUE),
            'cust_NPWP_Address2' => $this->input->post('cust_NPWP_Address2', TRUE),
            'cust_NPWP_Name' => $this->input->post('cust_NPWP_Name', TRUE),
            'cust_NPPKP' => $this->input->post('cust_NPPKP', TRUE),
            'cust_payment' => $this->input->post('cust_payment', TRUE),
            'cust_limit' => $this->input->post('cust_limit', TRUE),
            'cust_TOP' => $this->input->post('cust_TOP', TRUE),
            'cust_Type' => $this->input->post('cust_Type', TRUE),
            'cust_location' => $this->input->post('cust_location', TRUE),
            'cust_since' => $this->input->post('cust_since', TRUE),
            'cust_salesID' => $this->input->post('cust_salesID', TRUE),
            'cust_status' => $this->input->post('cust_status', TRUE)
        );

        $this->db->insert($this->table, $data);
    