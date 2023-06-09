<?php

namespace console\controllers;

use yii\console\Controller;
use yii\console\ExitCode;
use common\models\Category;
use common\models\Post;
use common\models\Comment;
use common\models\Tag;
use common\models\TagPost;
use Faker\Factory;

class SeedController extends Controller
{

  public function actionCategory()
  {
      $faker = Factory::create();

      for($i = 0; $i < 6; $i++)
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

      for($i = 0; $i < 6 * 4; $i++)
      {
        $category = new Post();
        $category->title = $faker->word();

        $text = $faker->text(rand(300, 400));
        $category->anons = mb_substr($text, 0, 50) . '...';
        $category->content = $text;

        $category->category_id = $faker->numberBetween(1, 6);
        $category->author_id = $faker->numberBetween(2, 4);
        $category->publish_status = 'publish';
        $category->publish_date = $faker->dateTime($max = 'now', $timezone = null)->format('Y-m-d H:i:s');

        $category->save(false);
      }

      echo "Data generation is complete!\n";

      return ExitCode::OK;
  }
  public function actionComment()
  {
      $faker = Factory::create();

      for($i = 0; $i < 6 * 4 * 3; $i++)
      {
        $comment = new Comment();
        $comment->title = $faker->word();
        $comment->content = $faker->text(rand(50, 100));
        $comment->publish_status = 'publish';
        $comment->post_id = $faker->numberBetween(3, 26);
        $comment->author_id = $faker->numberBetween(8, 10);
        $comment->save(false);
      }

      echo "Data generation is complete!\n";

      return ExitCode::OK;
  }

  public function actionTag()
  {
      $faker = Factory::create();

      for($i = 0; $i < 10; $i++)
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

      for($i = 0; $i < 6 * 4 * 2; $i++)
      {
        $tp = new TagPost();
        $tp->tag_id = $faker->numberBetween(1, 10);
        $tp->post_id = $faker->numberBetween(3, 26);
        $tp->save(false);
      }

      echo "Data generation is complete!\n";

      return ExitCode::OK;
  }
}
