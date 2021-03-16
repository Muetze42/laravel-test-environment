<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Case1Example extends Model
{
    use HasFactory;

    /**
     * The connection name for the model.
     * Set the connection for case 1
     *
     * @var string|null
     */
    protected $connection = 'mysql1';
}
