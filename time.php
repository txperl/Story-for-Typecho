<?php
$sysReShow = (false !== ($sysInfo = sysInfo()))?"show":"none";
function sysInfo()
{
// UPTIME
    if (false === ($str = @file("/proc/uptime"))) return false;
    $str = explode(" ", implode("", $str));
    $str = trim($str[0]);
    $min = $str / 60;
    $hours = $min / 60;
    $days = floor($hours / 24);
    $hours = floor($hours - ($days * 24));
    $min = floor($min - ($days * 60 * 24) - ($hours * 60));
    if ($days !== 0) $res['uptime'] = $days."天";
    if ($hours !== 0) $res['uptime'] .= $hours."小时";
    $res['uptime'] .= $min."分钟";
    return $res;
}if("show"==$sysReShow){
    echo "</br>本站已萌萌哒运行了".$sysInfo['uptime'].;
    
}
?>       
