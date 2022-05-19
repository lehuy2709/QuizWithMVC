
<?php
// tạo kết nố tới csdl
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'php2_asm1',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();
// kết thúc kết nối csdl


// setup baldeone
// setup baldeone
use eftec\bladeone\BladeOne;
function view($viewFile,$data=[]){
    $balde = new BladeOne('./app/views/admin','./storage',BladeOne::MODE_DEBUG);
    echo $balde->run($viewFile,$data);
}

function view_home($viewFile,$data=[]){
    $balde = new BladeOne('./app/views/website','./storage',BladeOne::MODE_DEBUG);
    echo $balde->run($viewFile,$data);
}




?>