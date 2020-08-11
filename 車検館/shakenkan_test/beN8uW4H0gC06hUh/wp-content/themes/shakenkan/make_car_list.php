<script type='text/javascript'>
<?php
global $wpdb;
$db_user   = $wpdb->dbuser;     //データベース接続ユーザーの取得
$db_passwd = $wpdb->dbpassword; //データベース接続用パスワードの取得
$db_host   = $wpdb->dbhost;     //データベースホストの取得
$another_wpdb = new wpdb($db_user, $db_passwd, 'shakenkan_db', $db_host);

$aryList = array();

$strQuery  = "select * ";
$strQuery .= "from t_fee ";
$strQuery .= "where delete_flag = 0 ";
$strQuery .= "order by fee_id ";
$results = $another_wpdb->get_results($strQuery);
foreach ($results as $result) {
    $intFeeID                         = $result->fee_id;
    $aryTFee_BasicFee[$intFeeID]      = $result->basic_fee;
    $aryTFee_InspectionFee[$intFeeID] = $result->inspection_fee;
    $aryTFee_InsuranceFee[$intFeeID]  = $result->insurance_fee;
    $aryTFee_WeightTax[$intFeeID]     = $result->weight_tax;
    $aryTFee_PrintFee[$intFeeID]      = $result->print_fee;
}

$strReturn = '';
$strReturn .= 'var ary_car_maker_id = new Array;'."\n";
$strReturn .= 'var ary_car_id = new Array;'."\n";
$strReturn .= 'var ary_car_name = new Array;'."\n";
$strReturn .= 'var ary_car_name_head = new Array;'."\n";
$strReturn .= 'var ary_basic_fee = new Array;'."\n";
$strReturn .= 'var ary_inspection_fee = new Array;'."\n";
$strReturn .= 'var ary_insurance_fee = new Array;'."\n";
$strReturn .= 'var ary_weight_tax = new Array;'."\n";
$strReturn .= 'var ary_print_fee = new Array;'."\n";

$i = 0;

$strQuery  = "select * ";
$strQuery .= "from t_car ";
$strQuery .= "where delete_flag = 0 ";
$results = $another_wpdb->get_results($strQuery);
foreach ($results as $result) {
    if ($result->japan_kei_flag == 1) {
        $intFeeID = 1;
    } else if ($result->japan_small_flag == 1) {
        $intFeeID = 2;
    } else if ($result->japan_middle_flag == 1) {
        $intFeeID = 3;
    } else if ($result->japan_big_flag == 1) {
        $intFeeID = 4;
    } else if ($result->japan_over_flag == 1) {
        $intFeeID = 5;
    } else if ($result->foreign_kei_flag == 1) {
        $intFeeID = 6;
    } else if ($result->foreign_small_flag == 1) {
        $intFeeID = 7;
    } else if ($result->foreign_middle_flag == 1) {
        $intFeeID = 8;
    } else if ($result->foreign_big_flag == 1) {
        $intFeeID = 9;
    } else if ($result->foreign_over_flag == 1) {
        $intFeeID = 10;
    } else if ($result->cargo_kei_flag == 1) {
        $intFeeID = 11;
    } else if ($result->cargo_small_flag == 1) {
        $intFeeID = 12;
    } else if ($result->cargo_middle_flag == 1) {
        $intFeeID = 13;
    } else if ($result->cargo_big_flag == 1) {
        $intFeeID = 14;
    } else if ($result->cargo_over_flag == 1) {
        $intFeeID = 15;
    }
    
    $strReturn .= 'ary_car_maker_id['.$i.'] = '.$result->car_maker_id.';'."\n";
    $strReturn .= 'ary_car_id['.$i.'] = '.$result->car_id.';'."\n";
    $strReturn .= 'ary_car_name['.$i.'] = "'.$result->car_name.'";'."\n";
    $strReturn .= 'ary_car_name_head['.$i.'] = "'.$result->car_name_head.'";'."\n";
    
    $strReturn .= 'ary_basic_fee['.$i.'] = '.$aryTFee_BasicFee[$intFeeID].';'."\n";
    $strReturn .= 'ary_inspection_fee['.$i.'] = '.$aryTFee_InspectionFee[$intFeeID].';'."\n";
    $strReturn .= 'ary_insurance_fee['.$i.'] = '.$aryTFee_InsuranceFee[$intFeeID].';'."\n";
    $strReturn .= 'ary_weight_tax['.$i.'] = '.$aryTFee_WeightTax[$intFeeID].';'."\n";
    $strReturn .= 'ary_print_fee['.$i.'] = '.$aryTFee_PrintFee[$intFeeID].';'."\n";
    $i++;
}
?>

