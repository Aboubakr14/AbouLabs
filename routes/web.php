<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Modem
use App\User;
use App\Projet;
use App\Article;
use App\Tag;
use App\ArticleTag;
use App\Commentaire;
use App\Service;
use App\Categorie;
use App\Bouton;
use App\Newsletter;
//Mail
use App\Mail\ArticleValidation;
use App\Mail\ArticleNew;
use App\Mail\SendMessage;
use App\Mail\WelcomeNewsletter;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\NewsletterRequest;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;

//View Labs
Route::get('/','HomeController@index')->name('index');

Route::get('/service', function(){
    //Je fais passer le nom pour pourvoir dynamiser chemin.blade
    // qu'il afficher le nom de la page acutel
    $name = "Services";
    $actif = "services";
    $services = DB::table('services')->paginate(9);
    $projets = Projet::all();
    $bouton = Bouton::find(1);
    $smartphone = Service::select('*')->orderBy('id','desc')->get();

    if(count($projets)>=3)
        $projets = $projets->random(3);

    return view('service',compact('name','actif','services','projets','bouton','smartphone'));
});

Route::get('/blog', function(){
    $name = "Blog";
    $actif = "blog";

    $articles = Article::where('etat','=','Publié')->orderBy('id','desc')->paginate(3);
    $tags = Tag::all();
    $articleTags = ArticleTag::all();
    $users = User::all();
    $commentaires = Commentaire::all();
    $categories = Categorie::all();

    return view('blog',compact('name','actif','articles','tags','users','articleTags','commentaires','categories'));
});

Route::get('/blog-post/{id}', function(){
    $name = "Blog";
    $actif = "blog";

    $article = Article::find(request('id'));
    $tags = Tag::all();
    $articleTags = ArticleTag::all();
    $users = User::all();
    $categories = Categorie::all();
    $commentaires = Commentaire::where('id_article','=',$article->id)
        ->orderBy('id','desc')
        ->paginate(5);  
    

    return view('blogPost',compact('name','actif','article','tags','users','articleTags','commentaires','categories'));
});

Route::resource('commentaires','CommentaireController');
Route::post('/blog-post/{id}/commentaire','CommentaireController@store');
Route::delete('/blog-post/{id}/commentaire/delete','CommentaireController@destroy');

