<?php

function enregistrement($num = 1){
    $html = "";
    for($i = 0; $i < $num ; $i++){
        $html .= addressFields($i +1);
    }

    return  $html;
}

function addressFields($id, $address = [], $display = false){
    $id = $address['id'] ?? $id;
    $street = $address['street'] ?? "";
    $street_nb = $address['street_nb'] ?? 0;
    $zipCode = $address['zipcode'] ?? "";
    $city = $address['city'] ?? "ottawa";
    $type = $address['type'] ?? "facturation";

    $addressInput = array(
        "street" => array(
            "label" => "Street",
            "type" => $display ? "hidden" : "text",
            "dataInput"=> 'maxlength="50" minlength="5" required',
            "value"=> $street
        ),
        "street_nb" => array(
            "label" => "Street number",
            "type" => $display ? "hidden" : "number",
            "dataInput"=> 'min="5" required',
            "value"=> $street_nb
        ),
        "zipcode" => array(
            "label" => "Zip code",
            "type" => $display ? "hidden" : "text",
            "dataInput"=> 'maxlength="6" minlength="6" required',
            "value"=> $zipCode
        ),
    );

    $addressSelect = array(
        "type" => ["delivery", "facturation", "shipping", "billing", "other"],
        "city" => ["montreal", "laval", "toronto", "ottawa"],
        "province" => ["quebec", "ontario"],
    );

    $addressHtml = '<div class="address" style="margin:10px">';
    $addressHtml .= "Adresse: " . $id;
    forEach( $addressInput as $keyId => $keyDef ){
        $keyFor = $id . '_' . $keyId;
        $keyName = $id . '[' . $keyId . ']';
        $addressHtml .= '<div class="row col-md-12 ' . $keyId . '"  style="margin:2px">';
        $addressHtml .= '<div class="col-md-4"><label for="' . $keyFor . '">' . $keyDef["label"] . '</label></div>';
        $addressHtml .= '<div class="col-md-4">';
        $addressHtml .= '<input type="' . $keyDef["type"] . '" id="' . $keyFor . '" value="' . $keyDef["value"] . '" name="' . $keyName . '" ' . $keyDef["dataInput"] . '>';
        $addressHtml .= $display ? '<span>' . $keyDef["value"] . '</span>' : '';
        $addressHtml .= '</div>';
        $addressHtml .= '</div>';
    }
    
    forEach( $addressSelect as $keyId => $values ){
        $keyFor = $id . '_' . $keyId;
        $keyName = $id . '[' . $keyId . ']';
        $addressHtml .= '<div class="row col-md-12 ' . $keyId . '" style="margin:2px">';
        $addressHtml .= '<div class="col-md-4"><label for="' . $keyFor . '">' . ucfirst($keyId) . '</label></div>';
        $addressHtml .= '<div class="col-md-4">';
        $hiddenClass = $display ? 'd-none hidden' : '';
        $addressHtml .= '<select id="' . $keyFor . '" class="' . $hiddenClass . '" name="' . $keyName . '" required>';
        forEach( $values as $value ){
            $selected = "";
            $selectedValue = "";
            if($keyId === "type"){
                if($value === $type){
                    $selected = 'selected="selected"';
                    $selectedValue = $type;
                    break;
                }
            } elseif ($keyId === "city"){
                if($value === $city){
                    $selected = 'selected="selected"';
                    $selectedValue = $city;
                    break;
                }
            } 

            $addressHtml .= '<option value="' . $value . '" ' . $selected . '>' . ucfirst($value) . '</option>';
        }
        $addressHtml .= '</select>';
        $addressHtml .= $display ? '<span>' . $selectedValue . '</span>' : '';
        $addressHtml .= '</div>';
        $addressHtml .= '</div>';
    }
    $addressHtml .= '</div>';

    return $addressHtml;
}


function buildPostAddressList()
{
    $addressList = [];
    foreach( $_POST as $key => $value ){
        $fieldArr = explode('_', $key);
        $addressId = $fieldArr[0];
        $addressField = $fieldArr[1];

        $addressList[$addressId] = $addressList[$addressId] ?? [];
        $addressList[$addressId][$addressField] = $value;
    }

    return $addressList;
}
