<?php
    /**
     * Tells the browser to allow code from any origin to access
     */
    header("Access-Control-Allow-Origin: *");

    /**
     * Tells browsers whether to expose the response to the frontend JavaScript code
     * when the request's credentials mode (Request.credentials) is include
     */
    header("Access-Control-Allow-Credentials: true");
    
    /**
     * Specifies one or more methods allowed when accessing a resource in response to a preflight request
     */
    header("Access-Control-Allow-Methods: POST, GET, PUT, DELETE");
    
    /**
     * Used in response to a preflight request which includes the Access-Control-Request-Headers to
     * indicate which HTTP headers can be used during the actual request
     */
    header("Access-Control-Allow-Headers: Content-Type");

    require_once('MysqliDb.php');

    class API {
        public function __construct()
        {
            $this->db = new MySQLiDb("localhost", "root", "", "employee");
        }    

        /**
        * HTTP GET Request
        *
        * @param $payload
        */
        public function httpGet($payload = array())
        {
            // Check if an ID is specified in the query parameters
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $this->db->where('id', $id);
            }
            
            // execute query
            $query = $this->db->get('tbl_test');

            //check if query is success or fail
            if ($query) {
                return json_encode(array(
                    'method' => 'GET',
                    'status' => 'success',
                    'data' => $query,
                ));
            } else {
                return json_encode(array(
                    'method' => 'GET',
                    'status' => 'fail',
                    'data' => [],
                    'message' => 'Failed to Fetch'
                ));
            }
        }

        /**
         * HTTP POST Request
         *
         * @param $payload
         */
        public function httpPost($payload)
        {
            //Execute Query
            $query = $this->db->insert('tbl_test', $payload);

            //check if query is success or fail
            if ($query) {
                $payload['id'] = $this->db->mysqli()->insert_id;
                return json_encode(array(
                    'method' => 'POST',
                    'status' => 'success',
                    //'id' => $id,
                    'data' => $payload
                ));
            } else {
                return json_encode(array(
                    'method' => 'POST',
                    'status' => 'fail',
                    'data' => [],
                    'message' => 'Failed to Insert'
                ));
            }
        }

        /**
         * HTTP PUT Request
         *
         * @param $id
         * @param $payload
         */
        public function httpPut($id, $payload = array())
        {    
            // Check if row exists in the database
            $row = $this->db->where('id', $id)->getOne('tbl_test');
            if (!$row) {
                return json_encode(array(
                    'method' => 'PUT',
                    'status' => 'fail',
                    'data' => [],
                    'message' => 'Row does not exist'
                ));
                return;
            }

            // Execute query
            $query = $this->db->where('id', $id)->update('tbl_test', $payload);

            //check if query is success or fail
            if ($query) {
                return json_encode(array(
                    'method' => 'PUT',
                    'status' => 'success',
                    'data' => $payload,
                ));
            } else {
                return json_encode(array(
                    'method' => 'PUT',
                    'status' => 'fail',
                    'data' => [],
                    'message' => 'Failed to Update'
                ));
            }
        }

        /**
         * HTTP DELETE Request
         *
         * @param $id
         * @param $payload
         */
        public function httpDelete($id, $payload)
        {
            // Convert single ID to an array
            $ids = is_array($id) ? $id : [$id];
            
            // Check if the rows exist and match the $payload
            $this->db->where('id', $ids, 'IN');
            if (is_int($payload['id'])) {
                $this->db->where('id', $payload['id']);
            } elseif (is_array($payload['id'])) {
                $this->db->where('id', $payload['id'], 'IN');
            }

            //check if the row exists in the database
            $rows = $this->db->get('tbl_test');
            if (count($rows) !== count($ids)) {
                return json_encode(array(
                    'method' => 'DELETE',
                    'status' => 'fail',
                    'data' => [],
                    'message' => 'One or more rows not found or the provided payload does not match the records'
                ));
                return;
            } else if (is_array($ids) && is_array($payload['id'])) {
                //if row exists, check if the uri and json body match
                if ($ids[0] !== implode(",",$payload['id'])) {
                    return json_encode(array(
                        'method' => 'DELETE',
                        'status' => 'fail',
                        'data' => [],
                        'message' => 'The provided id or payload does not match each other'
                    ));
                    return;
                } 
            }
            
            // Delete the rows
            if (is_int($payload['id'])) {
                $this->db->where('id', $payload['id']);
            } else if (is_array($payload['id'])) {
                $this->db->where('id', $payload['id'], 'IN');
            }

            $query = $this->db->delete('tbl_test');

            // check if success or fail
            if ($query) {
                return json_encode(array(
                    'method' => 'DELETE',
                    'status' => 'success',
                    //'data' => $payload,
                ));
                return;
            } else {
                return json_encode(array(
                    'method' => 'DELETE',
                    'status' => 'fail',
                    'data' => [],
                    'message' => 'Failed to Delete'
                ));
            }
            }

    }
    // //Identifier if what type of request
    // $request_method = $_SERVER['REQUEST_METHOD'];

    // // For GET,POST,PUT & DELETE Request
    // if ($request_method === 'GET') {
    //     $received_data = $_GET;
    // } else {
    //     //check if method is PUT or DELETE, and get the ids on URL
    //     if ($request_method === 'PUT' || $request_method === 'DELETE') {
    //         $request_uri = $_SERVER['REQUEST_URI'];
    //         $ids = null;
    //         $exploded_request_uri = array_values(explode("/", $request_uri));
    //         $last_index = count($exploded_request_uri) - 1;
    //         $ids = $exploded_request_uri[$last_index];
    //         }
    //     }


    // //payload data
    // $received_data = json_decode(file_get_contents('php://input'), true);
    
    // $api = new API;
    // //Checking if what type of request and designating to specific functions
    // switch ($request_method) {
    //     case 'GET':
    //         $api->httpGet($received_data);
    //         break;
    //     case 'POST':
    //         $api->httpPost($received_data);
    //         break;
    //     case 'PUT':
    //         $api->httpPut($ids, $received_data);
    //         break;
    //     case 'DELETE':
    //         $api->httpDelete($ids, $received_data);
    //         break;
    // }
   
?>