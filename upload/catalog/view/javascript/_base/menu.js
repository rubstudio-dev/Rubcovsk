new Mmenu(document.querySelector("#menu"), {
    // Счётчик
    "counters": {
        "add": true
    },
    // Доп оверлеи
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
                // контент снизу страницы
                "Сделано с любовью ❤"
            ]
        }
    ]
});