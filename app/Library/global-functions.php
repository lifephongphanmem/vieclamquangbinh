<?php
function convert2Roman($num)
{
    $n = intval($num);
    $res = '';

    //array of roman numbers
    $romanNumber_Array = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    );

    foreach ($romanNumber_Array as $roman => $number) {
        //divide to get  matches
        $matches = intval($n / $number);

        //assign the roman char * $matches
        $res .= str_repeat($roman, $matches);

        //substract from the number
        $n = $n % $number;
    }

    // return the result
    return $res;
};

function getMaChauAu()
{
    return  $list = array(
        "EE",
        "DK",
        "IE",
        "LT",
        "FI",
        "GB",
        "IS",
        "LV",
        "NO",
        "SE",
        "MD",
        "PL",
        "CZ",
        "RU",
        "SK",
        "BY",
        "BG",
        "HU",
        "RO",
        "UA",
        "AT",
        "DE",
        "LI",
        "MC",
        "CH",
        "BE",
        "NL",
        "AN",
        "LU",
        "FR",
        "GR",
        "AD",
        "BA",
        "MK",
        "ME",
        "RS",
        "CS",
        "ES",
        "IT",
        "AL",
        "PT",
        "HR",
        "MT",
        "SM",
        "SI",
        "VA",
    );
}
function getChauAu()
{
    return  $list = array(
        "EE" => "Estonia",
        "DK" => "Đan Mạch",
        "IE" => "Ireland",
        "LT" => "Lithuania",
        "FI" => "Phần Lan",
        "GB" => "Anh",
        "IS" => "Iceland",
        "LV" => "Latvia",
        "NO" => "Na Uy",
        "SE" => "Thụy Điển",
        "MD" => "Moldova, Republic of",
        "PL" => "Ba Lan",
        "CZ" => "Séc",
        "RU" => "Nga",
        "SK" => "Slovakia",
        "BY" => "Belarus",
        "BG" => "Bulgaria",
        "HU" => "Hungary",
        "RO" => "Romania",
        "UA" => "Ukraine",
        "AT" => "Áo",
        "DE" => "Đức",
        "LI" => "Liechtenstein",
        "MC" => "Monaco",
        "CH" => "Thụy Sĩ",
        "BE" => "Bỉ",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "LU" => "Luxembourg",
        "FR" => "Pháp",
        "GR" => "Hy Lạp",
        "AD" => "Andorra",
        "BA" => "Bosnia and Herzegovina",
        "MK" => "Macedonia, the Former Yugoslav Republic of",
        "ME" => "Montenegro",
        "RS" => "Serbia",
        "CS" => "Serbia and Montenegro",
        "ES" => "Spain",
        "IT" => "Italy",
        "AL" => "Albania",
        "PT" => "Portugal",
        "HR" => "Croatia",
        "MT" => "Malta",
        "SM" => "San Marino",
        "SI" => "Slovenia",
        "VA" => "Holy See (Vatican City State)",
    );
}
function getCountries()
{
   // mã quốc gia theo chuẩn ISO 3166-1 alpha-2
    return [
        "AF" => "Afghanistan",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AU" => "Úc",
        "AT" => "Áo",
        "AZ" => "Azerbaijan",
        "BD" => "Bangladesh",
        "BE" => "Bỉ",
        "BF" => "Burkina Faso",
        "BG" => "Bulgaria",
        "BR" => "Brasil",
        "CA" => "Canada",
        "CH" => "Thụy Sĩ",
        "CL" => "Chile",
        "CN" => "Trung Quốc",
        "CO" => "Colombia",
        "CU" => "Cuba",
        "CZ" => "Séc",
        "DE" => "Đức",
        "DK" => "Đan Mạch",
        "EG" => "Ai Cập",
        "ES" => "Tây Ban Nha",
        "FI" => "Phần Lan",
        "FR" => "Pháp",
        "GB" => "Vương quốc Anh",
        "GR" => "Hy Lạp",
        "HK" => "Hồng Kông",
        "HU" => "Hungary",
        "ID" => "Indonesia",
        "IE" => "Ireland",
        "IL" => "Israel",
        "IN" => "Ấn Độ",
        "IQ" => "Iraq",
        "IR" => "Iran",
        "IT" => "Ý",
        "JP" => "Nhật Bản",
        "KH" => "Campuchia",
        "KR" => "Hàn Quốc",
        "KP" => "Triều Tiên",
        "LA" => "Lào",
        "LK" => "Sri Lanka",
        "MM" => "Myanmar",
        "MN" => "Mông Cổ",
        "MO" => "Ma Cao",
        "MX" => "Mexico",
        "MY" => "Malaysia",
        "NL" => "Hà Lan",
        "NO" => "Na Uy",
        "NZ" => "New Zealand",
        "PH" => "Philippines",
        "PK" => "Pakistan",
        "PL" => "Ba Lan",
        "PT" => "Bồ Đào Nha",
        "QA" => "Qatar",
        "RO" => "Romania",
        "RU" => "Nga",
        "SA" => "Ả Rập Xê Út",
        "SE" => "Thụy Điển",
        "SG" => "Singapore",
        "TH" => "Thái Lan",
        "TR" => "Thổ Nhĩ Kỳ",
        "TW" => "Đài Loan",
        "UA" => "Ukraina",
        "US" => "Hoa Kỳ",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VE" => "Venezuela",
        "VN" => "Việt Nam",
        "ZA" => "Nam Phi",
        "ZW" => "Zimbabwe"
    ];
    
}

