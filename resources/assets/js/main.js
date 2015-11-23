/**
 * Created by max on 17/11/15.
 */
var Vue = require('vue');
var $ = require('jquery');

var vm = new Vue({
    el: '#email',
    data: {
        exists: false,
        placeholder: "youremail@mail.com",
        url: "http://auth.app/checkEmailExists"
    },
    methods: {
        checkEmailExists: function ()
        {
            console.debug("checkEmailExists() executed.");
            //this.exists = true;

            var email = $('#email').val();
            var url = this.url + '?email=' + email;

            console.debug("Calling: ");
            console.debug(url);

            $.ajax(url).done(function(data)
            {
                if (data == "true")
                {

                }
                else
                {
                    alert("Email already exists.");
                }

            }).fail(function(data)
            {
                alert("Server error!");

            }).always(function(data)
            {
                console.debug("always() executed.");

            });

        }
    }
});