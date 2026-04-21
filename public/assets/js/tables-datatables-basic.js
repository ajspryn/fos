/**
 * DataTables Basic - P3K Module
 * Using Vuexy Template Implementation
 */

"use strict";

document.addEventListener("DOMContentLoaded", function (e) {
  (function () {
    // Initialize DataTables for tables with class 'datatables-basic'
    const dtBasicTables = document.querySelectorAll(".datatables-basic");

    if (dtBasicTables && dtBasicTables.length) {
      dtBasicTables.forEach(function (dtBasicTable) {
        // Remove Blade @empty colspan rows — DataTables renders its own empty state
        dtBasicTable.querySelectorAll("tbody tr").forEach(function (tr) {
          const tds = tr.querySelectorAll("td");
          if (tds.length === 1 && tds[0].hasAttribute("colspan")) {
            tr.remove();
          }
        });

        new DataTable(dtBasicTable, {
          responsive: {
            details: {
              display: DataTable.Responsive.display.modal({
                header: function (row) {
                  const data = row.data();
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
              // For Responsive control column
              className: "control",
              orderable: false,
              searchable: false,
              responsivePriority: 2,
              targets: 0,
              render: function (data, type, full, meta) {
                return "";
              },
            },
            { responsivePriority: 4, targets: -1 }, // Action column - hide in responsive
            { responsivePriority: 3, targets: "_all" }, // All others
          ],
          order: [], // Disable default sort — column 0 is non-orderable (control); no default sort avoids TN/4 warning
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
            emptyTable: "Tidak ada data tersedia.",
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
      });
    }
  })();
});
