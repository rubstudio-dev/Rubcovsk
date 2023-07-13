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
            splash: '<h5 class="text-muted text-center">Что ищем? 🙂</h5>',
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