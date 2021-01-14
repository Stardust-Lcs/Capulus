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
        $cafe = (new Cafe());
        $cafes = $cafe->getData($_GET['id']);
        // readable_var_dump($cafe->getLastQuery());
        if (count($cafes) === 0) {
            Response::Error404();
        }

        View::load("/templates/header");
        View::load('cafeDetails', ['cafe' => $cafes[0]]);
        View::load("/templates/footer");
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

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            redirect_back();
        }

        $date = htmlentities($_POST['date'], ENT_QUOTES);
        $cafe_id = htmlentities($_POST['cafe_id'], ENT_QUOTES);

        $order = new Order();
        $guid = GUIDv4();
        if (!$guid) {
            $session->setFlashData(['alert' => 'Failed to create order']);
            redirect_back();
        }
        $order->order_id = $guid;
        $order->order_date = $date;
        $order->user_id = $user->user_id;
        $order->cafe_id = $cafe_id;
        $insert = $order->insert();

        if ($insert) {
            $session->setFlashData(['success' => 'Order Created']);
            redirect_back();
        }

        $session->setFlashData(['alert' => 'Failed to create order']);
        redirect_back();
    }
}
