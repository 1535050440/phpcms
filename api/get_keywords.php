<?php

/**
 * 获取关键字接口
 * @author Snow & Love <phpcms@msn.com>
 * @version 1.0
 */
defined('IN_PHPCMS') or exit('No permission resources.');
define('API_URL_GET_KEYWORDS', 'http://zhannei.baidu.com/api/customsearch/keywords');

$number = intval($_GET['number']);
$data = $_POST['data'];
echo get_keywords($data, $number);

function get_keywords($title, $number = 3) {
    $title = trim(strip_tags($title));
    if (empty($title)) {
        return '';
    }
    $rs = pc_file_get_contents(API_URL_GET_KEYWORDS . '?title=' . urlencode($title), 3);
    if (!$rs) {
        return '';
    }
    $data = json_decode($rs, true);
    if (!$data || empty($data['result']['res']['keyword_list'])) {
        return '';
    }
    if (count($data['result']['res']['keyword_list']) > $number) {
        $data['result']['res']['keyword_list'] = array_slice($data['result']['res']['keyword_list'], 0, $number);
    }
    if (CHARSET != 'utf-8') {
        return iconv('utf-8', 'gbk', implode(' ', $data['result']['res']['keyword_list']));
    } else {
        return implode(' ', $data['result']['res']['keyword_list']);
    }
}

?>