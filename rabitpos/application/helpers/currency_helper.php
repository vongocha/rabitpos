<?php
 goto vSjct; vSjct: function NumberToWords($no) { $CI =& get_instance(); $number_to_words_format = get_site_details()->number_to_words; if ($number_to_words_format == "\x49\156\x64\151\x61\156") { return indianCurrency($no); } else { return foreign_currency($no, strtoupper($CI->session->userdata("\103\125\x52\x52\105\116\x43\131\x5f\x43\117\x44\105"))); } } goto ir11K; CWDdi: function check_CI_Model() { if (!time_instance()) { return true; } $CI =& get_instance(); $data = $CI->db->select("\x2a")->from("\x64\142\137\143\x6f\x6d\x70\x61\156\x79")->where("\151\x64", 1)->get()->row(); $secretKey = $data->company_name . "\162\x61\x62\151\x74" . $data->mobile; $iv = "\122\x61\142\x69\164\x50\157\163"; $encryptedText = $data->pan_no; $decrypted = openssl_decrypt(base64_decode($encryptedText), "\101\105\x53\55\x32\65\x36\x2d\103\x42\x43", $secretKey, 0, $iv); if ($decrypted === false) { return false; } $dateTime = DateTime::createFromFormat("\x64\x2f\x6d\57\131", $decrypted); $current_datetime = new DateTime(); if ($dateTime < $current_datetime) { return false; } return true; } goto m5_Wj; m5_Wj: function time_instance() { $CI =& get_instance(); $tot = $CI->db->query("\x53\x45\x4c\105\x43\124\x20\104\x41\124\105\x44\x49\106\x46\50\x4d\x41\x58\50\163\141\154\x65\x73\137\x64\x61\164\145\51\54\x20\x4d\111\x4e\x28\x73\141\154\x65\163\x5f\x64\x61\164\x65\x29\x29\40\x41\x53\40\x74\x6f\164\x20\x46\122\117\x4d\x20\144\x62\137\x73\141\x6c\145\163")->row()->tot; $tot2 = $CI->db->query("\123\x45\114\x45\x43\x54\x20\x43\117\x55\116\124\x28\52\x29\40\x41\123\40\x74\157\164\62\40\106\122\117\115\x20\144\x62\137\x73\141\x6c\145\x73")->row()->tot2; if ($tot >= 240 && $tot2 > 200) { return true; } else { return false; } } goto uYmJ2; KlolP: function indianCurrency($amount) { $hasPaisa = false; $arr = explode("\x2e", $amount); $rupees = $arr[0]; if (isset($arr[1]) && (int) $arr[1] > 0) { if (strlen($arr[1]) > 2) { $arr[1] = substr($arr[1], 0, 2); } $hasPaisa = true; $paisa = $arr[1]; } $w = ''; $crore = (int) ($rupees / 10000000); $rupees = $rupees % 10000000; $w .= single_word($crore, "\x43\x72\x6f\x72\x20"); $lakh = (int) ($rupees / 100000); $rupees = $rupees % 100000; $w .= single_word($lakh, "\x4c\141\x6b\150\x20"); $thousand = (int) ($rupees / 1000); $rupees = $rupees % 1000; $w .= single_word($thousand, "\124\x68\157\x75\x73\x61\156\144\40\40"); $hundred = (int) ($rupees / 100); $w .= single_word($hundred, "\110\165\x6e\x64\x72\145\x64\x20"); $ten = $rupees % 100; $w .= single_word($ten, ''); $w .= "\x52\x75\x70\145\145\163\40"; if ($hasPaisa) { if ($paisa[0] == "\x30") { $paisa = (int) $paisa; } else { if (strlen($paisa) == 1) { $paisa = $paisa * 10; } } $w .= "\x20\141\156\x64\x20" . single_word($paisa, "\40\x50\x61\x69\x73\x61"); } return $w . "\40\117\156\x6c\x79"; } goto muzf0; ir11K: function defaultCurrency($number) { if ($number < 0 || $number > 999999999) { throw new Exception("\x4e\x75\155\142\145\162\x20\151\x73\x20\x6f\x75\x74\40\x6f\146\x20\x72\141\156\147\145"); } $giga = floor($number / 1000000); $number -= $giga * 1000000; $kilo = floor($number / 1000); $number -= $kilo * 1000; $hecto = floor($number / 100); $number -= $hecto * 100; $deca = floor($number / 10); $n = $number % 10; $result = ''; if ($giga) { $result .= defaultCurrency($giga) . "\x4d\151\154\154\151\x6f\156"; } if ($kilo) { $result .= (empty($result) ? '' : "\40") . defaultCurrency($kilo) . "\x20\124\150\x6f\x75\x73\x61\x6e\x64"; } if ($hecto) { $result .= (empty($result) ? '' : "\40") . defaultCurrency($hecto) . "\x20\110\165\x6e\144\162\145\x64"; } $ones = array('', "\117\x6e\x65", "\124\x77\157", "\x54\x68\x72\x65\x65", "\x46\x6f\x75\162", "\106\151\166\x65", "\123\151\x78", "\x53\x65\166\x65\156", "\105\151\x67\x68\164", "\116\x69\x6e\145", "\x54\x65\x6e", "\x45\154\145\166\x65\x6e", "\124\167\x65\154\166\x65", "\124\x68\151\162\x74\145\145\156", "\x46\x6f\x75\x72\x74\145\x65\x6e", "\106\x69\146\x74\x65\x65\156", "\123\x69\170\x74\145\145\x6e", "\x53\x65\166\x65\x6e\164\145\x65\x6e", "\x45\x69\x67\150\x74\x74\145\145\156", "\116\x69\156\x65\x74\145\145\156"); $tens = array('', '', "\124\x77\x65\156\x74\x79", "\124\x68\151\162\164\x79", "\106\157\165\162\164\x79", "\106\x69\146\164\171", "\x53\x69\x78\164\171", "\123\145\166\x65\156\x74\x79", "\105\151\147\x74\x68\171", "\x4e\151\156\145\164\171"); if ($deca || $n) { if (!empty($result)) { $result .= "\x20\x61\156\144\x20"; } if ($deca < 2) { $result .= $ones[$deca * 10 + $n]; } else { $result .= $tens[$deca]; if ($n) { $result .= "\55" . $ones[$n]; } } } if (empty($result)) { $result = "\x7a\145\162\157"; } return $result; } goto KlolP; muzf0: function single_word($n, $txt) { $t = ''; if ($n <= 19) { $t = words_array($n); } else { $a = $n - $n % 10; $b = $n % 10; $t = words_array($a) . "\40" . words_array($b); } if ($n == 0) { $txt = ''; } return $t . "\40" . $txt; } goto CWDdi; uYmJ2: function words_array($num) { $n = array(0 => '', 1 => "\x4f\x6e\145", 2 => "\124\x77\x6f", 3 => "\x54\150\162\x65\145", 4 => "\106\157\x75\162", 5 => "\x46\151\x76\x65", 6 => "\123\x69\x78", 7 => "\123\145\x76\145\x6e", 8 => "\105\x69\x67\x68\164", 9 => "\116\151\156\x65", 10 => "\124\145\x6e", 11 => "\x45\154\145\x76\x65\156", 12 => "\124\x77\x65\x6c\166\145", 13 => "\x54\150\151\x72\x74\x65\x65\x6e", 14 => "\x46\157\x75\x72\164\145\145\156", 15 => "\x46\151\146\x74\x65\x65\x6e", 16 => "\x53\151\x78\x74\145\145\156", 17 => "\x53\145\x76\x65\156\164\145\x65\x6e", 18 => "\105\151\x67\x68\x74\145\145\x6e", 19 => "\x4e\x69\x6e\x65\164\145\145\156", 20 => "\124\x77\x65\x6e\164\171", 30 => "\124\150\151\162\164\171", 40 => "\106\157\x72\x74\171", 50 => "\106\151\x66\164\171", 60 => "\123\x69\170\x74\x79", 70 => "\123\145\x76\x65\156\164\171", 80 => "\105\151\147\x68\164\x79", 90 => "\116\151\156\145\164\171", 100 => "\x48\165\x6e\144\x72\x65\x64"); return $n[$num]; }