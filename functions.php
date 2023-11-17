<?php

function enregistrement($num = 1){
    $html = "";
    for($i = 0; $i < $num ; $i++){
        $html .= addressFields();
    }

    return  $html;
}

function addressFields($address = []){
    $id = $address['id'] ?? 1;
    $street = $address['street'] ?? "";
    $street_nb = $address['street_nb'] ?? 0;
    $zipCode = $address['zipcode'] ?? "";
    $city = $address['city'] ?? "ottawa";
    $type = $address['type'] ?? "facturation";

    $addressInput = array(
        "street" => array(
            "label" => "Street",
            "type" => "text",
            "dataInput"=> 'maxlength="50" minlength="5" required',
            "value"=> $street
        ),
        "street_nb" => array(
            "label" => "Street number",
            "type" => "number",
            "dataInput"=> 'min="5" required',
            "value"=> $street_nb
        ),
        "zipCode" => array(
            "label" => "Zip code",
            "type" => "text",
            "dataInput"=> 'maxlength="6" minlength="6" required',
            "value"=> $zipCode
        ),
    );

    $addressSelect = array(
        "type" => ["delivery", "facturaction"],
        "city" => ["montreal", "laval", "toronto", "ottawa"],
        "province" => ["quebec", "ontario"],
    );

    $addressHtml = '<div class="address" style="margin:10px">';
    $addressHtml .= "Adresse:" . $id;
    forEach( $addressInput as $keyId => $keyDef ){
        $addressHtml .= '<div class="row col-md-12 ' . $keyId . '"  style="margin:2px">';
        $addressHtml .= '<div class="col-md-4"><label for="' . $keyId . '">' . $keyDef["label"] . '</label></div>';
        $addressHtml .= '<div class="col-md-4"><input type="' . $keyDef["type"] . '" id="' . $keyId . '" value="' . $keyDef["value"] . '" name="' . $keyId . '" ' . $keyDef["dataInput"] . '></div>';
        $addressHtml .= '</div>';
    }
    
    forEach( $addressSelect as $keyId => $values ){
        $addressHtml .= '<div class="row col-md-12 ' . $keyId . '" style="margin:2px">';
        $addressHtml .= '<div class="col-md-4"><label for="' . $keyId . '">' . ucfirst($keyId) . '</label></div>';
        $addressHtml .= '<div class="col-md-4"><select id="' . $keyId . '" name="' . $keyId . '" required>';
        forEach( $values as $value ){
            $selected = "";
            if($keyId === "type"){
                $selected = $value === $type ? 'selected="selected"' : '';
            } elseif ($keyId === "city"){
                $selected = $value === $city ? 'selected="selected"' : '';
            }
            $addressHtml .= '<option value="' . $value . '" ' . $selected . '>' . ucfirst($value) . '</option>';
        }
        $addressHtml .= '</select></div>';
        $addressHtml .= '</div>';
    }
    $addressHtml .= '</div>';

    return $addressHtml;
}