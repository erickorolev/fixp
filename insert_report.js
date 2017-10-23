$(document).ready(function(){

    // При отправки формы
    $("#build_report").submit(function(e) {

        e.preventDefault(); // Предотвращаем отправку форму браузером

        // Присваиваем переменным значения полей формы
        var student = $("#student").val();
        // Отправляем данные формы
        $.ajax({
            dat"name=" + name+ "&email=" + email+ "&comment=" + comment,
            type: "POST",
            url: "build_report.php",
            success: function(response){
                // Размещаем данные в контейнер
                $("#ajax_response").html(response);
            }
        });

    });

});