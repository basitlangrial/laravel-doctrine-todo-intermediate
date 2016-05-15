<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Domain\Entities\Task;
use App\Domain\Entities\User;
use App\Domain\Repositories\TaskRepository;
use Doctrine\ORM\EntityManagerInterface;
use Illuminate\Http\Request;


Route::get('/welcome', function () {
    return view('welcome');
})->name('home');

Route::get('/scientist', function () {
    //$data = App\Scientist::all();
    $data = \EntityManager::getRepository(App\Research\Scientist::class);
    $data = $data->findAll();
    //dd($s);
    return view('scientist', [
        'data'=>$data
        ]);
})->name('scientist');
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
    /**
 * Show Task Dashboard
 */
Route::get('/', ['middleware' => 'auth',function (TaskRepository $repository) {
    $errors = [];
    $user=Auth::user()->getId();
    return view('tasks', [
        'tasks' => $repository->ownerAll($user),
        'errors'=>$errors
    ]);
}]);
/**
 * Add New Task
 */
Route::post('/task', function (Request $request, EntityManagerInterface $em) {
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    $user=Auth::user();
    $name= $request->get('name');
    $task = new Task($user,$name);

    $em->persist($task);
    $em->flush();

    return redirect('/');
});

/**
 * Delete Task
 */
Route::delete('/task/{id}', function ($id, TaskRepository $repository, EntityManagerInterface $em) {

    $task = $repository->find($id);

    $em->remove($task);
    $em->flush();

    return redirect('/');
});
});



Route::group(['middleware' => 'web'], function () {
    
});
