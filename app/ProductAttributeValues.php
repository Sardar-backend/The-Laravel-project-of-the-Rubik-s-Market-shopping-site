<?php

namespace App ;

use App\Models\Attribute_values;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductAttributeValues extends Pivot {

    public function value (){
        return $this->belongsTo(Attribute_values::class , 'value_id','id');
    }
}
