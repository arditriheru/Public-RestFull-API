<?php
defined('BASEPATH') or exit('No direct script access allowed');

// Load library phpspreadsheet
require('./vendor/excel/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// End load library phpspreadsheet

class DataMovie extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model("mHome");
        $this->load->helper(array('url', 'download'));
    }

    /**
     * Login untuk super admin
     */
    public function admin()
    {
        $data['title']      = "Super Admin";
        $data['subtitle']   = "Login Sistem Informasi Seminar";

        $this->load->view('templates/header', $data);
        $this->load->view('vLogin', $data);
        $this->load->view('templates/footer', $data);
    }

    /**
     * halaman dashboard peserta
     */
    public function index()
    {
        $data['title']          = "Seminar";
        $data['subtitle']       = "Dashboard";

        $this->load->view('templates/header', $data);
        $this->load->view('movie/vDashboard', $data);
        $this->load->view('templates/footer', $data);
    }

    /**
     * melihat detail event
     */
    public function detailEvent($id)
    {
        $data['title']             = "Detail Event";
        $data['subtitle']          = "Dashboard";

        $data['id_event']       = $id;
        $data['detailEvent']    = $this->mHome->detailEvent(array('event.id_event' => $id))->result();
        $data['dataAdmin']      = $this->mHome->dataAdmin(array('event_admin.id_event' => $id))->result();
        $data['dataUser']       = $this->mHome->selectData('user', '*', 'user.id_user IS NOT NULL', 'id_user ASC')->result();
        $data['dataReviewer']   = $this->mHome->dataReviewer(array('event_reviewer.id_event' => $id))->result();

        $this->load->view('templates/header', $data);
        $this->load->view('home/vDetailEvent', $data);
        $this->load->view('templates/footer', $data);
    }
}
