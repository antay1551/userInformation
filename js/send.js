function sendInformations(){
    var name_element = document.getElementById("name").value;
    var city_element = document.getElementById("city").value;
    var area_element = document.getElementById("area").value;
    var street_element = document.getElementById("street").value;
    var house_element = document.getElementById("house").value;
    var information_element = document.getElementById("information").value;
    console.log(name_element);
    console.log(city_element);
    console.log(area_element);
    console.log(street_element);
    console.log(house_element);
    console.log(information_element);

    var dataString = 'name=' + name_element
        + '&city=' + city_element
        + '&area=' + area_element
        + '&street=' + street_element
        + '&house=' + house_element
        + '&information=' + information_element ;
    console.log(dataString);

    $.ajax({
        type: "POST",
        url: "http://markup/send.php",
        data: dataString,
        cache: false,
        success: function(html) {
            alert(html);
        }
    });
}