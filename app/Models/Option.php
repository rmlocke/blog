<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'value'];

    /**
     * Get option value by name
     * 
     * @param string $name
     * @return string|null
     */
    public function getOption($name)
    {
        $option = $this->where('name', $name)->pluck('value');

        if (count($option)) {
            return $option[0];
        } else {
            return null;
        }
    }
}
