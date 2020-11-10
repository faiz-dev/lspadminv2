"use strict";
// Class definition

var CDatatableRemoteAjax = function() {
    // Private functions

    // dt initializer
    var dt = function (element, url, columns) {
        const token = $('meta[name="csrf-token"]').attr("content");
        console.log(token);
        var datatable = element.KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        method: 'POST',
                        url: url,
                        // sample custom headers
                        headers: {"X-CSRF-TOKEN": token},
                        map: function(raw) {
                            // sample data mapping
                            var dataSet = raw;
                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }
                            return dataSet;
                        },
                    },
                },
                pageSize: 10,
                serverPaging: false,
                serverFiltering: false,
                serverSorting: false,
            },

            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#kt_datatable_search_query'),
                key: 'generalSearch'
            },

            // columns definition
            columns: columns,

        });

		// $('#kt_datatable_search_status').on('change', function() {
        //     datatable.search($(this).val().toLowerCase(), 'Status');
        // });

        // $('#kt_datatable_search_type').on('change', function() {
        //     datatable.search($(this).val().toLowerCase(), 'Type');
        // });

        // $('#kt_datatable_search_status, #kt_datatable_search_type').selectpicker();

        return datatable;
    };

    return {
        // Public functions
        init: function (element, url, columns) {
            // init dmeo
            return dt(element, url, columns);
        },

        initSearch: function(dtObject, searchElement, columnTarget) {
            searchElement.on('change', function() {
                console.log("Cari ", $(this).val())
                dtObject.search($(this).val(), columnTarget)
            })
        },
    };
};

window.CDatatableRemoteAjax = new CDatatableRemoteAjax()
