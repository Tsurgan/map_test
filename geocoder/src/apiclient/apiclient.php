<?php

class ApiClient
{
    private $address;
    private $get;

    public function __construct(string $address, array $get=null)
    {
        $this->address    = $address;
        $this->get        = $get;
    }

    public function getApi(): array
    {
        $ch = curl_init($this->address . http_build_query($this->get));

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $html = curl_exec($ch);
        curl_close($ch);


        return json_decode($html,true);
    }

}
?>