jQuery(function() {
    //変数定義
    var _car_maker_id = 0;  //メーカーID
    var _car_id = 0;        //車ID
    
    clear_calc_fee();
    
    //車検費用計算
    function calc_fee() {
        _car_maker_id = $("#car_maker_id").val();
        _car_id = $("#car_id").val();
        
        clear_calc_fee();
        
        if (_car_id == null) {
            return;
        }
        //console.log(_car_id);
        for (var i = 0; i < ary_basic_fee.length; i++) {
            if (ary_car_id[i] == _car_id) {
                //console.log("a");
                //Ⅰ合計(A+B)
                var total_fee1 = ary_basic_fee[i] + ary_inspection_fee[i];
                //console.log(total_fee1);
                //Ⅱ合計(C+D+E)
                var total_fee2 = ary_insurance_fee[i] + ary_weight_tax[i] + ary_print_fee[i];
                
                //車検総合費用(Ⅰ+Ⅱ)
                var total_all  = total_fee1 + total_fee2;
                
                //車検基本料
                $("#basic_fee").html(addComma(ary_basic_fee[i]) + "円");
                //検査料
                $("#inspection_fee").html(addComma(ary_inspection_fee[i]) + "円");
                //Ⅰ合計(A+B)
                $("#total_fee1").html(addComma(total_fee1) + "円");
                //自賠責保険料
                $("#insurance_fee").html(addComma(ary_insurance_fee[i]) + "円");
                //重量税
                $("#weight_tax").html(addComma(ary_weight_tax[i]) + "円");
                //印紙代
                $("#print_fee").html(addComma(ary_print_fee[i]) + "円");
                //Ⅱ合計(C+D+E)
                $("#total_fee2").html(addComma(total_fee2) + "円");
                //車検総合費用(Ⅰ+Ⅱ)
                $("#total_fee_all").html(addComma(total_all) + "円");
                break;
            }
        }
    }
    
    //車検費用初期化
    function clear_calc_fee() {
        //車検基本料
        $("#basic_fee").html("0円");
        //検査料
        $("#inspection_fee").html("0円");
        //Ⅰ合計(A+B)
        $("#total_fee1").html("0円");
        //自賠責保険料
        $("#insurance_fee").html("0円");
        //重量税
        $("#weight_tax").html("0円");
        //印紙代
        $("#print_fee").html("0円");
        //Ⅱ合計(C+D+E)
        $("#total_fee2").html("0円");
        //車検総合費用(Ⅰ+Ⅱ)
        $("#total_fee_all").html("0円");
    }
    
    //車リスト取得
    function make_car_list() {
        _car_maker_id = $("#car_maker_id").val();
        
        var radios = document.getElementsByName("head_select");
        var _head_select = "";
        
        for (var i = 0; i < radios.length; i++) {
            if (radios[i].checked) {
                _head_select = radios[i].value;
                break;
            }
        }
        
        for (var i = document.getElementById("car_id").length; i >= 0; i--) {
            document.getElementById("car_id").options[i] = null;
        }
        
        document.getElementById("car_id").options[0] = new Option();
        document.getElementById("car_id").options[0].value = '';
        document.getElementById("car_id").options[0].text = 'お選びください';
        
        var ary_car_name_head_work = new Array();
        
        var head_index = 0;
        var list_index = 1;
        
        for (var i = 0; i < ary_car_id.length; i++) {
            if (_car_maker_id == ary_car_maker_id[i]) {
                if (_head_select.length == 0 || (_head_select.length != 0 && ary_car_name_head[i] == _head_select)) {
                    document.getElementById("car_id").options[list_index] = new Option();
                    document.getElementById("car_id").options[list_index].value = ary_car_id[i];
                    document.getElementById("car_id").options[list_index].text = ary_car_name[i];
                    list_index++;
                }
                //トヨタ、日産、ホンダの場合
                if (_car_maker_id == 1 || _car_maker_id == 2 || _car_maker_id == 3) {
                    if (ary_car_name_head_work.indexOf(ary_car_name_head[i]) == -1) {
                        ary_car_name_head_work[head_index] = ary_car_name_head[i];
                        head_index++;
                    }
                }
            }
        }
        
        document.getElementById("head_select_a_li").style.display = "none";
        document.getElementById("head_select_k_li").style.display = "none";
        document.getElementById("head_select_s_li").style.display = "none";
        document.getElementById("head_select_t_li").style.display = "none";
        document.getElementById("head_select_n_li").style.display = "none";
        document.getElementById("head_select_h_li").style.display = "none";
        document.getElementById("head_select_m_li").style.display = "none";
        document.getElementById("head_select_y_li").style.display = "none";
        document.getElementById("head_select_r_li").style.display = "none";
        document.getElementById("head_select_w_li").style.display = "none";
        
        //トヨタ、日産、ホンダの場合
        if (_car_maker_id == 1 || _car_maker_id == 2 || _car_maker_id == 3) {
            
            ary_car_name_head_work.sort(function(a, b) {
                if( a < b ) return -1;
                if( a > b ) return 1;
                return 0;
            });
            
            if (ary_car_name_head_work.length != 0) {
                for (var i = 0; i < ary_car_name_head_work.length; i++) {
                    if (ary_car_name_head_work[i] == "あ") {
                        document.getElementById("head_select_a_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "か") {
                        document.getElementById("head_select_k_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "さ") {
                        document.getElementById("head_select_s_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "た") {
                        document.getElementById("head_select_t_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "な") {
                        document.getElementById("head_select_n_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "は") {
                        document.getElementById("head_select_h_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "ま") {
                        document.getElementById("head_select_m_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "や") {
                        document.getElementById("head_select_y_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "ら") {
                        document.getElementById("head_select_r_li").style.display = "";
                    } else if (ary_car_name_head_work[i] == "わ") {
                        document.getElementById("head_select_w_li").style.display = "";
                    }
                }
                
                if (_head_select == "あ") {
                    document.getElementById("head_select_a").checked = true;
                } else if (_head_select == "か") {
                    document.getElementById("head_select_k").checked = true;
                } else if (_head_select == "さ") {
                    document.getElementById("head_select_s").checked = true;
                } else if (_head_select == "た") {
                    document.getElementById("head_select_t").checked = true;
                } else if (_head_select == "な") {
                    document.getElementById("head_select_n").checked = true;
                } else if (_head_select == "は") {
                    document.getElementById("head_select_h").checked = true;
                } else if (_head_select == "ま") {
                    document.getElementById("head_select_m").checked = true;
                } else if (_head_select == "や") {
                    document.getElementById("head_select_y").checked = true;
                } else if (_head_select == "ら") {
                    document.getElementById("head_select_r").checked = true;
                } else if (_head_select == "わ") {
                    document.getElementById("head_select_w").checked = true;
                }
            }
            
            document.getElementById("kana_dd").style.display = "block";
        } else {
            document.getElementById("kana_dd").style.display = "none";
        }
    }
    
    //カンマ編集
    function addComma(value){
        var i;
        value = "" + value; //文字列に変換
        for(i = 0; i < value.length/3; i++){
            value = value.replace(/^([+-]?\d+)(\d\d\d)/,"$1,$2");
        }
        return value;
    }
    
    //メーカー変更
    $("#car_maker_id").change(function() {
        document.getElementById("head_select_a").checked = false;
        document.getElementById("head_select_k").checked = false;
        document.getElementById("head_select_s").checked = false;
        document.getElementById("head_select_t").checked = false;
        document.getElementById("head_select_n").checked = false;
        document.getElementById("head_select_h").checked = false;
        document.getElementById("head_select_m").checked = false;
        document.getElementById("head_select_y").checked = false;
        document.getElementById("head_select_r").checked = false;
        document.getElementById("head_select_w").checked = false;
        make_car_list();
        clear_calc_fee();
    })
    
    //頭文字変更
    $("#head_select_a").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_k").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_s").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_t").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_n").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_h").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_m").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_y").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_r").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    $("#head_select_w").change(function() {
        make_car_list();
        clear_calc_fee();
    })
    
    //車変更
    $("#car_id").change(function() {
        calc_fee();
    })
})
<?php
echo $strReturn;
?>
</script>
