<?php
class CafeDetails
{
    function index()
    {
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

    function createOrder()
    {
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
        $order->cafe_id = "c74d3752-48fa-4d3d-999c-cc27d1ef1897";

        if ($order->insert()) {
            $session->setFlashData(['success' => 'Order Created']);
            redirect_back();
        }

        $session->setFlashData(['alert' => 'Failed to create order']);
        redirect_back();
    }
}
