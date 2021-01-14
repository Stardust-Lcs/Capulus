<?php
class RegisterCafe
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
        View::load('/templates/header');
        View::load('registerCafe');
        View::load('/templates/footer');
    }

    function cafeRegister()
    {
        global $session;
        $validationMessages = [];
        if (!isset($_POST['name'])) {
            $validationMessages['name'] = 'Name is required!';
        }
        if (!isset($_POST['address'])) {
            $validationMessages['address'] = 'Address is required!';
        }

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            redirect_back();
        }

        $name = htmlentities($_POST['name'], ENT_QUOTES);
        $address = htmlentities($_POST['address'], ENT_QUOTES);

        $cafe = new Cafe();
        $guid = GUIDv4();
        if (!$guid) {
            $session->setFlashData(['alert' => 'Failed to create cafe']);
            redirect_back();
        }
        $cafe->cafe_id = $guid;
        $cafe->name = $name;
        $cafe->address = $address;

        if ($cafe->insert()) {
            $session->setFlashData(['success' => 'Cafe Created']);
            redirect_back();
        }

        $session->setFlashData(['alert' => 'Failed to create cafe']);
        redirect_back();
    }
}
