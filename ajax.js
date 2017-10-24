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

        // Отправляем данные формы
        $.ajax({
            data: postData,
            type: "POST",
            url: "build_report.php",
            success: function(response){
                // Размещаем данные в контейнер
                $("#ajax_response").html(response);
            }
        });

    });

});