
// Инструкции обмена данными с сервером через ajax
$(document).ready(function(){

    // При отправки формы
    $("#build_report").submit(function(e) {

        e.preventDefault(); // Предотвращаем отправку форму браузером

        // Вводим объект, куда будем собирать данные введенные пользователем
        var postData = {};

        // Проверяем, какие условия формы задал пользователей и размещаем выбранные в свойства в объект с данными
        if ($("#day").is(":checked"))
        {
            postData.period = $("#date").val();
        }

        if ($("#week").is(":checked"))
        {
            postData.period = "week";
        }

        if ($("#month").is(":checked"))
        {
            postData.period = "month";
        }

        if ($("#student_1").is(":checked"))
        {
            postData.student_1 = $("#student_1").val();
        }

        if ($("#student_2").is(":checked"))
        {
            postData.student_2 = $("#student_2").val();
        }

        if ($("#animals_1").is(":checked"))
        {
            postData.animals_1 = $("#animals_1").val();
        }

        if ($("#animals_2").is(":checked"))
        {
            postData.animals_2 = $("#animals_2").val();
        }

        if ($("#animals_3").is(":checked"))
        {
            postData.animals_3 = $("#animals_3").val();
        }

        if ($("#food_1").is(":checked"))
        {
            postData.food_1 = $("#food_1").val();
        }

        if ($("#food_2").is(":checked"))
        {
            postData.food_2 = $("#food_2").val();
        }

        if ($("#food_3").is(":checked"))
        {
            postData.food_3 = $("#food_3").val();
        }

        // Отправляем данные и получаем ответ, который размещаем в указанном контейнере
        $.ajax({
            data: postData,
            type: "POST",
            url: "build_report.php",
            success: function(response){
                $("#ajax_response").html(response);
            }
        });

    });

});