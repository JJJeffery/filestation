<?php
/**
 * 容量单位计算，支持定义小数保留长度；定义起始和目标单位，或按1024自动进位
 * 
 * @param int $size,容量计数
 * @param type $unit,容量计数单位，默认为字节
 * @param type $decimals,小数点后保留的位数，默认保留一位
 * @param type $targetUnit,转换的目标单位，默认自动进位
 * @return type 返回符合要求的带单位结果
 */
function fileSizeConv($size, $unit = 'B', $decimals = 1, $targetUnit = 'auto') {
    $units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB');
    $theUnit = array_search(strtoupper($unit), $units); //初始单位是哪个
    //判断是否自动计算，
    if ($targetUnit != 'auto')
        $targetUnit = array_search(strtoupper($targetUnit), $units);
    //循环计算
    while ($size >= 1024) {
        $size/=1024;
        $theUnit++;
        if ($theUnit == $targetUnit)//已符合给定则退出循环吧！
            break;
    }
    return sprintf("%1\$.{$decimals}f", $size) . $units[$theUnit];
}