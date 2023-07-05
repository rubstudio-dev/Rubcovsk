// Получаем информацию о погоде
$(window).load(function () {
    jQuery.get('https://api.openweathermap.org/data/2.5/weather?lat=51.547425&lon=81.231164&units=imperial&appid=ca6ff81b256ad199b3de759c58de182b', function (responseText) {
        // Базовая информация из запроса
        const temp = toCelsius(responseText['main']['temp']) + ' °C'; // Текущая температура
        const feels_like = toCelsius(responseText['main']['feels_like']) + ' °C'; // Ощущается как..
        const humidity = responseText['main']['humidity']; // Влажность

        jQuery('#temp').text(temp);
        jQuery('#feels_like').text(feels_like);
        jQuery('#humidity').text(humidity);

        // Информация о погода (Иконка, описание, название)
        const weather_icon = 'image/catalog/icons/' + responseText['weather'][0]['icon'] + '.png'; // Иконка
        const weather_name = responseText['weather'][0]['main']; // Название
        const weather_desc = responseText['weather'][0]['description']; // Описание

        jQuery('#weather_icon').attr('src', weather_icon);
        jQuery('#weather_name').text(weather_name);
        jQuery('#weather_desc').text(weather_desc);
    });

    function toCelsius(f) {
        return parseInt((5 / 9) * (f - 32));
    }
});
