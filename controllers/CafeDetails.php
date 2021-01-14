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
        View::load("/templates/header");
        View::load('cafeDetails');
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

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            redirect_back();
        }

        $date = htmlentities($_POST['date'], ENT_QUOTES);

        $order = new Order();
        $guid = GUIDv4();
        if (!$guid) {
            $session->setFlashData(['alert' => 'Failed to create order']);
            redirect_back();
        }
        $order->order_id = $guid;
        $order->order_date = $date;
        $order->user_id = $user->user_id;
        $order->cafe_id = "d181b62f-2412-4c73-b7b2-ae46b52949d6";
        $insert = $order->insert();

        if ($insert) {
            $session->setFlashData(['success' => 'Order Created']);
            redirect_back();
        }

        $session->setFlashData(['alert' => 'Failed to create order']);
        redirect_back();
    }
}
