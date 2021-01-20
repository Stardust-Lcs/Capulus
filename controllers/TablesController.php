<?php
class TablesController {
    function dashboard() {
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }
        if (!isset($_GET['id'])) {
            Response::Error404();
        }

        $check = (new Cafe())->checkId($_GET['id']);
        if (!$check) {
            Response::Error404();
        }

        $notif = $session->getFlashData();
        $alert = '';
        $success = '';
        if ($notif !== null) {
            if (isset($notif['alert'])) {
                $alert =  $notif['alert'];
                if (is_array($notif['alert'])) {
                    $alert = implode('<br/>', $alert);
                }
            }

            if (isset($notif['success'])) {
                $success = $notif['success'];
                if (is_array($notif['success'])) {
                    $success = implode('<br/>', $success);
                }
            }
        }

        $cafe = (new Cafe())->get(['name'], "cafe_id = '" . $_GET['id'] . "'", 1)[0];

        $table = new Table();
        $tables = $table->getAllUserCafeTables($_GET['id']);
        // readable_var_dump($table->getLastQuery());

        View::load('dashboard/tables', [
            'alert' => $alert,
            'success' => $success,
            'username' => $session->get('username'),
            'tables' => $tables,
            'cafeId' => $_GET['id'],
            'cafeName' => $cafe->name
        ]);
    }

    function add() {
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }

        $validationMessages = [];
        if (empty($_POST)) redirect_back();
        if (!isset($_POST['table_name'])) {
            $validationMessages['table_name'] = 'Name is required!';
        }
        if (!isset($_POST['price'])) {
            $validationMessages['price'] = 'Address is required!';
        }
        if (!isset($_POST['total_table'])) {
            $validationMessages['total_table'] = "Total Table is required";
        }
        if (!isset($_POST['cafe_id'])) {
            $validationMessages['cafe_id'] = "Cafe ID is required";
        }

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            // return;
            redirect_back();
        }

        $table_name = htmlentities($_POST['table_name'], ENT_QUOTES);
        $price = htmlentities($_POST['price'], ENT_QUOTES);
        $total_table = htmlentities($_POST['total_table'], ENT_QUOTES);
        $cafe_id = htmlentities($_POST['cafe_id'], ENT_QUOTES);

        $guid = GUIDv4();
        if (!$guid) {
            $session->setFlashData(['alert' => 'Failed to create table']);
            redirect_back();
        }

        $table = new Table();
        $table->table_id = $guid;
        $table->cafe_id = $cafe_id;
        $table->table_name = $table_name;
        $table->price = $price;
        $table->total_table = $total_table;

        $insert = $table->insert();
        // readable_var_dump($table->getLastQuery());

        if (!$insert) {
            $session->setFlashData(['alert' => 'Failed to create table']);
            redirect_back();
        }

        $session->setFlashData(['success' => 'Table created']);
        redirect_back();
    }

    function delete() {
    }

    function update() {
    }
}
