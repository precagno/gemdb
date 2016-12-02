<?php

    namespace App;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model
    {   
        protected $table="posts";

        protected $primaryKey="id_post";

        protected $fillable=["title","image","preview","content","user_id","active","category_id"];

        /*-- Relacion uno con uno con la tabla users --*/
        public function user()
        {
            //return $this->hasOne("App\User","id","user_id");
            return $this->hasOne("App\User","id","user_id");
            ///A)nombre del modelo relacionado
            ///B)nombre de la foreign key(campo "id" de tabla users)
            ///C)nombre del campo que debe coincidir con B)(llave foranea tabla posts)
        }

        /*-- Relacion uno con uno con la tabla categories --*/
        public function category()
        {
            return $this->hasOne("App\Category","id_category","category_id");
        }

        /*-- Relacion uno con muchos con la tabla comments --*/
        public function comments()
        {
            return $this->hasMany("App\Comment","post_id","id_post");
        }

        /*-- Scope que filtra posts activos --*/
        public function scopeFilterActive($query,$status=1)
        {   
            return $query->where("active",$status);
        }

        /*-- Scope que filtra post por titulo --*/
        public function scopePostSearch($query,$search)
        {
            if(trim($search)!="")
            {
                return $query->where("title","like","%$search%")->orWhere("content","like","%$search%");
            }
        }

        /*-- Scope que ordena los post por cantidad de visitas de mayor a menor --*/
        public function scopeOrderViews($query,$order="desc")
        {
            return $query->orderBy("views",$order);
        }

        /*-- Scope que ordena los post de forma aleatoria --*/
        /*-- Metodo Mysql dependiente --*/
        public function scopeOrderRandom($query)
        {
            return $query->orderBy(\DB::raw('RAND()'));
            //Mejorar la implementaciòn para que no sea Mysql dependiente
        }

        /*-- Scope que filtra por categoria --*/
        public function scopeCategory($query,$id_category=null)
        {
            if(!is_null($id_category))
            {
                return $query->where("category_id",$id_category);
            }
        }
        /*-- Metodo que devuelve una coleccion de posts filtrado por los parametros --*/
        public static function getPostsList($active=1,$id_category=null,$paginate=5,$order="desc")
        {
            return Post::FilterActive($active)->Category($id_category)->OrderViews($order)->paginate($paginate);
        }

        /*-- Mètodo que filtra los n posts mas vistos --*/
        public static function postsMostViewed($cant=5,$order="desc")
        {
            return Post::FilterActive()->take($cant)->OrderViews($order)->get(["id_post","title","views"]);
        }

        /*-- Mètodo que trae las n posts relacionados con el post actual --*/
        public static function relatedPosts($category_id,$cant=5)
        {           
            return Post::where("category_id",$category_id)->FilterActive()->take($cant)->OrderRandom()->get(["id_post","title","views"]);
        }

        /*-- Mètodo que incrementa en 1 la cantidad de visitas del post actual --*/
        public static function incrementViews($title)
        {
            $post=Post::where("title",str_replace("-"," ",$title))->first();

            $post->views++;

            $post->save();

            return $post;
        }

        /*-- Retorna el titulo pero sin espacios y con guiones medios --*/
        public function getTitleNoSpacesAttribute()
        {
            return str_replace(" ","-",$this->title);
        }

        /*-- Trae la cantidad de comentarios de cada post --*/
        public function getActiveCommentsCountAttribute()
        {
            return Comment::where("post_id",$this->id_post)->where("active",1)->count();
        }
    }