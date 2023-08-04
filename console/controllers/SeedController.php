<?php

namespace console\controllers;

use yii\console\Controller;
use yii\console\ExitCode;
use common\models\Category;
use common\models\Post;
use common\models\Tag;
use common\models\TagPost;
use Faker\Factory;

class SeedController extends Controller
{
    const CAT_QTY = 6;
    const POS_IN_CAT = 4;
    const TAG_QTY = 10;
    const TAG_IN_POS = 3;

    public function actionCategory()
    {
        $faker = Factory::create();

        for($i = 0; $i < self::CAT_QTY; $i++)
        {
            $category = new Category();
            $category->title = $faker->word();
            $category->save(false);
        }

        echo "Data generation is complete!\n";

        return ExitCode::OK;
    }

    public function actionPost()
    {
        $faker = Factory::create();

        for($i = 0; $i < self::CAT_QTY * self::POS_IN_CAT; $i++)
        {
            $category = new Post();
            $category->title = $faker->word();

            $text = $faker->text(rand(300, 400));
            $category->anons = mb_substr($text, 0, 50) . '...';
            $category->content = $text;

            $category->category_id = $faker->numberBetween(1, self::CAT_QTY);
            $category->author_id = $faker->numberBetween(2, 4);
            $category->publish_status = 'publish';
            $category->publish_date = $faker->dateTime($max = 'now', $timezone = null)->format('Y-m-d H:i:s');

            $category->save(false);
        }

        echo "Data generation is complete!\n";

        return ExitCode::OK;
    }

    public function actionTag()
    {
        $faker = Factory::create();

        for($i = 0; $i < self::TAG_QTY; $i++)
        {
          $comment = new Tag();
          $comment->title = $faker->word();
          $comment->save(false);
        }

        echo "Data generation is complete!\n";

        return ExitCode::OK;
    }

    public function actionTagPost()
    {
        $faker = Factory::create();

        for($i = 0; $i < self::CAT_QTY * self::POS_IN_CAT * self::TAG_IN_POS; $i++)
        {
          $tp = new TagPost();
          $tp->tag_id = $faker->numberBetween(1, self::TAG_QTY);
          $tp->post_id = $faker->numberBetween(1, self::CAT_QTY * self::POS_IN_CAT);
          $tp->save(false);
        }

        echo "Data generation is complete!\n";

        return ExitCode::OK;
    }
}