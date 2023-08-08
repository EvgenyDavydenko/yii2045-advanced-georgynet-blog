## Пример создания блога с использованием фреймворка Yii2

1.  Инициализировал проект на базе фреймворка Yii2-advanced: `composer create-project --prefer-dist yiisoft/yii2-app-advanced:2.0.45`

2.  Настроил ЧПУ

3.  Создал миграцию для добавления поля role в таблицу user: `php yii migrate/create add_role_column_to_user_table`

4.  Скоректировал модель common\models\User согласно изменениям в таблице user

5.  Создал миграцию для добавления пользователей в таблицу user: `php yii migrate/create add_users_to_user_table`

6.  Создал миграцию для создания в БД таблиц category и post: `php yii migrate/create create_category_and_post_tables`

7.  Сгенерировал модель common\models\Category для таблицы category

8.  Сгенерировал модель common\models\Post для таблицы post

9.  Создал контроллер для засева таблиц category и post фэйковыми данными

10. Создал MVC для отображения списка всех постов из всех категорий

11. Добавил метод контроллера для отображения одного поста

12. Создал MVC для отображения списка постов конкретной категорий

13. Создал миграцию для создания в БД таблиц tag: `php yii migrate/create create_tag_table`

14. Сгенерировал модели common\models\Tag и common\models\TagPost для таблиц tag и tag_post

15. Добавил метод для зазева таблиц tag и tag_post данными

16. Вывел список тегов на карточке поста списка постов и просмотра одного поста

17. Создал MVC для отображения списка постов по тегу

18. Создал миграцию для создания в БД таблицы comment: `php yii migrate/create create_comment_table`

