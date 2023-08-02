## Пример создания блога с использованием фреймворка Yii2

1.  Инициализировал проект на базе фреймворка Yii2-advanced: `composer create-project --prefer-dist yiisoft/yii2-app-advanced:2.0.45`

2.  Настроил ЧПУ

3.  Создал миграцию для добавления поля role в таблицу user: `php yii migrate/create add_role_column_to_user_table`

4.  Скоректировал модель common/models/User согласно изменениям в таблице user

5.  Создал миграцию для добавления пользователей в таблицу user: `php yii migrate/create add_users_to_user_table`

