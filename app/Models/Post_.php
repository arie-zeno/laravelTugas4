<?php

namespace App\Models;


class Post
{
    private static $blog_posts = [
        [
            "judul" => "Post Pertama",
            "penulis" => "Ari",
            "slug" => "post-pertama",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, in nihil. Vitae eos soluta pariatur ratione nisi rerum consequatur. Omnis illum nostrum atque quam accusamus culpa reiciendis doloribus odit facere, tempora quisquam non placeat corporis ex animi porro assumenda cum officia, ipsum maiores dolores id doloremque! Dolore obcaecati harum vitae nulla mollitia molestiae, maiores veritatis ex ea repellat? Saepe illo cum non aperiam laudantium inventore, velit, incidunt amet quae doloremque obcaecati ex eos nam provident distinctio quasi placeat excepturi perferendis, dolorem vitae beatae possimus laborum natus! Beatae reprehenderit iure, tenetur nesciunt incidunt aspernatur, molestias maiores magni eos ipsam tempora provident."
        ],
        [
            "judul" => "Post Kedua",
            "penulis" => "Yono",
            "slug" => "post-kedua",
            "body" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est, in nihil. Vitae eos soluta pariatur ratione nisi rerum consequatur. Omnis illum nostrum atque quam accusamus culpa reiciendis doloribus odit facere, tempora quisquam non placeat corporis ex animi porro assumenda cum officia, ipsum maiores dolores id doloremque! Dolore obcaecati harum vitae nulla mollitia molestiae, maiores veritatis ex ea repellat? Saepe illo cum non aperiam laudantium inventore, velit, incidunt amet quae doloremque obcaecati ex eos nam provident distinctio quasi placeat excepturi perferendis, dolorem vitae beatae possimus laborum natus! Beatae reprehenderit iure, tenetur nesciunt incidunt aspernatur, molestias maiores magni eos ipsam tempora provident."
        ]];

    public static function all(){
        return collect(self::$blog_posts);
    }

    public static function find($slug){
        $new = static::all();
        return $new->firstWhere("slug", $slug);
    }
}
