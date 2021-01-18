<?php
class ResultOrder {
    function index() {
        global $session;
        $message = '';
        $type = 'default';
        $notif = $session->getFlashData();

        if ($notif !== null) {
            if (isset($notif['alert'])) {
                $type = 'warning';
                $message = $notif['alert'];
                if (is_array($message)) {
                    $message = implode('<br/>', $message);
                }
            } else if (isset($notif['success'])) {
                $type = 'success';
                $message = $notif['success'];
                if (is_array($message)) {
                    $message = implode('<br/>', $message);
                }
            }
        }

        View::load('order-result', [
            'type' => $type,
            'message' => $message
        ]);
    }
}
