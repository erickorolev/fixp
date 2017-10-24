$(document).ready(function(){

    // При отправки формы
    $("#build_report").submit(function(e) {

        e.preventDefault(); // Предотвращаем отправку форму браузером

        // Присваиваем переменным значения полей формы

        var postData = {};

        if ($('#student_1').is(":checked"))
        {
            postData.student_1 = $('#student_1').val();
        }

        if ($('#student_2').is(":checked"))
        {
            postData.student_2 = $('#student_2').val();
        }

        if ($('#animals_1').is(":checked"))
        {
            postData.animals_1 = $('#animals_1').val();
        }

        if ($('#animals_2').is(":checked"))
        {
            postData.animals_2 = $('#animals_2').val();
        }

        if ($('#animals_3').is(":checked"))
        {
            postData.animals_3 = $('#animals_3').val();
        }

        if ($('#food_1').is(":checked"))
        {
            postData.food_1 = $('#food_1').val();
        }

        if ($('#food_2').is(":checked"))
        {
            postData.food_2 = $('#food_2').val();
        }

        if ($('#food_3').is(":checked"))
        {
            postData.food_3 = $('#food_3').val();
        }

        // Отправляем данные
        $.ajax({
            data: postData,
            type: "POST",
            url: "build_report.php",
            success: function(response){
                // Размещаем ответ в контейнер
                $("#ajax_response").html(response);
            }
        });

    });

});