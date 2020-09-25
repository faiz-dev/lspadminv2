'use strict';

var KTDatatableDataLocalDemo = function () {
    // Private functions

    // dt initializer
    var dt = function (element, arraySource, columns) {
        let dtObject = element.KTDatatable({
            // datasource definition
            data: {
                type: 'local',
                source: arraySource,
                pageSize: 10,
            },

            // layout definition
            layout: {
                scroll: false, // enable/disable datatable scroll both horizontal and vertical when needed.
                // height: 450, // datatable's body's fixed height
                footer: true, // display/hide footer
            },

            // column sorting
            sortable: true,
            pagination: true,
            columns: columns
        });

        return dtObject;

        // $('#kt_datatable_search_status').on('change', function() {
        //     datatable.search($(this).val().toLowerCase(), 'Status');
        // });

        // $('#kt_datatable_search_type').on('change', function() {
        //     datatable.search($(this).val().toLowerCase(), 'Type');
        // });

        // $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();
    };

    return {
        // Public functions
        init: function (element, arraySource, columns) {
            // init dmeo
            return dt(element, arraySource, columns);
        },
    };
};

jQuery(document).ready(function () {
    KTDatatableDataLocalDemo.init(element, dataJSONArray, columns);
});