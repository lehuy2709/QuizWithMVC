<?php
session_start();
require_once './commons/helpers.php';
require_once './vendor/autoload.php';
require_once './commons/route.php';
require_once './commons/utils.php';


// use App\Controllers\DashboardController;
// use App\Controllers\SubjectController;
// use App\Controllers\LoginController;
// use App\Controllers\QuizController;
// use App\Controllers\QuestionController;
// use App\Controllers\AnswerController;
// use App\Controllers\HomeController;

$url = isset($_GET['url']) ? $_GET['url'] : "/";
definedRoute($url);
// $url mong muốn của người gửi request
// switch ($url) {
//     case '/':
//         $ctr = new HomeController();
//         $ctr->index();
//         break;
//     case 'dang-nhap':
//         $ctr = new LoginController();
//         $ctr->loginForm();
//         break;
//     case 'luu-dang-nhap':
//         $ctr = new LoginController();
//         $ctr->saveLogin();
//         break;
//     case 'dang-xuat':
//         $ctr = new LoginController();
//         $ctr->logOut();
//         break;        
//     case 'dang-ky':
//         $ctr = new LoginController();
//         $ctr->registerForm();
//         break;
//     case 'luu-dang-ky':
//         $ctr = new LoginController();
//         $ctr->createAccount();
//         break;        
//     case 'dashboard':
//         $ctr = new DashboardController();
//         $ctr->index();
//         break;
//     case 'admin':
//         $ctr = new DashboardController();
//         $ctr->index();
//         break;
//     case 'mon-hoc':
//         $ctr = new SubjectController();
//         $ctr->index();
//         break;
//     case 'mon-hoc/tao-moi':
//         $ctr = new SubjectController();
//         $ctr->addForm();
//         break;
//     case 'mon-hoc/list':
//         $ctr = new SubjectController();
//         $ctr->index();
//         break;
//     case 'mon-hoc/luu-tao-moi':
//         $ctr = new SubjectController();
//         $ctr->saveAdd();
//         break;
//     case 'mon-hoc/cap-nhat':
//         $ctr = new SubjectController();
//         $ctr->editForm();
//         break;
//     case 'mon-hoc/luu-cap-nhat':
//         $ctr = new SubjectController();
//         $ctr->saveEdit();
//         break;
//     case 'mon-hoc/xoa':
//         $ctr = new SubjectController();
//         $ctr->remove();
//         break;
//     case 'mon-hoc/chi-tiet':
//         break;
//     case 'quiz':
//         $ctr = new QuizController();
//         $ctr->index();
//         break;
//     case 'quiz/list':
//         $ctr = new QuizController();
//         $ctr->index();
//         break;
//     case 'quiz/tao-moi':
//         $ctr = new QuizController();
//         $ctr->addForm();
//         break;
//     case 'quiz/luu-tao-moi':
//         $ctr = new QuizController();
//         $ctr->saveAdd();
//         break;
//     case 'quiz/cap-nhat':
//         $ctr = new QuizController();
//         $ctr->editForm();
//         break;
//     case 'quiz/luu-cap-nhat':
//         $ctr = new QuizController();
//         $ctr->saveEdit();
//         break;
//         break;
//     case 'quiz/xoa':
//         $ctr = new QuizController();
//         $ctr->remove();
//         break;
//     case 'quiz/danh-sach':
//         $ctr = new HomeController();
//         $ctr->listQuiz();
//         break;
//     case 'quiz/lam-bai':
//         $ctr = new HomeController();
//         $ctr->listQuestion();
//         break;
//     case 'quiz/xu-ly-quiz':
//         $ctr = new HomeController();
//         $ctr->xulyQuiz();
//         break;    
//     case 'question':
//         $ctr = new QuestionController();
//         $ctr->index();
//         break;
//     case 'question/tao-moi':
//         $ctr = new QuestionController();
//         $ctr->addForm();
//         break;
//     case 'question/list':
//         $ctr = new QuestionController();
//         $ctr->index();
//         break;
//     case 'question/luu-tao-moi':
//         $ctr = new QuestionController();
//         $ctr->saveAdd();
//         break;
//     case 'question/cap-nhat':
//         $ctr = new QuestionController();
//         $ctr->editForm();
//         break;
//     case 'question/luu-cap-nhat':
//         $ctr = new QuestionController();
//         $ctr->saveEdit();
//         break;
//     case 'question/xoa':
//         $ctr = new QuestionController();
//         $ctr->remove();
//         break;
//     case 'answer':
//         $ctr = new AnswerController();
//         $ctr->index();
//         break;
//     case 'answer/list':
//         $ctr = new AnswerController();
//         $ctr->index();
//         break;
//     case 'answer/tao-moi':
//         $ctr = new AnswerController();
//         $ctr->addForm();
//         break;
//     case 'answer/luu-tao-moi':
//         $ctr = new AnswerController();
//         $ctr->saveAdd();
//         break;
//     case 'answer/xoa':
//         $ctr = new AnswerController();
//         $ctr->remove();
//         break;
//     case 'answer/cap-nhat':
//         $ctr = new AnswerController();
//         $ctr->editForm();
//         break; 
//     case 'answer/luu-cap-nhat':
//         $ctr = new AnswerController();
//         $ctr->saveEdit();
//         break;
//     case 'trang-chu':
//         $ctr = new HomeController();
//         $ctr->index();
//         break;    
//     default:
//         echo "Đường dẫn bạn đang truy cập chưa được cho phép";
//         break;
// }


?>