function getthitruong()
{
    return  $list = array(
        "AF" => "Afghanistan",
        // "AX" => "Aland Islands",
        "AL" => "Albania",
        "DZ" => "Algeria",
        "AS" => "American Samoa",
        "AD" => "Andorra",
        "AO" => "Angola",
        "AI" => "Anguilla",
        "AQ" => "Antarctica",
        "AG" => "Antigua and Barbuda",
        "AR" => "Argentina",
        "AM" => "Armenia",
        "AW" => "Aruba",
        "AU" => "Châu Úc",
        "AT" => "Áo",
        "AZ" => "Azerbaijan",
        "BS" => "Bahamas",
        "BH" => "Bahrain",
        "BD" => "Bangladesh",
        "BB" => "Barbados",
        "BY" => "Belarus",
        "BE" => "Bỉ",
        "BZ" => "Belize",
        "BJ" => "Benin",
        "BM" => "Bermuda",
        "BT" => "Bhutan",
        "BO" => "Bolivia",
        "BA" => "Bosnia and Herzegovina",
        "BW" => "Botswana",
        "BV" => "Đảo Bouvet",
        "BR" => "Brazil",
        "IO" => "British Indian Ocean Territory",
        "BN" => "Brunei",
        "BG" => "Bulgaria",
        "BF" => "Burkina Faso",
        "BI" => "Burundi",
        "KH" => "Campuchia",
        "CM" => "Cameroon",
        "CA" => "Canada",
        "CV" => "Cape Verde",
        "KY" => "Quần đảo Cayman",
        "CF" => "Trung Phi",
        "TD" => "Sát (Tchad)",
        "CL" => "Chile",
        "CN" => "Trung Quốc",
        "CX" => "Christmas Island",
        "CC" => "Cocos (Keeling) Islands",
        "CO" => "Colombia",
        "KM" => "Comoros",
        "CG" => "Cộng hòa Congo",
        "CD" => "Cộng hòa Dân chủ Congo",
        "CK" => "Quần đảo Cook",
        "CR" => "Costa Rica",
        "CI" => "Bờ Biển Ngà",
        "HR" => "Croatia",
        "CU" => "Cuba",
        "CW" => "Curacao",
        "CY" => "Síp",
        "CZ" => "Séc",
        "DK" => "Đan Mạch",
        "DJ" => "Djibouti",
        "DM" => "Dominica",
        "DO" => "Cộng hòa Dominica",
        "EC" => "Ecuador",
        "EG" => "Ai Cập",
        "SV" => "El Salvador",
        "GQ" => "Guinea Xích Đạo",
        "ER" => "Eritrea",
        "EE" => "Estonia",
        "ET" => "Ethiopia",
        "FK" => "Quần đảo Falkland",
        "FO" => "Quần đảo Faroe",
        "FJ" => "Fiji",
        "FI" => "Phần Lan",
        "FR" => "Pháp",
        "GF" => "French Guiana",
        "PF" => "French Polynesia",
        "TF" => "French Southern Territories",
        "GA" => "Gabon",
        "GM" => "Gambia",
        "GE" => "Georgia",
        "DE" => "Đức",
        "GH" => "Ghana",
        "GI" => "Gibraltar",
        "GR" => "Hy Lạp",
        "GL" => "Greenland",
        "GD" => "Grenada",
        "GP" => "Guadeloupe",
        "GU" => "Guam",
        "GT" => "Guatemala",
        "GG" => "Guernsey",
        "GN" => "Guinea",
        "GW" => "Guinea-Bissau",
        "GY" => "Guyana",
        "HT" => "Haiti",
        "HM" => "Heard Island and Mcdonald Islands",
        "VA" => "Holy See (Vatican City State)",
        "HN" => "Honduras",
        "HK" => "Hồng Kông",
        "HU" => "Hungary",
        "IS" => "Iceland",
        "IN" => "Ấn Độ",
        "ID" => "Indonesia",
        "IR" => "Iran, Islamic Republic of",
        "IQ" => "Iraq",
        "IE" => "Ireland",
        "IM" => "Isle of Man",
        "IL" => "Israel",
        "IT" => "Italy",
        "JM" => "Jamaica",
        "JP" => "Nhật Bản",
        "JE" => "Jersey",
        "JO" => "Jordan",
        "KZ" => "Kazakhstan",
        "KE" => "Kenya",
        "KI" => "Kiribati",
        "KP" => "Triều Tiên",
        "KR" => "Hàn Quốc",
        "XK" => "Kosovo",
        "KW" => "Kuwait",
        "KG" => "Kyrgyzstan",
        "LA" => "Lào",
        "LV" => "Latvia",
        "LB" => "Lebanon",
        "LS" => "Lesotho",
        "LR" => "Liberia",
        "LY" => "Libyan Arab Jamahiriya",
        "LI" => "Liechtenstein",
        "LT" => "Lithuania",
        "LU" => "Luxembourg",
        "MO" => "Macao",
        "MK" => "Macedonia, the Former Yugoslav Republic of",
        "MG" => "Madagascar",
        "MW" => "Malawi",
        "MY" => "Malaysia",
        "MV" => "Maldives",
        "ML" => "Mali",
        "MT" => "Malta",
        "MH" => "Marshall Islands",
        "MQ" => "Martinique",
        "MR" => "Mauritania",
        "MU" => "Mauritius",
        "YT" => "Mayotte",
        "MX" => "Mexico",
        "FM" => "Micronesia, Federated States of",
        "MD" => "Moldova, Republic of",
        "MC" => "Monaco",
        "MN" => "Mông cổ",
        "ME" => "Montenegro",
        "MS" => "Montserrat",
        "MA" => "Morocco",
        "MZ" => "Mozambique",
        "MM" => "Myanmar",
        "NA" => "Namibia",
        "NR" => "Nauru",
        "NP" => "Nepal",
        "NL" => "Netherlands",
        "AN" => "Netherlands Antilles",
        "NC" => "New Caledonia",
        "NZ" => "New Zealand",
        "NI" => "Nicaragua",
        "NE" => "Niger",
        "NG" => "Nigeria",
        "NU" => "Niue",
        "NF" => "Norfolk Island",
        "MP" => "Northern Mariana Islands",
        "NO" => "Na Uy",
        "OM" => "Oman",
        "PK" => "Pakistan",
        "PW" => "Palau",
        "PS" => "Palestinian Territory, Occupied",
        "PA" => "Panama",
        "PG" => "Papua New Guinea",
        "PY" => "Paraguay",
        "PE" => "Peru",
        "PH" => "Philippines",
        "PN" => "Pitcairn",
        "PL" => "Ba Lan",
        "PT" => "Bồ Đào Nha",
        "PR" => "Puerto Rico",
        "QA" => "Qatar",
        "RE" => "Reunion",
        "RO" => "Romania",
        "RU" => "Nga",
        "RW" => "Rwanda",
        "BL" => "Saint Barthelemy",
        "SH" => "Saint Helena",
        "KN" => "Saint Kitts and Nevis",
        "LC" => "Saint Lucia",
        "MF" => "Saint Martin",
        "PM" => "Saint Pierre and Miquelon",
        "VC" => "Saint Vincent and the Grenadines",
        "WS" => "Samoa",
        "SM" => "San Marino",
        "ST" => "Sao Tome and Principe",
        "SA" => "Saudi Arabia",
        "SN" => "Senegal",
        "RS" => "Serbia",
        "CS" => "Serbia and Montenegro",
        "SC" => "Seychelles",
        "SL" => "Sierra Leone",
        "SG" => "Singapore",
        "SX" => "Sint Maarten",
        "SK" => "Slovakia",
        "SI" => "Slovenia",
        "SB" => "Solomon Islands",
        "SO" => "Somalia",
        "ZA" => "South Africa",
        "GS" => "South Georgia and the South Sandwich Islands",
        "SS" => "South Sudan",
        "ES" => "Spain",
        "LK" => "Sri Lanka",
        "SD" => "Sudan",
        "SR" => "Suriname",
        "SJ" => "Svalbard and Jan Mayen",
        "SZ" => "Swaziland",
        "SE" => "Thụy Điển",
        "CH" => "Thụy Sĩ",
        "SY" => "Syrian Arab Republic",
        "TW" => "Đài Loan",
        "TJ" => "Tajikistan",
        "TZ" => "Tanzania, United Republic of",
        "TH" => "Thái Lan",
        "TL" => "Timor-Leste",
        "TG" => "Togo",
        "TK" => "Tokelau",
        "TO" => "Tonga",
        "TT" => "Trinidad and Tobago",
        "TN" => "Tunisia",
        "TR" => "Thổ Nhĩ Kỳ",
        "TM" => "Turkmenistan",
        "TC" => "Turks and Caicos Islands",
        "TV" => "Tuvalu",
        "UG" => "Uganda",
        "UA" => "Ukraine",
        "AE" => "United Arab Emirates",
        "GB" => "Anh",
        "US" => "Mỹ",
        "UM" => "United States Minor Outlying Islands",
        "UY" => "Uruguay",
        "UZ" => "Uzbekistan",
        "VU" => "Vanuatu",
        "VE" => "Venezuela",
        "VN" => "Việt Nam",
        "VG" => "Virgin Islands, British",
        "VI" => "Virgin Islands, U.s.",
        "WF" => "Wallis and Futuna",
        "EH" => "Western Sahara",
        "YE" => "Yemen",
        "ZM" => "Zambia",
        "ZW" => "Zimbabwe"
    );
}


