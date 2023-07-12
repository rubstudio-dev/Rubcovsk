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

// Динамическая подгрузка меню
$(document).ready(function () {
    // Подгрузка дочерних категорий из родительских
    $('li.mm-listitem[data-cat-id]').click(function () {
        let parent_id = $(this).attr('data-cat-id');
        $.ajax({
            url: 'index.php?route=common/home/ajaxGetChild',
            type: 'POST',
            dataType: 'json',
            data: {
                parent_id: parent_id
            },
            success: function (json) {
                if (json['success'] === true) {
                    alert(json['data'][0]['name']);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    // Подгрузка организаций из дочерних
    $('li.mm-listitem[data-cat-child-id]').click(function () {
        let child_id = $(this).attr('data-cat-child-id');
        $.ajax({
            url: 'index.php?route=common/home/ajaxGetOrgs',
            type: 'POST',
            dataType: 'json',
            data: {
                child_id: child_id
            },
            success: function (json) {
                if (json['success'] === true) {
                    alert(json['data'][0]['name']);
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
});