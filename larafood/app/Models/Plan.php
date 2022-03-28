<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $table = "plans";

    public function details()
    {
        return $this->hasMany(DetailPlan::class);
    }

    protected $fillable = ['name', 'price', 'description'];

    public function search($filter = null)
    {
        $results = $this->where('name', 'LIKE', "%${filter}%")
                        ->orWhere('description', 'LIKE', "%{$filter}%")
                        ->paginate();

        return $results;
    }
}


