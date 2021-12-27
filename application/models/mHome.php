<?php

class mHome extends CI_Model
{

    /*
|--------------------------------------------------------------------------
|
| Model public
|
|--------------------------------------------------------------------------
*/

    public function switchLang($lang)
    {
        if ($lang == 'en') {
            $this->db->select('id_multi_bahasa, english AS translate');
        } else {
            $this->db->select('id_multi_bahasa, indonesia AS translate');
        }

        $this->db->from('multi_bahasa');
        return $this->db->get();
    }

    public function getData($table)
    {
        return $this->db->get($table);
    }

    public function insertData($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function insert_batch($table, $data)
    {
        $this->db->insert_batch($table, $data);
        if ($this->db->affected_rows() > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function updateData($table, $data, $where)
    {
        $this->db->update($table, $data, $where);
    }

    public function update_batch($table, $data, $where)
    {
        $this->db->update_batch($table, $data, $where);
    }

    public function deleteData($table, $where)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    function selectData($table, $column, $where, $orderby)
    {
        $this->db->select($column);
        $this->db->from($table);
        $this->db->where($where);
        $this->db->order_by($orderby);
        return $this->db->get();
    }

    function countData($table, $where)
    {
        $this->db->where($where);
        $query = $this->db->get($table);
        return $query->num_rows();
    }

    function dataEvent($where)
    {
        $query = $this->db->select("*,
            CASE
            WHEN event.biaya_status='0' THEN 'Gratis'
            WHEN event.biaya_status='1' THEN 'Bayar'
            END biaya_sts
        ")
            ->from('event')
            ->join('event_kategori', 'event.id_event_kategori=event_kategori.id_event_kategori')
            ->join('event_tingkat', 'event.id_event_tingkat=event_tingkat.id_event_tingkat')
            ->where($where)
            ->order_by('tgl_mulai ASC')
            ->limit('100')
            ->get();
        return $query;
    }

    function detailEvent($where)
    {
        $query = $this->db->select("*,
            CASE
            WHEN event.biaya_status='0' THEN 'Gratis'
            WHEN event.biaya_status='1' THEN 'Bayar'
            END biaya_sts
        ")
            ->from('event')
            ->join('event_kategori', 'event.id_event_kategori=event_kategori.id_event_kategori')
            ->join('event_tingkat', 'event.id_event_tingkat=event_tingkat.id_event_tingkat')
            ->order_by('tgl_mulai ASC')
            ->where($where)
            ->get();
        return $query;
    }

    function dataAdmin($where)
    {
        $query = $this->db->select("*")
            ->from('event_admin')
            ->join('user', 'event_admin.id_user=user.id_user')
            ->where($where)
            ->get();
        return $query;
    }

    function dataReviewer($where)
    {
        $query = $this->db->select("*")
            ->from('event_reviewer')
            ->join('user', 'event_reviewer.id_user=user.id_user')
            ->where($where)
            ->get();
        return $query;
    }
}
