new Mmenu(
    document.querySelector("#menu"),
    {
        theme: 'white',
        // Счётчик
        counters: {
            add: true
        },
        // Поиск
        searchfield: {
            add: true,
            placeholder: 'ул. Алтайская 88',
            splash: '<p>Что ищем? 🙂</p>',
            title: 'Поиск',
        },
        // Навбары
        navbars: [
            {
                content: ['searchfield'],
            },
            {
                content: ['prev', 'breadcrumbs', 'close'],
            },
            {
                position: 'bottom',
                content: [
                    'Сделано с любовью ❤' // контент снизу страницы
                ]
            }
        ]
    },
    {
        searchfield: {
            cancel: true,
            clear: true,
        },
        language: 'ru' // локаль
    }
);