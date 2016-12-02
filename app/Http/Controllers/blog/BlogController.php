<?php

namespace App\Http\Controllers\blog;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller;

use App\Post;

use App\Category;

use App\Comment;

class BlogController extends Controller
{
    /*-- Muestra 5 posteos por página --*/
    public function getIndex(Request $request)
    {    
        $posts=Post::getPostsList(1,null,10,"asc");
        
        $posts->setPath($request->segment(1));
        
        return view("front.posts_list",
        [
            "posts"                 =>      $posts,
            "posts_most_viewed"     =>      Post::postsMostViewed(),
            "categories"            =>      Category::getCategories(),
            "title"                 =>      "Pagina de inicio",
        ]);
    }
    
    /*-- Muestra posteos de una categoria pasada como parametro --*/
    public function getPostsByCategory($category)
    {     
        $posts=Post::getPostsList(1,Category::getCategoryID($category));
        
        $posts->setPath($category);
        
        return view("front.posts_list",
        [
            "posts"                 =>      $posts,
            "posts_most_viewed"     =>      Post::postsMostViewed(),
            "categories"            =>      Category::getCategories(),
            "title"                 =>      "Categoria ".$category,
        ]);
    }
    
    /*-- Muestra un post en detalle --*/
    public function getPost($id)
    {
        $post=Post::incrementViews($id);
        
        return view("front.post_detail",
        [
            "post"=>$post,
            "related_posts"=>Post::relatedPosts($post->category_id)
        ]);
    }
    
    /*-- Realiza una busqueda de posteos en la misma pàgina --*/
    public function getSearch(Request $request)
    {
        $search=$request->get("search");
        
        if(!is_null($search))
        {
            $rules=["search"=>"required|min:2"];
        
            $validator=\Validator::make($request->all(),$rules);
            
            if($validator->fails())
            {    
                return view("front.buscar")->withErrors($validator);    
            }
        }
        
        /*------------------------------------------------------------*/

        $posts=Post::PostSearch($search)->paginate(5);

        $posts->setPath("buscar");
        
        return view("front.buscar",["posts"=>$posts]);
    }
    
}