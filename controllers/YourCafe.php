<?php
class YourCafe {
    function dashboard() {
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
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

        $cafe = (new Cafe())->get([], "user_id = '" . $session->get('user_id') . "'", 1);

        if (!$cafe) {
            redirect(baseURL('registerCafe'));
        }

        View::load('dashboard/your-cafe', [
            'alert' => $alert,
            'success' => $success,
            'username' => $session->get('username'),
            'cafe' => $cafe[0],
        ]);
    }

    function edit() {
        global $session;
        if ($session->get('user_id') === null) {
            redirect(baseURL('login'));
        }
        $validationMessages = [];
        if (empty($_POST)) redirect_back();
        if (!isset($_POST['cafe_id'])) {
            $validationMessages['cafe_id'] = 'Cafe ID is required!';
        }
        if (!isset($_POST['name'])) {
            $validationMessages['name'] = 'Name is required!';
        }
        if (!isset($_POST['address'])) {
            $validationMessages['address'] = 'Address is required!';
        }

        $path = '';

        if (isset($_FILES['photo'])) {
            if ($_FILES['photo']['size'] > 0) {
                readable_var_dump($_FILES['photo']);
                $path = $this->uploadImage('photo');

                if (!$path) {
                    $validationMessages['photo'] = "Sorry, we're unable to upload your photo.";
                }

                unset($_FILES['photo']);
            }
        }

        if ($validationMessages) {
            $session->setFlashData(['alert' => $validationMessages]);
            return;
            // redirect_back();
        }

        $cafeId = htmlentities($_POST['cafe_id'], ENT_QUOTES);
        $name = htmlentities($_POST['name'], ENT_QUOTES);
        $address = htmlentities($_POST['address'], ENT_QUOTES);
        $photoPath = htmlentities($path, ENT_QUOTES);

        $cafe = new Cafe();
        $cafe->cafe_id = $cafeId;
        $cafe->name = $name;
        $cafe->address = $address;
        if ($path) {
            $cafe->photo = $photoPath;
        }

        $update = $cafe->update();
        // readable_var_dump($update);
        if (!$update) {
            $session->setFlashData(['alert' => 'Failed to update cafe']);
            redirect_back();
        }

        // readable_var_dump($cafe->getLastQuery());
        $session->setFlashData(['success' => 'Cafe updated']);
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
        if ($_FILES[$field]["size"] > 5000000) {
            // readable_var_dump($_FILES[$field]["size"]);
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
            // print "image file type";
            return false;
            // return "Sorry, only JPG, JPEG, PNG, GIF, &amp; BMP files are allowed.";
        }

        if (!move_uploaded_file($_FILES[$field]["tmp_name"], __ROOT__ . 'public/' . $uploadPath)) {
            // print("unable to move");
            return false;
            // return "Sorry, there was an error uploading your file.";
        }

        return baseURL($uploadPath);
    }
}