function getNam($all = false)
{
    $a_kq = array();
    if ($all) {
        $a_kq['ALL'] = '--Tất cả các năm--';
    }
    for ($i = date('Y') - 4; $i <= date('Y') + 2; $i++) {
        $a_kq[$i] = $i;
    }
    return $a_kq;
}

function getTextStatus($status)
{
    //text-danger; text-warning; text-success; text-info
    $a_trangthai = array(
        'CHUATAO' => 'text-danger',
        'CHUADL' => 'text-danger', //dùng cho đơn vị chủ quản - chưa có đơn vị cấp dưới nào gửi dữ liệu
        'CHOGUI' => 'text-dark',
        'DAGUI' => 'text-success',
        'TRALAI' => 'text-danger',
        'CHUADAYDU' => 'text-warning',
        'CHUAGUI' => 'text-dark', //dùng cho đơn vị chủ quản - các đơn vị cấp dưới đã có dữ liệu nhưng chưa gửi đi
        'GUILOI' => 'text-danger',
    );
    return isset($a_trangthai[$status]) ? $a_trangthai[$status] : '';
}

function getStatus()
{
    return array(
        'CHONHAN' => 'Dữ liệu chờ nhận',
        'CHUATAO' => 'Dữ liệu chưa khởi tạo',
        'CHOGUI' => 'Dữ liệu chờ gửi',
        'DAGUI' => 'Dữ liệu đã gửi',
        'TRALAI' => 'Dữ liệu bị trả lại',
        'CHUADAYDU' => 'Dữ liệu chưa đầy đủ',
        'CHUAGUI' => 'Dữ liệu chờ gửi',
        'CHUADL' => 'Dữ liệu chưa được gửi lên',
        'GUILOI' => 'Dữ liệu bị lỗi',
    );
}

