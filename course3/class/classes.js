//define a  class which will be used to communicate with the back end  - NOTE this is the latest version of javascript (ES6 ECMAScript) - it will only work in the latest browsers.
class Communicator {

    constructor() {}

    getData(dataUrl) {

        //use the jQuery ajax() method to get the data fom the back end asynchronously (Asynchronous Javascript And XML)
        $.ajax({
            url: dataUrl,
            type: 'get',
            dataType: 'json', //Javascript Object Notation
            success: function (data) {
                Renderer.renderCustomers(data);
            },
            error: function (xmlHttpRequest, message, status) {
                console.log(message);
            }
        });



    } //end of getData()



}

//define a class to render into the view
class Renderer {

    constructor() {}

    static renderCustomers(data) {
        //we need to create an object which has a property (customers) expected by the Handlebars template (customerTemplate)
        var dataObj = {
            customers: data
        }

        var source = document.getElementById('customersTemplate').innerHTML;
        var template = Handlebars.compile(source);
        var html = template(dataObj);
        $('#customers tbody').html(html);
    } //end renderCustomers()


}
