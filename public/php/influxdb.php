<?php
/**
 * @author Stephen "TheCodeAssassin" Hoogendijk
 */
require __DIR__ . '/vendor/autoload.php';

use InfluxDB2\Client;


function influxDB_read(){
    # You can generate a Token from the "Tokens Tab" in the UI
    $token = '_J92h3T0VH7oi0twktWRdfByNM7i8t9wNFm3QJZPf11oE6CEy1ipBngf-QOIpwwnNBaLnbu_Mu1i8ced0MPF3g==';
    $org = 'cmn';
    $bucket = 'igss';

    $client = new Client([
        "url" => "http://192.168.0.155:8086",
        "token" => $token,
        // "verifySSL" => false,
        // "precision" => InfluxDB2\Model\WritePrecision::NS,
    ]);
    try{
        $query = 'from(bucket: "igss") |> range(start: -24h) |> filter(fn: (r) => r["_measurement"] == "sensor")|>last()';
        $tables = $client->createQueryApi()->query($query, $org);
    }catch(Exception $e){
        return $e;
    }
    if(count($tables) == 0){
        return false;
    }
    foreach($tables as $table){
        $list[] = $table->records;
    }
    return $list;
}
// object=>array
function array_change($obj){
    if(!is_object($obj) && !is_array($obj)){
		return $obj;
	}
	if(is_object($obj)){
		$arr = (array)$obj;
	}else{
		$arr = $obj;
	}
	foreach($arr as &$a){
		$a = array_change($a);
	}
	return $arr;
}

function data_get($list,&$arr){
    if(is_array($list)){
        $head = '';
        $body = '';
        foreach($list as $key => &$value){
            if(!is_array($value)){
                if($key == '_field'){
                    $head = $value;
                }elseif($key == '_value'){
                    $body = $value;
                }
                if($head !== '' && $body !== ''){
                    $arr[$head] = $body;

                }
            }else{
                data_get($value,$arr);
            }
        }
        return $arr;
    }
}

// 時間計算
function time_cal($time){
    $outformat= '%F %T'; //equivalent of 'Y-m-d H:i:s' or you could get just date with 'Y-m-d' and so on...
    $datePortions= explode('.', $time);
    $remadeTime= $datePortions[0] . '.' . substr(explode('Z', $datePortions[1])[0], 0, 6) . 'Z';
    $dateTime= DateTime::createFromFormat('Y-m-d\TH:i:s.u\Z', $remadeTime, new DateTimeZone('UTC'));
    if ($dateTime){
        return $result= strftime($outformat, $dateTime->getTimestamp());

    }else{
        return $result= $remadeTime . ' is not InfluxDb timeformat';
    }
}

// 取り出し
function data_update_time_host($data,&$list)
{
    if(is_array($list) && is_array($data)){
        foreach($data as $key => &$value){
            if(!is_array($value)){
                if($key == '_stop'){
                    $time = time_cal($value);
                    $list['created_at'] = $time;
                }elseif($key == 'host'){
                    $list['host'] = $value;
                }
            }else{
                data_update_time_host($value,$list);
            }
        }
        return $list;
    }
}
// mysqlに保存
function rdb_store($array)
{
    $dsn      = 'mysql:dbname=hqsample;host=localhost';
    $user     = 'root';
    $password = '';
    try{
        $dbh = new PDO($dsn, $user, $password);
        $dbh->beginTransaction();
        $calum = "";
        $val = "'";
        foreach($array as $key =>$value){
            $calum .= $key.",";
            $val .= $value."','";
        }
        $dbh->exec("INSERT INTO lpwa (".substr($calum, 0, -1).") VALUES (".substr($val, 0, -2).");");
        $dbh->commit();
        return true;
    }catch(PDOException $e){
        $dbh->rollBack();
        return $e;
    }
}


$data = influxDB_read();
$arr_data = array_change($data);
$arr=[];
// field valueの取得
$list = data_get($arr_data,$arr);
// 日時,hostの取得
$newlist = data_update_time_host($arr_data,$list);
// mysqlに保存
echo rdb_store($newlist);


?>
