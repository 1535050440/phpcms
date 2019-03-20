<?php

/*
	[UCenter] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: domain.php 848 2008-12-08 05:43:39Z zhaoxiongfei $
*/

!defined('IN_UC') && exit('Access Denied');

class domainmodel {

	var $db;
	var $base;

	function __construct(&$base) {
		$this->domainmodel($base);
	}

	function domainmodel(&$base) {
		$this->base = $base;
		$this->db = $base->db;
	}

	function add_domain($domain, $ip) {
		if($domain) {
			$this->db->query("INSERT INTO ".UC_DBTABLEPRE."domains SET domain='$domain', ip='$ip'");
		}
		return $this->db->insert_id();
	}

	function get_total_num() {
		$data = $this->db->result_first("SELECT COUNT(*) FROM ".UC_DBTABLEPRE."domains");
		return $data;
	}

	function get_list($page, $ppp, $totalnum) {
		$start = $this->base->page_get_start($page, $ppp, $totalnum);
		$data = $this->db->fetch_all("SELECT * FROM ".UC_DBTABLEPRE."domains LIMIT $start, $ppp");
		return $data;
	}

	function delete_domain($arr) {
		$domainids = $this->base->implode($arr);
		$this->db->query("DELETE FROM ".UC_DBTABLEPRE."domains WHERE id IN ($domainids)");
		return $this->db->affected_rows();
	}

	function update_domain($domain, $ip, $id) {
		$this->db->query("UPDATE ".UC_DBTABLEPRE."domains SET domain='$domain', ip='$ip' WHERE id='$id'");
		return $this->db->affected_rows();
	}
}

?>