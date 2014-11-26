<?php


class Rocketbox {

    private $token = "-- YOUR TOKEN HERE --";
    private $api_path = "https://www.rocketbox.io/api/v1/";


    public function get($key) {
        $result = $this->curl($this->api_path . "get", 
            array(
                "token" => $this->token,
                "key" => $key
                ));

        return json_decode($result);
    }

    public function set($key, $value) {
        $result = $this->curl($this->api_path . "set", 
            array(
                "token" => $this->token,
                "key" => $key,
                "value" => $value
                ));

        return json_decode($result);
    }

    public function getAll() {
        $result = $this->curl($this->api_path . "getAll", 
            array(
                "token" => $this->token
                ));

        return json_decode($result);
    }

    public function delete($key) {
        $result = $this->curl($this->api_path . "delete", 
            array(
                "token" => $this->token,
                "key" => $key
                ));

        return json_decode($result);
    }


    public function collectionAdd($key, $object) {
        $result = $this->curl($this->api_path . "collection/add", 
            array(
                "token" => $this->token,
                "key" => $key,
                "value" => json_encode($object)
                ));

        return json_decode($result);
    }

    public function collectionEdit($key, $object) {
        $result = $this->curl($this->api_path . "collection/edit",
            array(
                "token" => $this->token,
                "key" => $key,
                "value" => json_encode($object)
                ));

        return json_decode($result);
    }

    public function collectionGet($key) {
        $result = $this->curl($this->api_path . "collection/get",
            array(
                "token" => $this->token,
                "key" => $key
                ));

        return json_decode($result);
    }

    public function collectionDelete($id) {
        $result = $this->curl($this->api_path . "collection/delete",
            array(
                "token" => $this->token,
                "_id" => $id
                ));

        return json_decode($result);
    }

    public function collectionGetAll() {
        $result = $this->curl($this->api_path . "collection/getAll",
            array(
                "token" => $this->token
                ));

        return json_decode($result);
    }

    public function collectionSearch($key, $object) {
        $result = $this->curl($this->api_path . "collection/search",
            array(
                "token" => $this->token,
                "key" => $key,
                "value" => json_encode($object)
                ));

        return json_decode($result);
    }

    public function collectionSearchById($key, $id) {
        $result = $this->curl($this->api_path . "collection/searchById",
            array(
                "token" => $this->token,
                "key" => $key,
                "_id" => $id
                ));

        return json_decode($result);
    }

    public function collectionDrop($key) {
        $result = $this->curl($this->api_path . "collection/drop",
            array(
                "token" => $this->token,
                "key" => $key
                ));

        return json_decode($result);
    }

    public function sendMail($to, $subject, $body){
        $result = $this->curl($this->api_path . "mail/send",
            array(
                "token" => $this->token,
                "to" => $to,
                "subject" => $subject,
                "body" => $body
                ));

        return json_decode($result);
    }

    private function curl($url, $fields) {

        $fields_string = "";
        foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
        rtrim($fields_string, '&');

        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch,CURLOPT_POST, count($fields));
        curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

}
