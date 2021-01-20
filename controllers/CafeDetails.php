<?php
class CafeDetails {
    function index() {
        global $session;
        $alert = '';
        $flashData = $session->getFlashData();

        if ($flashData !== null) {
            if (isset($flashData['alert'])) {
                $alert = $flashData['alert'];
                if (is_array($alert)) {
                    $alert = implode('<br/>', $alert);
                }
            }
        }

        if (!isset($_GET['id'])) {
            Response::Error404();
        }
        $cafes = (new Cafe())->getData($_GET['id']);
        // readable_var_dump($cafe->getLastQuery());
        if (count($cafes) === 0) {
            Response::Error404();
        }
        $cafe = $cafes[0];

        $tables = (new Table())->get([], "tables.cafe_id = '$cafe->cafe_id'");
        $cafe->tables = $tables;
        // readable_var_dump($cafe);
        View::load("/templates/header");
        View::load('cafeDetails', ['cafe' => $cafe]);
        View::load("/templates/footer");
    }

    function nextOrder() {
        global $session;
        $validationMessages = [];
        if (!isset($_POST['date'])) {
            $validationMessages['date'] = 'Date is required!';
        }
        if (!isset($_POST['table'])) {
            $validationMessages['table'] = 'Table is required!';
        }
        if (!isset($_POST['cafe_id'])) {
            $validationMessages['cafe_id'] = 'Cafe ID is required!';
        }
        if (!isset($_POST['qty'])) {
            $validationMessages['qty'] = 'Quantity ID is required!';
        }

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            redirect_back();
        }

        $date = htmlentities($_POST['date'], ENT_QUOTES);
        $cafe_id = htmlentities($_POST['cafe_id'], ENT_QUOTES);
        $table_id = htmlentities($_POST['table'], ENT_QUOTES);
        $quantity = htmlentities($_POST['qty'], ENT_QUOTES);

        $table = new Table();
        $tables = $table->get(['table_name', 'price', 'total_table'], "table_id = '$table_id'", 1);
        // readable_var_dump($tables);
        if (!$tables) Response::Error404();

        $cafe = new Cafe();
        $cafes = $cafe->get(['name', 'address'], "cafe_id = '$cafe_id'", 1);
        // readable_var_dump($cafes);
        if (!$cafes) Response::Error404();

        if ($quantity > $tables[0]->total_table)
            $quantity = $tables[0]->total_table;

        View::load('order', [
            'date' => $date,
            'cafe_id' => $cafe_id,
            'table_id' => $table_id,
            'quantity' => $quantity,
            'table' => $tables[0],
            'cafe' => $cafes[0]
        ]);
    }

    function createOrder() {
        global $session;
        $user = $session->get('user');
        $validationMessages = [];
        if (!isset($_POST['date'])) {
            $validationMessages['date'] = 'Date is required!';
        }
        if (!isset($_POST['table'])) {
            $validationMessages['table'] = 'Table is required!';
        }
        if (!isset($_POST['cafe_id'])) {
            $validationMessages['cafe_id'] = 'Cafe ID is required!';
        }
        if (!isset($_POST['qty'])) {
            $validationMessages['qty'] = 'Quantity ID is required!';
        }

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            redirect(baseURL('result-order'));
        }

        $date = htmlentities($_POST['date'], ENT_QUOTES);
        $cafe_id = htmlentities($_POST['cafe_id'], ENT_QUOTES);
        $table_id = htmlentities($_POST['table'], ENT_QUOTES);
        $quantity = htmlentities($_POST['qty'], ENT_QUOTES);

        $order = new Order();
        $guid = GUIDv4();
        if (!$guid) {
            $session->setFlashData(['alert' => 'Failed to create order']);
            redirect(baseURL('result-order'));
        }
        $order->order_id = $guid;
        $order->order_date = $date;
        $order->user_id = $user->user_id;
        $order->cafe_id = $cafe_id;

        // INSERT order_items
        $orderItems = new OrderItems();
        $guid = GUIDv4();
        if (!$guid) {
            $session->setFlashData(['alert' => 'Failed to create order']);
            redirect(baseURL('result-order'));
        }
        $orderItems->order_item_id = $guid;
        $orderItems->order_id = $order->order_id;
        $orderItems->table_id = $table_id;
        $orderItems->quantity = $quantity;

        $table = (new Table())->get([], "table_id = '$table_id'", 1);
        if ($table) {
            $table = $table[0];
            $table->total_table = $table->total_table - $quantity;
            $trx = $order->insert() && $orderItems->insert() && $table->update();
            if ($trx) {
                $session->setFlashData(['success' => 'Order Created']);
                redirect(baseURL('result-order'));
            }
        }

        $session->setFlashData(['alert' => 'Failed to create order']);
        redirect(baseURL('result-order'));
    }
}
