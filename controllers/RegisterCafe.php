<?php
class RegisterCafe {
    function index() {
        global $session;
        $alert = '';
        $flashData = $session->getFlashData();

        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }

        if ($flashData !== null) {
            if (isset($flashData['alert'])) {
                $alert = $flashData['alert'];
                if (is_array($alert)) {
                    $alert = implode('<br/>', $alert);
                }
            }
        }
        View::load('/templates/header');
        View::load('registerCafe', [
            'alert' => $alert,
        ]);
        View::load('/templates/footer');
    }

    function cafeRegister() {
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }

        $validationMessages = [];
        if (empty($_POST)) redirect_back();
        if (!isset($_POST['name'])) {
            $validationMessages['name'] = 'Name is required!';
        }
        if (!isset($_POST['address'])) {
            $validationMessages['address'] = 'Address is required!';
        }
        if (!isset($_FILES['photo'])) {
            $validationMessages['photo'] = "Photo is required";
        } else {
            $path = $this->uploadImage('photo');

            if (!$path) {
                $validationMessages['photo'] = "Sorry, we're unable to upload your photo.";
            }
        }

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            redirect_back();
        }

        $name = htmlentities($_POST['name'], ENT_QUOTES);
        $address = htmlentities($_POST['address'], ENT_QUOTES);
        $photoPath = htmlentities($path, ENT_QUOTES);

        $guid = GUIDv4();
        if (!$guid) {
            $session->setFlashData(['alert' => 'Failed to create cafe']);
            redirect_back();
        }

        $cafe = new Cafe();
        $cafe->cafe_id = $guid;
        $cafe->name = $name;
        $cafe->address = $address;
        $cafe->photo = $photoPath;
        $cafe->user_id = $session->get('user_id');

        $insert = $cafe->insert();
        readable_var_dump($cafe->getLastQuery());

        if (!$insert) {
            $session->setFlashData(['alert' => 'Failed to create cafe']);
            redirect_back();
        }

        $session->setFlashData(['alert' => 'Cafe created']);
        redirect_back();
    }

    function uploadImage($field) {
        $targetDir = "uploads/";

        $targetFile = basename($_FILES[$field]["name"]);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $uploadPath = $targetDir . random_str(32) . '.' . $imageFileType;

        // Check if image file is an actual image or fake image
        $check = getimagesize($_FILES[$field]["tmp_name"]);
        if ($check === false) {
            return false;
            // return 'File is not an image';
        }

        // Check if file already exists
        if (file_exists($uploadPath)) {
            return false;
            // return "Sorry, file already exists.";
        }

        // Check file size
        if ($_FILES[$field]["size"] > 500000) {
            return false;
            // return "Sorry, your file is too large.";
        }

        // Allow certain file formats
        if (
            $imageFileType !== "jpg"
            && $imageFileType !== "png"
            && $imageFileType !== "jpeg"
            && $imageFileType !== "gif"
            && $imageFileType !== "bmp"
        ) {
            return false;
            // return "Sorry, only JPG, JPEG, PNG, GIF, &amp; BMP files are allowed.";
        }

        if (!move_uploaded_file($_FILES[$field]["tmp_name"], __ROOT__ . 'public/' . $uploadPath)) {
            return false;
            // return "Sorry, there was an error uploading your file.";
        }

        return baseURL($uploadPath);
    }
}
