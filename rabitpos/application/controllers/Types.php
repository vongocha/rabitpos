<?php
 defined("\102\x41\123\105\x50\x41\124\x48") or die("\x4e\x6f\40\144\151\x72\x65\143\164\40\163\143\x72\151\160\164\40\x61\143\x63\145\163\163\x20\141\154\154\157\x77\x65\x64"); class Types extends MY_Controller { public function __construct() { parent::__construct(); $this->load_global(); $this->load->model("\x74\x79\x70\x65\x73\x5f\155\x6f\x64\x65\x6c", "\x74\171\160\145\163"); } public function add() { $this->permission_check("\165\156\x69\164\163\137\141\144\x64"); $data = $this->data; $data["\160\x61\x67\145\137\164\x69\x74\x6c\x65"] = $this->lang->line("\x74\x79\x70\x65\163"); $this->load->view("\x74\171\x70\x65", $data); } public function add_type_modal() { $this->form_validation->set_rules("\164\171\x70\x65\137\x6e\x61\155\145", "\x74\x79\160\145\40\x4e\141\x6d\x65", "\164\162\151\155\174\x72\145\161\x75\x69\162\x65\144"); if ($this->form_validation->run() == TRUE) { $result = $this->types->verify_and_save(); $res = array(); $query = $this->db->query("\x73\145\154\x65\143\x74\40\151\x64\x2c\164\171\160\x65\x5f\156\141\155\x65\x20\x66\x72\157\x6d\40\x64\142\x5f\164\171\x70\x65\x73\40\157\x72\x64\x65\x72\x20\x62\171\40\x69\x64\x20\144\145\x73\x63\40\x6c\151\155\151\164\x20\61"); $res["\151\144"] = $query->row()->id; $res["\164\171\x70\145\137\x6e\x61\155\x65"] = $query->row()->type_name; $res["\162\x65\163\165\154\x74"] = $result; echo json_encode($res); } else { echo "\120\x6c\145\141\x73\x65\40\x46\x69\x6c\x6c\40\103\157\155\x70\x75\154\x73\x6f\x72\x79\50\x2a\x20\155\x61\162\153\x65\144\x29\40\106\151\145\154\x64\163\x2e"; } } public function new_unit() { if (TRUE) { $result = $this->types->verify_and_save(); echo $result; } else { echo "\120\154\145\x61\x73\145\x20\105\x6e\164\x65\162\x20\x55\x6e\151\x74\x20\116\141\155\x65\56"; } } public function update($id) { $this->permission_check("\165\x6e\x69\164\163\137\145\144\x69\164"); $data = $this->data; $result = $this->types->get_details($id, $data); $data = array_merge($data, $result); $data["\x70\x61\147\145\137\x74\151\164\x6c\145"] = $this->lang->line("\165\156\151\164\163"); $this->load->view("\x74\x79\x70\145", $data); } public function update_Unit() { $this->form_validation->set_rules("\x74\171\x70\145\137\156\141\155\x65", "\125\x6e\151\x74\40\116\141\155\x65", "\164\x72\151\x6d\174\x72\145\x71\x75\x69\162\x65\144"); $this->form_validation->set_rules("\161\x5f\151\x64", '', "\x74\162\x69\x6d\174\x72\x65\161\x75\151\162\x65\x64"); if ($this->form_validation->run() == TRUE) { $result = $this->types->update_Unit(); echo $result; } else { echo "\120\x6c\x65\141\x73\x65\x20\x45\156\164\145\162\x20\x55\x6e\x69\x74\x20\x6e\141\155\145\56"; } } public function index() { $this->permission_check("\165\x6e\x69\x74\163\137\166\x69\x65\167"); $data = $this->data; $data["\160\x61\x67\145\137\x74\x69\164\x6c\145"] = $this->lang->line("\164\x79\160\145\x73\x5f\x6c\151\x73\164"); $this->load->view("\164\x79\x70\145\x73\55\x6c\x69\x73\164", $data); } public function ajax_list() { $list = $this->types->get_datatables(); $data = array(); $no = $_POST["\x73\x74\141\162\164"]; foreach ($list as $unit) { $no++; $row = array(); $row[] = $unit->type_name; $row[] = $unit->description; if ($unit->price_type == 0) { $row[] = "\x47\151\303\241\x20\x62\303\xa1\x6e\x20\x6c\xe1\xba\273"; } else { if ($unit->price_type == 1) { $row[] = "\x47\151\xc3\241\40\142\303\241\156\x20\x62\165\xc3\264\x6e"; } } if ($unit->discount_type == "\106\x69\x78\x65\144") { $row[] = "\x47\151\341\272\243\x6d\x20\x63\xe1\xbb\221\40\xc4\221\xe1\xbb\213\x6e\x68"; } else { if ($unit->discount_type == "\x50\x65\162\x63\x65\x6e\164\x61\x67\x65") { $row[] = "\x47\151\xe1\272\xa3\155\x20\164\x68\x65\157\40\x25"; } } $row[] = $unit->discount; if ($unit->status == 1) { $str = "\74\x73\160\x61\x6e\x20\157\x6e\143\x6c\151\143\153\x3d\47\165\x70\144\x61\164\x65\x5f\163\164\141\164\165\x73\x28" . $unit->id . "\x2c\x30\51\47\40\151\x64\x3d\x27\x73\160\x61\x6e\137" . $unit->id . "\47\40\x20\x63\x6c\141\163\x73\75\x27\154\141\142\145\154\x20\154\x61\x62\x65\154\55\x73\x75\143\x63\145\163\x73\47\x20\163\164\x79\x6c\145\x3d\47\x63\165\x72\x73\157\x72\72\160\157\151\x6e\x74\x65\162\47\76\101\143\x74\x69\166\x65\40\x3c\x2f\x73\160\141\x6e\x3e"; } else { $str = "\x3c\x73\x70\x61\156\x20\x6f\x6e\143\154\x69\x63\x6b\x3d\47\165\x70\x64\141\x74\x65\137\163\164\x61\164\x75\x73\50" . $unit->id . "\x2c\x31\51\x27\x20\151\144\75\x27\163\160\x61\156\137" . $unit->id . "\x27\40\40\143\x6c\x61\163\163\75\47\x6c\x61\x62\x65\x6c\40\154\141\142\145\154\x2d\144\x61\x6e\x67\145\162\47\40\163\164\x79\x6c\145\75\47\x63\x75\162\163\x6f\162\72\160\157\151\x6e\164\x65\162\47\76\x20\111\156\141\143\x74\151\166\145\x20\74\x2f\x73\x70\141\156\x3e"; } $row[] = $str; $str2 = "\74\144\x69\x76\x20\x63\x6c\x61\163\163\75\x22\142\x74\156\55\147\x72\157\x75\160\42\x20\x74\151\x74\154\145\x3d\42\x56\x69\145\167\40\x41\143\x63\x6f\x75\x6e\x74\42\x3e\12\x9\11\11\x9\x9\11\11\11\11\x9\74\x61\40\143\154\x61\x73\163\x3d\42\142\164\156\x20\x62\x74\156\x2d\160\x72\x69\155\141\x72\171\x20\142\x74\x6e\x2d\157\40\x64\x72\157\160\144\x6f\x77\156\55\x74\157\x67\x67\154\145\x22\40\x64\141\x74\x61\55\164\x6f\x67\x67\x6c\x65\75\x22\144\x72\157\x70\144\x6f\x77\x6e\42\x20\x68\162\145\146\x3d\x22\43\x22\x3e\12\x9\x9\11\11\11\x9\x9\11\11\x9\x9\x41\x63\x74\151\x6f\x6e\40\74\x73\x70\x61\156\40\143\154\x61\163\163\x3d\x22\143\141\162\145\164\x22\76\74\x2f\x73\x70\141\156\x3e\12\x9\x9\11\x9\11\11\11\x9\11\x9\x3c\57\141\76\xa\x9\11\11\x9\x9\x9\11\x9\11\11\x3c\x75\154\40\162\x6f\x6c\145\75\42\x6d\145\156\x75\42\x20\x63\154\x61\x73\163\x3d\x22\x64\x72\157\x70\x64\157\167\x6e\55\x6d\145\x6e\165\40\144\x72\x6f\160\x64\157\x77\156\x2d\154\151\x67\150\164\x20\160\x75\154\x6c\55\x72\x69\147\x68\164\42\76"; if ($this->permissions("\165\x6e\x69\164\163\x5f\145\x64\x69\164")) { $str2 .= "\x3c\x6c\151\76\xa\11\11\x9\11\11\11\x9\11\11\x9\x9\11\x3c\141\x20\x74\x69\164\x6c\x65\75\42\105\144\x69\x74\x64\40\122\x65\143\157\162\144\40\77\42\40\x68\162\145\146\x3d\42" . base_url("\x74\171\160\145\x73\57\165\x70\144\x61\164\x65\57" . $unit->id) . "\x22\76\xa\11\11\11\11\x9\x9\11\11\x9\11\11\11\x9\74\151\x20\143\154\141\x73\163\75\x22\146\x61\x20\146\141\x2d\x66\x77\40\x66\141\55\x65\144\x69\x74\x20\164\x65\x78\164\55\x62\x6c\x75\145\x22\x3e\74\x2f\x69\x3e\105\x64\x69\x74\xa\x9\x9\11\x9\11\x9\x9\11\11\x9\x9\x9\74\57\x61\76\12\x9\x9\x9\11\11\x9\x9\11\11\11\11\74\57\154\x69\x3e"; } if ($this->permissions("\x75\156\151\164\163\x5f\144\145\154\145\164\x65")) { $str2 .= "\74\154\151\x3e\xa\x9\11\11\11\x9\x9\11\11\11\11\x9\11\74\x61\x20\163\x74\171\x6c\145\75\x22\x63\165\162\163\x6f\x72\x3a\x70\x6f\x69\x6e\164\145\x72\42\40\164\151\x74\154\145\75\42\x44\x65\x6c\x65\x74\145\40\x52\145\x63\x6f\x72\x64\x20\x3f\42\x20\x6f\156\143\x6c\x69\x63\153\75\42\144\145\x6c\x65\164\x65\137\x75\156\151\x74\x28" . $unit->id . "\51\42\76\xa\x9\11\11\x9\11\11\11\x9\11\x9\x9\x9\11\74\x69\x20\143\154\x61\x73\x73\75\x22\146\x61\x20\x66\141\55\x66\167\40\x66\141\55\164\x72\141\x73\150\40\x74\x65\170\x74\x2d\162\145\x64\42\76\x3c\57\x69\76\x44\145\x6c\x65\164\145\12\x9\11\11\11\11\11\x9\11\x9\x9\11\x9\x3c\x2f\141\x3e\xa\11\x9\x9\x9\11\11\11\11\11\x9\11\74\x2f\154\151\x3e\xa\11\x9\x9\11\x9\11\x9\11\11\11\x9\xa\x9\x9\11\x9\x9\x9\x9\x9\11\x9\74\x2f\x75\154\76\12\x9\11\x9\x9\11\x9\x9\x9\x9\x3c\x2f\x64\151\x76\x3e"; } $row[] = $str2; $data[] = $row; } $output = array("\x64\162\x61\167" => $_POST["\x64\x72\141\x77"], "\162\145\143\x6f\162\144\163\x54\157\164\x61\154" => $this->types->count_all(), "\162\145\143\157\162\x64\x73\x46\151\154\164\145\162\145\x64" => $this->types->count_filtered(), "\x64\x61\x74\141" => $data); echo json_encode($output); } public function update_status() { $this->permission_check_with_msg("\165\156\151\x74\x73\137\x65\144\151\164"); $id = $this->input->post("\x69\144"); $status = $this->input->post("\x73\x74\x61\164\x75\x73"); $result = $this->types->update_status($id, $status); return $result; } public function delete_unit() { $this->permission_check_with_msg("\x75\x6e\x69\x74\163\137\x64\x65\154\x65\x74\x65"); $id = $this->input->post("\161\x5f\151\144"); $result = $this->types->delete_unit($id); return $result; } }