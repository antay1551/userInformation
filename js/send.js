function sendInformations(){
    var name_element = document.getElementById("name").value;
    var city_element = document.getElementById("city").value;
    var area_element = document.getElementById("area").value;
    var street_element = document.getElementById("street").value;
    var house_element = document.getElementById("house").value;
    var information_element = document.getElementById("information").value;
    var dataString = 'name=' + name_element
        + '&city=' + city_element
        + '&area=' + area_element
        + '&street=' + street_element
        + '&house=' + house_element
        + '&information=' + information_element ;

    $.ajax({
        type: "POST",
        url: "http://markup/send.php",
        data: dataString,
        cache: false,
        success: function(html) {
            alert(html);
        }
    });

    function load()
    {
        setTimeout("location.href = 'http://markup/user_office_address.php';", 1000);
    }
}