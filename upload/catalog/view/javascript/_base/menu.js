/**
 * Rubcovsk.Online - Городской портал, основанный на карте
 *
 * Сайдбар меню
 */

document.addEventListener(
    "DOMContentLoaded", () => {
        // Менюшка
        const menu = new Mmenu(
            document.querySelector("#menu"),
            {
                // Тема
                theme: 'white',
                // Счётчик
                counters: {
                    add: true
                },
                // Поиск
                searchfield: {
                    add: true,
                    placeholder: 'ул. Алтайская, дом 88',
                    splash: '<h5 class="text-muted text-center">Что ищем? 🙂</h5>',
                    title: 'Поиск',
                },
                // Навбары
                navbars: [
                    {
                        // Поле поиска
                        content: ['searchfield'],
                    },
                    {
                        // Хлебные крошки, закрыть, назад
                        content: ['prev', 'breadcrumbs', 'close'],
                    },
                    {
                        // Контент внизу сайдбара
                        position: 'bottom',
                        content: [
                            'Сделано с любовью ❤' // контент снизу страницы
                        ]
                    }
                ]
            },
            {
                // Опции к полю поиска
                searchfield: {
                    cancel: true, // кнопка закрыть
                    clear: true, // кнопка очистить
                },
                language: 'ru' // локаль
            }
        );
        const api = menu.API; // Вызов API менюшки

        // Открыть меню
        document.querySelector("#menu_open_btn")
            .addEventListener(
                "click", () => {
                    api.open();
                }
            );
    }
);
