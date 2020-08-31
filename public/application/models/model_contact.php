<?php

class Model_Contact extends Model
{

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
        ",[
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

         echo json_encode($response);

    }

    public static function delete($id)
    {
        if (self::checkContactExists($id)) {

        }
    }


}