<?php

use App\Controllers\HomeController;
use App\Controllers\DashboardController;
use App\Controllers\SubjectController;
use App\Controllers\LoginController;
use App\Controllers\QuizController;
use App\Controllers\QuestionController;
use App\Controllers\AnswerController;

use Phroute\Phroute\RouteCollector;
    function definedRoute($url){
        $router = new RouteCollector();
        

        // homepage
        $router->get('/',[HomeController::class,'index']);
        $router->get('trang-chu',[HomeController::class,'index']);
        // login 
        $router->get('dang-nhap',[LoginController::class,'loginForm']);
        $router->post('luu-dang-nhap',[LoginController::class,'saveLogin']);
        $router->get('dang-ky',[LoginController::class,'registerForm']);
        $router->post('luu-dang-ky',[LoginController::class,'createAccount']);
        $router->get('dang-xuat',[LoginController::class,'logOut']);

        // dasboard
        $router->get('dashboard',[DashboardController::class,'index']);
        $router->get('admin',[DashboardController::class,'index']);

        // subject
        $router->get('mon-hoc',[SubjectController::class,'index']);

        $router->group(['prefix'=>'mon-hoc'],function($router){
            $router->get('list',[SubjectController::class,'index']);
            $router->get('tao-moi',[SubjectController::class,'addForm']);
            $router->post('luu-tao-moi',[SubjectController::class,'saveAdd']);
            $router->get('cap-nhat/{id}',[SubjectController::class,'editForm']);
            $router->post('luu-cap-nhat/{id}',[SubjectController::class,'saveEdit']);
            $router->get('xoa/{id}',[SubjectController::class,'remove']);

        });

        // quiz 
        $router->get('quiz',[QuizController::class,'index']);
        $router->group(['prefix'=>'quiz'],function($router){
            $router->get('list',[QuizController::class,'index']);
            $router->get('tao-moi',[QuizController::class,'addForm']);
            $router->post('luu-tao-moi',[QuizController::class,'saveAdd']);
            $router->get('cap-nhat/{id}',[QuizController::class,'editForm']);
            $router->post('luu-cap-nhat/{id}',[QuizController::class,'saveEdit']);
            $router->get('xoa/{id}',[QuizController::class,'remove']);

            $router->get('danh-sach/{id}',[HomeController::class,'listQuiz']);
            $router->get('lam-bai/{id}',[HomeController::class,'listQuestion']);
            $router->POST('xu-ly-quiz/{id}',[HomeController::class,'xulyQuiz']);

        });

        // question
        $router->get('question',[QuestionController::class,'index']);
        $router->group(['prefix'=>'question'],function($router){
            $router->get('list',[QuestionController::class,'index']);
            $router->get('tao-moi',[QuestionController::class,'addForm']);
            $router->post('luu-tao-moi',[QuestionController::class,'saveAdd']);
            $router->get('cap-nhat/{id}',[QuestionController::class,'editForm']);
            $router->post('luu-cap-nhat/{id}',[QuestionController::class,'saveEdit']);
            $router->get('xoa/{id}',[QuestionController::class,'remove']);

        });
        // // answer
        $router->get('answer',[AnswerController::class,'index']);
        $router->group(['prefix'=>'answer'],function($router){
            $router->get('list',[AnswerController::class,'index']);
            $router->get('tao-moi',[AnswerController::class,'addForm']);
            $router->post('luu-tao-moi',[AnswerController::class,'saveAdd']);
            $router->get('cap-nhat/{id}',[AnswerController::class,'editForm']);
            $router->post('luu-cap-nhat/{id}',[AnswerController::class,'saveEdit']);
            $router->get('xoa/{id}',[AnswerController::class,'remove']);

        });




        $dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
        $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($url, PHP_URL_PATH));
    // Print out the value returned from the dispatched function
        echo $response;
    }
