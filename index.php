<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.discogs.com/users/askchucky/collection/folders/0/releases?sort=artist&sort_order=asc&per_page=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Cache-Control: no-cache",
    "Postman-Token: d40b6231-786b-49a9-92e1-0fdafda71813",
    "User-Agent: pl8ylist.com"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$objRecordCollection = json_decode($response);

function objectToArray($d)
{
  if (is_object($d)) {
      // Gets the properties of the given object
      // with get_object_vars function
      $d = get_object_vars($d);
  }

  if (is_array($d)) {
      /*
      * Return array converted to object
      * Using __FUNCTION__ (Magic constant)
      * for recursive call
      */
      return array_map(__FUNCTION__, $d);
  }
  else {
      // Return array
      return $d;
  }
}

echo 'ID: ' . $objRecordCollection->releases[0]->instance_id . '<br />';
echo 'Artist: ' . $objRecordCollection->releases[0]->basic_information->artists[0]->name . '<br />';
echo 'Name: ' . $objRecordCollection->releases[0]->basic_information->title . '<br />';
echo 'Last Played: ' . $objRecordCollection->releases[0]->notes[0] . '<br />';





  //foreach ($someArray->releases as $item)
//{
   
  //  echo 'ID: ' . $item->instance_id . '<br />';
    
    //foreach ($item->basic_information as $record)
    //{
     // echo 'Artist: ' . $record->master_url . '<br />';
    //}
 // }
  