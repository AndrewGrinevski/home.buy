<?php


namespace App\Traits;


trait ShowOtherOffersTrait
{
    public function showOtherOffers($sellFlat)
    {
        if ($sellFlat->price == null && $sellFlat->rent_per_day == null && $sellFlat->room->number_of_rooms == 1) {
            $sellFlats = $this->showOneRoomFlats()->sellFlats;
        } elseif ($sellFlat->price == null && $sellFlat->rent_per_day == null && $sellFlat->room->number_of_rooms == 2) {
            $sellFlats = $this->showTwoRoomFlats()->sellFlats;
        } elseif ($sellFlat->price == null && $sellFlat->rent_per_day == null && $sellFlat->room->number_of_rooms == 3) {
            $sellFlats = $this->showThreeRoomFlats()->sellFlats;
        } elseif ($sellFlat->price == null && $sellFlat->rent_per_day == null && $sellFlat->room->number_of_rooms > 3) {
            $sellFlats = $this->showFourPlusRoomFlats()->sellFlats;
        } elseif ($sellFlat->rent_per_month == null && $sellFlat->rent_per_day == null && $sellFlat->room->number_of_rooms == 1) {
            $sellFlats = $this->showOneRoomFlats()->sellFlats;
        } elseif ($sellFlat->rent_per_month == null && $sellFlat->rent_per_day == null && $sellFlat->room->number_of_rooms == 2) {
            $sellFlats = $this->showTwoRoomFlats()->sellFlats;
        } elseif ($sellFlat->rent_per_month == null && $sellFlat->rent_per_day == null && $sellFlat->room->number_of_rooms == 3) {
            $sellFlats = $this->showThreeRoomFlats()->sellFlats;
        } elseif ($sellFlat->rent_per_month == null && $sellFlat->rent_per_day == null && $sellFlat->room->number_of_rooms > 3) {
            $sellFlats = $this->showFourPlusRoomFlats()->sellFlats;

        } elseif ($sellFlat->rent_per_month == null && $sellFlat->price == null && $sellFlat->room->number_of_rooms == 1) {
            $sellFlats = $this->showOneRoomFlats()->sellFlats;
        } elseif ($sellFlat->rent_per_month == null && $sellFlat->price == null && $sellFlat->room->number_of_rooms == 2) {
            $sellFlats = $this->showTwoRoomFlats()->sellFlats;
        } elseif ($sellFlat->rent_per_month == null && $sellFlat->price == null && $sellFlat->room->number_of_rooms == 3) {
            $sellFlats = $this->showThreeRoomFlats()->sellFlats;
        } elseif ($sellFlat->rent_per_month == null && $sellFlat->price == null && $sellFlat->room->number_of_rooms > 3) {
            $sellFlats = $this->showFourPlusRoomFlats()->sellFlats;
        }
        return $sellFlats;
    }

}
