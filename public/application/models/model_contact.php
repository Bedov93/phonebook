<?php

class Model_Contact extends Model
{

    public $errors = [];

    public function validate($input, $post, $files = false)
    {

        $rules = [
            'first_name' => [
                'pattern' => '#^[a-zA-Z0-9]{1,255}$#',
                'message' => trim(preg_replace('/\s\s+/', ' ', 'The login is specified incorrectly 
                (only Latin letters and numbers from 0 to 255 characters are allowed')),
            ],
            'last_name' => [
                'pattern' => '#^[a-zA-Z0-9]{1,255}$#',
                'message' => trim(preg_replace('/\s\s+/', ' ', 'The login is specified incorrectly 
                (only Latin letters and numbers from 0 to 255 characters are allowed')),
            ],
            'email' => [
                'pattern' => '#^([a-z0-9_.-]{1,20}+)@([a-z0-9_.-]+)\.([a-z\.]{2,10})$#',
                'message' => trim(preg_replace('/\s\s+/', ' ', 'The E-mail is specified incorrectly')),
            ],
            'phone' => [
                'pattern' => '#^\+[0-9]*$#',
                'message' => trim(preg_replace('/\s\s+/', ' ', 'The E-mail is specified incorrectly')),
            ],
        ];

        foreach ($input as $val) {
            if (!isset($post[$val]) or !preg_match($rules[$val]['pattern'], $post[$val])) {
                $this->errors[$val] = $rules[$val]['message'];
            }
        }

        if ($files) {

            $photo = isset($_FILES['photo']) ? $_FILES['photo'] : false;

            if ($photo['size']) {
                $allowedExts = array("jpeg", "jpg", "png");
                $extension = end(explode(".", $photo["name"]));
                if ((($photo["type"] == "image/jpeg")
                        || ($photo["type"] == "image/jpg")
                        || ($photo["type"] == "image/png"))
                    && ($photo["size"] / 1024 <= 2048)
                    && in_array($extension, $allowedExts)) {

                } else {
                    $this->errors['photo'] = "File size mast be 2048 kilobytes and jpg or png extension.";
                }
            }

        }

        return $this->errors ? false : true;
    }

    public function getById($id)
    {
        $contact = Database::row('
            SELECT *
                FROM contacts 
                WHERE 
                    id = :id 
                AND 
                    user_id = :user_id',
            [
                "id" => $id,
                "user_id" => $_SESSION['user_id']
            ]);
        if ($contact) {
            $contact['phone_text'] = phone2string(substr($contact['phone'], 1));
        }

        return $contact;
    }

    public function checkContactExists($id)
    {
        return Database::column('
            SELECT id 
                FROM contacts 
                WHERE 
                    id = :id 
                AND 
                    user_id = :user_id',
            [
                "id" => $id,
                "user_id" => $_SESSION['user_id']
            ]) ? true : false;
    }

    public function getCount($filtered = false, $searchQuery = "")
    {
        if ($filtered) {
            return Database::column("
               SELECT count(*) FROM contacts WHERE user_id = :user_id {$searchQuery}",
                ['user_id' => $_SESSION['user_id']]
            );
        } else {
            return Database::column('
               SELECT count(*) FROM contacts WHERE user_id = :user_id',
                ['user_id' => $_SESSION['user_id']]
            );
        }
    }

    public function filteredResult($searchQuery, $columnName, $columnSortOrder, $row, $rowPerPage)
    {
        return Database::query("
            SELECT * 
                FROM contacts 
                    WHERE user_id = :user_id 
                    {$searchQuery}
                    ORDER BY {$columnName} {$columnSortOrder}
                    LIMIT {$row},{$rowPerPage}
        ", [
            "user_id" => $_SESSION['user_id']
        ])->fetchAll(PDO::FETCH_ASSOC);
    }

    public function draw($queryData)
    {
        //echo json_encode($queryData);

        $searchQuery = "";

        $draw = $queryData['draw'];
        $row = $queryData['start'];
        $rowPerPage = $queryData['length']; // Rows display per page
        $columnIndex = $queryData['order'][0]['column']; // Column index
        $columnName = $queryData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $queryData['order'][0]['dir']; // asc or desc
        $searchValue = $queryData['search']['value']; // Search value


        if ($searchValue != '') {
            $searchQuery = " AND (first_name LIKE '%" . $searchValue . "%' or 
            last_name LIKE '%" . $searchValue . "%' or 
            email LIKE '%" . $searchValue . "%' or 
            phone LIKE '%" . $searchValue . "%' ) ";
        }

        $totalRecords = $this->getCount();
        $totalRecordsWithFilter = $this->getCount(true, $searchQuery);

        $contacts = $this->filteredResult($searchQuery, $columnName, $columnSortOrder, $row, $rowPerPage);

        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordsWithFilter,
            "aaData" => $contacts
        );

        return $response;
    }

    public static function deleteImage($id)
    {
        $image = Database::column('
                SELECT photo FROM contacts WHERE id = :id', ['id' => $id]);
        if ($image && is_file($image)) {
            return unlink($image);
        }

        return false;
    }

    public static function uploadImage($file)
    {
        $ds = DIRECTORY_SEPARATOR;

        $storeFolder = '../../images';


        $tempFile = $file['tmp_name'];

        $targetPath = dirname(__FILE__) . $ds . $storeFolder . $ds;

        $fileExt = explode(".", $file['name']);

        $fileExt = md5($fileExt[0] . time()) . "." . $fileExt[1];

        $targetFile = $targetPath . $fileExt;

        move_uploaded_file($tempFile, $targetFile);

        return "images/{$fileExt}";

    }

    public function update($contact){

        $photo = $_FILES['photo'];

        $updateQuery = "UPDATE contacts
                    SET
                    first_name = :first_name,
                    last_name = :last_name,
                    email = :email,
                    phone = :phone";

        if($photo['size']) {
            self::deleteImage($contact['id']);
            $contact['photo'] = self::uploadImage($photo);
            $updateQuery .= ", photo = :photo";

        }


        return Database::execute(
            $updateQuery."
                WHERE 
                    id = :id
        ",$contact);
    }

    public function create($contact){

        $photo = $_FILES['photo'];

        $columnsQuery = "user_id, first_name, last_name, email, phone";
        $valuesQuery = ":user_id, :first_name, :last_name, :email, :phone";

        if($photo['size']) {
            $contact['photo'] = self::uploadImage($photo);
            $columnsQuery .=", photo";
            $valuesQuery .=", :photo";
        }

        $contact['user_id'] = $_SESSION['user_id'];

        return Database::execute("INSERT INTO contacts ({$columnsQuery}) values ({$valuesQuery})
        ",$contact);
    }

    public static function delete($id)
    {
        if (!self::checkContactExists($id)) {
            echo json_encode(['result' => false]);
        }

        self::deleteImage($id);
        Database::execute('DELETE FROM contacts WHERE id = :id', ['id' => $id]);
        echo json_encode(['result' => true]);

    }


}