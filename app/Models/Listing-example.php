<?php 
namespace App\Models;

class Listing {
  public static function all(){
    return [
            [
                'id' => 1,
                'title' => 'Listing One',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto tempore earum dignissimos minus aspernatur magni vel. A, modi itaque quae, quas eaque consectetur odio magnam assumenda harum omnis consequatur repellat.'
            ],
            [
                'id' => 2,
                'title' => 'Listing Two',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto tempore earum dignissimos minus aspernatur magni vel. A, modi itaque quae, quas eaque consectetur odio magnam assumenda harum omnis consequatur repellat.'
            ]
          ];
  }

  public static function find($id){
    $listings = self::all();

    foreach($listings as $listing){
      if($listing['id'] == $id){
        return $listing;
      }
    }
  }
}