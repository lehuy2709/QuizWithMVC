<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Question extends Model{
    protected $table = 'questions';
    protected $fillable = ['name','quiz_id',"img"];
    public $timestamps = false;
    // function getIdQuiz(){
    //     $quiz = Quiz::where(["question_id","=",$this->id]);
    // }
}
?>