function toAlpha($data)
{
    $alphabet =   array('', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    $alpha_flip = array_flip($alphabet);
    if ($data <= 25) {
        return $alphabet[$data];
    } elseif ($data > 25) {
        $dividend = ($data + 1);
        $alpha = '';
        $modulo = '';
        while ($dividend > 0) {
            $modulo = ($dividend - 1) % 26;
            $alpha = $alphabet[$modulo] . $alpha;
            $dividend = floor((($dividend - $modulo) / 26));
        }
        return $alpha;
    }
}

function romanNumerals($num)
{
    $n = intval($num);
    $res = '';

    /*** roman_numerals array  ***/
    $roman_numerals = array(
        'M'  => 1000,
        'CM' => 900,
        'D'  => 500,
        'CD' => 400,
        'C'  => 100,
        'XC' => 90,
        'L'  => 50,
        'XL' => 40,
        'X'  => 10,
        'IX' => 9,
        'V'  => 5,
        'IV' => 4,
        'I'  => 1
    );

    foreach ($roman_numerals as $roman => $number) {
        /*** divide to get  matches ***/
        $matches = intval($n / $number);

        /*** assign the roman char * $matches ***/
        $res .= str_repeat($roman, $matches);

        /*** substract from the number ***/
        $n = $n % $number;
    }

    /*** return the res ***/
    return $res;
}

function getAge($birthdate = '0000-00-00')
{
    if ($birthdate == '0000-00-00') return 'Unknown';

    $bits = explode('-', $birthdate);

    $age = date('Y') - $bits[0];

    $arr[1] = 'm';
    $arr[2] = 'd';

    // for ($i = 1; $arr[$i]; $i++) {
    //     $n = date($arr[$i]);
    //     if ($n < $bits[$i])
    //         break;
    //     if ($n > $bits[$i]) {
    //         ++$age;
    //         break;
    //     }
    // }
    return $age;
}
function dinhdangso($number, $decimals = 0, $unit = '1', $dec_point = ',', $thousands_sep = '.')
{
    if (!is_numeric($number) || $number == 0) {
        return '';
    }
    $r = $unit;

    switch ($unit) {
        case 2: {
                $decimals = 3;
                $r = 1000;
                break;
            }
        case 3: {
                $decimals = 5;
                $r = 1000000;
                break;
            }
    }

    $number = round($number / $r, $decimals);
    return number_format($number, $decimals, $dec_point, $thousands_sep);
}

function getDayVn($date)
{
    if ($date != null || $date != '')
        $newday = date('d/m/Y', strtotime($date));
    else
        $newday = '';
    return $newday;
}

function danhsachtinhtrangvl()
{
    return array('1' => 'Người có việc làm', '2' => 'Người thất thất nghiệp', '3' => 'Không tham gia hoạt động kinh tế');
}

function check_trung($array, $indexs, $justvals = false)
{
    $newarray = array();
    if (is_array($array) && count($array) > 0) {
        if (is_array($indexs) && count($indexs) > 0) {
            //Tổng số điều kiện
            $ninds = count($indexs);
        } else return $newarray;

        foreach ($array as $ar) {
            //số phần tử thỏa mãn điều kiện
            $count = 0;
            foreach ($indexs as $indx => $val) {
                if ($ar[$indx] == $val) {
                    $count++;
                }
            }

            if ($count == $ninds) {
                if ($justvals) return $ar;
                else $newarray[] = $ar;
            }
        }
    }
    return $newarray;
}

//Hàm tạo mảng mới bằng cách gộp những giá trị trùng nhau trong mảng cũ lại
function a_unique($array)
{
    //return array_unique($array,SORT_REGULAR);
    //return array_map('unserialize', array_unique(array_map('serialize', $array)));
    $tmp = array();
    foreach ($array as $row)
        if (!in_array($row, $tmp)) {
            array_push($tmp, $row);
        }
    return $tmp;
}

function chuyenkhongdau($str)
{
    if (!$str) return false;
    $utf8 = array(
        'a' => 'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
        'd' => 'đ|Đ',
        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
        'i' => 'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
        'y' => 'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
    );
    foreach ($utf8 as $ascii => $uni) $str = preg_replace("/($uni)/i", $ascii, $str);
    return $str;
}
