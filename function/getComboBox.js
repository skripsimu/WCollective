function getDivision(val) {
    $.ajax({
        type: "POST",
        url: "function/getComboBox.php",
        data: 'company_id=' + val,
        success: function (data) {
            $("#division-list").html(data);
        }
    });
}