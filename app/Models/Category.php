<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model {
    use HasFactory;

    protected $fillable = [
        'title',
        'logo',
    ];
    
    protected $expenses_categories = [
        'Food',
        'Transport',
        'Entertainment',
        'Health',
        'Remt',
        'Bills',
        'Education',
        'Other',
    ];

    protected $incomes_categories = [
        'Salary',
        'Freelance',
        'Business',
        'Other',
    ];
    

    public function user() {
        return $this->belongsTo(User::class);
    }


}
