<?php
/**
 * Pterodactyl - Panel
THEME EDITED BY FONIX/WILL
- https://hardcastle.xyz -
 * Copyright (c) 2015 - 2017 Dane Everitt <dane@daneeveritt.com>.
 *
 * This software is licensed under the terms of the MIT license.
 * https://opensource.org/licenses/MIT
 */

return [
    'exceptions' => [
        'no_new_default_allocation' => 'Вы пытаетесь удалить выделение по умолчанию для этого сервера, но резервное выделение для использования отсутствует.',
        'marked_as_failed' => 'Этот сервер был помечен как Проблемный предыдущей установки. Текущий статус не может быть переключен в этом состоянии.',
        'bad_variable' => 'Произошла ошибка проверки с переменной :name.',
        'daemon_exception' => 'При попытке установить связь с демоном возникла исключительная ситуация, в результате которой был получен код ответа HTTP / :code. Это исключение было зарегистрировано.',
        'default_allocation_not_found' => 'Запрошенное распределение по умолчанию не было найдено в выделениях этого сервера.',
    ],
    'alerts' => [
        'startup_changed' => 'Начальная конфигурация для этого сервера была обновлена. Если гнездо или яйцо этого сервера было изменено, то теперь будет происходить переустановка.',
        'server_deleted' => 'Сервер успешно удален из системы.',
        'server_created' => 'Сервер буспешно создан из панели. Пожалуйста, дайте демону несколько минут, чтобы полностью установить этот сервер.',
        'build_updated' => 'Детали сборки для этого сервера были обновлены. Некоторые изменения могут потребовать перезагрузки для вступления в силу.',
        'suspension_toggled' => 'Состояние приостановки сервера изменено на :status.',
        'rebuild_on_boot' => 'Этот сервер был помечен как требующий перестройки Docker Container. Это произойдет при следующем запуске сервера.',
        'install_toggled' => 'Состояние установки для этого сервера переключено.',
        'server_reinstalled' => 'Этот сервер поставлен в очередь для начала переустановки.',
        'details_updated' => 'Данные сервера успешно обновлены.',
        'docker_image_updated' => 'Успешно изменен образ Docker по умолчанию для использования на этом сервере. Чтобы применить это изменение, требуется перезагрузка.',
        'node_required' => 'У вас должен быть настроен хотя бы один узел, прежде чем вы сможете добавить сервер на эту панель.',
    ],
];
