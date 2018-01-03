<?php
class Customer_active extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('Form_validation');
        $this->load->model(array('Model_customers'));
    }

    function index() {
        $data['active'] = $this->Model_customers->show_active();
        $this->template->load('template', 'customers/active/view_active', $data);
    }

    function add() {
        $konfig = [
            [
                'field' => 'cust_code',
                'label' => 'Cust Code',
                'rules' => 'required|min_length[5]|max_length[20]|is_unique[tbl_customer.cust_code]',
                'errors' => [
                    'required' => 'Anda Harus Memasukkan %s',
                    'min_length' => '%s Minimal 3 Karakter',
                    'max_length' => '%s Maksimal 8 Karakter',
                    'is_unique' => '%s Yang Di Masukkan Sudah Digunakan',
                ],
            ],
            [
                'field' => 'cust_company',
                'label' => 'Cust Company',
                'rules' => 'required|alpha_numeric_spaces',
                'errors' => [
                    'required' => 'Anda Harus Memasukkan %s',
                    'alpha_numeric_spaces' => '%s Tidak Boleh Aneh Aneh Ya',
                ],
            ],
            [
                'field' => 'cust_name',
                'label' => 'Cust Name',
                'rules' => 'required|alpha_numeric_spaces',
                'errors' => [
                    'required' => 'Anda Harus Memasukkan %s',
                    'alpha_numeric_spaces' => '%s Tidak Boleh Aneh Aneh Ya',
                ],
            ],
            [
                'field' => 'cust_phone',
                'label' => 'Nomor Telepon / HP',
                'rules' => 'numeric|max_length[15]',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                    'numeric' => '%s Harus Angka Yah...',
                    'max_length' => '%s Gak Boleh Lebih Dari 15',
                ],
            ],
            [
                'field' => 'cust_fax',
                'label' => 'Nomor FAX',
                'rules' => 'numeric|max_length[15]',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                    'numeric' => '%s Harus Angka Yah...',
                    'max_length' => '%s Gak Boleh Lebih Dari 15',
                ],
            ],
            [
                'field' => 'cust_mobile',
                'label' => 'Nomor Telepon / HP',
                'rules' => 'numeric|max_length[15]',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                    'numeric' => '%s Harus Angka Yah...',
                    'max_length' => '%s Gak Boleh Lebih Dari 15',
                ],
            ],
            [
                'field' => 'country_id',
                'label' => 'COUNTRY',
                'rules' => 'required',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                ],
            ],
            [
                'field' => 'postal_id',
                'label' => 'POSTAL ',
                'rules' => 'required',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                ],
            ],
            [
                'field' => 'city_id',
                'label' => 'CITY',
                'rules' => 'required',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                ],
            ],
            [
                'field' => 'cust_payment',
                'label' => 'PAYMENT',
                'rules' => 'required',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                ],
            ],
            [
                'field' => 'cust_limit',
                'label' => 'LIMIT',
                'rules' => 'numeric|max_length[15]',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                    'numeric' => '%s Harus Angka Yah...',
                    'max_length' => '%s Gak Boleh Lebih Dari 15',
                ],
            ],
            [
                'field' => 'cust_TOP',
                'label' => 'TOP',
                'rules' => 'numeric|max_length[15]',
                'errors' => [
                    'required' => '%s Harus Di Isi',
                    'numeric' => '%s Harus Angka Yah...',
                    'max_length' => '%s Gak Boleh Lebih Dari 15',
                ],
            ],
        ];
        $this->form_validation->set_rules($konfig);
        if ($this->form_validation->run() == FALSE) {
            $this->template->load('template', 'customers/active/add_active');
        } else {
            if (isset($_POST['submit'])) {
                $this->Model_customers->save();
                $this->session->set_flashdata('msg', '<div class="alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                    <b>Berhasil</b>
                    <p>Anda Berhasil Menambah Data Customer.</p>
                </div>');

                redirect('customer_active');
            }
        }
    }

    function add_ajax_postal($id_country) {
        $query = $this->db->get_where('tbl_postal', array('country_id' => $id_country));
        $data = "<option value=''>- Select Postal Name -</option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->postal_id . "'>" . $value->postal_name . "</option>";
        }
        echo $data;
    }

    function add_ajax_city($id_postal) {
        $query = $this->db->get_where('tbl_city', array('postal_id' => $id_postal));
        $data = "<option value=''> - Pilih city - </option>";
        foreach ($query->result() as $value) {
            $data .= "<option value='" . $value->city_id . "'>" . $value->city_name . "</option>";
        }
        echo $data;
    }
}

