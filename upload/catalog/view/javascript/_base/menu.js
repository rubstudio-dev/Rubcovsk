new Mmenu(
    document.querySelector("#menu"),
    {
        // Счётчик
        "counters": {
            "add": true
        },
        // Навбары
        "navbars": [
            {
                "position": "top",
                "content": [
                    "searchfield" // поиск
                ]
            },
            {
                "position": "bottom",
                "content": [
                    "Сделано с любовью ❤" // контент снизу страницы
                ]
            }
        ]
    },
    {
        "language": "ru" // локаль
    }
);