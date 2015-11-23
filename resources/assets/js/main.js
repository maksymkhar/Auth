/**
 * Created by max on 17/11/15.
 */
var Vue = require('vue');

new Vue({
    el: '#emailFormGroup',
    data: {
        exists: false
    },
    methods: {
        checkEmailExists: function (event)
        {
            alert('Trolo');
            this.exists = true;
        }
    }
});