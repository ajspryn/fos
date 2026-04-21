/**
 * P3K DataTables Initialization - Using Vuexy Template JS
 */

"use strict";

document.addEventListener("DOMContentLoaded", function (e) {
  (function () {
    // Initialize DataTables for tables with class 'datatables-basic' in P3K module
    const dt_basic_table = document.querySelector(".datatables-basic");
    let dt_basic;

    if (dt_basic_table) {
      dt_basic = new DataTable(dt_basic_table, {
        responsive: {
          details: {
            display: DataTable.Responsive.display.modal({
              header: function (row) {
                const data = row.data();
                // Use the third column (Nama Nasabah) as header if available, else generic
                return "Details of " + (data[3] || "Row");
              },
            }),
            type: "column",
            renderer: function (api, rowIdx, columns) {
              const data = columns
                .map(function (col) {
                  return col.title !== "" // Do not show row in modal popup if title is blank (for control column)
                    ? `<tr data-dt-row="${col.rowIndex}" data-dt-column="${col.columnIndex}">
                        <td>${col.title}:</td>
                        <td>${col.data}</td>
                      </tr>`
                    : "";
                })
                .join("");

              if (data) {
                const div = document.createElement("div");
                div.classList.add("table-responsive");
                const table = document.createElement("table");
                div.appendChild(table);
                table.classList.add("table");
                table.classList.add("datatables-basic");
                const tbody = document.createElement("tbody");
                tbody.innerHTML = data;
                table.appendChild(tbody);
                return div;
              }
              return false;
            },
          },
        },
        columnDefs: [
          {
            // For Responsive control column with plus icon
            className: "control",
            orderable: false,
            searchable: false,
            responsivePriority: 2,
            targets: 0,
            render: function (data, type, full, meta) {
              return "";
            },
          },
          { responsivePriority: 1, targets: -1 }, // Action column
          { responsivePriority: 3, targets: "_all" }, // All others
        ],
        paging: true,
        searching: true,
        ordering: true,
        info: true,
        lengthChange: true,
        pageLength: 10,
        language: {
          search: "Cari:",
          lengthMenu: "Tampilkan _MENU_ entri per halaman",
          info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
          infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
          infoFiltered: "(difilter dari _MAX_ total entri)",
          paginate: {
            first:
              '<i class="icon-base ti tabler-chevrons-left scaleX-n1-rtl icon-18px"></i>',
            last: '<i class="icon-base ti tabler-chevrons-right scaleX-n1-rtl icon-18px"></i>',
            next: '<i class="icon-base ti tabler-chevron-right scaleX-n1-rtl icon-18px"></i>',
            previous:
              '<i class="icon-base ti tabler-chevron-left scaleX-n1-rtl icon-18px"></i>',
          },
        },
      });
    }
  })();
});
