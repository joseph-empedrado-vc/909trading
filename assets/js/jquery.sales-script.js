/* Jquery Normal Post Not Ajax */
jQuery(function(jQuery) { jQuery.extend({
    form: function(url, data, method) {
        if (method == null) method = 'POST';
        if (data == null) data = {};

        var form = jQuery('<form>').attr({
            method: method,
            action: url
        }).css({
            display: 'none'
        });

        var addData = function(name, data) {
            if (jQuery.isArray(data)) {
                for (var i = 0; i < data.length; i++) {
                    var value = data[i];
                    addData(name + '[]', value);
                }
            } else if (typeof data === 'object') {
                for (var key in data) {
                    if (data.hasOwnProperty(key)) {
                        addData(name + '[' + key + ']', data[key]);
                    }
                }
            } else if (data != null) {
                form.append(jQuery('<input>').attr({
                    type: 'hidden',
                    name: String(name),
                    value: String(data)
                }));
            }
        };

        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                addData(key, data[key]);
            }
        }

        return form.appendTo('body');
    }
});

});