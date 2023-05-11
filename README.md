## Пример создания блога с использованием фреймворка Yii2

### История комитов:

1.  Инициализировал проект на базе фреймворка Yii2-advanced:2.0.45
2.  Создал миграцию для добавления поля role в таблицу user: yii migrate/create add_role_column_to_user_table
3.  Скоректировал модель common/models/User согласно изменениям в таблице user
4.  Создал миграцию для добавления пользователей в таблицу user: yii migrate/create add_users_to_user_table
5.  Создал миграцию для добавления в БД таблиц category и post: yii migrate/create category_and_post_tables
6.  Настроил ЧПУ
7.  Сгенерировал модель common/models/Category для таблицы category
8.  Сгенерировал модель common/models/Post для таблицы post
9.  Создал контроллер для засева таблиц category и post фэйковыми данными
10. Сгенерировал CRUD'ы для моделей common/models/Post и common/models/Category
11. Создал миграцию для добавления в БД таблиц tag: yii migrate/create add_tag_table
12. Создал миграцию для добавления в БД таблицы comment: yii migrate/create add_comment_table
13. Добавил методы засева таблиц tag и comment фэйковыми данными
