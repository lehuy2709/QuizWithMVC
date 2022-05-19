<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class StudentQuiz extends Model{
    protected $table = 'student_quizs';
    protected $fillable = ['student_id','quiz_id',"score"];
    public $timestamps = false;
}
?>